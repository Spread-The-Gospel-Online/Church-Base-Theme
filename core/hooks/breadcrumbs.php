<?php

function church_display_breadcrumbs ($steps, $extra_classes = '') {
	$steps = $steps ? $steps : apply_filters('breadcrumbs_steps', array());
	util_render_snippet('common/breadcrumbs', array(
		'steps' => $steps,
		'extra_classes' => $extra_classes
	), false);
}

add_action('breadcrumbs_hero', function ($steps = false) {
	$breadcrumbs_position = get_option('display_breadcrumbs');
	if (in_array($breadcrumbs_position, array('top', 'bottom'))) {
		church_display_breadcrumbs($steps, 'breadcrumbs--hero breadcrumbs--hero-' . $breadcrumbs_position);
	}
});


add_action('breadcrumbs_below', function ($steps = false) {
	$breadcrumbs_position = get_option('display_breadcrumbs');
	if ($breadcrumbs_position == 'below') {
		church_display_breadcrumbs($steps);
	}
});

add_action('breadcrumbs_above', function ($steps = false) {
	$breadcrumbs_position = get_option('display_breadcrumbs');
	if ($breadcrumbs_position == 'above') {
		church_display_breadcrumbs($steps);
	}
});