<?php

function church_get_missing_archive_pages () {
	$theme_types = array_filter(array('events', 'sermons', 'sermon-series', 'staff'), function ($type) {
		return !church_missing_type_support($type);
	});

	// Types added through this filter (e.g. by plugins) aren't gated by church_enabled_post_types.
	$types_to_check = array_unique((array) apply_filters('church_archive_page_types', array_values($theme_types)));

	return array_filter($types_to_check, function ($type) {
		$archive_type = $type;
		$archive_pages = get_posts(array(
			'post_type' => 'page',
			'name' => $archive_type,
			'numberposts' => 1
		));
		$page = count($archive_pages) > 0 ? $archive_pages[0] : false;
		return !$page;
	});
}

add_action('admin_notices', function () {
	if (church_is_missing_404_page()) {
		util_render_snippet('admin/missing-404-notice', array(), false);
	}

	$missing_pages = church_get_missing_archive_pages();

	foreach ($missing_pages as $missing_page) {
		util_render_snippet('admin/missing-page-notice', array(
			'missing_post_type' => $missing_page
		), false);
	}
});

function church_is_missing_404_page () {
	$pages = get_posts(array(
		'post_type' => 'page',
		'name' => '404-page',
		'numberposts' => 1,
		'post_status' => 'any'
	));
	return count($pages) === 0;
}

add_action('admin_action_wp_church_add_page', function () {
	if (!current_user_can('publish_pages')) {
		wp_die('You do not have permission to add pages.');
	}
	check_admin_referer('wp_church_add_page');

	$type = isset($_POST['page-to-add']) ? sanitize_key(wp_unslash($_POST['page-to-add'])) : '';
	if (!in_array($type, church_get_missing_archive_pages(), true)) {
		wp_die('That archive page is not missing or not supported.');
	}

	$page_id = wp_insert_post(
		array(
			'post_type' => 'page',
			'post_status' => 'publish',
			'post_name' => $type,
			'post_title' => ucfirst(str_replace('-', ' ', $type)),
			'post_author' => 1
		)
	);

	wp_redirect('post.php?post=' . $page_id . '&action=edit');
	exit;
});