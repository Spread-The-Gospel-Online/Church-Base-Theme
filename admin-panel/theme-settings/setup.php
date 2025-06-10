<?php

class Church_Theme_Admin_Page {
	public static function setup_theme_settings_page () {
		require_once('templates/general-settings-page.php');
	}
}

add_action( 'admin_init', function () {
	register_setting('church-theme-settings', 'church_enabled_post_types');
});

// add our theme settings menu page
add_action('admin_menu' , function () {
	add_options_page(
		'Theme Settings',
		'Theme Settings',
		'administrator',
		'theme-settings-page',
		array('Church_Theme_Admin_Page', 'setup_theme_settings_page') );
});