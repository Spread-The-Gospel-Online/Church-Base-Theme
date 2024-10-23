<?php

add_action( 'admin_init', function () {
	wp_enqueue_script(
		'global-church-layout-editor-script',
		get_template_directory_uri() . '/gutenberg-plugins/layouts-plugin/layouts-editor-script.js?t=' . time(),
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-components', 'wp-edit-post', 'wp-edit-site'),
		null,
		true
	);
});