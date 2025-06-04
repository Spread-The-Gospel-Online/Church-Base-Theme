<?php

// Theme Supports
add_theme_support('post-thumbnails');
add_theme_support('wp-block-styles');
add_theme_support('menus');
add_post_type_support('page', 'excerpt');

register_nav_menus(array(
	'primary-menu' => 'Primary Menu',
	'footer-menu' => 'Footer Menu'
));

// Theme Lib
require_once( 'utilities/index.php' );
require_once( 'gutenberg-plugins/index.php' );
require_once( 'settings/index.php' );
require_once( 'core/index.php' );
require_once( 'admin-panel/index.php' );
require_once( 'post-types/index.php' );

// set templates
add_filter( 'template_include', function ($template) {
	// Set our template prefix
	$template_prefix = '';
	$template_prefix = is_singular() ? 'single' : $template_prefix;
	$template_prefix = is_home() || is_archive() ? 'archive' : $template_prefix;

	// get our template to check
	$template_to_check = __DIR__ . '/templates/' . $template_prefix . '-' . get_post_type() . '.php';
	$backup_template = __DIR__ . '/templates/' . $template_prefix . '.php';

	if (is_search()) {
		$template_to_check = __DIR__ . '/templates/search.php';
	}

	// set which template we use
	if (file_exists($template_to_check)) {
		$template = $template_to_check;
	} else if (file_exists($backup_template)) {
		$template = $backup_template;
	}

	return $template;
});
