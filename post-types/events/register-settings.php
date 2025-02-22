<?php

// Add metaboxes for events
add_action('add_meta_boxes_events', function ($post) {
	add_meta_box(
		'event_details',
		__('Event Details'),
		function ($post) {
			include get_template_directory() . '/admin-panel/events/templates/event-date-meta-box.php';
		},
		$post->post_type,
		'side',
		'default'
	);
});

add_action('save_post_events', function ($post_ID) {
	if (!current_user_can('edit_post', $post_ID)) { return; }

	$nonce_field_name = 'events_meta_nonce';

	if (array_key_exists($nonce_field_name, $_POST)
		&& wp_verify_nonce($_POST[$nonce_field_name], 'updating_events_meta_fields')) {
		$event_date = $_POST['event-date'];
		$meta_values_to_handle = array(
			'event_recurring' => $_POST['event-date-recurring'],
			'event_location' => $_POST['event-location'],
		);

		update_post_meta($post_ID, 'event_date', $event_date);

		foreach ($meta_values_to_handle as $meta_key => $meta_value) {
			if ($meta_value && $meta_value != '') {
				update_post_meta($post_ID, $meta_key, $meta_value);
			} else {
				delete_post_meta($post_ID, $meta_key);
			}
		}
	}
});