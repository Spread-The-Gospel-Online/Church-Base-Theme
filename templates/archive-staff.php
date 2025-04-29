<?php

get_header();

util_render_snippet('common/archive-hero', array(), false);

do_action('church_layout_after_header');

$archive_type = get_queried_object()->name;
$archive_page = get_page_by_path($archive_type);

if ($archive_page) {
	echo util_get_actual_content($archive_page->post_content);
} else {
	$staff_ids = get_posts(array(
		'post_type' => 'staff',
		'posts_per_page' => -1,
		'fields' => 'ids'
	));

	util_render_snippet('staff/staff-members-list', array(
		'staff_ids' => implode(',', $staff_ids),
		'view' => 'expanded',
		'classes' => 'ccontain',
		'columns' => 2,
		'image_layout' => 'horizontal',
		'image_width' => 140,
	), false);
}


get_footer();