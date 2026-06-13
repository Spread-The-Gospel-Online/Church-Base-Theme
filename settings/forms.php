<?php

add_action('customize_register', function ($customizer) {
	$customizer->add_section('church_forms_section', array(
		'title' => 'Form Settings',
		'priority' => 30,
		'capability' => 'edit_theme_options'
	));

	$customizer->add_setting('church_forms_label_position', array(
		'type' => 'option',
		'default' => 'above',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_forms_label_position', array(
		'type' => 'select',
		'choices' => array(
			'above' => 'Above input',
			'left' => 'To the left of input',
		),
		'section' => 'church_forms_section',
		'label' => 'Form Label Position',
		'priority' => 100,
	));

	$customizer->add_setting('church_forms_section_colors', array());
	$customizer->add_control(new Sub_Section_Heading_Custom_Control( 
		$customizer, 'church_forms_section_colors',
        array(
            'label' => 'Form Colors',
            'section' => 'church_forms_section',
            'priority' => 300,
        )
    ));
});