<?php

add_action( 'customize_register', function ($customizer) {
	$customizer->add_section('church_hero_section', array(
		'title' => 'Hero Settings',
		'priority' => 101,
		'capability' => 'edit_theme_options'
	));

	$customizer->add_setting('hero_default_height', array(
		'type' => 'option',
		'default' => 40,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('hero_default_height', array(
		'type' => 'number',
		'section' => 'church_hero_section',
		'label' => 'Hero Default Height',
		'description' => 'Sets height of the hero, set as a percent of the height of the window',
		'validate' => 'numeric',
        'default'  => 40,
        'input_attrs' => array(
            'min' => 0,
            'max' => 100,
            'step' => 1,
        )
	));

	$customizer->add_setting('hero_text_only_default_height', array(
		'type' => 'option',
		'default' => 30,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('hero_text_only_default_height', array(
		'type' => 'number',
		'section' => 'church_hero_section',
		'label' => 'Text Only Hero Height',
		'description' => 'Sets height of the hero if there\'s no image to display in the hero',
		'validate' => 'numeric',
        'default'  => 30,
        'input_attrs' => array(
            'min' => 0,
            'max' => 100,
            'step' => 1,
        )
	));

	$hero_default_opacity = get_option('hero_default_opacity');
	if (!$hero_default_opacity) {
		update_option('hero_default_opacity', 0.8);
		$hero_default_opacity = 0.8;
	}

    $customizer->add_setting('hero_default_opacity', array(
		'type' => 'option',
		'default' => $hero_default_opacity,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('hero_default_opacity', array(
		'type' => 'number',
		'section' => 'church_hero_section',
		'label' => 'Hero Default Background Opacity',
		'validate' => 'numeric',
        'default'  => $hero_default_opacity,
        'input_attrs' => array(
            'min' => 0,
            'max' => 1,
            'step' => 0.05,
        )
	));

	$customizer->add_setting('hero_section_colors', array());
	$customizer->add_control(new Sub_Section_Heading_Custom_Control( 
		$customizer, 'hero_section_colors',
        array(
            'label' => 'Hero Section Colors',
            'section' => 'church_hero_section',
            'priority' => 300,
        )
    ));
});