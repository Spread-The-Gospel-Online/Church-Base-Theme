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

	$pattern = false;
	$pattern_slug = get_option('church_archive_card_pattern');
	$pattern_matches = array();
	if ($pattern_slug != 'false') {
		$pattern_matches = get_posts(array(
			'post_name' => $pattern_slug,
			'post_type' => 'wp_block',
			'posts_per_page' => 1
		));
	}
	if ($pattern_matches && count($pattern_matches) > 0 && $pattern_matches[0]->post_name == $pattern_slug) {
		$pattern = $pattern_matches[0];
	}

	$card_content_classes = 'card__content';
	if ('on_top' == get_option('card_content_position')) {
		$card_content_classes .= ' card__content--on-top';
	}
	if ($pattern) {
		$card_content_classes .= ' card__content--patterned';
	}

	$extra_card_item_classes = '';
	$pastor_index = array_search('pastor', $sermon_card_options);
	$date_index = array_search('date', $sermon_card_options);

	if (abs($date_index - $pastor_index) > 1) {
		$extra_card_item_classes = 'card__full-item';
	}

	if ($image == false) {
		$series_image_id = get_post_thumbnail_id($series);
		$series_image_src = $series_image_id ? wp_get_attachment_image_src($series_image_id, 'full', false)[0] : false;
		if ($series_image_src) {
			$image = $series_image_src;
		} else {
			$image = get_option('church_sermon_default_image');
		}	
	}
?>

<article class="card card--sermon">
	<a href="<?= $sermon_permalink ?>">
		<?php util_render_snippet('common/image', array(
			'wrapper_classes' => 'card__image-wrap',
			'extra_classes' => 'card__image',
			'src' => $image,
			'alt' => $alt ? $alt : $sermon->post_title,
		), false); ?>
	</a>

	<?php if ($pattern) { ?>
		<div class="<?= $card_content_classes ?>">
			<?= util_get_actual_content($pattern->post_content) ?>
		</div>
	<?php } else { ?>
		<div class="<?= $card_content_classes ?>">
			<?php foreach($sermon_card_options as $card_option) { ?>
				<?php if ($card_option == 'nodisplay') { break; } ?>
				<?= util_render_snippet('sermons/card-options/' . $card_option, array(
					'sermon_permalink' => $sermon_permalink,
					'sermon' => $sermon,
					'pastor_permalink' => $pastor_permalink,
					'pastor' => $pastor,
					'series' => $series,
					'extra_classes' => $extra_card_item_classes
				)); ?>
			<?php } ?>
		</div>
	<?php } ?>
</article>