<?php
// Whitelist the button type to avoid injecting arbitrary classes.
$allowed_types = array('primary', 'secondary', 'accent');
$type = in_array($buttonType ?? 'primary', $allowed_types, true) ? $buttonType : 'primary';
?>
<button type="submit" class="button button--<?= $type ?>"><?= esc_html($text ?? 'Submit') ?></button>
