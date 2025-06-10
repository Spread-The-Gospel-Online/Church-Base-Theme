<?php

add_action('admin_notices', function () {
	$primary_menu = has_nav_menu('primary-menu');
	if (!$primary_menu) {
		util_render_snippet('admin/missing-menu', array(
			'missing_menu' => 'primary-menu'
		), false);
	}
});