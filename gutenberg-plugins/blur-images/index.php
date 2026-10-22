<?php

// Adds a "Blur Image" toggle to core Image & Cover blocks. The toggle defaults to the
// theme's "Blur Images During Loading" setting; blurred images are swapped to full
// size on the front end by assets/scripts/components/image-blur.js.

add_action('enqueue_block_editor_assets', function () {
	wp_enqueue_script(
		'church-blur-images-script',
		get_template_directory_uri() . '/gutenberg-plugins/blur-images/blur-images.js?t=' . time(),
		array('wp-blocks', 'wp-hooks', 'wp-element', 'wp-compose', 'wp-components', 'wp-block-editor'),
		null,
		true
	);

	$is_theme_blur_enabled = get_option('church_blur_images_loading') === 'yes';
	wp_add_inline_script(
		'church-blur-images-script',
		'window.churchBlurImagesDefault = ' . ($is_theme_blur_enabled ? 'true' : 'false') . ';',
		'before'
	);
});

function church_blur_block_image ($block_content, $block) {
	$attrs = $block['attrs'];
	$is_blur_enabled = isset($attrs['blurImage'])
		? (bool) $attrs['blurImage']
		: get_option('church_blur_images_loading') === 'yes';
	$is_cover = $block['blockName'] === 'core/cover';
	$attachment_id = isset($attrs['id']) ? $attrs['id'] : 0;
	// "Use featured image" covers have no id; core renders the current post's thumbnail
	if ($is_cover && !empty($attrs['useFeaturedImage'])) {
		$attachment_id = get_post_thumbnail_id();
	}
	$background_type = isset($attrs['backgroundType']) ? $attrs['backgroundType'] : 'image';
	if ($is_cover && $background_type !== 'image') {
		return $block_content;
	}

	$image_query = $is_cover
		? array('tag_name' => 'img', 'class_name' => 'wp-block-cover__image-background')
		: array('tag_name' => 'img');

	// check for the img before resolving the thumbnail, so a fixed-background cover
	// (no img tag) doesn't flag the page as having blurred images
	$tags = new WP_HTML_Tag_Processor($block_content);
	if (!$tags->next_tag($image_query)) {
		return $block_content;
	}

	$blur_src = util_get_blur_image_src($attachment_id, $is_blur_enabled);
	if (!$blur_src) {
		return $block_content;
	}

	$tags->set_attribute('data-full-image-url', $tags->get_attribute('src'));
	$tags->set_attribute('src', $blur_src);
	$tags->add_class('image--blur');
	$tags->set_attribute('loading', 'eager');
	$tags->remove_attribute('srcset');
	$tags->remove_attribute('sizes');

	// keep the full image's dimensions so the thumbnail doesn't render as a small square
	if (!$tags->get_attribute('width') || !$tags->get_attribute('height')) {
		$size_slug = isset($attrs['sizeSlug']) ? $attrs['sizeSlug'] : 'full';
		$full_image = wp_get_attachment_image_src($attachment_id, $size_slug);
		if ($full_image) {
			$tags->set_attribute('width', $full_image[1]);
			$tags->set_attribute('height', $full_image[2]);
		}
	}

	return $tags->get_updated_html();
}

add_filter('render_block_core/image', 'church_blur_block_image', 10, 2);
add_filter('render_block_core/cover', 'church_blur_block_image', 10, 2);

// the_content adds srcset after blocks render, which would load the full image
// immediately instead of the blurred thumbnail
add_filter('wp_img_tag_add_srcset_and_sizes_attr', function ($should_add, $image) {
	if (strpos($image, 'data-full-image-url') !== false) {
		return false;
	}
	return $should_add;
}, 10, 2);
