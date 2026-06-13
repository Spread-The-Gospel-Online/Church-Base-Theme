<?php

// POST church/v1/form-submit — emails a contact-form submission.
// Recipients are NOT taken from the request (the endpoint is public): the client sends
// a `church_form_id` (prefixed `form-id-`) that maps to a theme option holding the
// admin-configured recipients + form name. This confines lookups to admin-set options,
// so the endpoint can't be used as an open mail relay.
add_action('rest_api_init', function () {
	register_rest_route('church/v1', '/form-submit', array(
		'methods' => 'POST',
		'callback' => 'church_ep_form_submit',
		'permission_callback' => '__return_true',
	));
});

function church_ep_form_submit ($request) {
	$fields = $request->get_json_params();
	if (empty($fields)) {
		$fields = $request->get_body_params();
	}

	$form_id = isset($fields['church_form_id']) ? $fields['church_form_id'] : '';

	// Only allow our own form-id-* option keys, never arbitrary option names.
	if (!is_string($form_id) || strpos($form_id, 'form-id-') !== 0) {
		return new WP_REST_Response(array('error' => 'Invalid form id'), 400);
	}

	$config = get_option($form_id);
	if (!is_array($config) || empty($config['emails'])) {
		return new WP_REST_Response(array('error' => 'Unknown form'), 400);
	}

	// The lookup id is internal — keep it out of the emailed field table.
	unset($fields['church_form_id']);

	$to = $config['emails']; // comma-separated string is accepted by wp_mail
	$form_name = isset($config['name']) ? $config['name'] : '';
	$subject = 'new submission from form: ' . $form_name;
	$body = util_render_snippet('emails/form-submission', array(
		'fields' => $fields,
		'form_name' => $form_name,
	));
	$headers = array(
		'Content-Type: text/html; charset=UTF-8',
		'From: ' . get_bloginfo('name') . ' <' . get_option('admin_email') . '>',
	);

	$sent = wp_mail($to, $subject, $body, $headers);
	if (!$sent) {
		error_log('Church form submission: wp_mail failed for ' . $to);
	}

	return rest_ensure_response(array('sent' => (bool) $sent));
}
