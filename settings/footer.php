<?php

add_action( 'customize_register', function ($customizer) {
	$customizer->add_section('church_footer_section', array(
		'title' => 'Footer Settings',
		'priority' => 300,
		'capability' => 'edit_theme_options'
	));

	$customizer->add_setting('copyright_text', array(
		'type' => 'option',
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('copyright_text', array(
		'type' => 'text',
		'section' => 'church_footer_section',
		'label' => 'Copyright Text',
		'description' => 'Add "YYYY" to display the current year'
	));

	$customizer->add_setting('footer_section_colors', array());
	$customizer->add_control(new Sub_Section_Heading_Custom_Control( 
		$customizer, 'footer_section_colors',
        array(
            'label' => 'Footer Section Colors',
            'section' => 'church_footer_section',
        )
    ));
});