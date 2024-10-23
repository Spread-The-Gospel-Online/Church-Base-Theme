<?php

$archive_type = get_queried_object()->name;
$archive_page = get_page_by_path($archive_type);

$steps = array(
	array('type' => $archive_type, 'slug' => false)
);

if ($archive_page) {
	$page_id = $archive_page->ID;
	$image_id = get_post_thumbnail_id($archive_page);
	util_render_snippet('common/hero', array(
		'desktop_src' => wp_get_attachment_image_src($image_id, 'full', false)[0],
		'img_height' => '400px',
		'image_alt' => get_post_meta($image_id, '_wp_attachment_image_alt', true),
		'caption' => $archive_page->post_title,
		'steps' => $steps,
		'opacity' => get_post_meta($page_id, 'hero_opacity', true),
		'background' => get_post_meta($page_id, 'hero_background', true),
		'text_color' => get_post_meta($page_id, 'hero_text', true),
	), false);
}
