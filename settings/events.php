<?php

add_action( 'customize_register', function ($customizer) {
	$customizer->add_section('church_events_section', array(
		'title' => 'Events Settings',
		'priority' => 200,
		'capability' => 'edit_theme_options'
	));


	$customizer->add_setting('events_section_colors', array());
	$customizer->add_control(new Sub_Section_Heading_Custom_Control( 
		$customizer, 'events_section_colors',
        array(
            'label' => 'Events Section Colors',
            'section' => 'church_events_section',
        )
    ));
	
});