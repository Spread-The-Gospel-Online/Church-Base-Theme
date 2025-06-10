<?php

add_action('init', function () {
	church_registern_pattern_block_type(array(
		'script_name' => 'series-link-editor-script',
		'script_url' => get_template_directory_uri() . '/gutenberg-plugins/pattern-blocks/series-link/series-link.js',
		'block_name' => 'church/block-series-link',
		'block_snippet' => 'series/series-link',
		'block_title' => 'Sermon Series Link'
	));
});
