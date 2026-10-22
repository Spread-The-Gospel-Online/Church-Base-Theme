<?php 

get_header();

while (have_posts()) {
	the_post();
	$post = get_post();

	util_render_snippet('common/single-page-hero-snippet', array(
		'post' => $post
	), false);

	util_render_snippet('common/general-content', array(
		'content' => get_the_content()
	), false);
}

get_footer();
