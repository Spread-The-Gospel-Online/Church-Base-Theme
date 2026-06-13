<?php $field_id = !empty($name) ? esc_attr($name) : ''; ?>
<div class="check-wrapper">
	<input type="checkbox"
		   <?= $field_id ? 'id="' . $field_id . '"' : '' ?>
		   name="<?= esc_attr($name ?? '') ?>"
		   <?= !empty($required) ? 'required' : '' ?> />
	<label<?= $field_id ? ' for="' . $field_id . '"' : '' ?>><?= esc_html($label ?? '') ?></label>
</div>
