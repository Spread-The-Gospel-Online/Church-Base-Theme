<?php

function church_util_get_upcoming_events ($number_events = 3) {
	return get_posts(array(
		'meta_query' => array(
			array(
				'key' => 'event_date',
				'value' => date('Y-m-d'),
				'compare' => '>='
			)
		),
		'post_type' => 'events',
		'posts_per_page' => $number_events,
		'orderby' => 'meta_value',
    	'order' => 'ASC'
	));
}

function church_util_get_events_for_day ($day, $recurring_events = array()) {
	$events = get_posts(array(
		'meta_query' => array(
			array(
				'key' => 'event_date',
				'value' => $day,
				'compare' => '='
			)
		),
		'post_type' => 'events',
		'posts_per_page' => -1,
		'orderby' => 'meta_value',
    	'order' => 'ASC'
	));

	foreach ($recurring_events as $event) {
		$event_date = get_post_meta($event->ID, 'event_date', true);
		if ($day == $event_date) { continue; }

		$recurring_raw = get_post_meta($event->ID, 'event_recurring', true);
		$recurring_parts = explode(' ', $recurring_raw);
		$recurring = intval($recurring_parts[0]);
		$multiplier = 1;
		if ($recurring_parts[1] == 'weeks' || $recurring_parts[1] == 'week') { $multiplier = 7; }

		$event_timestamp = strtotime($event_date);
		$day_timestamp = strtotime($day);
		$diff = $day_timestamp - $event_timestamp;
		$days_ahead = round($diff / (60 * 60 * 24));

		if ($days_ahead % ($recurring * $multiplier) == 0 && $days_ahead > 0) {
			$events[] = $event;
		}
	}

	return $events;
}

