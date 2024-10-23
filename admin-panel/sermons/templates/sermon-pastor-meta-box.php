<?php

$all_staff = get_posts(array(
	'post_type' => 'staff',
	'numberposts' => -1
));

$selected_staff = get_post_meta($post->ID, 'sermon_pastor', true);
$markup = '';

foreach ($all_staff as $staff) {
	$checked_attribute = $selected_staff == $staff->ID ? 'checked="checked"' : '';
	$markup .= <<<HTML
		<span class="related-post-checkbox">
			<label for="sermon-pastor-$staff->ID">$staff->post_title</label>
			<input id="sermon-pastor-$staff->ID" 
				   name="pastor_id" 
				   type="radio" 
				   value="$staff->ID" 
				   $checked_attribute />
		</span>
	HTML;
}

wp_nonce_field(
	'updating_sermons_meta_fields',
	'sermons_meta_nonce'
);

echo $markup;