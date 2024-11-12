<?php

church_util_register_gutenberg_server_callback('/getServerContentsLatestSermons', array('numberSermons', 'numberOfColumns'), 'church_display_recent_sermons');

// register the block
add_action('init', function () {
	wp_enqueue_script(
		'recent-sermons-editor-script',
		get_template_directory_uri() . '/gutenberg-plugins/recent-sermons/recent-sermons-editor-script.js',
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-components'),
		null,
		true
	);

	register_block_type('church/block-recent-sermons', array(
		'render_callback' => 'church_display_recent_sermons',
		"title" => "Latest Sermons",
		"category" => "theme",
		"icon" => "universal-access-alt",
	));
});


function church_display_recent_sermons ($attributes, $content) {
	$number_sermons = 2;
	$columns = get_option('church_archive_sermon_grid_size');

	if (array_key_exists('numberOfSermons', $attributes)) {
		$number_sermons = $attributes['numberOfSermons'];
	}

	if (array_key_exists('numberOfColumns', $attributes)) {
		$columns = $attributes['numberOfColumns'];
	}

	$sermons = get_posts(array(
		'post_type' => 'sermons',
		'numberposts' => $number_sermons
	));
	
	return util_render_snippet('sermons/latest-sermons', array(
		'sermons' => $sermons,
		'columns' => $columns,
		'classes' => array_key_exists('className', $attributes) ? $attributes['className'] : ''
	));
}
