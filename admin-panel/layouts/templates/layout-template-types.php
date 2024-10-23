<?php

$types = array('homepage', 'single', 'archive');
$selected_templates = get_post_meta($post->ID, 'layout_templates', true);
$markup = '';

foreach ($types as $type) {
	$checked_attribute = str_contains($selected_templates, $type) ? 'checked="checked"' : '';
	$markup .= <<<HTML
		<li class="related-post-checkbox" style="display: block">
			<label for="layout-template-$type">$type</label>
			<input id="layout-template-$type" 
				   name="layout-template[]"
				   type="checkbox"
				   value="$type"
				   $checked_attribute />
		</li>
	HTML;
}

wp_nonce_field(
	'updating_layout_templates_meta_fields',
	'layout_templates_meta_nonce'
);

echo $markup;