<?php
// Renders the contact Form wrapper. $content is the already-rendered inner blocks.
// `action` holds the endpoint URL (endpoint mode) or the literal "email" (email mode);
// `data-ajax-form` is a unique id. forms.js intercepts submit and POSTs the fields.
?>
<form
	<?= $wrapper_attributes ?? '' ?>
	method="post"
	action="<?= esc_attr($form_action ?? 'email') ?>"
	data-ajax-form="<?= esc_attr($form_id ?? '') ?>"
>
	<?php if (!empty($form_lookup_id)) : ?>
		<input type="hidden" name="church_form_id" value="<?= esc_attr($form_lookup_id) ?>" />
	<?php endif; ?>
	<?= $content ?>
</form>
