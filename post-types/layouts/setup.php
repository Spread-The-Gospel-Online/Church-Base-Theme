<?php

add_action( 'init', function () {
	register_post_type( 'layouts',
		array(
			'labels' => array(
				'name' => __( 'Layouts' ),
				'singular_name' => __( 'Layout' )
			),
			'public' => false,
			'has_archive' => false,
			'show_in_rest' => true,
			'show_ui' => true,
			'menu_icon' => 'dashicons-welcome-widgets-menus',
			'supports' => ['title', 'editor', 'custom-fields'],
			'auth_callback' => function() {
				return current_user_can('edit_posts');
			}
		)
	);

	register_post_meta('layouts', 'page_section', [
		'type' => 'string',
		'single' => true,
		'show_in_rest' => true
	]);

	register_post_meta('layouts', 'page_section_priority', [
		'type' => 'integer',
		'single' => true,
		'show_in_rest' => true
	]);
});


add_action( 'add_meta_boxes_layouts', function ( $post ) {
	add_meta_box(
		'template_types',
		__('Template Types'),
		function ( $post ) {
			include WP_PLUGIN_DIR . '/church/admin-panel/layouts/templates/layout-template-types.php';
		},
		$post->post_type,
		'side',
		'default'
	);

	add_meta_box(
		'post_types',
		__('Post Types'),
		function ( $post ) {
			include WP_PLUGIN_DIR . '/church/admin-panel/layouts/templates/layout-post-types.php';
		},
		$post->post_type,
		'side',
		'default'
	);
});

add_action( 'save_post_layouts', function ( $post_ID ) {
	if (!current_user_can( 'edit_post', $post_ID )) { return; }

	$layout_templates_nonce_field_name = 'layout_templates_meta_nonce';
	$layout_types_nonce_field_name = 'layout_types_meta_nonce';

	if (array_key_exists($layout_templates_nonce_field_name, $_POST)
		&& wp_verify_nonce($_POST[$layout_templates_nonce_field_name], 'updating_layout_templates_meta_fields')) {
		update_post_meta($post_ID, 'layout_templates', implode(',', $_POST['layout-template']));
	}

	if (array_key_exists($layout_types_nonce_field_name, $_POST)
		&& wp_verify_nonce($_POST[$layout_types_nonce_field_name], 'updating_layout_types_meta_fields')) {
		update_post_meta($post_ID, 'layout_types', implode(',', $_POST['layout-types']));
	}	
});