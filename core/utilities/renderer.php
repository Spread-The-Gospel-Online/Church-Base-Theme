<?php

function util_render_snippet ($snippet, $variables = array(), $return_contents = true) {
	$include_path = get_template_directory() . '/snippets/' . $snippet . '.php';
	extract($variables);

	ob_start();
	include $include_path;
	$contents = ob_get_clean();
	$contents = preg_replace('/\s+/', ' ', $contents);

	if ($return_contents) {
		return $contents;
	} else {
		echo $contents;
	}
}

// Because WP is super giga lazy and doesn't actually parse dynamic blocks themselves I guess
// when not using 'the_content()'
// (absolute passengers)
function util_get_actual_content ($post_contents) {
	$blocks = parse_blocks($post_contents);
	$contents = '';
  	foreach($blocks as $block) {
      $contents .= render_block($block);
    }
    return apply_filters('the_content', $contents);
}

// Get the object of a pattern used for a specific option
// if there is no pattern tied to the setting return false
function util_get_pattern_object ($pattern_option_name) {
	$pattern = false;
	$pattern_slug = get_option($pattern_option_name);
	
	if ($pattern_slug != 'false') {
		$pattern = get_page_by_path($pattern_slug, OBJECT, 'wp_block');
	}

	return $pattern;
}

// Gets the wrapper classes for a PHP rendered Gutenberg block
function util_get_block_wrapper_classes ($block_container, $block_bottom_margin, $block_bottom_margin_desktop, $block_padding) {
	$container_class = 'full-width';
	if ($block_container) {
		$container_class = 'ccontain';
	}
	
	$wrapper_classes = sprintf('%s block-padding-%s mb-%s lg:mb-%s', $container_class, $block_padding, $block_bottom_margin, $block_bottom_margin_desktop);
    
    return $wrapper_classes;
}