<?php

add_action('admin_init', function () {
	wp_enqueue_script(
		'core-block-edits-script',
		get_template_directory_uri() . '/gutenberg-plugins/core-block-edits/core-block-edits.js?t=' . time(),
		array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-components', 'wp-edit-post', 'wp-edit-site'),
		null,
		true
	);
});
