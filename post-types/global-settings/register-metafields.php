<?php

add_action( 'init', function () {
	// These values are printed into the hero's <style> block, so each one is sanitized to a
	// plain CSS value, and only users who can edit the post may change them.
	$can_edit_post = function ($allowed, $meta_key, $post_id) {
		return current_user_can('edit_post', $post_id);
	};

	register_post_meta('', 'hero_opacity', [
		'type' => 'string',
		'single' => true,
		'show_in_rest' => true,
		'sanitize_callback' => 'church_sanitize_css_number',
		'auth_callback' => $can_edit_post
	]);

	register_post_meta('', 'hero_background', [
		'type' => 'string',
		'single' => true,
		'show_in_rest' => true,
		'sanitize_callback' => 'church_sanitize_css_color',
		'auth_callback' => $can_edit_post
	]);

	register_post_meta('', 'hero_text', [
		'type' => 'string',
		'single' => true,
		'show_in_rest' => true,
		'sanitize_callback' => 'church_sanitize_css_color',
		'auth_callback' => $can_edit_post
	]);

	register_post_meta('', 'is_member_only', [
		'type' => 'string',
		'single' => true,
		'show_in_rest' => true
	]);

	register_post_meta('', 'hero_height', [
		'type' => 'string',
		'single' => true,
		'show_in_rest' => true,
		'sanitize_callback' => 'church_sanitize_css_number',
		'auth_callback' => $can_edit_post
	]);
});
