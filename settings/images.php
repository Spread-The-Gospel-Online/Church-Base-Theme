<?php

add_action('customize_register', function ($customizer) {
	$customizer->add_section('church_images_section', array(
		'title' => 'Images',
		'description' => 'Settings for how images load',
		'priority' => 32,
		'capability' => 'edit_theme_options'
	));

	$customizer->add_setting('church_blur_images_loading', array(
		'type' => 'option',
		'default' => 'no',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_blur_images_loading', array(
		'type' => 'select',
		'choices' => array(
			'no' => 'No',
			'yes' => 'Yes',
		),
		'section' => 'church_images_section',
		'label' => 'Blur Images During Loading',
		'description' => 'Cards and heros load a small blurred image first, then swap to the full image when in view.',
	));

	$customizer->add_setting('church_blur_images_transition', array(
		'type' => 'option',
		'default' => 0.3,
		// printed raw into CSS, so keep it a non-negative number to a tenth of a second
		'sanitize_callback' => function ($value) {
			return round(abs((float) $value), 1);
		},
	));
	$customizer->add_control('church_blur_images_transition', array(
		'type' => 'number',
		'section' => 'church_images_section',
		'label' => 'Blur Transition Time (seconds)',
		'description' => 'How long the blur takes to fade once the full image loads.',
		'input_attrs' => array(
			'min' => 0,
			'max' => 5,
			'step' => 0.1,
		),
	));
});
