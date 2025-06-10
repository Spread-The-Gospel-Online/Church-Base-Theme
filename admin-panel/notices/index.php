<?php

function church_get_missing_archive_pages () {
	$types_to_check = array('events', 'sermons', 'sermon-series', 'staff');
	return array_filter($types_to_check, function ($type) {
		$page = get_page_by_path($type);
		return !$page;
	});
}

add_action('admin_notices', function () {
	$missing_pages = church_get_missing_archive_pages();

	foreach ($missing_pages as $missing_page) {
		util_render_snippet('admin/missing-page-notice', array(
			'missing_post_type' => $missing_page
		), false);
	}
});

add_action('admin_action_wp_church_add_page', function () {
	$type = $_POST['page-to-add'];
	
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
});