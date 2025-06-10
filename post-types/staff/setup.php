<?php

add_action( 'init', function () {
	if (church_missing_type_support('staff')) {
		return;
	}

	register_post_type( 'staff',
		array(
			'labels' => array(
				'name' => __( 'Staff' ),
				'singular_name' => __( 'Staff' )
			),
			'public' => true,
			'has_archive' => true,
			'show_in_rest' => true,
			'menu_icon' => 'dashicons-businessperson',
			'supports' => ['title', 'editor', 'custom-fields', 'thumbnail', 'excerpt'],
			'auth_callback' => function() {
				return current_user_can('edit_posts');
			}
		)
	);
});
