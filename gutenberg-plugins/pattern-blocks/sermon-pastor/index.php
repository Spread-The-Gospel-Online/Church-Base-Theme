<?php

add_action('init', function () {
	church_registern_pattern_block_type(array(
		'script_name' => 'sermon-pastor-editor-script',
		'script_url' => get_template_directory_uri() . '/gutenberg-plugins/pattern-blocks/sermon-pastor/sermon-pastor.js',
		'block_name' => 'church/block-sermon-pastor',
		'block_snippet' => 'sermons/card-options/pastor',
		'block_title' => 'Sermon Pastor'
	));
});
