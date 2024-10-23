<?php

add_action( 'customize_register', function ($customizer) {
	$customizer->add_section('church_general_section', array(
		'title' => 'General Settings',
		'priority' => 20,
		'capability' => 'edit_theme_options'
	));

	// LOGO SIZES
	$customizer->add_setting('church_ccontain_default_size', array(
		'type' => 'option',
		'default' => 1252,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_ccontain_default_size', array(
		'type' => 'number',
		'section' => 'church_general_section',
		'label' => 'Content Width',
		'validate' => 'numeric',
        'default'  => 1252,
        'input_attrs' => array(
            'min' => 20,
            'max' => 300,
            'step' => 1,
        ),
	));
});