<?php
	$attribute_string = '';
	foreach ($attributes as $attribute_name => $attribute_value) {
		if (is_scalar($attribute_value)) {
			$attribute_string .= ' ' . $attribute_name . '="' . esc_attr($attribute_value) . '"';
		}
	}

	$clean_content = trim(wp_strip_all_tags($content));
	$last_plus_position = strrpos($clean_content, '+');
	if ($last_plus_position !== false) {
		$clean_content = substr_replace($clean_content, '', $last_plus_position, 1);
	}

	$title_class = get_option('church_accordion_title_size', 'text-large');
?>

<summary
	class="accordion__summary <?= $title_class ?> <?= $classes ?>"
	<?= $attribute_string ?>
>
	<?= $clean_content ?>
	<svg
		class="item-icon accordion__icon"
		style="width: 1em;"
		xmlns="http://www.w3.org/2000/svg"
		viewBox="0 0 512 512"
	>
		<path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/>
	</svg>
</summary>
