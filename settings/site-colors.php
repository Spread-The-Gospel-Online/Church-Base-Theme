<?php

add_action( 'customize_register', function ($customizer) {
	$customizer->add_section('church_colors', array(
		'title' => 'Site Colors',
		'description' => 'Settings for site colors',
		'priority' => 29,
		'capability' => 'edit_theme_options'
	));


	// ------- BASE COLORS -------
	$colors = array(
		array( 'slug' => 'primary', 'label' => 'Primary', 'default' => '#DD6644' ),
		array( 'slug' => 'primary-hover', 'label' => 'Primary (Hover)', 'default' => '#DD6644' ),
		array( 'slug' => 'secondary', 'label' => 'Secondary', 'default' => '#66DD44' ),
		array( 'slug' => 'secondary-hover', 'label' => 'Secondary (Hover)', 'default' => '#66DD44' ),
		array( 'slug' => 'tertiary', 'label' => 'Tertiary', 'default' => '#66DD44' ),
		array( 'slug' => 'tertiary-hover', 'label' => 'Tertiary (Hover)', 'default' => '#66DD44' ),
		array( 'slug' => 'white', 'label' => 'White', 'default' => '#FFFFFF' ),
		array( 'slug' => 'off-white', 'label' => 'Off White', 'default' => '#FFDDBC' ),
		array( 'slug' => 'grey-one', 'label' => 'Grey One', 'default' => '#D1D1D1' ),
		array( 'slug' => 'grey-two', 'label' => 'Grey Two', 'default' => '#AAAAAA' ),
		array( 'slug' => 'grey-three', 'label' => 'Grey Three', 'default' => '#7F7F7F' ),
		array( 'slug' => 'grey-four', 'label' => 'Grey Four', 'default' => '#494949' ),
		array( 'slug' => 'black', 'label' => 'Black', 'default' => '#000000' ),
		array( 'slug' => 'link', 'label' => 'Links', 'default' => '#0000EE' ),
		array( 'slug' => 'link_hover', 'label' => 'Links (Hover)', 'default' => '#0000EE' ),
	);

	foreach ($colors as $color) {
		// Set item in options if it doesn't exist
		$option_value = get_option('css_color_' . $color['slug']);
		if (!$option_value) {
			update_option('css_color_' . $color['slug'], $color['default']);
		}

		// register option setting
		$setting_key = 'css_color_' . $color['slug'];
		church_register_color_setting($customizer, $setting_key, $color['label'], $color['default'], 'church_colors');
	}


	// ------- COLOR OPTIONS USING BASE COLORS-------
	$color_selectors = array(
		array(
			'id' => 'header_background',
			'default' => '--primary',
			'label' => 'Header Background', 
			'section' => 'church_header_section'
		),
		array(
			'id' => 'header_link_text',
			'default' => '--white',
			'label' => 'Menu Text',
			'section' => 'church_header_section'
		),
		array(
			'id' => 'header_link_text_hover',
			'default' => '--off-white',
			'label' => 'Menu Text (Hover)',
			'section' => 'church_header_section'
		),
		array(
			'id' => 'submenu_background',
			'default' => '--white',
			'label' => 'Submenu Background',
			'section' => 'church_header_section'
		),
		array(
			'id' => 'submenu_text',
			'default' => '--primary',
			'label' => 'Submenu Text',
			'section' => 'church_header_section'
		),
		array(
			'id' => 'submenu_text_hover',
			'default' => '--primary-hover',
			'label' => 'Submenu Text (Hover)',
			'section' => 'church_header_section'
		),
		array(
			'id' => 'breadcrumbs_background',
			'default' => '--secondary',
			'label' => 'Breadcrumbs Background',
			'section' => 'church_breadcrumbs_section'
		),
		array(
			'id' => 'breadcrumbs_text',
			'default' => '--white',
			'label' => 'Breadcrumbs Text', 
			'section' => 'church_breadcrumbs_section'
		),
		array(
			'id' => 'breadcrumbs_text_hover',
			'default' => '--off-white',
			'label' => 'Breadcrumbs Text (Hover)', 
			'section' => 'church_breadcrumbs_section'
		),
		array(
			'id' => 'hero_text_color',
			'default' => '--off-white',
			'label' => 'Hero Text', 
			'section' => 'church_hero_section'
		),
		array(
			'id' => 'hero_background_color',
			'default' => '--black',
			'label' => 'Hero Background', 
			'section' => 'church_hero_section'
		),
		array(
			'id' => 'card_overlay',
			'default' => '--black',
			'label' => 'Card Image Overlay'
		),
		array(
			'id' => 'footer_background',
			'default' => '--primary',
			'label' => 'Footer Background',
			'section' => 'church_footer_section'
		),
		array(
			'id' => 'footer_text',
			'default' => '--white',
			'label' => 'Footer Text',
			'section' => 'church_footer_section'
		),
		array(
			'id' => 'copyright_background',
			'default' => '--black',
			'label' => 'Copyright Background',
			'section' => 'church_footer_section'
		),
		array(
			'id' => 'copyright_text',
			'default' => '--grey-four',
			'label' => 'Copyright Text',
			'section' => 'church_footer_section'
		),
	);

	$color_options = array();
	foreach ($colors as $color) {
		$key = '--' . $color['slug'];
		$color_options[$key] = $color['label'];
	}

	foreach ($color_selectors as $color) {
		$color_id = 'css_' . $color['id'];
		$section_id = isset($color['section']) ? $color['section'] : 'church_colors';

		if (!get_option($color_id)) {
			update_option($color_id, $color['default']);
		}
		$customizer->add_setting($color_id, array(
			'type' => 'option',
			'default' => $color['default'],
			'sanitize_callback' => 'sanitize_text_field',
		));
		$customizer->add_control($color_id, array(
			'type' => 'select',
			'choices' => $color_options,
			'section' => $section_id,
			'label' => $color['label'],
		));
	}
});