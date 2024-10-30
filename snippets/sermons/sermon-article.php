<?php
	$pastor_ID = get_post_meta($sermon->ID, 'sermon_pastor', true);
	$pastor = $pastor_ID ? get_post($pastor_ID) : false;
	$pastor_permalink = get_permalink($pastor_ID);

	$series_ID = get_post_meta($sermon->ID, 'sermon_series', true);
	$series = $series_ID ? get_post($series_ID) : false;

	$image = get_the_post_thumbnail_url($sermon);
	$alt = get_post_meta(get_post_thumbnail_id($sermon), '_wp_attachment_image_alt', true);

	$sermon_permalink = get_permalink($sermon->ID);

	$sermon_title = <<<HTML
		<a href="$sermon_permalink">
			$sermon->post_title
		</a>
	HTML;
	
	$sermon_date = util_render_date($sermon->post_date);

	$sermon_pastor = '';
	if ($pastor) {
		$sermon_pastor = <<<HTML
			<a href="$pastor_permalink">
				$pastor->post_title
			</a>
		HTML;
	}

	ob_start();
	dynamic_sidebar('sermon_card');
	$card_layout = ob_get_clean();

	$card_layout = str_replace('[title]', $sermon_title, $card_layout);
	$card_layout = str_replace('[date]', $sermon_date, $card_layout);
	$card_layout = str_replace('[pastor]', $sermon_pastor, $card_layout);
?>

<article class="card sermon-card">
	<a href="<?= $sermon_permalink ?>">
		<?php util_render_snippet('common/image', array(
			'wrapper_classes' => 'card__image-wrap',
			'extra_classes' => 'card__image',
			'src' => $image ? $image : 'https://picsum.photos/350/250',
			'alt' => $alt ? $alt : $sermon->post_title,
		), false); ?>
	</a>

	<?= $card_layout ?>

	<?php if ($series) { ?>
		<a href="<?= get_permalink($series) ?>">
			<?= $series->post_title ?>
		</a>
	<?php } ?>
</article>