<?php

add_action( 'customize_register', function ($customizer) {
	$customizer->remove_section('custom_css');
	$customizer->remove_section('static_front_page');
});

add_action('customize_save_after', function () {
	ob_start();
	include __DIR__ . '/../../assets/styles/main.css.php';
	$css_contents = ob_get_clean();
	file_put_contents(__DIR__ . '/../../assets/styles/main.build.css', $css_contents, FILE_USE_INCLUDE_PATH);
});
