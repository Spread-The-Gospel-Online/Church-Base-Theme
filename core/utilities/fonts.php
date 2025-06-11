<?php

function util_get_fonts() {
	$query_string = [];

	$fonts = array(get_option('font_general'));
	if (get_option('font_headings') != get_option('font_general')) {
		$fonts[] = get_option('font_headings');
	}

	foreach ($fonts as $font) {
		$font_load_param = str_replace('_rule', '', $font);
		$query_string[] = 'family=' . get_option($font_load_param);
	}

	return implode('&', $query_string);
}