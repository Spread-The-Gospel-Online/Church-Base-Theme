<?php

add_action( 'customize_register', function ($customizer) {
	$customizer->add_section('church_forms_section', array(
		'title' => 'Form Settings',
		'priority' => 30,
		'capability' => 'edit_theme_options'
	));

	

	$customizer->add_setting('forms_section_colors', array());
	$customizer->add_control(new Sub_Section_Heading_Custom_Control( 
		$customizer, 'forms_section_colors',
        array(
            'label' => 'Form Colors',
            'section' => 'church_forms_section',
            'priority' => 300,
        )
    ));
});