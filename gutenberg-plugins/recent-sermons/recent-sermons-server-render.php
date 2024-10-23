<?php

add_action( 'rest_api_init', function () {
	register_rest_route( 'church/v1', '/getServerContentsLatestSermons', array(
		'methods' => 'GET',
		'callback' => 'church_ep_get_latest_sermons',
		'permission_callback' => '__return_true'
	));
});

function church_ep_get_latest_sermons ($data) {
	$attributes = array(
		'numberOfSermons' => $data['numberSermons'],
		'numberOfColumns' => $data['numberOfColumns']
	);

	echo church_display_recent_sermons($attributes, false);
	exit();
}