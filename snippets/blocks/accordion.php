<?php
	$attribute_string = '';
	foreach ($attributes as $attribute_name => $attribute_value) {
		if (is_scalar($attribute_value)) {
			$attribute_string .= ' ' . $attribute_name . '="' . esc_attr($attribute_value) . '"';
		}
	}
?>

<details
	class="accordion <?= $classes ?>"
	<?= $attribute_string ?>
>
	<?= $content ?>
</details>
