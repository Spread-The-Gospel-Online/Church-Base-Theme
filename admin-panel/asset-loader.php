<?php

add_action('admin_enqueue_scripts', function () {
	$styles_url = get_template_directory_uri() . '/assets/admin.css';
	wp_enqueue_style('church_main_admin_style', $styles_url); 
});