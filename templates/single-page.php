<?php 
	$should_display_hero = true;
	$parent_page = $post->post_parent;
	$parent_post = get_post($parent_page);
	$children = get_pages(array('child_of' => $post->ID));
	$display_sidebar = $parent_page != 0 || count($children) > 0;

	get_header();

	if ($parent_page != 0) {
		$breadcrumb_steps = array(
			array('type' => 'page', 'slug' => $parent_post->post_name),
			array('type' => 'page', 'slug' => $post->post_name)
		);
	} else {
		$breadcrumb_steps = array(
			array('type' => 'page', 'slug' => $post->post_name)
		);
	}

	add_filter('breadcrumbs_steps', function ($steps) use ($breadcrumb_steps) {
		return $breadcrumb_steps;
	});

	// steps => false lets the parent-aware 'breadcrumbs_steps' filter above drive breadcrumbs.
	util_render_snippet('common/single-page-hero-snippet', array(
		'post' => $post,
		'steps' => false
	), false);

	do_action('church_layout_after_header');
?>

<section class="page-content <?= $display_sidebar ? 'page-content__have-children ccontain' : '' ?>">
	<?php if ($display_sidebar) { ?>
		<?= util_render_snippet('layout/page-nav', array(
			'parent_page' => $parent_page > 0 ? $parent_page : $post->ID,
			'parent_post' => $parent_post,
			'post' => $post
		)) ?>
	<?php } ?>

	<div class="page-content__contents">
		<?php while (have_posts()) {
			the_post();
			util_render_snippet('common/general-content', array(
				'content' => get_the_content()
			), false);
		} ?>
	</div>
</section>

<?php get_footer(); ?>
