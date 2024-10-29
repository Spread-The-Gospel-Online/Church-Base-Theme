<?php

$archive_type = get_queried_object()->name;
$archive_page = get_page_by_path($archive_type);
$image = util_get_hero_src($archive_page);

$steps = array(
	array('type' => $archive_type, 'slug' => false)
);

if ($archive_page) {
	$page_id = $archive_page->ID;
	util_render_snippet('common/hero', array(
		'desktop_src' => $image['src'],
		'img_height' => '400px',
		'image_alt' => $image['alt'],
		'caption' => $archive_page->post_title,
		'steps' => $steps,
		'opacity' => get_post_meta($page_id, 'hero_opacity', true),
		'background' => get_post_meta($page_id, 'hero_background', true),
		'text_color' => get_post_meta($page_id, 'hero_text', true),
	), false);
}
