<?php

add_action('init', function () {
	if (!get_option('church_sermon_contents_pattern')) {
    	update_option('church_sermon_contents_pattern', 'false');
    }
});

add_action( 'customize_register', function ($customizer) {
	$customizer->add_section('church_sermon_styles', array(
		'title' => 'Sermon Page Styles',
		'priority' => 125,
		'capability' => 'edit_theme_options'
	));


	$customizer->add_setting('church_sermon_default_image', array(
		'type' => 'option',
	));
    $customizer->add_control(new WP_Customize_Image_Control(
		$customizer,
		'church_sermon_default_image',
		array(
			'label' => 'Default Sermon Image',
			'section' => 'church_sermon_styles',
			'settings' => 'church_sermon_default_image',
       )
    ));


    $patterns = church_get_all_patterns_for_customizer();
	$customizer->add_setting('church_sermon_contents_pattern', array(
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$customizer->add_control('church_sermon_contents_pattern', array( 
		'type' => 'select',
		'choices' => $patterns,
        'section' => 'church_sermon_styles',
        'label' => 'Sermon Contents Pattern',
    ));


    $customizer->add_setting('church_sermon_content_grid_size', array(
		'type' => 'option',
		'default' => 2,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_sermon_content_grid_size', array(
		'type' => 'number',
		'section' => 'church_sermon_styles',
		'label' => 'Sermon Content Grid Size',
		'description' => 'Audio card will always be full width',
		'validate' => 'numeric',
        'default'  => 2,
        'input_attrs' => array(
            'min' => 1,
            'max' => 4,
            'step' => 1,
        ),
	));


	$customizer->add_setting('church_sermon_content_width', array(
		'type' => 'option',
		'default' => 800,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_sermon_content_width', array(
		'type' => 'number',
		'section' => 'church_sermon_styles',
		'label' => 'Sermon Content Grid Width',
		'validate' => 'numeric',
        'default'  => 800,
        'input_attrs' => array(
            'min' => 1,
            'max' => 1200,
            'step' => 1,
        ),
	));


	$customizer->add_setting('church_sermons_card_order', array(
		'type' => 'option',
		'sanitize_callback' => array('Drag_And_Drop_Custom_Control', 'validate_drag_and_drop')
	));
	$customizer->add_control(new Drag_And_Drop_Custom_Control( 
		$customizer, 'church_sermons_card_order',
        array(
            'section' => 'church_sermon_styles',
            'label' => 'Sermon Contents Order',
            'choices' => array(
            	array('label' => 'Date', 'value' => 'date'),
            	array('label' => 'Pastor', 'value' => 'pastor'),
            	array('label' => 'Series', 'value' => 'sermon-series'),
            	array('label' => 'Passage', 'value' => 'passage'),
            )
        )
    ));

    $customizer->add_setting('sermon_section_colors', array());
	$customizer->add_control(new Sub_Section_Heading_Custom_Control( 
		$customizer, 'sermon_section_colors',
        array(
            'label' => 'Sermon Section Colors',
            'section' => 'church_sermon_styles',
        )
    ));
});


add_action('customize_controls_enqueue_scripts', function ($customizer) {
    church_add_script_conditional('church_archive_card_pattern', 'church_archive_card_order', 'show_on', 'false');
    
});