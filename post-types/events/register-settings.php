<?php

// Add metaboxes for events
add_action('add_meta_boxes_events', function ($post) {
	add_meta_box(
		'event_dates',
		__('Event Date'),
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
		$event_recurring = $_POST['event-date-recurring'];
		
		update_post_meta($post_ID, 'event_date', $event_date);

		// if it is recurring, update meta else delete completely
		if ($event_recurring && $event_recurring != '') {
			update_post_meta($post_ID, 'event_recurring', $event_recurring);
		} else {
			delete_post_meta($post_ID, 'event_recurring');
		}
	}
});