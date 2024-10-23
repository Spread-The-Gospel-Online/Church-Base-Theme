<?php

$bad_types = array('layouts', 'revision', 'nav_menu_item', 'custom_css', 'customize_changeset', 'oembed_cache', 'user_request');
$types = array_filter(get_post_types(), function($post_type) use ($bad_types) {
	if (str_contains($post_type, 'wp_') || in_array($post_type, $bad_types)) {
		return false;
	}
	return true;
});
$selected_types = get_post_meta($post->ID, 'layout_types', true);
$markup = '';

foreach ($types as $type) {
	$checked_attribute = str_contains($selected_types, $type) ? 'checked="checked"' : '';
	$markup .= <<<HTML
		<li class="related-post-checkbox" style="display: block">
			<label for="layout-type-$type">$type</label>
			<input id="layout-type-$type" 
				   name="layout-types[]"
				   type="checkbox"
				   value="$type"
				   $checked_attribute />
		</li>
	HTML;
}

wp_nonce_field(
	'updating_layout_types_meta_fields',
	'layout_types_meta_nonce'
);

echo $markup;