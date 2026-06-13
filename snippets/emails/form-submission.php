<?php
// Email body for a contact-form submission. Inline-styled because email clients
// don't load the theme stylesheet. $fields is an assoc array of field name => value
// (the internal lookup id is already removed by the endpoint).
?>
<h2>New submission from form: <?= esc_html($form_name ?? '') ?></h2>
<table style="border-collapse:collapse;width:100%;max-width:600px;">
	<?php foreach (($fields ?? array()) as $name => $value) : ?>
		<tr>
			<th style="text-align:left;padding:8px;border:1px solid #ddd;background:#f6f6f6;">
				<?= esc_html($name) ?>
			</th>
			<td style="padding:8px;border:1px solid #ddd;">
				<?= esc_html(is_bool($value) ? ($value ? 'Yes' : 'No') : $value) ?>
			</td>
		</tr>
	<?php endforeach; ?>
</table>
