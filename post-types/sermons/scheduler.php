<?php

add_action('church_cron_sermons_hook', function () {
	Sermon_Proccesser::fetch_updates();
});

add_action('init', function() {
	if (!wp_next_scheduled('church_cron_sermons_hook')) {
		wp_schedule_event(strtotime('this Sunday, 3 pm', time() + (2*60)), 'weekly', 'church_cron_sermons_hook');
	}
});