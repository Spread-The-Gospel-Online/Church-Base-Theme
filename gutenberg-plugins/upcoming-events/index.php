<?php

require_once(__DIR__ . '/upcoming-events-server-render.php');

// register the block
add_action('init', function () {
	wp_enqueue_script(
		'upcoming-events-editor-script',
		get_template_directory_uri() . '/gutenberg-plugins/upcoming-events/upcoming-events-editor-script.js',
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-components'),
		null,
		true
	);

	register_block_type('church/block-upcoming-events', array(
		'render_callback' => 'church_display_upcoming_events',
		'title' => 'Upcoming Events',
		'category' => 'theme',
		'icon' => 'universal-access-alt',
	));
});


function church_display_upcoming_events ($attributes, $content) {
	$number_events = 2;
	$number_columns = 2;

	if (array_key_exists('numberOfEvents', $attributes)) {
		$number_events = $attributes['numberOfEvents'];
	}

	if (array_key_exists('numberOfColumns', $attributes)) {
		$number_columns = $attributes['numberOfColumns'];
	}
	
	$events = church_util_get_upcoming_events($number_events);
	return util_render_snippet('events/upcoming-events', array(
		'events' => $events,
		'columns' => $number_columns,
		'classes' => array_key_exists('className', $attributes) ? $attributes['className'] : ''
	));
}
