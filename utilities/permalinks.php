<?php

function church_get_archive_url ($type, $prefix = '/') {
	return $prefix . $type . '/';
}

function church_get_single_url ($type, $slug, $prefix = '/') {
	return $prefix . $type . '/' . $slug;
}

// TODO: figure out what i was drinking when i wrote this b/c wow it must have been really good.
function church_get_general_url ($type, $slug = false, $prefix_type = false, $prefix_slug = false) {
	$prefix = $prefix_type ? sprintf('/$s/$s/', $prefix_type, $prefix_slug) : '/';
	$post = get_posts(array('name' => $slug, 'post_type' => $type));
	return array(
		'url' => $slug ? church_get_single_url($type, $slug, $prefix) : church_get_archive_url($type, $prefix),
		'text' => $slug && $post ? $post[0]->post_title : 'All ' . ucwords(str_replace('-', ' ', $type))
	);
}