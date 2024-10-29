<?php

// TODO: Should render date based on theme settings
function util_render_date ($date) {
	return date('F j, Y', strtotime($date));
}

function util_get_hero_src ($post) {
	$post_id = $post->ID;
	$image_id = get_post_thumbnail_id($post);
	$image_src = $image_id ? wp_get_attachment_image_src($image_id, 'full', false)[0] : false;

	// if the post has no image, use archive page image
	if ($image_src == false) {
		$archive_page = get_page_by_path($post->post_type);
		if ($archive_page) {
			$image_id = get_post_thumbnail_id($archive_page);
			$image_src = $image_id ? wp_get_attachment_image_src($image_id, 'full', false)[0] : false;
		}
	}

	// if there's no archive image, use homepage image
	if ($image_src == false) {
		$frontpage_id = get_option('page_on_front');
		$frontpage = get_post($frontpage_id);
		$image_id = get_post_thumbnail_id($frontpage);
		$image_src = $image_id ? wp_get_attachment_image_src($image_id, 'full', false)[0] : false;
	}

	return array(
		'src' => $image_src,
		'alt' => $image_id ? get_post_meta($image_id, '_wp_attachment_image_alt', true) : false
	);
}