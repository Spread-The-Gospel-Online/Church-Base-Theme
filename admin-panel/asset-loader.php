<?php

add_action('admin_enqueue_scripts', function () {
	$styles_url = get_template_directory_uri() . '/assets/admin.css';
	wp_enqueue_style('church_main_admin_style', $styles_url);
});

add_action('customize_controls_enqueue_scripts', function ($customizer) {
	$customizer_conditionals_script = get_template_directory_uri() . '/assets/scripts/templates/conditional-settings.js';
	wp_enqueue_script('church_conditional_settings_script', $customizer_conditionals_script, array('customize-controls'));
}, 1);

function church_add_script_conditional ($to_watch, $to_hide, $condition_type, $value) {
	wp_add_inline_script('church_conditional_settings_script', <<<EOD
		window.watchCustomizerInput({
			inputToWatch: '$to_watch',
			inputToToggle: '$to_hide',
			conditionValue: '$value',
			conditionType: '$condition_type'
		})
	EOD);
}