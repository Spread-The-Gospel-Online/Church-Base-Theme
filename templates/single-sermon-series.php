<?php 

get_header(); 

while (have_posts()) { 
	the_post();
	
	$post = get_post();
	$post_id = $post->ID;
	$series_content = util_get_actual_content($post->post_content);

	$sermon_page = get_query_var('sermon-page') ? get_query_var('sermon-page') : 1;
	$per_page = 12;
	$sermons = get_posts(array(
		'numberposts' => $per_page,
		'offset' => $sermon_page * $per_page - $per_page,
		'post_type' => 'sermons',
		'meta_key' => 'sermon_series',
		'meta_value' => $post_id
	));

	$breadcrumb_steps = array(
		array('type' => 'sermon-series', 'slug' => false),
		array('type' => 'sermon-series', 'slug' => $post->post_name)
	);
	
	add_filter('breadcrumbs_steps', function ($steps) use ($breadcrumb_steps) {
		return $breadcrumb_steps;
	});

	util_render_snippet('common/single-page-hero-snippet', array(
		'post' => $post
	), false);

	do_action('breadcrumbs_below');

	util_render_snippet('series/series-sermon-listings', array(
		'sermons' => $sermons
	), false);
}

get_footer();
