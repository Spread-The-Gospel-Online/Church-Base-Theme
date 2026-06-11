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