<?php
	// Card for any post: image, title and excerpt, or the General Archive card pattern.
	// Expects $post (WP_Post). Optional overrides: $url, $image, $image_id, $alt.
	$tile_url = isset($url) ? $url : get_permalink($post);
	$tile_title = get_the_title($post);
	$tile_excerpt = get_the_excerpt($post);

	if (!isset($image_id)) {
		$image_id = get_post_thumbnail_id($post);
	}
	if (!isset($image)) {
		$image = $image_id ? get_the_post_thumbnail_url($post, 'full') : false;
	}
	if (!$image) {
		$image = get_option('church_general_default_image');
		$image_id = false;
	}
	// Last resort: the same image the post type's archive hero uses (archive page, then homepage).
	if (!$image) {
		$hero_image = util_get_hero_src($post);
		$image = $hero_image['src'];
		$image_id = $hero_image['id'];
	}
	if (!isset($alt) || !$alt) {
		$alt = $image_id ? get_post_meta($image_id, '_wp_attachment_image_alt', true) : '';
	}

	$pattern = util_get_pattern_object('church_general_archive_card_pattern');

	$card_content_classes = 'card__content';
	if ('on_top' == get_option('church_general_card_content_position')) {
		$card_content_classes .= ' card__content--on-top';
	}
	if ($pattern) {
		$card_content_classes .= ' card__content--patterned';
	}
?>

<article
	class="card card--general"
>
	<?php if (!$pattern && $image) { ?>
		<a
			href="<?= esc_url($tile_url) ?>"
		>
			<?php util_render_snippet('common/image', array(
				'wrapper_classes' => 'card__image-wrap',
				'extra_classes' => 'card__image',
				'src' => $image,
				'image_id' => $image_id,
				'alt' => $alt ? $alt : $tile_title,
			), false); ?>
		</a>
	<?php } ?>

	<div
		class="<?= esc_attr($card_content_classes) ?>"
	>
		<?php if ($pattern) {
			// Pattern blocks read the global post, so point it at this tile's post while rendering.
			$original_post = isset($GLOBALS['post']) ? $GLOBALS['post'] : null;
			$GLOBALS['post'] = $post;
			echo util_get_actual_content($pattern->post_content);
			$GLOBALS['post'] = $original_post;
		} else { ?>
			<a
				href="<?= esc_url($tile_url) ?>"
				class="card__title"
			>
				<h2
					class="h3"
				>
					<?= esc_html($tile_title) ?>
				</h2>
			</a>
			<?php if (has_excerpt($post)) { ?>
				<p
					class="card__full-item"
				>
					<?= esc_html($tile_excerpt) ?>
				</p>
			<?php } ?>
		<?php } ?>
	</div>
</article>
