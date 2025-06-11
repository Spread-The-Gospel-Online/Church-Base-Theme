<?php get_header(); ?>

<?= util_render_snippet('common/archive-hero') ?>

<?php do_action('church_layout_after_header'); ?>

<section class="sermon-archive ccontain">
	<?php while (have_posts()) {
		the_post();
		util_render_snippet('sermons/sermon-article', array(
			'sermon' => get_post(),
		), false);
	} ?>
</section>

<?= util_render_snippet('common/pagination', array(
	'extra_classes' => 'sermon-archive__pagination',
	'post_type' => 'Sermons'
), false) ?>

<?php get_footer(); ?>