<?php
// $options is a newline-separated string entered in the block inspector.
$option_list = array_filter(array_map('trim', explode("\n", $options ?? '')));
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
	<select <?= $field_id ? 'id="' . $field_id . '"' : '' ?>
			name="<?= esc_attr($name ?? '') ?>"
			<?= !empty($required) ? 'required' : '' ?>>
		<?php foreach ($option_list as $option) : ?>
			<option value="<?= esc_attr($option) ?>"><?= esc_html($option) ?></option>
		<?php endforeach; ?>
	</select>
</div>
