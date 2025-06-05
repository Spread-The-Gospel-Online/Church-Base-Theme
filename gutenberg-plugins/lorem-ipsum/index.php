<?php

church_util_register_gutenberg_server_callback('/getServerContentsLoremIpsum', array(
	'numberParagraphs'
), 'church_display_lorem_ipsum');

// register the block
add_action('init', function () {
	wp_enqueue_script(
		'lorem-ipsum-editor-script',
		get_template_directory_uri() . '/gutenberg-plugins/lorem-ipsum/lorem.js',
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-components'),
		null,
		true
	);

	register_block_type('church/block-lorem-ipsum', array(
		'render_callback' => 'church_display_lorem_ipsum',
		"title" => "Lorem Ipsum",
		"category" => "theme",
		"icon" => "universal-access-alt",
	));
});

function church_display_lorem_ipsum ($attributes, $content) {
	$number_paragraphs = array_key_exists('numberParagraphs', $attributes) ? $attributes['numberParagraphs'] : 2;
	$loremText = churchFetchTextData('http://metaphorpsum.com/paragraphs/' . $number_paragraphs);
	
	echo '<p class="' . $attributes['className'] . '">' . str_replace("\n", '</p><p class="' . $attributes['className'] . '">', $loremText) . '</p>';
}