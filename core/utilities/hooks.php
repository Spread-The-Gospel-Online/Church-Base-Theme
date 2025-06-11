<?php

add_filter('church_get_site_title', function ($title) {

	if (is_single()) {
		$post_title = get_the_title();
		$title = $post_title . ' | ' . $title;
	} else if (is_archive()) {
		$archive_type = get_queried_object()->name;
		$title = 'All ' . ucwords($archive_type) . ' | ' . $title;
	} else if (is_search()) {
		$title = 'Search Results for "' . get_search_query() . '" | ' . $title;
	}

	return $title;
});