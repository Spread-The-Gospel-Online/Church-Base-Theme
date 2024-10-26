<?php

add_action( 'admin_menu' , function () {
	add_submenu_page(
		'edit.php?post_type=sermons',
		'Sermon Settings',
		'Sermon Settings',
		'administrator',
		'sermon-settings-page',
		array('BRG_Sermon_Admin_Page', 'setup_sermon_settings_page')
	);
});

// Register 
add_action( 'admin_init', function () {
	register_setting( 'brg-sermons', 'sermon_feed' );
	BRG_Sermon_Admin_Page::check_sermon_admin_form();
});

add_action( 'add_meta_boxes_sermons', function ( $post ) {
	add_meta_box(
		'related_pastor',
		__('Pastor'),
		function ( $post ) {
			include get_template_directory() . '/admin-panel/sermons/templates/sermon-pastor-meta-box.php';
		},
		$post->post_type,
		'side',
		'default'
	);

	add_meta_box(
		'related_series',
		__('Related Sermon Series'),
		function ( $post ) {
			include get_template_directory() . '/admin-panel/sermons/templates/sermon-series-meta-box.php';
		},
		$post->post_type,
		'side',
		'default'
	);
});

add_action( 'save_post_sermons', function ( $post_ID ) {
	if (!current_user_can( 'edit_post', $post_ID )) { return; }

	$nonce_field_name = 'sermons_meta_nonce';
	$series_nonce_field_name = 'series_meta_nonce';

	if (array_key_exists($nonce_field_name, $_POST)
		&& wp_verify_nonce($_POST[$nonce_field_name], 'updating_sermons_meta_fields')) {
		$pastor_ID = $_POST['pastor_id'];
		update_post_meta($post_ID, 'sermon_pastor', $pastor_ID);	
	}

	if (array_key_exists($series_nonce_field_name, $_POST)
		&& wp_verify_nonce($_POST[$series_nonce_field_name], 'updating_series_meta_fields')) {
		$series_ID = $_POST['series_id'];
		update_post_meta($post_ID, 'sermon_series', $series_ID);	
	}	
});