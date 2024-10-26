<?php 

get_header(); 

while (have_posts()) { 
	the_post();

	$post = get_post();
	$post_id = $post->ID;
	$image_id = get_post_thumbnail_id();
	
	add_filter('breadcrumbs_steps', function ($steps) use ($post) {
		return array(
			array('type' => 'events', 'slug' => false),
			array('type' => 'events', 'slug' => $post->post_name)
		);
	});

	util_render_snippet('common/hero', array(
		'desktop_src' => $image_id ? wp_get_attachment_image_src($image_id, 'full', false)[0] : false,
		'image_alt' => get_post_meta($image_id, '_wp_attachment_image_alt', true),
		'caption_classes' => '',
		'caption' => get_the_title(),
		'opacity' => get_post_meta($post_id, 'hero_opacity', true),
		'background' => get_post_meta($post_id, 'hero_background', true),
		'text_color' => get_post_meta($post_id, 'hero_text', true),
	), false);

	do_action('church_layout_after_header');

	$event_date = get_post_meta($post->ID, 'event_date', true);
	$add_link = 'https://calendar.google.com/calendar/render?action=TEMPLATE&text=' . str_replace(' ', '+', $post->post_title) . '&details=View+event:+' . get_permalink($post) . '&dates=' . str_replace('-', '', $event_date) . 'T160000';
	util_render_snippet('events/add-event-to-calendar', array(
		'add_link' => $add_link,
	), false);

	the_content();
}

get_footer();