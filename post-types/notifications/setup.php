<?php

// Notifications are an internal, admin-only post type (no archive, no single page) —
// always registered, like `layouts`, since the feature is core to the theme.
add_action('init', function () {
	register_post_type('notifications',
		array(
			'labels' => array(
				'name' => __('Notifications'),
				'singular_name' => __('Notification')
			),
			'public' => false,        // no frontend single/archive
			'has_archive' => false,
			'show_ui' => true,        // editable in wp-admin
			'show_in_rest' => true,   // block editor
			'menu_icon' => 'dashicons-bell',
			'supports' => array('title', 'editor'),
			'auth_callback' => function () {
				return current_user_can('edit_posts');
			}
		)
	);
});
