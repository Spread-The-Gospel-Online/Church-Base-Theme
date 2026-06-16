<?php
// Both messages render up front but hidden via the `hidden` class. forms.js reveals
// the matching one after the submission response (HTTP 200 -> success, any other
// status or a network error -> error).
//
// Border width and text alignment are passed as inline CSS variables. The border map
// whitelists the value (unknown sizes fall back to small); "large" maps to the theme's
// widest tier (--border-width-wide). esc_attr keeps the alignment value safe, and any
// invalid value is ignored by text-align, leaving the `left` fallback.
$border_widths = array(
	'none'   => '0',
	'small'  => 'var(--border-width-small)',
	'medium' => 'var(--border-width-medium)',
	'large'  => 'var(--border-width-wide)',
);
$border_width = $border_widths[$borderSize ?? 'small'] ?? $border_widths['small'];
$align = $textAlign ?? 'left';
$styles = '--form-response-border-width: ' . $border_width . '; --form-response-text-align: ' . esc_attr($align) . ';';
?>
<p class="form-response__message form-response__success hidden" style="<?= $styles ?>" data-form-response-success>
	<?= esc_html($successMessage ?? 'Thank you! Your message has been sent.') ?>
</p>
<p class="form-response__message form-response__error hidden" style="<?= $styles ?>" data-form-response-error>
	<?= esc_html($errorMessage ?? 'Sorry, something went wrong. Please try again.') ?>
</p>
