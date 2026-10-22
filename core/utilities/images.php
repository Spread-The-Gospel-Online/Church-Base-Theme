<?php

function util_get_image_dimensions ($url) {
	if (!$url) {
		return false;
	}

	$uploads = wp_get_upload_dir();
	$path = str_replace($uploads['baseurl'], $uploads['basedir'], $url);

	if (!file_exists($path)) {
		return false;
	}

	$size = getimagesize($path);
	if (!$size || empty($size[0]) || empty($size[1])) {
		return false;
	}

	return array(
		'width'  => $size[0],
		'height' => $size[1],
	);
}

function util_get_logo_link_min_width () {
	$logo_src = get_option('church_header_logo');
	$logo_height = (int) get_option('church_logo_default_size', 115);
	$dimensions = util_get_image_dimensions($logo_src);

	if (!$dimensions || $dimensions['height'] <= 0) {
		return 0;
	}

	return round($dimensions['width'] * ($logo_height / $dimensions['height']));
}

// Thumbnail URL used as the blurred placeholder, or false when blur loading
// is off or there's no attachment (e.g. a default image stored as a URL).
// Pass $is_blur_enabled to override the theme setting (e.g. a per-block toggle).
function util_get_blur_image_src ($attachment_id, $is_blur_enabled = null) {
	if ($is_blur_enabled === null) {
		$is_blur_enabled = get_option('church_blur_images_loading') === 'yes';
	}
	if (!$attachment_id || !$is_blur_enabled) {
		return false;
	}

	$blur_src = wp_get_attachment_image_url($attachment_id, 'thumbnail');
	if ($blur_src) {
		util_has_blur_images(true);
	}
	return $blur_src;
}

// Whether this request rendered any blur-loaded image; pass true to record one.
function util_has_blur_images ($has_blur_image = false) {
	static $page_has_blur_images = false;
	if ($has_blur_image) {
		$page_has_blur_images = true;
	}
	return $page_has_blur_images;
}