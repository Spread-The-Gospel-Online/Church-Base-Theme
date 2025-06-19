<?php

add_action( 'customize_register', function ($customizer) {
	$customizer->add_section('church_header_section', array(
		'title' => 'Header Settings',
		'description' => 'Settings for header',
		'priority' => 35,
		'capability' => 'edit_theme_options'
	));


	// ------- FIXED HEADER -------
	$customizer->add_setting('header_is_fixed', array(
		'type' => 'option',
		'default' => 'no',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('header_is_fixed', array(
		'type' => 'select',
		'choices' => array(
			'no' => 'No, not fixed',
			'yes' => 'Yes, is fixed'
		),
		'section' => 'church_header_section',
		'label' => 'Fixed Header',
	));


	// HEADER LOGO
	$customizer->add_setting('header_logo', array(
		'type' => 'option',
	));
	$customizer->add_control(new WP_Customize_Upload_Control($customizer, 'header_logo', array(
		'settings' => 'header_logo',
		'section' => 'church_header_section',
		'label' => 'Header Logo Image',
	)));

	// LOGO SIZES
	$customizer->add_setting('church_logo_default_size', array(
		'type' => 'option',
		'default' => 100,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_logo_default_size', array(
		'type' => 'number',
		'section' => 'church_header_section',
		'label' => 'Logo Size (Default)',
		'validate' => 'numeric',
        'default'  => 100,
        'input_attrs' => array(
            'min' => 20,
            'max' => 300,
            'step' => 1,
        ),
	));

	$customizer->add_setting('church_logo_scrolled_size', array(
		'type' => 'option',
		'default' => 100,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_logo_scrolled_size', array(
		'type' => 'number',
		'section' => 'church_header_section',
		'label' => 'Logo Size (Scrolled)',
		'validate' => 'numeric',
        'default'  => 100,
        'input_attrs' => array(
            'min' => 20,
            'max' => 300,
            'step' => 1,
        ),
	));


	$customizer->add_setting('header_menu_alignment', array(
		'type' => 'option',
		'default' => 'middle',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('header_menu_alignment', array(
		'type' => 'select',
		'choices' => array(
			'left' => 'Left',
			'middle' => 'Middle',
			'right' => 'Right'
		),
		'section' => 'church_header_section',
		'label' => 'Header Menu Align',
	));


	$customizer->add_setting('heading_post_content', array());
	$customizer->add_control(new Sub_Section_Heading_Custom_Control( 
		$customizer, 'heading_post_content',
        array(
            'label' => 'Header Section Colors',
            'section' => 'church_header_section',
            'priority' => 300,
        )
    ));
});