<?php

add_action( 'customize_register', function ($customizer) {
	$customizer->add_section('church_fonts_section', array(
		'title' => 'Font Settings',
		'description' => 'Set fonts for the site',
		'priority' => 25,
		'capability' => 'edit_theme_options'
	));

	$font_options = [];
	$fonts = array(
		array( 'label' => 'Font Family One', 'id' => 'font_family_one' ),
		array( 'label' => 'Font Family Two', 'id' => 'font_family_two' ),
		array( 'label' => 'Font Family Three', 'id' => 'font_family_three' ),
	);

	// ------- FIXED HEADER -------
	foreach ($fonts as $font) {
		$customizer->add_setting($font['id'], array(
			'type' => 'option',
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		));
		$customizer->add_control($font['id'], array(
			'type' => 'text',
			'section' => 'church_fonts_section',
			'label' => $font['label'],
			'description' => 'Add as a Google Font link'
		));

		$customizer->add_setting($font['id'] . '_rule', array(
			'type' => 'option',
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		));
		$customizer->add_control($font['id']. '_rule', array(
			'type' => 'text',
			'section' => 'church_fonts_section',
			'label' => $font['label'] . ' CSS Rule'
		));

		$key = $font['id'] . '_rule';
		$font_options[$key] = $font['label'];
	}


	// SET DEFAULT FONTS FOR ELEMENTS
	$font_selectors = array(
		array( 'id' => 'font_general', 'default' => 'font_family_one_rule', 'label' => 'General'),
		array( 'id' => 'font_headings', 'default' => 'font_family_two_rule', 'label' => 'Headings'),
	);

	foreach ($font_selectors as $font) {
		$font_id = $font['id'];

		$customizer->add_setting($font_id, array(
			'type' => 'option',
			'default' => $font['default'],
			'sanitize_callback' => 'sanitize_text_field',
		));

		$customizer->add_control($font_id, array(
			'type' => 'select',
			'choices' => $font_options,
			'section' => 'church_fonts_section',
			'label' => $font['label'],
		));
	}
});