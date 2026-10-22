<?php get_header(); ?>

<?= util_render_snippet('common/archive-hero') ?>

<?php do_action('church_layout_after_header'); ?>

<section class="general-archive ccontain">
	<?php while (have_posts()) {
		the_post();
		util_render_snippet('common/tile', array(
			'post' => get_post(),
		), false);
	} ?>
</section>

<?php
	$archive_title = post_type_archive_title('', false);
?>
<?= util_render_snippet('common/pagination', array(
	'extra_classes' => 'general-archive__pagination',
	'post_type' => $archive_title ? $archive_title : 'Results'
), false) ?>

<?php get_footer(); ?>
