<?php

// Hourly cron: publish notifications whose start date has passed, delete those whose
// end date has passed. Notifications missing either date are skipped.
add_action('church_cron_notifications_hook', 'church_process_notifications');

add_action('init', function () {
	if (!wp_next_scheduled('church_cron_notifications_hook')) {
		wp_schedule_event(time(), 'hourly', 'church_cron_notifications_hook');
	}
});

function church_process_notifications () {
	$notifications = get_posts(array(
		'post_type' => 'notifications',
		'post_status' => array('publish', 'draft', 'pending', 'future'),
		'posts_per_page' => -1,
		'meta_query' => array(
			'relation' => 'AND',
			array('key' => 'notification_start_date', 'compare' => 'EXISTS'),
			array('key' => 'notification_end_date', 'compare' => 'EXISTS'),
		),
	));

	$now = time();

	foreach ($notifications as $note) {
		$start = get_post_meta($note->ID, 'notification_start_date', true);
		$end   = get_post_meta($note->ID, 'notification_end_date', true);

		// Backstop the EXISTS query: a notification with no start or end date is skipped.
		if (!$start || !$end) {
			continue;
		}

		if ($now > strtotime($end . ' 23:59:59')) {
			// Past the end date (end-of-day) -> delete permanently.
			wp_delete_post($note->ID, true);
		} else if ($now >= strtotime($start) && $note->post_status !== 'publish') {
			// Past the start date -> publish.
			wp_update_post(array('ID' => $note->ID, 'post_status' => 'publish'));
		}
	}
}
