<?php if (!isset($steps)) { $steps = false; } ?>
<?php do_action('breadcrumbs_above', $steps); ?>

<?php if ($desktop_src) { ?>
	<?php $blur_src = isset($image_id) ? util_get_blur_image_src($image_id) : false; ?>
	<figure class="hero parallax">
		<picture>
			<?php if ($blur_src) { ?>
				<img
					src="<?= esc_url($blur_src) ?>"
					data-full-image-url="<?= esc_url($desktop_src) ?>"
					alt="<?= esc_attr($image_alt) ?>"
					class="hero__image image--blur"
					style="--parallax-position: 0%;"
				>
			<?php } else { ?>
				<img
					src="<?= esc_url($desktop_src) ?>"
					alt="<?= esc_attr($image_alt) ?>"
					class="hero__image"
					style="--parallax-position: 0%;"
				>
			<?php } ?>
		</picture>
		<figcaption class="hero__caption <?= isset($caption_classes) ? $caption_classes : '' ?>">
			<?php do_action('breadcrumbs_hero', $steps); ?>
			<div class="hero__caption-overlay"></div>
			<div class="hero__content ccontain">
				<h1><?= $caption ?></h1>
			</div>
		</figcaption>
	</figure>
<?php } else { ?>
	<div class="hero hero--text">
		<?php do_action('breadcrumbs_hero', $steps); ?>
		<div class="hero__caption-overlay"></div>
		<div class="hero__content ccontain">
			<h1><?= $caption ?></h1>
		</div>
	</div>
<?php } ?>

<?php
	// Re-sanitized at output so values stored before the meta sanitizers existed stay inert.
	$hero_opacity = isset($opacity) ? church_sanitize_css_number($opacity) : '';
	$hero_background = isset($background) ? church_sanitize_css_color($background) : '';
	$hero_text_color = isset($text_color) ? church_sanitize_css_color($text_color) : '';
	$hero_height_value = isset($hero_height) ? church_sanitize_css_number($hero_height) : '';
?>

<style type="text/css">
	.hero {
		<?php if ($hero_opacity !== '') { ?>
			--hero-opacity: <?= $hero_opacity ?>;
		<?php } ?>
		<?php if ($hero_background !== '') { ?>
			--hero-background: <?= $hero_background ?>;
		<?php } ?>
		<?php if ($hero_text_color !== '') { ?>
			--hero-text: <?= $hero_text_color ?>;
		<?php } ?>
		<?php if ($hero_height_value !== '') { ?>
			--hero-height: <?= $hero_height_value ?>vh;
		<?php } ?>
	}
</style>

<?php do_action('breadcrumbs_below', $steps); ?>