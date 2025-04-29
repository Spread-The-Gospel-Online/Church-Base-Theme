<?php get_header(); ?>

<?= util_render_snippet('common/archive-hero', array(), false) ?>

<?php do_action('church_layout_after_header'); ?>

<section class="sermon-archive ccontain" style="--card-image-aspect-ratio: <?= get_option('church_archive_sermon_series_card_height', 30) ?>%;">
	<?php while (have_posts()) {
		the_post();
		$series = get_post();
		$tile_image = get_the_post_thumbnail_url($series) ? get_the_post_thumbnail_url($series) : get_option('series_default_image');
		util_render_snippet('common/tile', array(
			'url' => get_permalink($series),
			'title' => $series->post_title,
			'image' => $tile_image,
			'alt' => get_post_meta(get_post_thumbnail_id($series), '_wp_attachment_image_alt', true)
		), false);
	} ?>
</section>

<?= util_render_snippet('common/pagination', array(
	'extra_classes' => 'sermon-archive__pagination',
	'post_type' => 'Series'
)) ?>

<?php get_footer(); ?>