<?php

// set our defaults for our settings.
// add_action( 'init', function () {
// 	$tablet_query = get_option('theme_width_tablet');
// 	if (!$tablet_query) {
// 		update_option('theme_width_tablet', 750);
// 	}

// 	$tablet_query = get_option('theme_width_desktop');
// 	if (!$tablet_query) {
// 		update_option('theme_width_desktop', 1150);
// 	}
// });

// add_action( 'customize_register', function ($customizer) {
// 	$customizer->add_section('church_media_queries', array(
// 		'title' => 'Media Queries',
// 		'description' => 'Settings for setting breakpoints',
// 		'priority' => 30,
// 		'capability' => 'edit_theme_options'
// 	));


// 	// ------- BREAKPOINTS -------
// 	$customizer->add_setting('theme_width_tablet', array(
// 		'type' => 'option',
// 		'default' => 750,
// 		'sanitize_callback' => 'sanitize_text_field',
// 	));
// 	$customizer->add_control('theme_width_tablet', array(
// 		'type' => 'number',
// 		'section' => 'church_media_queries',
// 		'label' => 'Tablet Screen Size ',
// 		'validate' => 'numeric',
//         'default'  => 750,
//         'input_attrs' => array(
//             'min' => 350,
//             'max' => 1000,
//             'step' => 5,
//         ),
// 	));

// 	$customizer->add_setting('theme_width_desktop', array(
// 		'type' => 'option',
// 		'default' => 1150,
// 		'sanitize_callback' => 'sanitize_text_field',
// 	));
// 	$customizer->add_control('theme_width_desktop', array(
// 		'type' => 'number',
// 		'section' => 'church_media_queries',
// 		'label' => 'Desktop Screen Size ',
// 		'validate' => 'numeric',
//         'default'  => 1150,
//         'input_attrs' => array(
//             'min' => 700,
//             'max' => 1700,
//             'step' => 5,
//         ),
// 	));
// });