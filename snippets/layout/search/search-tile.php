<?php
	$image_info = util_get_hero_src($post);

	$card_content_classes = 'card__content';
	if ('on_top' == get_option('card_content_position')) {
		$card_content_classes .= ' card__content--on-top';
	}
?>

<article class="card card--search">
	<a href="<?= get_permalink($post) ?>">
		<?php util_render_snippet('common/image', array(
			'wrapper_classes' => 'card__image-wrap',
			'extra_classes' => 'card__image',
			'src' => $image_info['src'],
			'alt' => $image_info['alt']
		), false); ?>
	</a>

	<div class="<?= $card_content_classes ?>">
		<a href="<?= get_permalink($post) ?>">
			<h2>
				<?= $post->post_title ?>
			</h2>
		</a>
		<?php if ($post->post_excerpt) { ?>
			<div>
				<?= $post->post_excerpt ?>
			</div>
		<?php } ?>
	</div>
</article>