<?php

$archive_type = get_queried_object()->name;
$archive_pages = get_posts(array(
	'post_type' => 'page',
	'name' => $archive_type,
	'numberposts' => 1
));
$archive_page = count($archive_pages) > 0 ? $archive_pages[0] : false;
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
		'hero_height' => get_post_meta($page_id, 'hero_height', true),
	), false);
}
