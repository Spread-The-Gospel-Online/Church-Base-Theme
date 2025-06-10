<?php

add_action('init', function () {
	if (church_missing_type_support('events')) {
		return;
	}

	register_post_type('events',
		array(
			'labels' => array(
				'name' => __('Events'),
				'singular_name' => __('Event')
			),
			'public' => true,
			'has_archive' => true,
			'show_in_rest' => true,
			'menu_icon' => 'dashicons-calendar',
			'supports' => ['title', 'editor', 'custom-fields', 'thumbnail'],
			'auth_callback' => function() {
				return current_user_can('edit_posts');
			}
		)
	);
});
