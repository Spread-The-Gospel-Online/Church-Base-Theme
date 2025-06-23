<?php 

get_header(); 

while (have_posts()) { 
	the_post();
	
	$post = get_post();
	$post_id = $post->ID;
	$series_content = util_get_actual_content($post->post_content);
	$image_id = get_post_thumbnail_id();

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

	util_render_snippet('common/hero', array(
		'desktop_src' => wp_get_attachment_image_src($image_id, 'full', false)[0],
		'image_alt' => get_post_meta($image_id, '_wp_attachment_image_alt', true),
		'caption_classes' => '',
		'caption' => get_the_title(),
		'opacity' => get_post_meta($post_id, 'hero_opacity', true),
		'background' => get_post_meta($post_id, 'hero_background', true),
		'text_color' => get_post_meta($post_id, 'hero_text', true),
		'hero_height' => get_post_meta($post_id, 'hero_height', true),
	), false);

	do_action('breadcrumbs_below');

	util_render_snippet('series/series-sermon-listings', array(
		'sermons' => $sermons
	), false);
}

get_footer();
