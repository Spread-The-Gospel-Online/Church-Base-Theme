<?php

function church_display_layouts_section ($section_position) {
	$layouts = get_posts([
		'post_type' => 'layouts',
		'post_status' => 'publish',
		'numberposts' => -1,
		'meta_key' => 'page_section',
		'meta_value' => $section_position
	]);

	foreach ($layouts as $layout) {
		$layout_templates = get_post_meta($layout->ID, 'layout_templates', true);
		$layout_types = get_post_meta($layout->ID, 'layout_types', true);
		$current_type = get_post_type();

		if (is_front_page() && !str_contains($layout_templates, 'homepage')) {
			continue;
		} else if (is_single()) {
			if (!str_contains($layout_templates, 'single')) { continue; }
			if (!str_contains($layout_types, $current_type)) { continue; }
		} else if (is_archive()) {
			if (!str_contains($layout_templates, 'archive')) { continue; }
			if (!str_contains($layout_types, $current_type)) { continue; }
		} else {
			// need to check for if other templates are selected, however you do that
		}

		echo util_get_actual_content($layout->post_content);
	}
}

add_action('church_layout_before_hero', function () {
	church_display_layouts_section('before');
});

add_action('church_layout_after_header', function () {
	church_display_layouts_section('after_header');
});

add_action('church_layout_after_content', function () {
	church_display_layouts_section('after');
});

// Add filter to build content margin styles
add_filter('the_content', function ($content) {
	preg_match_all('/[^\:]mb\-\d+/', $content, $mobile_matches);
	preg_match_all('/lg\:mb\-\d+/', $content, $desktop_matches);

	$mobile_classes = '';
	$desktop_classes = '';

	$mobile_matches[0] = array_unique($mobile_matches[0]);
	foreach ($mobile_matches[0] as $match) {
		$class_name = str_replace('"', '', trim($match));
		$px_value = explode('-', $class_name);
		$mobile_classes .= '.' . $class_name . '{margin-bottom: ' . $px_value[1] . 'px;} ';
	}

	$desktop_matches[0] = array_unique($desktop_matches[0]);
	foreach ($desktop_matches[0] as $match) {
		$class_name = str_replace(':', '\:', str_replace('"', '', trim($match)));
		$px_value = explode('-', $class_name);
		$desktop_classes .= '.' . $class_name . '{margin-bottom: ' . $px_value[1] . 'px;} ';
	}

	$content .= <<<HTML
		<style type="text/css">
			$mobile_classes
			@media screen and (min-width: 1150px) {
				$desktop_classes
			}
		</style>
	HTML;
	return $content;
});