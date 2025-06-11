<?php 

get_header();

while (have_posts()) {
	the_post();

	$image = util_get_hero_src($post);

	util_render_snippet('common/hero', array(
		'desktop_src' => $image['src'],
		'image_alt' => $image['alt'],
		'caption_classes' => '',
		'caption' => get_the_title(),
		'opacity' => get_post_meta($post->ID, 'hero_opacity', true),
		'background' => get_post_meta($post->ID, 'hero_background', true),
		'text_color' => get_post_meta($post->ID, 'hero_text', true),
		'steps' => array(
			array('type' => 'staff', 'slug' => false),
			array('type' => 'staff', 'slug' => $post->post_name),
		)
	), false);

	$pattern = util_get_pattern_object('church_staff_contents_pattern');
	if ($pattern) {
		util_render_snippet('common/general-content', array(
			'content' => util_get_actual_content($pattern->post_content)
		), false);
	}

	if (!church_missing_type_support('sermons')) {
		util_render_snippet('staff/staff-sermons', array(
			'post' => $post
		), false);
	}
}

get_footer();
