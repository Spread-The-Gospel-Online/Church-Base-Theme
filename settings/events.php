<?php

add_action('init', function () {
	if (!get_option('church_calendar_border_width')) {
		update_option('church_calendar_border_width', 'small');
	}
});

add_action( 'customize_register', function ($customizer) {
	$customizer->add_section('church_events_section', array(
		'title' => 'Events Settings',
		'priority' => 200,
		'capability' => 'edit_theme_options'
	));


	$customizer->add_setting('church_calendar_border_width', array(
		'type' => 'option',
		'default' => 'small',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_calendar_border_width', array(
		'type' => 'select',
		'choices' => array(
			'none' => 'None',
			'small' => 'Small',
			'medium' => 'Medium',
			'wide' => 'Wide',
		),
		'section' => 'church_events_section',
		'label' => 'Events Calendar Border Width',
	));


	$customizer->add_setting('events_section_colors', array());
	$customizer->add_control(new Sub_Section_Heading_Custom_Control( 
		$customizer, 'events_section_colors',
        array(
            'label' => 'Events Section Colors',
            'section' => 'church_events_section',
            'priority' => 300,
        )
    ));
	
});