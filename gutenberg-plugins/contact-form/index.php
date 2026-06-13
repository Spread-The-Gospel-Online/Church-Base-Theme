<?php

// Contact Form plugin: a Form container block (InnerBlocks) plus five input blocks
// (Text Input, Select, Email, Checkbox, Submit). Every block is server-rendered via a
// snippet under snippets/blocks/contact-form/. The Form persists its children through
// the JS save() (InnerBlocks.Content); its render_callback receives those rendered
// children as $content and wraps them in a <form>.

add_action('init', function () {
	wp_enqueue_script(
		'contact-form-editor-script',
		get_template_directory_uri() . '/gutenberg-plugins/contact-form/contact-form-editor-script.js',
		array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-block-editor', 'wp-components'),
		null,
		true
	);

	register_block_type('church/block-form', array(
		'render_callback' => 'church_render_form_block',
		'title' => 'Form',
		'category' => 'theme',
		'icon' => 'feedback',
		// Mirror the JS supports so get_block_wrapper_attributes() emits the
		// color/typography styles chosen in the "Styles" tab on the frontend.
		'supports' => array(
			'color'      => array('background' => true, 'text' => true, 'gradients' => true, 'link' => true),
			'typography' => array('fontSize' => true, 'lineHeight' => true),
		),
	));

	register_block_type('church/block-text-input', array(
		'render_callback' => 'church_render_text_input_block',
		'title' => 'Text Input',
		'category' => 'theme',
		'icon' => 'edit',
	));

	register_block_type('church/block-email', array(
		'render_callback' => 'church_render_email_block',
		'title' => 'Email',
		'category' => 'theme',
		'icon' => 'email',
	));

	register_block_type('church/block-select', array(
		'render_callback' => 'church_render_select_block',
		'title' => 'Select',
		'category' => 'theme',
		'icon' => 'list-view',
	));

	register_block_type('church/block-checkbox', array(
		'render_callback' => 'church_render_checkbox_block',
		'title' => 'Checkbox',
		'category' => 'theme',
		'icon' => 'yes',
	));

	register_block_type('church/block-submit', array(
		'render_callback' => 'church_render_submit_block',
		'title' => 'Submit',
		'category' => 'theme',
		'icon' => 'button',
	));
});


// The Form wraps its rendered inner blocks ($content) and applies the shared
// spacing/container wrapper classes injected by global-filters/layouts.js.
function church_render_form_block ($attributes, $content) {
	$wrapper_classes = trim('form church-contact-form ' . util_get_block_wrapper_classes(
		$attributes['blockContainer'] ?? false,
		$attributes['blockBottomMargin'] ?? 0,
		$attributes['blockBottomMarginDesktop'] ?? 0,
		$attributes['blockPadding'] ?? 'none'
	));

	// The form's action holds the endpoint URL (endpoint mode) or the literal "email"
	// (email mode); forms.js reads it to decide where to POST.
	$submission_type = $attributes['submissionType'] ?? 'email';
	$form_action = ($submission_type === 'endpoint') ? ($attributes['endpointUrl'] ?? '') : 'email';
	$form_id = wp_unique_id('church-form-');

	// Email mode: persist the recipients + form name into a theme option keyed by the
	// block's generated form-id, so the public endpoint reads them server-side rather than
	// trusting addresses from the browser. Only the id is exposed to the page.
	$form_option_id = $attributes['formId'] ?? '';
	if ($submission_type === 'email' && !empty($form_option_id)) {
		update_option($form_option_id, array(
			'emails' => $attributes['emailAddresses'] ?? '',
			'name'   => $attributes['formName'] ?? '',
		), false);
	}

	return util_render_snippet('blocks/contact-form/form', array(
		'content' => $content,
		// get_block_wrapper_attributes() merges the color/typography support
		// classes + inline styles with our own wrapper classes.
		'wrapper_attributes' => get_block_wrapper_attributes(array('class' => $wrapper_classes)),
		'form_id' => $form_id,
		'form_action' => $form_action,
		'form_lookup_id' => ($submission_type === 'email') ? $form_option_id : '',
	));
}

function church_render_text_input_block ($attributes, $content) {
	return util_render_snippet('blocks/contact-form/text-input', $attributes);
}

function church_render_email_block ($attributes, $content) {
	return util_render_snippet('blocks/contact-form/email', $attributes);
}

function church_render_select_block ($attributes, $content) {
	return util_render_snippet('blocks/contact-form/select', $attributes);
}

function church_render_checkbox_block ($attributes, $content) {
	return util_render_snippet('blocks/contact-form/checkbox', $attributes);
}

function church_render_submit_block ($attributes, $content) {
	return util_render_snippet('blocks/contact-form/submit', $attributes);
}
