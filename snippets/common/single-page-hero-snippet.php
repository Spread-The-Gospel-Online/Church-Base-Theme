<?php
// Hero for a single post. Expects $post; optional $steps overrides the breadcrumb steps
// (pass false to let the 'breadcrumbs_steps' filter decide).
$post_id = $post->ID;
$post_type = $post->post_type;
$image = util_get_hero_src($post);

if (!isset($steps)) {
	$steps = array(
		array('type' => $post_type, 'slug' => false),
		array('type' => $post_type, 'slug' => $post->post_name),
	);
}

util_render_snippet('common/hero', array(
	'desktop_src' => $image['src'],
	'image_id' => $image['id'],
	'image_alt' => $image['alt'],
	'caption_classes' => '',
	'caption' => get_the_title($post),
	'steps' => $steps,
	'opacity' => get_post_meta($post_id, 'hero_opacity', true),
	'background' => get_post_meta($post_id, 'hero_background', true),
	'text_color' => get_post_meta($post_id, 'hero_text', true),
	'hero_height' => get_post_meta($post_id, 'hero_height', true),
), false);
