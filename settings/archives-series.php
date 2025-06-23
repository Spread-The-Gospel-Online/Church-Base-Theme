<?php

add_action('customize_register', function ($customizer) {
	$customizer->add_section('church_sermon_series_section', array(
		'title' => 'Sermon Series Settings',
		'priority' => 119,
		'capability' => 'edit_theme_options'
	));

	// Default image for series tiles
	$customizer->add_setting('series_default_image', array(
		'type' => 'option',
	));
	$customizer->add_control(new WP_Customize_Upload_Control($customizer, 'series_default_image', array(
		'settings' => 'series_default_image',
		'section' => 'church_sermon_series_section',
		'label' => 'Sermon Series Default Image',
	)));

	// Series Tile Height
	$customizer->add_setting('church_archive_sermon_series_card_height', array(
		'type' => 'option',
		'default' => 30,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_archive_sermon_series_card_height', array(
		'type' => 'number',
		'section' => 'church_sermon_series_section',
		'label' => 'Sermon Series Card Apect Ratio (Height)',
		'validate' => 'numeric',
        'default'  => 30,
        'input_attrs' => array(
            'min' => 10,
            'max' => 100,
            'step' => 1,
        ),
	));
});