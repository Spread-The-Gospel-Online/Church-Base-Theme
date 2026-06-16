<?php
// Whitelist the button type to avoid injecting arbitrary classes.
$allowed_types = array('primary', 'secondary', 'accent');
$type = $buttonType ?? 'primary';
if (!in_array($type, $allowed_types, true)) {
	$type = 'primary';
}
?>
<button type="submit" class="button button--<?= $type ?>"><?= esc_html($text ?? 'Submit') ?></button>
