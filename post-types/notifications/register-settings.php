<?php

// Meta box for the notification's schedule + type. Rendered inline to keep the whole
// post type self-contained in this directory.
add_action('add_meta_boxes_notifications', function ($post) {
	add_meta_box(
		'notification_details',
		__('Notification Details'),
		function ($post) {
			$start = get_post_meta($post->ID, 'notification_start_date', true);
			$end   = get_post_meta($post->ID, 'notification_end_date', true);
			$type  = get_post_meta($post->ID, 'notification_type', true) ?: 'info';

			$types = array(
				'info'      => 'Info',
				'notice'    => 'Notice',
				'emergency' => 'Emergency',
			);

			wp_nonce_field('updating_notifications_meta_fields', 'notifications_meta_nonce');
			?>
			<p><b>Start Date</b></p>
			<div>
				<input type="date" name="notification-start-date" id="notification-start-date" value="<?= esc_attr($start) ?>" style="width: 100%;" />
			</div>
			<p style="margin-top: 1.5rem;"><b>End Date</b></p>
			<div>
				<input type="date" name="notification-end-date" id="notification-end-date" value="<?= esc_attr($end) ?>" style="width: 100%;" />
			</div>
			<p style="margin-top: 1.5rem;"><b>Type</b></p>
			<div>
				<select name="notification-type" id="notification-type" style="width: 100%;">
					<?php foreach ($types as $value => $label) { ?>
						<option value="<?= esc_attr($value) ?>" <?= selected($type, $value, false) ?>><?= esc_html($label) ?></option>
					<?php } ?>
				</select>
			</div>
			<p style="margin-top: 1rem; color: #666;">
				The cron publishes a notification once its start date passes and deletes it once its end date passes.
				A notification with no start or end date is skipped.
			</p>
			<?php
		},
		$post->post_type,
		'side',
		'default'
	);
});

add_action('save_post_notifications', function ($post_ID) {
	if (!current_user_can('edit_post', $post_ID)) {
		return;
	}

	$nonce_field_name = 'notifications_meta_nonce';

	if (array_key_exists($nonce_field_name, $_POST)
		&& wp_verify_nonce($_POST[$nonce_field_name], 'updating_notifications_meta_fields')) {

		$type = isset($_POST['notification-type']) ? sanitize_text_field($_POST['notification-type']) : 'info';
		update_post_meta($post_ID, 'notification_type', $type);

		// Dates are optional: store when set, delete when empty so the cron's EXISTS
		// query naturally skips date-less notifications.
		$dates = array(
			'notification_start_date' => isset($_POST['notification-start-date']) ? sanitize_text_field($_POST['notification-start-date']) : '',
			'notification_end_date'   => isset($_POST['notification-end-date']) ? sanitize_text_field($_POST['notification-end-date']) : '',
		);

		foreach ($dates as $meta_key => $meta_value) {
			if ($meta_value && $meta_value != '') {
				update_post_meta($post_ID, $meta_key, $meta_value);
			} else {
				delete_post_meta($post_ID, $meta_key);
			}
		}
	}
});
