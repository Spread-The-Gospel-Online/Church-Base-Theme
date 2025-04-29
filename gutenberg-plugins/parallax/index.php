<?php

add_action( 'admin_init', function () {
	if (get_option('enable_hero_parallax') == 'yes') {
		wp_enqueue_script(
			'global-church-parallax-script',
			get_template_directory_uri() . '/gutenberg-plugins/parallax/parallax.js?t=' . time(),
			array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-components', 'wp-edit-post', 'wp-edit-site'),
			null,
			true
		);
	}
});