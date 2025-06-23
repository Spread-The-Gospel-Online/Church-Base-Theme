<?php

add_action( 'init', function () {
	register_post_meta('', 'hero_opacity', [
		'type' => 'string',
		'single' => true,
		'show_in_rest' => true
	]);

	register_post_meta('', 'hero_background', [
		'type' => 'string',
		'single' => true,
		'show_in_rest' => true
	]);

	register_post_meta('', 'hero_text', [
		'type' => 'string',
		'single' => true,
		'show_in_rest' => true
	]);

	register_post_meta('', 'is_member_only', [
		'type' => 'string',
		'single' => true,
		'show_in_rest' => true
	]);	

	register_post_meta('', 'hero_height', [
		'type' => 'string',
		'single' => true,
		'show_in_rest' => true
	]);	
});