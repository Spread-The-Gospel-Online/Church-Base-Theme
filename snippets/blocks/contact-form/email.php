<?php
$wrapper_classes = 'input-wrapper';
if (get_option('church_forms_label_position', 'above') === 'left') {
	$wrapper_classes .= ' input-wrapper__horizontal';
}
$field_id = !empty($name) ? esc_attr($name) : '';
?>
<div class="<?= $wrapper_classes ?>">
	<?php if (!empty($label)) : ?>
		<label<?= $field_id ? ' for="' . $field_id . '"' : '' ?>><?= esc_html($label) ?></label>
	<?php endif; ?>
	<input type="email"
		   <?= $field_id ? 'id="' . $field_id . '"' : '' ?>
		   name="<?= esc_attr($name ?? '') ?>"
		   placeholder="<?= esc_attr($placeholder ?? '') ?>"
		   <?= !empty($required) ? 'required' : '' ?> />
</div>
