<?php

function util_church_get_sermons_for_staff ($staff_id) {
	$staff_page = get_query_var('sermons') ? get_query_var('sermons') : 1;
	$page_size = get_option('posts_per_page', 10);
	return get_posts(array(
		'meta_query' => array(
			array(
				'key' => 'sermon_pastor',
				'value' => $staff_id,
				'compare' => '=='
			)
		),
		'post_type' => 'sermons',
		'posts_per_page' => $page_size,
		'offset' => $page_size * ($staff_page - 1)
	));
}

function util_church_get_staff_sermon_pagination ($staff) {
	$page_size = get_option('posts_per_page', 10);
	$sermons = get_posts(array(
		'meta_query' => array(
			array(
				'key' => 'sermon_pastor',
				'value' => $staff->ID,
				'compare' => '=='
			)
		),
		'post_type' => 'sermons',
		'posts_per_page' => -1
	));

	return array(
		'base' => get_site_url() . '/staff/' . $staff->post_name . '/sermons/%#%',
		'current' => get_query_var('sermons') ? get_query_var('sermons') : 1,
		'total' => ceil(count($sermons) / $page_size),
	);
}