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
		// Mirror the JS attribute defaults so render_callback receives them even when
		// an attribute is left at its default (WP omits default-valued attrs from markup).
		'attributes' => array(
			'label'       => array('type' => 'string',  'default' => 'Label'),
			'name'        => array('type' => 'string',  'default' => ''),
			'placeholder' => array('type' => 'string',  'default' => ''),
			'required'    => array('type' => 'boolean', 'default' => false),
		),
	));

	register_block_type('church/block-email', array(
		'render_callback' => 'church_render_email_block',
		'title' => 'Email',
		'category' => 'theme',
		'icon' => 'email',
		'attributes' => array(
			'label'       => array('type' => 'string',  'default' => 'Email'),
			'name'        => array('type' => 'string',  'default' => 'email'),
			'placeholder' => array('type' => 'string',  'default' => ''),
			'required'    => array('type' => 'boolean', 'default' => false),
		),
	));

	register_block_type('church/block-select', array(
		'render_callback' => 'church_render_select_block',
		'title' => 'Select',
		'category' => 'theme',
		'icon' => 'list-view',
		'attributes' => array(
			'label'    => array('type' => 'string',  'default' => 'Select'),
			'name'     => array('type' => 'string',  'default' => ''),
			'options'  => array('type' => 'string',  'default' => ''),
			'required' => array('type' => 'boolean', 'default' => false),
		),
	));

	register_block_type('church/block-checkbox', array(
		'render_callback' => 'church_render_checkbox_block',
		'title' => 'Checkbox',
		'category' => 'theme',
		'icon' => 'yes',
		'attributes' => array(
			'label'    => array('type' => 'string',  'default' => 'Checkbox'),
			'name'     => array('type' => 'string',  'default' => ''),
			'required' => array('type' => 'boolean', 'default' => false),
		),
	));

	register_block_type('church/block-submit', array(
		'render_callback' => 'church_render_submit_block',
		'title' => 'Submit',
		'category' => 'theme',
		'icon' => 'button',
		'attributes' => array(
			'text'       => array('type' => 'string', 'default' => 'Submit'),
			'buttonType' => array('type' => 'string', 'default' => 'primary'),
		),
	));

	register_block_type('church/block-form-response', array(
		'render_callback' => 'church_render_form_response_block',
		'title' => 'Form Response',
		'category' => 'theme',
		'icon' => 'megaphone',
		'attributes' => array(
			'successMessage' => array('type' => 'string', 'default' => 'Thank you! Your message has been sent.'),
			'errorMessage'   => array('type' => 'string', 'default' => 'Sorry, something went wrong. Please try again.'),
			'borderSize'     => array('type' => 'string', 'default' => 'small'),
			'textAlign'      => array('type' => 'string', 'default' => 'left'),
		),
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

	// Email mode: the recipients live in a form-id option written on publish (see
	// church_save_contact_form_options), so only the id is exposed to the page.
	$form_option_id = church_is_valid_form_id($attributes['formId'] ?? '') ? $attributes['formId'] : '';

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

function church_is_valid_form_id ($form_id) {
	return is_string($form_id) && preg_match('/^form-id-[a-z0-9]+$/', $form_id) === 1;
}

// Recipients are saved only when a post is published, never during render, so a
// Contributor's draft or preview can't write options.
function church_save_contact_form_options ($post_id, $post) {
	if (wp_is_post_autosave($post_id) || wp_is_post_revision($post_id)) {
		return;
	}
	if ($post->post_status !== 'publish' || !has_block('church/block-form', $post)) {
		return;
	}

	foreach (church_find_form_blocks(parse_blocks($post->post_content)) as $form_attributes) {
		$form_id = $form_attributes['formId'] ?? '';
		$submission_type = $form_attributes['submissionType'] ?? 'email';
		if ($submission_type !== 'email' || !church_is_valid_form_id($form_id)) {
			continue;
		}

		update_option($form_id, array(
			'emails' => church_sanitize_email_list($form_attributes['emailAddresses'] ?? ''),
			'name' => is_string($form_attributes['formName'] ?? null) ? sanitize_text_field($form_attributes['formName']) : ''
		), false);
	}
}

add_action('save_post', 'church_save_contact_form_options', 10, 2);

// Attributes of every Form block, including ones nested inside other blocks.
function church_find_form_blocks ($blocks) {
	$form_blocks = array();
	foreach ($blocks as $block) {
		if ($block['blockName'] === 'church/block-form') {
			$form_blocks[] = $block['attrs'];
		}
		if (!empty($block['innerBlocks'])) {
			$form_blocks = array_merge($form_blocks, church_find_form_blocks($block['innerBlocks']));
		}
	}
	return $form_blocks;
}

function church_sanitize_email_list ($email_addresses) {
	if (!is_string($email_addresses)) {
		return '';
	}
	$valid_emails = array_filter(array_map('sanitize_email', explode(',', $email_addresses)));
	return implode(',', $valid_emails);
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

function church_render_form_response_block ($attributes, $content) {
	return util_render_snippet('blocks/contact-form/form-response', $attributes);
}
