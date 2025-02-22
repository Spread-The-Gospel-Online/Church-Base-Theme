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

	$sermons = util_church_get_sermons_for_staff($post->ID);

	echo '<div class="sermon-archive ccontain">';
	foreach ($sermons as $sermon) {
		util_render_snippet('sermons/sermon-article', array(
			'sermon' => $sermon
		), false);
	}
	echo '</div>';

	$pagination_args = util_church_get_staff_sermon_pagination($post);
	util_render_snippet('common/pagination', array(
		'post_type' => 'Sermons',
		'extra_classes' => '',
		'extra_args' => $pagination_args
	), false);
}

get_footer();
