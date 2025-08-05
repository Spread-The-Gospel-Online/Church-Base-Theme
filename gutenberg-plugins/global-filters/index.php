<?php

add_action('admin_init', function () {
	wp_enqueue_script(
		'global-church-global-block-script',
		get_template_directory_uri() . '/gutenberg-plugins/global-filters/layouts.js?t=' . time(),
		array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-components', 'wp-edit-post', 'wp-edit-site'),
		null,
		true
	);
});

// Add theme colors into Gutenberg
add_action('after_setup_theme', function () {
	add_theme_support('editor-color-palette', BASE_SITE_COLOR_OPTIONS);
});
