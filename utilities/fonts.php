<?php

function util_get_fonts() {
	$query_string = [];

	$font_one = get_option('font_family_one');

	if (isset($font_one) && $font_one != '') {
		$query_string[] = 'family=' . $font_one;
	}

	return implode('&', $query_string);
}