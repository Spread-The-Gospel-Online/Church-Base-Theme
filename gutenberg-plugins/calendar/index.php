<?php

require_once(__DIR__ . '/calendar-server-render.php');

// register the block
add_action('init', function () {
	wp_enqueue_script(
		'calendar-editor-script',
		get_template_directory_uri() . '/gutenberg-plugins/calendar/calendar-editor-script.js',
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-components'),
		null,
		true
	);

	register_block_type('church/block-calendar', array(
		'render_callback' => 'church_display_calendar',
		"title" => "Church Calendar",
		"category" => "theme",
		"icon" => "universal-access-alt",
	));
});


function church_display_calendar ($attributes, $content) {
	return util_render_snippet('events/calendar', $attributes);
}
