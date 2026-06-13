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
		'default' => 'text-large',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_accordion_title_size', array(
		'type' => 'select',
		'choices' => array(
			'h1' => 'Heading 1',
			'h2' => 'Heading 2',
			'h3' => 'Heading 3',
			'h4' => 'Heading 4',
			'h5' => 'Heading 5',
			'text-large' => 'Large Text',
			'text-normal' => 'Normal Text',
			'text-small' => 'Small Text',
		),
		'section' => 'church_accordions_section',
		'label' => 'Accordion Title Style',
	));

	$customizer->add_setting('church_accordion_title_padding', array(
		'type' => 'option',
		'default' => 'small',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_accordion_title_padding', array(
		'type' => 'select',
		'choices' => array(
			'small' => 'Small',
			'medium' => 'Medium',
			'large' => 'Large',
		),
		'section' => 'church_accordions_section',
		'label' => 'Accordion Title Padding',
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
