<?php

// TODO: Should render date based on theme settings
function util_render_date ($date) {
	return date('F j, Y', strtotime($date));
}

// Centering the logo forces the menu to the left, so the saved menu alignment only applies to a left logo.
function church_get_header_layout () {
	// get_option's default only applies when the option is missing, not when it's empty.
	$logo_position = get_option('church_header_logo_position');
	if (!$logo_position) {
		$logo_position = 'left';
	}

	$menu_alignment = get_option('church_header_menu_alignment', 'middle');
	if ($logo_position === 'center') {
		$menu_alignment = 'left';
	}

	return array(
		'logo_position' => $logo_position,
		'menu_alignment' => $menu_alignment
	);
}

function util_get_hero_src ($post) {
	$post_id = $post->ID;
	$image_id = get_post_thumbnail_id($post);
	$image_src = $image_id ? wp_get_attachment_image_src($image_id, 'full', false)[0] : false;

	// Sermons fall back to the configured default image only when they have no cover of their own.
	if ($post->post_type === 'sermons' && !$image_id) {
		$image_src = get_option('church_sermon_default_image');
	}

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

	// for pages, check for parent image
	if ($image_src == false && $post->post_type === 'page') {
		$parent_page = $post->post_parent;
		if ($parent_page) {
			$image_id = get_post_thumbnail_id($parent_page);
			$image_src = $image_id ? wp_get_attachment_image_src($image_id, 'full', false)[0] : false;
		}
	}

	return array(
		'src' => $image_src,
		'id' => $image_src ? $image_id : false,
		'alt' => $image_id ? get_post_meta($image_id, '_wp_attachment_image_alt', true) : $post->post_title
	);
}
