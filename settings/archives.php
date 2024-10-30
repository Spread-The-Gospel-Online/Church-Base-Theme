<?php

// set our defaults for our settings.
add_action( 'init', function () {
	$grid_size_tablet = get_option('church_archive_sermon_grid_tablet_size');
	if (!$grid_size_tablet) {
		update_option('church_archive_sermon_grid_tablet_size', 2);
	}

	$grid_size = get_option('church_archive_sermon_grid_size');
	if (!$grid_size) {
		update_option('church_archive_sermon_grid_size', 2);
	}

});

add_action( 'customize_register', function ($customizer) {
	$customizer->add_section('church_archive_styles', array(
		'title' => 'Archive Styles',
		'description' => 'Settings for archives grids',
		'priority' => 120,
		'capability' => 'edit_theme_options'
	));


	// ------- Sermon Archive -------
	$customizer->add_setting('church_archive_sermon_grid_tablet_size', array(
		'type' => 'option',
		'default' => 2,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_archive_sermon_grid_tablet_size', array(
		'type' => 'number',
		'section' => 'church_archive_styles',
		'label' => 'Sermon Grid Size (Tablet)',
		'validate' => 'numeric',
        'default'  => 2,
        'input_attrs' => array(
            'min' => 1,
            'max' => 3,
            'step' => 1,
        ),
	));

	$customizer->add_setting('church_archive_sermon_grid_size', array(
		'type' => 'option',
		'default' => 2,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_archive_sermon_grid_size', array(
		'type' => 'number',
		'section' => 'church_archive_styles',
		'label' => 'Sermon Grid Size (Desktop)',
		'validate' => 'numeric',
        'default'  => 2,
        'input_attrs' => array(
            'min' => 1,
            'max' => 4,
            'step' => 1,
        ),
	));


	// CARD STYLES
	$customizer->add_setting('card_overlay_opacity', array(
		'type' => 'option',
		'default' => 50,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('card_overlay_opacity', array(
		'type' => 'number',
		'section' => 'church_archive_styles',
		'label' => 'Sermon Card Overlay Opacity',
		'validate' => 'numeric',
        'default'  => 50,
        'input_attrs' => array(
            'min' => 0,
            'max' => 100,
            'step' => 1,
        ),
	));

	$customizer->add_setting('card_overlay_opacity_hover', array(
		'type' => 'option',
		'default' => 50,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('card_overlay_opacity_hover', array(
		'type' => 'number',
		'section' => 'church_archive_styles',
		'label' => 'Sermon Card Overlay Opacity (Hover)',
		'validate' => 'numeric',
        'default'  => 50,
        'input_attrs' => array(
            'min' => 0,
            'max' => 100,
            'step' => 1,
        ),
	));


	// Card Height
	$customizer->add_setting('church_archive_sermon_card_height', array(
		'type' => 'option',
		'default' => 50,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_archive_sermon_card_height', array(
		'type' => 'number',
		'section' => 'church_archive_styles',
		'label' => 'Sermon Card Apect Ratio (Height)',
		'validate' => 'numeric',
        'default'  => 50,
        'input_attrs' => array(
            'min' => 10,
            'max' => 100,
            'step' => 1,
        ),
	));

});