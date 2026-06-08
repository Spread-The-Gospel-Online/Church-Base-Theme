<?php

add_action('customize_register', function ($customizer) {
	$customizer->add_section('church_info_section', array(
		'title' => 'Church Info',
		'priority' => 25,
		'capability' => 'edit_theme_options'
	));

	$customizer->add_setting('church_info_name', array(
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_info_name', array(
		'type' => 'text',
		'section' => 'church_info_section',
		'label' => 'Church Name',
	));

	$customizer->add_setting('church_info_telephone', array(
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_info_telephone', array(
		'type' => 'text',
		'section' => 'church_info_section',
		'label' => 'Telephone',
	));

	$customizer->add_setting('church_info_email', array(
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_info_email', array(
		'type' => 'text',
		'section' => 'church_info_section',
		'label' => 'Email',
	));

	$customizer->add_setting('church_info_address', array(
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_info_address', array(
		'type' => 'text',
		'section' => 'church_info_section',
		'label' => 'Address',
	));
});
