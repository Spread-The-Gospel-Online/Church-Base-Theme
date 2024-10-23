<?php

$all_series = get_posts(array(
	'post_type' => 'sermon-series',
	'numberposts' => -1
));

$selected_series = get_post_meta($post->ID, 'sermon_series', true);
$markup = '';

foreach ($all_series as $series) {
	$checked_attribute = $selected_series == $series->ID ? 'checked="checked"' : '';
	$markup .= <<<HTML
		<span class="related-post-checkbox">
			<label for="series-$series->ID">$series->post_title</label>
			<input id="series-$series->ID"
				   name="series_id"
				   type="radio"
				   value="$series->ID"
				   $checked_attribute />
		</span>
	HTML;
}

wp_nonce_field(
	'updating_series_meta_fields',
	'series_meta_nonce'
);

echo $markup;