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


	$customizer->add_setting('church_bible_version', array(
		'type' => 'option',
		'default' => 'esv',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_bible_version', array(
		'type' => 'select',
		'choices' => array(
			'asv' => 'American Standard Version',
			'esv' => 'English Standard Version',
			'kjv' => 'King James Version',
			'niv' => 'New International Version',
			'nkjv' => 'New King James Version',
			'ylt' => 'Young Literal Translation'
		),
		'section' => 'church_general_section',
		'label' => 'Bible Version Used',
		'description' => 'Used for the Logos Bible Reference Plugin'
	));



	$customizer->add_setting('enable_hero_parallax', array(
		'type' => 'option',
		'default' => 'no',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('enable_hero_parallax', array(
		'type' => 'select',
		'choices' => array(
			'yes' => 'Enable Parallax',
			'no' => 'Disable Parallax',
		),
		'section' => 'church_general_section',
		'label' => 'Image Parallax Effect',
		'description' => 'Will automatically add parallax effect to hero images'
	));


	$customizer->add_setting('general_border_widths', array());
	$customizer->add_control(new Sub_Section_Heading_Custom_Control( 
		$customizer, 'general_border_widths',
        array(
            'label' => 'Border Widths',
            'section' => 'church_general_section',
        )
    ));

    $customizer->add_setting('church_border_width_small', array(
		'type' => 'option',
		'default' => 1,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_border_width_small', array(
		'type' => 'number',
		'section' => 'church_general_section',
		'label' => 'Border Width - Small',
		'validate' => 'numeric',
        'default'  => 1,
        'input_attrs' => array(
            'min' => 0,
            'max' => 6,
            'step' => 1,
        ),
	));

	$customizer->add_setting('church_border_width_medium', array(
		'type' => 'option',
		'default' => 2,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_border_width_medium', array(
		'type' => 'number',
		'section' => 'church_general_section',
		'label' => 'Border Width - Medium',
		'validate' => 'numeric',
        'default'  => 2,
        'input_attrs' => array(
            'min' => 0,
            'max' => 6,
            'step' => 1,
        ),
	));

	$customizer->add_setting('church_border_width_wide', array(
		'type' => 'option',
		'default' => 3,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_border_width_wide', array(
		'type' => 'number',
		'section' => 'church_general_section',
		'label' => 'Border Width - Wide',
		'validate' => 'numeric',
        'default'  => 3,
        'input_attrs' => array(
            'min' => 0,
            'max' => 6,
            'step' => 1,
        ),
	));

});