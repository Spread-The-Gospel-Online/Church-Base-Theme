<?php

add_action( 'customize_register', function ($customizer) {
	$customizer->add_section('church_breadcrumbs_section', array(
		'title' => 'Breadcrumbs Settings',
		'priority' => 105,
		'capability' => 'edit_theme_options'
	));

	if (!get_option('display_breadcrumbs')) {
		update_option('display_breadcrumbs', 'top');
	}

	// ------- BREADCRUMBS -------
	$customizer->add_setting('display_breadcrumbs', array(
		'type' => 'option',
		'default' => 'yes',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('display_breadcrumbs', array(
		'type' => 'select',
		'choices' => array(
			'above' => 'Display breadcrumbs above hero banner',
			'top' => 'Display breadcrumbs at the top of the hero banner',
			'bottom' => 'Display breadcrumbs at the bottom of the hero banner',
			'below' => 'Display breadcrumbs beneath hero banner',
			'no' => 'No, do not display'
		),
		'section' => 'church_breadcrumbs_section',
		'label' => 'Breadcrumbs',
	));

	$customizer->add_setting('breadcrumbs_default_opacity', array(
		'type' => 'option',
		'default' => 0.5,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('breadcrumbs_default_opacity', array(
		'type' => 'number',
		'section' => 'church_breadcrumbs_section',
		'label' => 'Breadcrumbs Background Opacity',
		'validate' => 'numeric',
        'default'  => 0.5,
        'input_attrs' => array(
            'min' => 0,
            'max' => 1,
            'step' => 0.05,
        )
	));
	
	$customizer->add_setting('breadcrumbs_section_colors', array());
	$customizer->add_control(new Sub_Section_Heading_Custom_Control( 
		$customizer, 'breadcrumbs_section_colors',
        array(
            'label' => 'Breadcrumbs Section Colors',
            'section' => 'church_breadcrumbs_section',
            'priority' => 300,
        )
    ));
});