<?php

add_action( 'init', function () {
	if (church_missing_type_support('sermons')) {
		return;
	}

	register_post_type( 'sermons',
		// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Sermons' ),
				'singular_name' => __( 'Sermon' )
			),
			'public' => true,
			'has_archive' => true,
			'show_in_rest' => true,
			'menu_icon' => 'dashicons-media-audio',
			'supports' => ['title', 'editor', 'custom-fields', 'thumbnail', 'excerpt'],
			'auth_callback' => function() {
				return current_user_can('edit_posts');
			}
		)
	);
});
