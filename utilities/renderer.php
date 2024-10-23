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