<?php

// Surface a failed sermon auto-import to admins. Sermon_Proccesser::record_status()
// stores the outcome of the last run in the 'sermon_import_status' option; when that
// run failed (ok === false) we render a warning notice pointing to the settings page.
add_action('admin_notices', function () {
	if (!current_user_can('manage_options')) {
		return;
	}

	$status = get_option('sermon_import_status');
	if (empty($status) || !isset($status['ok']) || $status['ok']) {
		return;
	}

	util_render_snippet('admin/sermon-import-error', array(
		'message' => $status['message'] ?? 'The sermon auto-import failed.',
		'time' => $status['time'] ?? 0
	), false);
});
