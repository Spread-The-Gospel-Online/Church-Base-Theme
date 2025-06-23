<?php

add_action('init', function () {
	if (!get_option('church_footer_display_copyright')) {
		update_option('church_footer_display_copyright', 'true');
	}
	
	if (!get_option('church_footer_pattern')) {
		update_option('church_footer_pattern', 'false');
	}
});

add_action('customize_register', function ($customizer) {
	$customizer->add_section('church_footer_section', array(
		'title' => 'Footer Settings',
		'priority' => 300,
		'capability' => 'edit_theme_options'
	));


	$patterns = church_get_all_patterns_for_customizer();
	$customizer->add_setting('church_footer_pattern', array(
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$customizer->add_control('church_footer_pattern', array( 
		'type' => 'select',
		'choices' => $patterns,
		'section' => 'church_footer_section',
		'label' => 'Footer Pattern',
	));

	$customizer->add_setting('church_footer_pattern_width', array(
		'type' => 'option',
		'default' => 25,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_footer_pattern_width', array(
		'type' => 'number',
		'section' => 'church_footer_section',
		'label' => 'Footer Pattern Width',
		'validate' => 'numeric',
		'default'  => 25,
		'input_attrs' => array(
			'min' => 10,
			'max' => 50,
			'step' => 1,
		),
	));


	$customizer->add_setting('church_footer_padding', array(
		'type' => 'option',
		'default' => 48,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_footer_padding', array(
		'type' => 'number',
		'section' => 'church_footer_section',
		'label' => 'Footer Vertical Padding',
		'validate' => 'numeric',
		'default'  => 48,
		'input_attrs' => array(
			'min' => 10,
			'max' => 100,
			'step' => 2,
		),
	));


	// Footer Copyright
	$customizer->add_setting('church_footer_display_copyright', array(
		'type' => 'option',
		'default' => 'yes',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_footer_display_copyright', array(
		'type' => 'select',
		'choices' => array(
			'true' => 'Yes',
			'false' => 'No'
		),
		'section' => 'church_footer_section',
		'label' => 'Display Copyright',
	));

	$customizer->add_setting('copyright_text', array(
		'type' => 'option',
		'default' => 'Copyright @ YYYY',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('copyright_text', array(
		'type' => 'text',
		'section' => 'church_footer_section',
		'label' => 'Copyright Text',
		'description' => 'Add "YYYY" to display the current year'
	));

	// Social settings

	$customizer->add_setting('social_link_facebook', array(
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('social_link_facebook', array(
		'type' => 'text',
		'section' => 'church_footer_section',
		'label' => 'Facebook Profile URL'
	));

	$customizer->add_setting('social_link_twitter', array(
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('social_link_twitter', array(
		'type' => 'text',
		'section' => 'church_footer_section',
		'label' => 'Twitter Profile URL'
	));

	$customizer->add_setting('social_link_instagram', array(
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('social_link_instagram', array(
		'type' => 'text',
		'section' => 'church_footer_section',
		'label' => 'Instagram Profile URL'
	));

	// Colors

	$customizer->add_setting('footer_section_colors', array());
	$customizer->add_control(new Sub_Section_Heading_Custom_Control( 
		$customizer, 'footer_section_colors',
		array(
			'label' => 'Footer Section Colors',
			'section' => 'church_footer_section',
			'priority' => 300,
		)
	));
});

add_action('customize_controls_enqueue_scripts', function ($customizer) {
	// add conditionals for if we're using a pattern for card contents or not
	church_add_script_conditional('church_footer_display_copyright', 'copyright_text', 'show_on', 'true');
});