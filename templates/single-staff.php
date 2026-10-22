<?php 

get_header();

while (have_posts()) {
	the_post();

	util_render_snippet('common/single-page-hero-snippet', array(
		'post' => $post
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
