<?php

add_action( 'customize_register', function ($customizer) {
	$customizer->add_section('church_blockquotes_section', array(
		'title' => 'Blockquotes Settings',
		'priority' => 201,
		'capability' => 'edit_theme_options'
	));

	$customizer->add_setting('church_blockquote_max_width', array(
		'type' => 'option',
		'default' => 800,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_blockquote_max_width', array(
		'type' => 'number',
		'section' => 'church_blockquotes_section',
		'label' => 'Blockquote Max Width',
		'validate' => 'numeric',
		'default'  => 800,
		'input_attrs' => array(
			'min' => 300,
			'max' => 1000,
			'step' => 1,
		),
	));

	$customizer->add_setting('blockquotes_section_fonts', array());
	$customizer->add_control(new Sub_Section_Heading_Custom_Control( 
		$customizer, 'blockquotes_section_fonts',
        array(
            'label' => 'Blockquote Fonts',
            'section' => 'church_blockquotes_section',
            'priority' => 200,
        ),
    ));

    $customizer->add_setting('font_blockquotes_quote_size', array(
		'type' => 'option',
		'default' => 4,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('font_blockquotes_quote_size', array(
		'type' => 'number',
		'section' => 'church_blockquotes_section',
		'label' => 'Blockquote Quote Size',
		'validate' => 'numeric',
		'default'  => 4,
		'input_attrs' => array(
			'min' => 1,
			'max' => 10,
			'step' => 0.5,
		),
		'priority' => 202
	));

	$customizer->add_setting('blockquotes_section_colors', array());
	$customizer->add_control(new Sub_Section_Heading_Custom_Control( 
		$customizer, 'blockquotes_section_colors',
        array(
            'label' => 'Blockquote Colors',
            'section' => 'church_blockquotes_section',
            'priority' => 300,
        ),
    ));
});