<?php

const BASE_SITE_COLOR_OPTIONS = array(
	array('slug' => 'primary-100', 'name' => 'Primary 100', 'color' => '#16271C'),
	array('slug' => 'primary-200', 'name' => 'Primary 200', 'color' => '#1F3327'),
	array('slug' => 'primary-300', 'name' => 'Primary 300', 'color' => '#2B4736'),
	array('slug' => 'primary-400', 'name' => 'Primary 400', 'color' => '#4A6E55'),
	array('slug' => 'secondary-100', 'name' => 'Secondary 100', 'color' => '#7F9B86'),
	array('slug' => 'secondary-200', 'name' => 'Secondary 200', 'color' => '#A8BEAE'),
	array('slug' => 'secondary-300', 'name' => 'Secondary 300', 'color' => '#CDDBD0'),
	array('slug' => 'secondary-400', 'name' => 'Secondary 400', 'color' => '#E4ECE4'),
	array('slug' => 'accent', 'name' => 'Accent', 'color' => '#A8854A'),
	array('slug' => 'white', 'name' => 'White', 'color' => '#FFFFFF'),
	array('slug' => 'off-white', 'name' => 'Off White', 'color' => '#EEEEEE'),
	array('slug' => 'grey-one', 'name' => 'Grey One', 'color' => '#D1D1D1'),
	array('slug' => 'grey-two', 'name' => 'Grey Two', 'color' => '#AAAAAA'),
	array('slug' => 'grey-three', 'name' => 'Grey Three', 'color' => '#7F7F7F'),
	array('slug' => 'grey-four', 'name' => 'Grey Four', 'color' => '#494949'),
	array('slug' => 'black', 'name' => 'Black', 'color' => '#000000'),
	array('slug' => 'ada-outline', 'name' => 'ADA Outlines', 'color' => '#87CEEB'),
);

add_action('customize_register', function ($customizer) {
	$customizer->add_section('church_colors', array(
		'title' => 'Site Colors',
		'description' => 'Settings for site colors',
		'priority' => 29,
		'capability' => 'edit_theme_options'
	));


	// ------- BASE COLORS -------
	$colors = BASE_SITE_COLOR_OPTIONS;

	foreach ($colors as $color) {
		// Set item in options if it doesn't exist
		$option_value = get_option('css_color_' . $color['slug']);
		if (!$option_value) {
			update_option('css_color_' . $color['slug'], $color['color']);
		}

		// register option setting
		$setting_key = 'css_color_' . $color['slug'];
		church_register_color_setting($customizer, $setting_key, $color['name'], $color['color'], 'church_colors');
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
			'default' => '--off-white',
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
			'default' => '--primary-200',
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
			'label' => 'Card Image Overlay',
			'section' => 'church_archive_styles'
		),
		array(
			'id' => 'card_contents_background',
			'default' => '--white',
			'label' => 'Card Content Background',
			'section' => 'church_archive_styles'
		),
		array(
			'id' => 'card_contents_text',
			'default' => '--black',
			'label' => 'Card Content Text Color',
			'section' => 'church_archive_styles'
		),
		array(
			'id' => 'card_contents_links',
			'default' => '--primary-100',
			'label' => 'Card Content Link Color',
			'section' => 'church_archive_styles'
		),
		array(
			'id' => 'card_contents_links_hover',
			'default' => '--accent',
			'label' => 'Card Content Link Color (Hover)',
			'section' => 'church_archive_styles'
		),
		array(
			'id' => 'calendar_header_background',
			'default' => '--secondary',
			'label' => 'Calendar Header Background',
			'section' => 'church_events_section'
		),
		array(
			'id' => 'calendar_header_text',
			'default' => '--white',
			'label' => 'Calendar Header Background',
			'section' => 'church_events_section'
		),
		array(
			'id' => 'calendar_outline',
			'default' => '--black',
			'label' => 'Calendar Outline',
			'section' => 'church_events_section'
		),
		array(
			'id' => 'calendar_background_one',
			'default' => '--white',
			'label' => 'Calendar Background One',
			'section' => 'church_events_section'
		),
		array(
			'id' => 'calendar_background_two',
			'default' => '--off-white',
			'label' => 'Calendar Background Two',
			'section' => 'church_events_section'
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
		array(
			'id' => 'pagination_interactive',
			'default' => '--primary',
			'label' => 'Pagination Link Color',
			'section' => 'church_pagination_styles'
		),
		array(
			'id' => 'pagination_interactive_hover',
			'default' => '--primary-200',
			'label' => 'Pagination Link Color (Hover)',
			'section' => 'church_pagination_styles'
		),
		array(
			'id' => 'pagination_interactive_background',
			'default' => '--white',
			'label' => 'Pagination Link Background',
			'section' => 'church_pagination_styles'
		),
		array(
			'id' => 'pagination_current',
			'default' => '--black',
			'label' => 'Pagination Current Page Color',
			'section' => 'church_pagination_styles'
		),
		array(
			'id' => 'download_bg',
			'default' => '--grey-one',
			'label' => 'Sermon Download Background Color',
			'section' => 'church_sermon_styles'
		),
		array(
			'id' => 'download_bg_hover',
			'default' => '--grey-one',
			'label' => 'Sermon Download Background Hover Color',
			'section' => 'church_sermon_styles'
		),
		array(
			'id' => 'download_text',
			'default' => '--primary-100',
			'label' => 'Sermon Download Text Color',
			'section' => 'church_sermon_styles'
		),
		array(
			'id' => 'download_text_hover',
			'default' => '--accent',
			'label' => 'Sermon Download Text Hover Color',
			'section' => 'church_sermon_styles'
		),
		array(
			'id' => 'label_color',
			'default' => '--black',
			'label' => 'Label Text',
			'section' => 'church_forms_section'
		),
		array(
			'id' => 'input_border',
			'default' => '--black',
			'label' => 'Input Border',
			'section' => 'church_forms_section'
		),
		array(
			'id' => 'input_background',
			'default' => '--transparent',
			'label' => 'Input Background',
			'section' => 'church_forms_section'
		),
		array(
			'id' => 'input_background_hover',
			'default' => '--off-white',
			'label' => 'Input Background - Hover',
			'section' => 'church_forms_section'
		),
		array(
			'id' => 'input_background_active',
			'default' => '--transparent',
			'label' => 'Input Background - Active',
			'section' => 'church_forms_section'
		),
		array(
			'id' => 'button_background',
			'default' => '--white',
			'label' => 'Button Background',
			'section' => 'church_forms_section'
		),
		array(
			'id' => 'button_background_hover',
			'default' => '--secondary-200',
			'label' => 'Button Background - Hover',
			'section' => 'church_forms_section'
		),
		array(
			'id' => 'button_border',
			'default' => '--secondary',
			'label' => 'Button Border',
			'section' => 'church_forms_section'
		),
		array(
			'id' => 'button_border_hover',
			'default' => '--secondary-200',
			'label' => 'Button Border - Hover',
			'section' => 'church_forms_section'
		),
		array(
			'id' => 'button_text',
			'default' => '--secondary',
			'label' => 'Button Text',
			'section' => 'church_forms_section'
		),
		array(
			'id' => 'button_text_hover',
			'default' => '--white',
			'label' => 'Button Text - Hover',
			'section' => 'church_forms_section'
		),
		array(
			'id' => 'blockquote_background',
			'default' => '--off-white',
			'label' => 'Blockquote Background',
			'section' => 'church_blockquotes_section'
		),
		array(
			'id' => 'blockquote_name',
			'default' => '--grey-four',
			'label' => 'Blockquote Background',
			'section' => 'church_blockquotes_section'
		),
		array(
			'id' => 'links',
			'default' => '--primary-100',
			'label' => 'Link Color',
			'section' => 'church_fonts_section',
			'priority' => 501
		),
		array(
			'id' => 'link_hover',
			'default' => '--accent',
			'label' => 'Link Color (Hover)',
			'section' => 'church_fonts_section',
			'priority' => 502
		),
		array(
			'id' => 'general_content',
			'default' => '--black',
			'label' => 'General Content Color',
			'section' => 'church_fonts_section',
			'priority' => 503
		),
		array(
			'id' => 'accordions_content',
			'default' => '--black',
			'label' => 'Accordion Content Color',
			'section' => 'church_accordions_section',
			'priority' => 301
		),
		array(
			'id' => 'accordions_border',
			'default' => '--black',
			'label' => 'Accordion Border Color',
			'section' => 'church_accordions_section',
			'priority' => 302
		),
		array(
			'id' => 'accordions_open_close',
			'default' => '--primary',
			'label' => 'Accordion Open/Close Color',
			'section' => 'church_accordions_section',
			'priority' => 303
		),
	);

	/* 
		array(
			'id' => '',
			'default' => '--',
			'label' => '',
			'section' => ''
		)
	*/

	$color_options = array();
	foreach ($colors as $color) {
		$key = '--' . $color['slug'];
		$color_options[$key] = $color['name'];
	}
	$color_options['--transparent'] = 'Transparent';

	foreach ($color_selectors as $color) {
		$color_id = 'church_css_' . $color['id'];
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
			'priority' => isset($color['priority']) ? $color['priority'] : 301,
		));
	}
});