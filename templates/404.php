<?php
	$page = get_page_by_path('404-page');
	error_log(print_r($page,true));

	get_header();

	if ($page) {
		$hero_image = util_get_hero_src($page);

		util_render_snippet('common/hero', array(
			'desktop_src' => $hero_image['src'],
			'image_alt' => $hero_image['alt'],
			'caption' => $page->post_title,
			'opacity' => get_post_meta($page->ID, 'hero_opacity', true),
			'background' => get_post_meta($page->ID, 'hero_background', true),
			'text_color' => get_post_meta($page->ID, 'hero_text', true),
			'hero_height' => get_post_meta($page->ID, 'hero_height', true),
		), false);

		do_action('church_layout_after_header');
?>

<section class="page-content">
	<div class="page-content__contents">
		<?php util_render_snippet('common/general-content', array(
			'content' => $page->post_content
		), false); ?>
	</div>
</section>

<?php
	} else {
		do_action('church_layout_after_header');
?>

<section class="page-content fully-centered">
	<h1>404</h1>
</section>

<?php
	}

	get_footer();
?>
