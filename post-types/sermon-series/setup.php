<?php

add_action( 'init', function () {
	register_post_type( 'sermon-series',
		array(
			'labels' => array(
				'name' => __( 'Sermon Series' ),
				'singular_name' => __( 'Sermon Series' )
			),
			'public' => true,
			'has_archive' => true,
			'show_in_rest' => true,
			'menu_icon' => 'dashicons-playlist-audio',
			'supports' => ['title', 'editor', 'custom-fields', 'thumbnail'],
			'auth_callback' => function() {
				return current_user_can('edit_posts');
			}
		)
	);
});
