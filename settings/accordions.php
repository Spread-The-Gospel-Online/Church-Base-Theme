<?php

add_action('customize_register', function ($customizer) {
	$customizer->add_section('church_accordions_section', array(
		'title' => 'Accordion Settings',
		'priority' => 200,
		'capability' => 'edit_theme_options'
	));

	$customizer->add_setting('church_accordion_border_width', array(
		'type' => 'option',
		'default' => 'small',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_accordion_border_width', array(
		'type' => 'select',
		'choices' => array(
			'none' => 'None',
			'small' => 'Small',
			'medium' => 'Medium',
			'wide' => 'Wide',
		),
		'section' => 'church_accordions_section',
		'label' => 'Accordion Border Width',
	));

	$customizer->add_setting('church_accordion_title_size', array(
		'type' => 'option',
		'default' => 1,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_accordion_title_size', array(
		'type' => 'number',
		'section' => 'church_accordions_section',
		'label' => 'Accordion Title Text Size',
		'validate' => 'numeric',
		'default' => 1,
		'input_attrs' => array(
			'min' => 0.5,
			'max' => 4,
			'step' => 0.1,
		),
	));

	$customizer->add_setting('church_accordions_section_colors', array());
	$customizer->add_control(new Sub_Section_Heading_Custom_Control(
		$customizer, 'church_accordions_section_colors',
		array(
			'label' => 'Accordion Colors',
			'section' => 'church_accordions_section',
			'priority' => 300,
		)
	));
});
