<?php 

get_header(); 

while (have_posts()) { 
	the_post();

	$post = get_post();
	$event_location = get_post_meta($post->ID, 'event_location', true);
	
	add_filter('breadcrumbs_steps', function ($steps) use ($post) {
		return array(
			array('type' => 'events', 'slug' => false),
			array('type' => 'events', 'slug' => $post->post_name)
		);
	});

	util_render_snippet('common/single-page-hero-snippet', array(
		'post' => $post
	), false);

	do_action('church_layout_after_header');

	$event_date = get_post_meta($post->ID, 'event_date', true);
	$add_link = add_query_arg(array(
		'action' => 'TEMPLATE',
		// Titles are stored with entities (& as &amp;), so decode before URL-encoding.
		'text' => rawurlencode(wp_specialchars_decode($post->post_title, ENT_QUOTES)),
		'details' => rawurlencode('View event: ' . get_permalink($post)),
		'dates' => rawurlencode(str_replace('-', '', $event_date) . 'T160000')
	), 'https://calendar.google.com/calendar/render');
	util_render_snippet('events/add-event-to-calendar', array(
		'add_link' => $add_link,
	), false);

	the_content();

	if (str_contains($event_location, 'maps')) {
		util_render_snippet('events/google-map', array(
			'event_location' => $event_location
		), false);
	}
}

get_footer();