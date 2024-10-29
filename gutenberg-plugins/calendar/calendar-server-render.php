<?php

add_action( 'rest_api_init', function () {
	register_rest_route( 'church/v1', '/getServerContentsCalendar', array(
		'methods' => 'GET',
		'callback' => 'church_ep_get_calendar',
		'permission_callback' => '__return_true'
	));
});

function church_ep_get_calendar ($data) {
	$data_to_pass = array();
	if (isset($data['date'])) {
		$data_to_pass['base_date'] = $data['date'];
	}
	echo church_display_calendar($data_to_pass, false);
	exit();
}