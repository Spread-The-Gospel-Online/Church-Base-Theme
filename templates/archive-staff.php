<?php
	get_header();

	util_render_snippet('common/archive-hero', array(), false);

	do_action('church_layout_after_header');

	$archive_type = get_queried_object()->name;
	$archive_pages = get_posts(array(
		'post_type' => 'page',
		'name' => $archive_type,
		'numberposts' => 1
	));
	$archive_page = count($archive_pages) > 0 ? $archive_pages[0] : false;
	
	$parent_page = $archive_page->post_parent;
	$parent_post = get_post($parent_page);
	$children = get_pages(array('child_of' => $post->ID));
	$display_sidebar = $parent_page != 0 || count($children) > 0;
?>

<section class="page-content <?= $display_sidebar ? 'page-content__have-children ccontain' : '' ?>">
	<?php if ($display_sidebar) {
		util_render_snippet('layout/page-nav', array(
			'parent_page' => $parent_page > 0 ? $parent_page : $post->ID,
			'parent_post' => $parent_post,
			'post' => $archive_page
		), false);
	} ?>
	
	<div class="page-content__contents">
		<?php if ($archive_page) {
			util_render_snippet('common/general-content', array(
				'content' => $archive_page->post_content
			), false);
		} else {
			$staff_ids = get_posts(array(
				'post_type' => 'staff',
				'posts_per_page' => -1,
				'fields' => 'ids'
			));

			util_render_snippet('staff/staff-members-list', array(
				'staff_ids' => implode(',', $staff_ids),
				'view' => 'expanded',
				'classes' => 'ccontain',
				'columns' => 2,
				'image_layout' => 'horizontal',
				'image_width' => 140,
			), false);
		} ?>
	</div>
</section>

<?php get_footer(); ?>