<?php

add_action( 'admin_init', function () {
	wp_enqueue_script(
		'global-church-members-editor-script',
		get_template_directory_uri() . '/gutenberg-plugins/member-plugin/members-editor-script.js?t=' . time(),
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-components', 'wp-edit-post', 'wp-edit-site'),
		null,
		true
	);
});