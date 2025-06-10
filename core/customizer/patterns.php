<?php

function church_get_all_patterns_for_customizer () {
	$all_patterns = get_posts(array(
		'numberposts' => -1,
		'post_type' => 'wp_block'
	));

	$to_return = array(
		'false' => 'No Pattern'
	);
	foreach ($all_patterns as $pattern) {
		$to_return[$pattern->post_name] = $pattern->post_title;
	}

	return $to_return;
}


function church_registern_pattern_block_type ($block_settings) {
	// register the block
	wp_enqueue_script(
		$block_settings['script_name'],
		$block_settings['script_url'],
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-components'),
		null,
		true
	);

	register_block_type($block_settings['block_name'], array(
		'render_callback' => function ($attributes, $content) use ($block_settings) {
			return util_render_snippet($block_settings['block_snippet'], array(
				'classes' => array_key_exists('className', $attributes) ? $attributes['className'] : ''
			));
		},
		'title' => $block_settings['block_title'],
		'category' => 'theme',
		'icon' => 'universal-access-alt',
	));
	
}