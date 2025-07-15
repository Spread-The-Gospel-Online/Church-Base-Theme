<?php

function church_get_archive_url ($type, $prefix = '/') {
	return $prefix . $type . '/';
}

function church_get_single_url ($type, $slug, $prefix = '/') {
	if ($type == 'page') { 
		return $prefix . $slug;	
	}
	return $prefix . $type . '/' . $slug;
}

function church_get_general_url ($type, $slug = false, $prefix_type = false, $prefix_slug = false) {
	$prefix = $prefix_type ? sprintf('/$s/$s/', $prefix_type, $prefix_slug) : '/';
	$post = get_posts(array('name' => $slug, 'post_type' => $type));
	if ($post) {
		$text = $post[0]->post_title;
	} else if ($type == 'search') {
		$text = 'Search Results';
	} else {
		$text = 'All ' . ucwords(str_replace('-', ' ', $type));
	}

	return array(
		'url' => $slug ? church_get_single_url($type, $slug, $prefix) : church_get_archive_url($type, $prefix),
		'text' => $text
	);
}