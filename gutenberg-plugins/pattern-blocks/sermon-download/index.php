<?php

add_action('init', function () {
	church_registern_pattern_block_type(array(
		'script_name' => 'sermon-download-editor-script',
		'script_url' => get_template_directory_uri() . '/gutenberg-plugins/pattern-blocks/sermon-download/sermon-download.js',
		'block_name' => 'church/block-sermon-download',
		'block_snippet' => 'sermons/card-options/download',
		'block_title' => 'Sermon Download'
	));
});
