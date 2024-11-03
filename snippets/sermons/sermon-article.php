<?php
	$pastor_ID = get_post_meta($sermon->ID, 'sermon_pastor', true);
	$pastor = $pastor_ID ? get_post($pastor_ID) : false;
	$pastor_permalink = get_permalink($pastor_ID);

	$series_ID = get_post_meta($sermon->ID, 'sermon_series', true);
	$series = $series_ID ? get_post($series_ID) : false;

	$image = get_the_post_thumbnail_url($sermon);
	$alt = get_post_meta(get_post_thumbnail_id($sermon), '_wp_attachment_image_alt', true);

	$sermon_permalink = get_permalink($sermon->ID);

	$sermon_card_options = get_option('church_archive_card_order');

	$card_content_classes = 'card__content';
	if ('on_top' == get_option('card_content_position')) {
		$card_content_classes .= ' card__content--on-top';
	}
?>

<article class="card card--sermon">
	<a href="<?= $sermon_permalink ?>">
		<?php util_render_snippet('common/image', array(
			'wrapper_classes' => 'card__image-wrap',
			'extra_classes' => 'card__image',
			'src' => $image ? $image : get_option('church_sermon_default_image'),
			'alt' => $alt ? $alt : $sermon->post_title,
		), false); ?>
	</a>

	<div class="<?= $card_content_classes ?>">
		<?php foreach($sermon_card_options as $card_option) { ?>
			<?= util_render_snippet('sermons/card-options/' . $card_option, array(
				'sermon_permalink' => $sermon_permalink,
				'sermon' => $sermon,
				'pastor_permalink' => $pastor_permalink,
				'pastor' => $pastor,
				'series' => $series,
			)); ?>
		<?php } ?>
	</div>
</article>