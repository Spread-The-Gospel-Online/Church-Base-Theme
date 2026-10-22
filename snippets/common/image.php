<?php
	// <source> elements would override a swapped img src, so blur only plain images
	$has_sources = isset($tablet_src) || isset($desktop_src);
	$blur_src = (!$has_sources && isset($image_id)) ? util_get_blur_image_src($image_id) : false;
?>
<picture class="image-wrapper <?= isset($wrapper_classes) ? $wrapper_classes : '' ?>">
	<?php if (isset($tablet_src)) { ?>
		<source srcset="<?= $tablet_src ?>" media="(min-width: <?= get_option('theme_width_tablet') ?>)" />
	<?php } ?>
	<?php if (isset($desktop_src)) { ?>
		<source srcset="<?= $desktop_src ?>" media="(min-width: <?= get_option('theme_width_desktop') ?>)" />
	<?php } ?>
	<?php if ($blur_src) { ?>
		<img
			src="<?= $blur_src ?>"
			data-full-image-url="<?= esc_url($src) ?>"
			alt="<?= $alt ?>"
			class="image image--blur <?= isset($extra_classes) ? $extra_classes : '' ?>"
		/>
	<?php } else { ?>
		<img src="<?= $src ?>"
		     alt="<?= $alt ?>"
		     class="image <?= isset($extra_classes) ? $extra_classes : '' ?>"
		     loading="<?= isset($loading) ? $loading : 'lazy' ?>"/>
	<?php } ?>
</picture>
