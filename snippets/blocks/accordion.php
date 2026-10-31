<?php
	// Block attributes are author-controlled, so they're only ever printed as data- attributes
	// (a raw name could otherwise be an event handler like onfocus).
	$attribute_string = '';
	foreach ($attributes as $attribute_name => $attribute_value) {
		$data_attribute_name = sanitize_key($attribute_name);
		if (is_scalar($attribute_value) && $data_attribute_name !== '') {
			$attribute_string .= ' data-' . $data_attribute_name . '="' . esc_attr($attribute_value) . '"';
		}
	}
?>

<details
	class="accordion <?= esc_attr($classes) ?>"
	<?= $attribute_string ?>
>
	<?= $content ?>
</details>
