<?php

add_action( 'customize_register', function ($customizer) {
	$customizer->add_section('church_fonts_section', array(
		'title' => 'Font Settings',
		'description' => 'Set fonts for the site',
		'priority' => 25,
		'capability' => 'edit_theme_options'
	));

	// Set defaults
	if (!get_option('font_family_one')) {
		update_option('font_family_one', 'Open+Sans:ital,wght@0,300..800;1,300..800');
	}
	if (!get_option('font_family_one_rule')) {
		update_option('font_family_one_rule', '"Open Sans", sans-serif');
	}
	if (!get_option('font_family_two')) {
		update_option('font_family_two', 'Roboto:ital,wght@0,100..900;1,100..900');
	}
	if (!get_option('font_family_two_rule')) {
		update_option('font_family_two_rule', '"Roboto", sans-serif');
	}
	if (!get_option('font_general')) {
		update_option('font_general', 'font_family_one_rule');
	}
	if (!get_option('font_headings')) {
		update_option('font_headings', 'font_family_two_rule');
	}

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
			'description' => 'Add family parameter from embed URL (example: "Open+Sans:ital,wght@0,300..800;1,300..800")'
		));

		$customizer->add_setting($font['id'] . '_rule', array(
			'type' => 'option',
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		));
		$customizer->add_control($font['id']. '_rule', array(
			'type' => 'text',
			'section' => 'church_fonts_section',
			'label' => $font['label'] . ' CSS Rule',
			'description' => 'Add CSS rule without semicolon (example: "Open Sans", sans-serif)'
		));

		$key = $font['id'] . '_rule';
		$font_options[$key] = $font['label'];
	}

	// SET DEFAULT FONTS FOR ELEMENTS
	$font_selectors = array(
		array(
			'id' => 'font_general',
			'default' => 'font_family_one_rule',
			'label' => 'General',
			'section' => 'church_fonts_section'
		),
		array(
			'id' => 'font_headings',
			'default' => 'font_family_two_rule',
			'label' => 'Headings',
			'section' => 'church_fonts_section'
		),
		array(
			'id' => 'font_blockquotes_quote',
			'default' => 'font_family_two_rule',
			'label' => 'Quotation Mark Family',
			'section' => 'church_blockquotes_section'
		),
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
			'section' => $font['section'],
			'label' => $font['label'],
			'priority' => 201,
		));
	}
});