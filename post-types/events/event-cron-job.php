<?php

add_action('init', 'church_check_events_job');

function church_check_events_job () {	
	$events = get_posts(array(
		'meta_query' => array(
			array(
				'key' => 'event_recurring'
			)
		),
		'post_type' => 'events',
		'posts_per_page' => -1
	));

	foreach ($events as $event) {
		$event_date = get_post_meta($event->ID, 'event_date', true);
		$recurring = get_post_meta($event->ID, 'event_recurring', true);

		$event_timestamp = strtotime($event_date);
		$now = time();

		if ($now > $event_timestamp && $event_date != date('Y-m-d', $now)) {
			$time_diff = strtotime('+' . $recurring) - $now;
			$new_timestamp = $event_timestamp + $time_diff;
			$new_date = date('Y-m-d', $new_timestamp);
			update_post_meta($event->ID, 'event_date', $new_date);
		}
	}
}