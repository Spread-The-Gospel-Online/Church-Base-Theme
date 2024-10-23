<?php

function church_get_as_rgba ($color, $opacity = 1) {
	$option_name = get_option($color);
	$hex_value = church_get_option_from_var_name($option_name);
	list($r, $g, $b) = sscanf($hex_value, "#%02x%02x%02x");
	return sprintf('rgba(%s,%s,%s,%s)', $r, $g, $b, $opacity);
}

function church_get_higher_contrast ($color_one, $color_two) {
	$R1 = hexdec(substr($color_one, 1, 2)) / 255;
	$G1 = hexdec(substr($color_one, 3, 2)) / 255;
	$B1 = hexdec(substr($color_one, 5, 2)) / 255;
	$R2 = hexdec(substr($color_two, 1, 2)) / 255;
	$G2 = hexdec(substr($color_two, 3, 2)) / 255;
	$B2 = hexdec(substr($color_two, 5, 2)) / 255;
	return max($R1,$R2) - min($R1,$R2) +
           max($G1,$G2) - min($G1,$G2) +
		   max($B1,$B2) - min($B1,$B2);
}

function church_get_best_contrast ($background, $color_one, $color_two) {
	$contrast_for_one = church_get_higher_contrast($background, $color_one);
	$contrast_for_two = church_get_higher_contrast($background, $color_two);
	return $contrast_for_one > $contrast_for_two ? $color_one : $color_two;
}

function church_get_option_from_var_name ($option_name) {
	$option_name = str_replace('--', 'css_color_', $option_name);
	return get_option($option_name);
}

function church_get_best_contrast_option ($background_option, $color_one_option, $color_two_option) {
	$background = church_get_option_from_var_name(get_option($background_option));
	$color_one = get_option($color_one_option);
	$color_two = get_option($color_two_option);
	$best_contrast = church_get_best_contrast($background, $color_one, $color_two);
	$best_contrast_option = $best_contrast == $color_one ? $color_one_option : $color_two_option;
	return str_replace('css_color_', '--', $best_contrast_option);
}

function church_register_color_setting ($customizer, $option_id, $label, $default, $section) {
	$default_color = get_option($option_id);
	
	if (!$default_color) {
		update_option($option_id, $default);
		$hero_default_color = $default;
	}

	$customizer->add_setting($option_id, array(
		'type' => 'option',
		'default' => $default_color,
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$customizer->add_control(new WP_Customize_Color_Control(
    	$customizer,
		$option_id,
		array(
			'label' => $label,
			'section' => $section,
			'settings' => $option_id
		)
    ));
}