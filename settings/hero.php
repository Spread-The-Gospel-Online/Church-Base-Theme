<?php

add_action('customize_register', function ($customizer) {
	if (!get_option('church_hero_default_height')) {
		update_option('church_hero_default_height', 40);
	}


	$customizer->add_section('church_hero_section', array(
		'title' => 'Hero Settings',
		'priority' => 101,
		'capability' => 'edit_theme_options'
	));

	$customizer->add_setting('church_hero_default_height', array(
		'type' => 'option',
		'default' => 40,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_hero_default_height', array(
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

	$customizer->add_setting('church_hero_text_only_default_height', array(
		'type' => 'option',
		'default' => 30,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_hero_text_only_default_height', array(
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

	$church_hero_default_opacity = get_option('church_hero_default_opacity');
	if (!$church_hero_default_opacity) {
		update_option('church_hero_default_opacity', 0.8);
		$church_hero_default_opacity = 0.8;
	}

    $customizer->add_setting('church_hero_default_opacity', array(
		'type' => 'option',
		'default' => $church_hero_default_opacity,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_hero_default_opacity', array(
		'type' => 'number',
		'section' => 'church_hero_section',
		'label' => 'Hero Default Background Opacity',
		'validate' => 'numeric',
        'default'  => $church_hero_default_opacity,
        'input_attrs' => array(
            'min' => 0,
            'max' => 1,
            'step' => 0.05,
        )
	));

	$customizer->add_setting('church_hero_section_colors', array());
	$customizer->add_control(new Sub_Section_Heading_Custom_Control( 
		$customizer, 'church_hero_section_colors',
        array(
            'label' => 'Hero Section Colors',
            'section' => 'church_hero_section',
            'priority' => 300,
        )
    ));
});