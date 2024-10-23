<?php

add_action('admin_enqueue_scripts', function () {
	$styles_url = plugin_dir_url('/church/assets/admin.css') . 'admin.css';
	wp_enqueue_style('church_main_admin_style', $styles_url); 
});