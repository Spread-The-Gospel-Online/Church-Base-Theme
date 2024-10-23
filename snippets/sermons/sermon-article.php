<?php
	$pastor_ID = get_post_meta($sermon->ID, 'sermon_pastor', true);
	$pastor = $pastor_ID ? get_post($pastor_ID) : false;
	$pastor_permalink = get_permalink($pastor_ID);

	$series_ID = get_post_meta($sermon->ID, 'sermon_series', true);
	$series = $series_ID ? get_post($series_ID) : false;

	$image = get_the_post_thumbnail_url($sermon);
	$alt = get_post_meta(get_post_thumbnail_id($sermon), '_wp_attachment_image_alt', true);

	$sermon_permalink = get_permalink($sermon->ID);
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

	<a href="<?= $sermon_permalink ?>">
		<h3>
			<?= $sermon->post_title ?>
		</h3>
	</a>

	<?php if ($pastor) { ?>
		<a href="<?= $pastor_permalink ?>">
			<?= $pastor->post_title ?>
		</a>
	<?php } ?>

	<p>
		<?= util_render_date($sermon->post_date) ?>
	</p>

	<?php if ($series) { ?>
		<a href="<?= get_permalink($series) ?>">
			<?= $series->post_title ?>
		</a>
	<?php } ?>
</article>