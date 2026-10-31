<?php

church_util_register_gutenberg_server_callback('/getServerContentsStaff', array(
	'staffIDs', 'numberOfColumns', 'staffPattern'
), 'church_display_staff_members');

// register the block
add_action('init', function () {
	register_block_type('church/block-staff-members', array(
		'render_callback' => 'church_display_staff_members',
		"title" => "Staff Members",
		"category" => "theme",
		"icon" => "universal-access-alt",
	));
});

// Editor only, and only the fields the picker needs: this used to print every staff post
// object into every front-end page.
add_action('enqueue_block_editor_assets', function () {
	wp_enqueue_script(
		'staff-members-editor-script',
		get_template_directory_uri() . '/gutenberg-plugins/staff-members/staff-members-editor-script.js',
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-components'),
		null,
		true
	);

	$staff_members = array_map(function ($staff_post) {
		return array(
			'ID' => $staff_post->ID,
			'post_title' => $staff_post->post_title
		);
	}, get_posts(array(
		'numberposts' => -1,
		'post_type' => 'staff'
	)));

	wp_localize_script('staff-members-editor-script', 'staffData', array(
		'staff' => $staff_members,
		'patterns' => church_get_all_patterns_for_customizer()
	));
});


function church_display_staff_members ($attributes, $content) {
	return util_render_snippet('staff/staff-members-list', array(
		'staff_ids' => array_key_exists('staffIDs', $attributes) ? $attributes['staffIDs'] : '',
		'columns' => array_key_exists('numberOfColumns', $attributes) ? $attributes['numberOfColumns'] : 2,
		'classes' => array_key_exists('className', $attributes) ? $attributes['className'] : '',
		'staff_pattern' => $attributes['staffPattern'],
		'block_container' => $attributes['blockContainer'],
		'block_bottom_margin' => $attributes['blockBottomMargin'],
		'block_bottom_margin_desktop' => $attributes['blockBottomMarginDesktop'],
		'block_padding' => $attributes['blockPadding']
	));
}
