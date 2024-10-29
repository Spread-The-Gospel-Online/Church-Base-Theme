<?php 

get_header(); 

while (have_posts()) { 
	the_post();

	$post = get_post();
	$post_id = $post->ID;
	$sermon_content = util_get_actual_content($post->post_content);
	$image = util_get_hero_src($post);


	$pastor_ID = get_post_meta($post_id, 'sermon_pastor', true);
	$pastor = $pastor_ID ? get_post($pastor_ID) : false;
	$series = get_query_var('series');
	$steps = $series ? array(
		array('type' => 'sermon-series', 'slug' => false),
		array('type' => 'sermon-series', 'slug' => $series),
		array('type' => 'sermons', 'slug' => $post->post_name),
	) : array(
		array('type' => 'sermons', 'slug' => false),
		array('type' => 'sermons', 'slug' => $post->post_name),
	);


	$sermon_snippet = util_render_snippet('sermons/sermon-link', array(
		'link' => get_post_meta($post_id, 'link', true),
		'audio_link' => get_post_meta($post_id, 'audio_link', true)
	));


	util_render_snippet('common/hero', array(
		'desktop_src' => $image['src'],
		'image_alt' => $image['alt'],
		'caption_classes' => '',
		'caption' => get_the_title(),
		'steps' => $steps,
		'opacity' => get_post_meta($post_id, 'hero_opacity', true),
		'background' => get_post_meta($post_id, 'hero_background', true),
		'text_color' => get_post_meta($post_id, 'hero_text', true),
	), false);

	do_action('church_layout_after_header');

	util_render_snippet('sermons/sermon-full-article', array(
		'sermon_link' => $sermon_snippet,
		'description' => $sermon_content,
		'pastor' => $pastor
	), false);
}

get_footer();
