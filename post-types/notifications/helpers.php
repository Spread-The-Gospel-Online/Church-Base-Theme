<?php

// Published notifications shown in the footer. The cron is what publishes/expires them,
// so the footer simply pulls everything currently published.
function church_get_active_notifications () {
	return get_posts(array(
		'post_type' => 'notifications',
		'post_status' => 'publish',
		'posts_per_page' => -1,
	));
}
