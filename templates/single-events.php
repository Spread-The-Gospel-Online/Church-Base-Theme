<?php 

get_header(); 

while (have_posts()) { 
	the_post();

	$post = get_post();
	$post_id = $post->ID;
	$image = util_get_hero_src($post);
	$event_location = get_post_meta($post->ID, 'event_location', true);
	
	add_filter('breadcrumbs_steps', function ($steps) use ($post) {
		return array(
			array('type' => 'events', 'slug' => false),
			array('type' => 'events', 'slug' => $post->post_name)
		);
	});

	util_render_snippet('common/hero', array(
		'desktop_src' => $image['src'],
		'image_alt' => $image['alt'],
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

	if (str_contains($event_location, 'google.com/maps/embed')) {
		util_render_snippet('events/google-map', array(
			'event_location' => $event_location
		), false);
	}
}

get_footer();