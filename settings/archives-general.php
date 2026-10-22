<?php

// set our defaults for our settings.
add_action('init', function () {
	if (!get_option('church_general_archive_grid_tablet_size')) {
		update_option('church_general_archive_grid_tablet_size', 2);
	}

	if (!get_option('church_general_archive_grid_size')) {
		update_option('church_general_archive_grid_size', 2);
	}

	if (!get_option('church_general_archive_card_pattern')) {
		update_option('church_general_archive_card_pattern', 'false');
	}
});

add_action('customize_register', function ($customizer) {
	$customizer->add_section('church_general_archive_styles', array(
		'title' => 'General Archive',
		'description' => 'Settings for general archive grids and cards',
		'priority' => 121,
		'capability' => 'edit_theme_options'
	));


	$customizer->add_setting('church_general_archive_grid_heading', array());
	$customizer->add_control(new Sub_Section_Heading_Custom_Control(
		$customizer, 'church_general_archive_grid_heading',
		array(
			'label' => 'Archive Grid',
			'section' => 'church_general_archive_styles',
		)
	));

	$customizer->add_setting('church_general_archive_grid_tablet_size', array(
		'type' => 'option',
		'default' => 2,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_general_archive_grid_tablet_size', array(
		'type' => 'number',
		'section' => 'church_general_archive_styles',
		'label' => 'Grid Size (Tablet)',
		'validate' => 'numeric',
		'default' => 2,
		'input_attrs' => array(
			'min' => 1,
			'max' => 3,
			'step' => 1,
		),
	));

	$customizer->add_setting('church_general_archive_grid_size', array(
		'type' => 'option',
		'default' => 2,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_general_archive_grid_size', array(
		'type' => 'number',
		'section' => 'church_general_archive_styles',
		'label' => 'Grid Size (Desktop)',
		'validate' => 'numeric',
		'default' => 2,
		'input_attrs' => array(
			'min' => 1,
			'max' => 4,
			'step' => 1,
		),
	));

	$customizer->add_setting('church_general_default_image', array(
		'type' => 'option',
	));
	$customizer->add_control(new WP_Customize_Image_Control(
		$customizer,
		'church_general_default_image',
		array(
			'label' => 'Default Card Image',
			'description' => 'Used when a post has no featured image.',
			'section' => 'church_general_archive_styles',
			'settings' => 'church_general_default_image',
		)
	));

	$customizer->add_setting('church_general_archive_card_pattern_header', array());
	$customizer->add_control(new Sub_Section_Heading_Custom_Control(
		$customizer, 'church_general_archive_card_pattern_header',
		array(
			'label' => 'Card Pattern',
			'description' => 'When a pattern is selected, all styles are set in the pattern, not the settings below.',
			'section' => 'church_general_archive_styles',
		)
	));

	$patterns = church_get_all_patterns_for_customizer();
	$customizer->add_setting('church_general_archive_card_pattern', array(
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$customizer->add_control('church_general_archive_card_pattern', array(
		'type' => 'select',
		'choices' => $patterns,
		'section' => 'church_general_archive_styles',
		'label' => 'Card Contents Pattern',
	));

	$customizer->add_setting('church_general_archive_section_card_header', array());
	$customizer->add_control(new Sub_Section_Heading_Custom_Control(
		$customizer, 'church_general_archive_section_card_header',
		array(
			'label' => 'Archive Card Settings',
			'description' => 'These settings only apply when no Card Contents Pattern is selected.',
			'section' => 'church_general_archive_styles',
		)
	));

	$customizer->add_setting('church_general_card_content_item_padding', array(
		'type' => 'option',
		'default' => 10,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_general_card_content_item_padding', array(
		'type' => 'number',
		'section' => 'church_general_archive_styles',
		'label' => 'Card Content Item Padding',
		'validate' => 'numeric',
		'default' => 10,
		'input_attrs' => array(
			'min' => 0,
			'max' => 20,
			'step' => 1,
		),
	));

	$customizer->add_setting('church_general_card_content_item_gap', array(
		'type' => 'option',
		'default' => 10,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_general_card_content_item_gap', array(
		'type' => 'number',
		'section' => 'church_general_archive_styles',
		'label' => 'Card Content Items Gap',
		'validate' => 'numeric',
		'default' => 10,
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$customizer->add_setting('church_general_card_content_position', array(
		'type' => 'option',
		'default' => 'below',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_general_card_content_position', array(
		'type' => 'select',
		'choices' => array(
			'below' => 'Below image',
			'on_top' => 'On top of image'
		),
		'section' => 'church_general_archive_styles',
		'label' => 'Card Content Position',
	));

	$customizer->add_setting('church_general_card_content_text_align', array(
		'type' => 'option',
		'default' => 'left',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_general_card_content_text_align', array(
		'type' => 'select',
		'choices' => array(
			'left' => 'Left',
			'center' => 'Center',
			'right' => 'Right'
		),
		'section' => 'church_general_archive_styles',
		'label' => 'Card Content Text Align',
	));

	$customizer->add_setting('church_general_card_background_opacity', array(
		'type' => 'option',
		'default' => 0.5,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_general_card_background_opacity', array(
		'type' => 'number',
		'section' => 'church_general_archive_styles',
		'label' => 'Card Text Content Background Opacity',
		'validate' => 'numeric',
		'default' => 0.5,
		'input_attrs' => array(
			'min' => 0,
			'max' => 1,
			'step' => 0.05,
		),
	));

	// CARD STYLES
	$customizer->add_setting('church_general_card_overlay_opacity', array(
		'type' => 'option',
		'default' => 0.5,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_general_card_overlay_opacity', array(
		'type' => 'number',
		'section' => 'church_general_archive_styles',
		'label' => 'Card Image Overlay Opacity',
		'validate' => 'numeric',
		'default' => 0.5,
		'input_attrs' => array(
			'min' => 0,
			'max' => 1,
			'step' => 0.05,
		),
	));

	$customizer->add_setting('church_general_card_overlay_opacity_hover', array(
		'type' => 'option',
		'default' => 0.5,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_general_card_overlay_opacity_hover', array(
		'type' => 'number',
		'section' => 'church_general_archive_styles',
		'label' => 'Card Image Overlay Opacity (Hover)',
		'validate' => 'numeric',
		'default' => 0.5,
		'input_attrs' => array(
			'min' => 0,
			'max' => 1,
			'step' => 0.05,
		),
	));

	// Card Height
	$customizer->add_setting('church_general_archive_card_height', array(
		'type' => 'option',
		'default' => 50,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_general_archive_card_height', array(
		'type' => 'number',
		'section' => 'church_general_archive_styles',
		'label' => 'Card Aspect Ratio (Height)',
		'validate' => 'numeric',
		'default' => 50,
		'input_attrs' => array(
			'min' => 10,
			'max' => 100,
			'step' => 1,
		),
	));

	// Color controls for this section are registered in site-colors.php (priority 301+).
	$customizer->add_setting('church_general_archive_section_colors', array());
	$customizer->add_control(new Sub_Section_Heading_Custom_Control(
		$customizer, 'church_general_archive_section_colors',
		array(
			'label' => 'Archive Section Colors',
			'description' => 'These colors only apply when no Card Contents Pattern is selected.',
			'section' => 'church_general_archive_styles',
			'priority' => 300,
		)
	));
});


add_action('customize_controls_enqueue_scripts', function ($customizer) {
	// add conditionals for if we're using a pattern for card contents or not
	church_add_script_conditional('church_general_archive_card_pattern', 'church_general_card_content_text_align', 'show_on', 'false');
	church_add_script_conditional('church_general_archive_card_pattern', 'church_general_card_content_item_gap', 'show_on', 'false');
});
