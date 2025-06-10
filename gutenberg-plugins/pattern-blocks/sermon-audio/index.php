<?php

add_action('init', function () {
	church_registern_pattern_block_type(array(
		'script_name' => 'sermon-audio',
		'script_url' => get_template_directory_uri() . '/gutenberg-plugins/pattern-blocks/sermon-audio/sermon-audio.js',
		'block_name' => 'church/sermon-audio',
		'block_snippet' => 'sermons/card-options/audio',
		'block_title' => 'Sermon Audio'
	));
});