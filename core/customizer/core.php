<?php

add_action( 'customize_register', function ($customizer) {
	$customizer->remove_section('custom_css');
	$customizer->remove_section('static_front_page');
});

// Render the dynamic stylesheet (main.css.php) into the static main.build.css
// that logged-out visitors are served. Called on customize_save_after and any
// other place that writes color/font options outside the Customizer (e.g. the
// Theme Planner admin page).
function church_rebuild_main_build_css () {
	ob_start();
	include __DIR__ . '/../../assets/styles/main.css.php';
	$css_contents = ob_get_clean();
	file_put_contents(__DIR__ . '/../../assets/styles/main.build.css', $css_contents, FILE_USE_INCLUDE_PATH);
}

add_action('customize_save_after', 'church_rebuild_main_build_css');
