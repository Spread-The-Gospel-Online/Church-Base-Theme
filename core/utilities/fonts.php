<?php

// Font assignments (font_general, font_headings, ...) store the *name* of a font-family rule
// option. Only real rule options are followed, so an assignment can never be pointed at an
// unrelated option and print its value into the public CSS.
function church_get_font_rule_option_name ($assignment_option_name) {
	$rule_option_name = get_option($assignment_option_name);
	if (!is_string($rule_option_name) || preg_match('/^font_family_[a-z]+_rule$/', $rule_option_name) !== 1) {
		return 'font_family_one_rule';
	}
	return $rule_option_name;
}

function util_get_fonts () {
	$query_string = [];

	$fonts = array(church_get_font_rule_option_name('font_general'));
	if (church_get_font_rule_option_name('font_headings') != $fonts[0]) {
		$fonts[] = church_get_font_rule_option_name('font_headings');
	}

	foreach ($fonts as $font) {
		$font_load_param = str_replace('_rule', '', $font);
		$query_string[] = 'family=' . get_option($font_load_param);
	}

	return implode('&', $query_string);
}

function get_font_var ($option_name) {
	$font_family = get_option(church_get_font_rule_option_name($option_name));
	if (!$font_family) {
		$font_family = get_option(church_get_font_rule_option_name('font_general'));
	}
	return $font_family;
}
