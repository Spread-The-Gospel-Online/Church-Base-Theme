<?php

add_action('init', function () {
	if (!get_option('church_staff_contents_pattern')) {
    	update_option('church_staff_contents_pattern', 'false');
    }
});

add_action('customize_register', function ($customizer) {
	$customizer->add_section('church_staff_styles', array(
		'title' => 'Staff Page',
		'priority' => 126,
		'capability' => 'edit_theme_options'
	));



    $patterns = church_get_all_patterns_for_customizer();
	$customizer->add_setting('church_staff_contents_pattern', array(
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$customizer->add_control('church_staff_contents_pattern', array( 
		'type' => 'select',
		'choices' => $patterns,
        'section' => 'church_staff_styles',
        'label' => 'Staff Contents Pattern',
    ));
});
