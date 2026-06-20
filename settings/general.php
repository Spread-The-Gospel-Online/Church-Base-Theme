<?php

add_action('customize_register', function ($customizer) {
	$customizer->add_section('church_general_section', array(
		'title' => 'General Settings',
		'priority' => 20,
		'capability' => 'edit_theme_options'
	));

	$customizer->add_setting('church_bible_version', array(
		'type' => 'option',
		'default' => 'esv',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_bible_version', array(
		'type' => 'select',
		'choices' => array(
			'asv' => 'American Standard Version',
			'esv' => 'English Standard Version',
			'kjv' => 'King James Version',
			'niv' => 'New International Version',
			'nkjv' => 'New King James Version',
			'ylt' => 'Young Literal Translation'
		),
		'section' => 'church_general_section',
		'label' => 'Bible Version Used',
		'description' => 'Used for the Logos Bible Reference Plugin'
	));

	$customizer->add_setting('church_general_layout_heading', array());
	$customizer->add_control(new Sub_Section_Heading_Custom_Control(
		$customizer, 'church_general_layout_heading',
		array(
			'label' => 'Layout & Behavior',
			'section' => 'church_general_section',
		)
	));

	$customizer->add_setting('church_ccontain_default_size', array(
		'type' => 'option',
		'default' => 1252,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_ccontain_default_size', array(
		'type' => 'number',
		'section' => 'church_general_section',
		'label' => 'Content Width',
		'description' => 'Width is measured in pixels',
		'validate' => 'numeric',
        'default'  => 1252,
        'input_attrs' => array(
            'min' => 20,
            'max' => 1600,
            'step' => 1,
        ),
	));


	$customizer->add_setting('church_page_sidebar_position', array(
		'type' => 'option',
		'default' => 'right',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_page_sidebar_position', array(
		'type' => 'select',
		'choices' => array(
			'left' => 'Left',
			'right' => 'Right',
		),
		'section' => 'church_general_section',
		'label' => 'Page Sidebar Position',
		'description' => 'Position of any sidebar on a page on desktop'
	));


	$customizer->add_setting('church_enable_hero_parallax', array(
		'type' => 'option',
		'default' => 'no',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_enable_hero_parallax', array(
		'type' => 'select',
		'choices' => array(
			'yes' => 'Enable Parallax',
			'no' => 'Disable Parallax',
		),
		'section' => 'church_general_section',
		'label' => 'Image Parallax Effect',
		'description' => 'Will automatically add parallax effect to hero images'
	));


	$customizer->add_setting('church_general_typography', array());
	$customizer->add_control(new Sub_Section_Heading_Custom_Control(
		$customizer, 'church_general_typography',
		array(
			'label' => 'Typography',
			'section' => 'church_general_section',
		)
	));

	$customizer->add_setting('church_general_font_size', array(
		'type' => 'option',
		'default' => 16,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_general_font_size', array(
		'type' => 'number',
		'section' => 'church_general_section',
		'label' => 'Base Font Size',
		'description' => 'Font size is measured in pixels',
		'validate' => 'numeric',
        'default'  => 16,
        'input_attrs' => array(
            'min' => 16,
            'max' => 24,
            'step' => 1,
        ),
	));

	$customizer->add_setting('church_general_spacing', array());
	$customizer->add_control(new Sub_Section_Heading_Custom_Control(
		$customizer, 'church_general_spacing',
		array(
			'label' => 'Theme Spacing',
			'section' => 'church_general_section',
		)
	));

	$customizer->add_setting('church_default_padding_size', array(
		'type' => 'option',
		'default' => 'medium',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_default_padding_size', array(
		'type' => 'select',
		'choices' => array(
			'small' => 'Small',
			'medium' => 'Medium',
			'large' => 'Large',
		),
		'section' => 'church_general_section',
		'label' => 'Default Padding Size',
	));

	$customizer->add_setting('church_padding_scale', array(
		'type' => 'option',
		'default' => 2,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_padding_scale', array(
		'type' => 'number',
		'section' => 'church_general_section',
		'label' => 'Padding Scale',
		'description' => 'Padding sizes are measured in rems',
		'validate' => 'numeric',
        'default'  => 2,
        'input_attrs' => array(
            'min' => 0.5,
            'max' => 6,
            'step' => 0.5,
        ),
	));

	$customizer->add_setting('church_general_border_widths', array());
	$customizer->add_control(new Sub_Section_Heading_Custom_Control( 
		$customizer, 'church_general_border_widths',
        array(
            'label' => 'Border Widths',
            'section' => 'church_general_section',
        )
    ));

    $customizer->add_setting('church_border_width_small', array(
		'type' => 'option',
		'default' => 1,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_border_width_small', array(
		'type' => 'number',
		'section' => 'church_general_section',
		'label' => 'Border Width - Small',
		'description' => 'Border widths are measured in pixels',
		'validate' => 'numeric',
        'default'  => 1,
        'input_attrs' => array(
            'min' => 0,
            'max' => 6,
            'step' => 1,
        ),
	));

	$customizer->add_setting('church_border_width_medium', array(
		'type' => 'option',
		'default' => 2,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_border_width_medium', array(
		'type' => 'number',
		'section' => 'church_general_section',
		'label' => 'Border Width - Medium',
		'description' => 'Border widths are measured in pixels',
		'validate' => 'numeric',
        'default'  => 2,
        'input_attrs' => array(
            'min' => 0,
            'max' => 6,
            'step' => 1,
        ),
	));

	$customizer->add_setting('church_border_width_wide', array(
		'type' => 'option',
		'default' => 3,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_border_width_wide', array(
		'type' => 'number',
		'section' => 'church_general_section',
		'label' => 'Border Width - Wide',
		'description' => 'Border widths are measured in pixels',
		'validate' => 'numeric',
        'default'  => 3,
        'input_attrs' => array(
            'min' => 0,
            'max' => 6,
            'step' => 1,
        ),
	));

	$customizer->add_setting('church_general_border_radii', array());
	$customizer->add_control(new Sub_Section_Heading_Custom_Control(
		$customizer, 'church_general_border_radii',
        array(
            'label' => 'Border Radius',
            'section' => 'church_general_section',
        )
    ));

    $customizer->add_setting('church_border_radius_small', array(
		'type' => 'option',
		'default' => 4,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_border_radius_small', array(
		'type' => 'number',
		'section' => 'church_general_section',
		'label' => 'Border Radius - Small',
		'description' => 'Border radius is measured in pixels',
		'validate' => 'numeric',
        'default'  => 4,
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
            'step' => 1,
        ),
	));

	$customizer->add_setting('church_border_radius_medium', array(
		'type' => 'option',
		'default' => 8,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_border_radius_medium', array(
		'type' => 'number',
		'section' => 'church_general_section',
		'label' => 'Border Radius - Medium',
		'description' => 'Border radius is measured in pixels',
		'validate' => 'numeric',
        'default'  => 8,
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
            'step' => 1,
        ),
	));

	$customizer->add_setting('church_border_radius_large', array(
		'type' => 'option',
		'default' => 16,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_border_radius_large', array(
		'type' => 'number',
		'section' => 'church_general_section',
		'label' => 'Border Radius - Large',
		'description' => 'Border radius is measured in pixels',
		'validate' => 'numeric',
        'default'  => 16,
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
            'step' => 1,
        ),
	));

});