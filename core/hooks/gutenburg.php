<?php

// add_filter('render_block_core/accordion-item', function ($block_content, $block) {
	// $attributes = isset($block['attrs']) ? $block['attrs'] : array();
	// $title = isset($attributes['title']) ? $attributes['title'] : '';
	// $classes = isset($attributes['className']) ? $attributes['className'] : '';

    // error_log(print_r($block,true));

    // // pass any other block attributes through to the snippet
	// $extra_attributes = $attributes;
	// unset($extra_attributes['title'], $extra_attributes['className']);

	// return util_render_snippet('blocks/accordion', array(
	// 	'title'      => $title,
	// 	'content'    => $block_content,
	// 	'classes'    => $classes,
	// 	'attributes' => $extra_attributes,
	// ), true);
// }, 10, 2);

add_filter('render_block_core/accordion-heading', function ($block_content, $block) {
	$attributes = isset($block['attrs']) ? $block['attrs'] : array();
	$classes = isset($attributes['className']) ? $attributes['className'] : '';

	// pass any other block attributes through to the snippet
	$extra_attributes = $attributes;
	unset($extra_attributes['className']);

	return util_render_snippet('blocks/accordion-title', array(
		'content'    => $block_content,
		'classes'    => $classes,
		'attributes' => $extra_attributes,
	), true);
}, 10, 2);
