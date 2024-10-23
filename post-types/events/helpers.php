<?php

function church_util_get_upcoming_events ($number_events = 3) {
	return get_posts(array(
		'meta_query' => array(
			array(
				'key' => 'event_date',
				'value' => date('Y-m-d'),
				'compare' => '>='
			)
		),
		'post_type' => 'events',
		'posts_per_page' => $number_events,
		'orderby' => 'meta_value',
    	'order' => 'ASC'
	));
}

function church_util_get_events_for_day ($day) {
	return get_posts(array(
		'meta_query' => array(
			array(
				'key' => 'event_date',
				'value' => $day,
				'compare' => '='
			)
		),
		'post_type' => 'events',
		'posts_per_page' => -1,
		'orderby' => 'meta_value',
    	'order' => 'ASC'
	));
}