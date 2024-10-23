<?php

add_action( 'init', function () {
	register_post_type( 'ministries',
		array(
			'labels' => array(
				'name' => __( 'Ministries' ),
				'singular_name' => __( 'Ministry' )
			),
			'public' => true,
			'has_archive' => true,
			'show_in_rest' => true,
			'menu_icon' => 'dashicons-groups',
			'supports' => ['title', 'editor', 'custom-fields', 'thumbnail'],
			'auth_callback' => function() {
				return current_user_can('edit_posts');
			}
		)
	);
});
