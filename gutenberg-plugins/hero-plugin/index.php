<?php

add_action( 'admin_init', function () {
	wp_enqueue_script(
		'global-church-editor-script',
		get_template_directory_uri() . '/gutenberg-plugins/hero-plugin/filters-editor-script.js?t=' . time(),
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-components', 'wp-edit-post', 'wp-edit-site'),
		null,
		true
	);

	wp_localize_script('global-church-editor-script', 'heroDefaults', array(
		'heroOpacityDefault' => get_option('hero_default_opacity'),
		'heroBGDefault' => get_option('hero_default_color'),
		'heroTextDefault' => get_option('hero_default_text_color'),
		'heroHeightDefault' => get_option('hero_default_height'),
	));
});