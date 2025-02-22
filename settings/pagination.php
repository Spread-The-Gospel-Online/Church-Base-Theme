<?php

add_action( 'customize_register', function ($customizer) {
	$customizer->add_section('church_pagination_styles', array(
		'title' => 'Pagination Styles',
		'description' => 'Settings for pagination grids',
		'priority' => 125,
		'capability' => 'edit_theme_options'
	));


	




    $customizer->add_setting('pagination_section_colors', array());
	$customizer->add_control(new Sub_Section_Heading_Custom_Control( 
		$customizer, 'pagination_section_colors',
        array(
            'label' => 'Pagination Section Colors',
            'section' => 'church_pagination_styles',
        )
    ));

});