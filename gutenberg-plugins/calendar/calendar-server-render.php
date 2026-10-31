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
	// Public: the front-end calendar's month navigation calls this route.
	if (isset($data['date']) && is_string($data['date'])) {
		$data_to_pass['base_date'] = sanitize_text_field($data['date']);
	}
	echo church_display_calendar($data_to_pass, false);
	exit();
}