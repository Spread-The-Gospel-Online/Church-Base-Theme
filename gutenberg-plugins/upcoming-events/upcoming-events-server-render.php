<?php

add_action( 'rest_api_init', function () {
	register_rest_route( 'church/v1', '/getServerContentsUpcomingEvents', array(
		'methods' => 'GET',
		'callback' => 'church_ep_get_upcoming_events',
		'permission_callback' => '__return_true'
	));
});

function church_ep_get_upcoming_events ($data) {
	$attributes = array(
		'numberOfEvents' => $data['numberOfEvents'],
		'numberOfColumns' => $data['numberOfColumns']
	);

	echo church_display_upcoming_events($attributes, false);
	exit();
}