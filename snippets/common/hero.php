<?php if (!isset($steps)) { $steps = false; } ?>
<?php do_action('breadcrumbs_above', $steps); ?>

<?php if ($desktop_src) { ?>
	<?php $blur_src = isset($image_id) ? util_get_blur_image_src($image_id) : false; ?>
	<figure class="hero parallax">
		<picture>
			<?php if ($blur_src) { ?>
				<img
					src="<?= $blur_src ?>"
					data-full-image-url="<?= esc_url($desktop_src) ?>"
					alt="<?= $image_alt ?>"
					class="hero__image image--blur"
					style="--parallax-position: 0%;"
				>
			<?php } else { ?>
				<img src="<?= $desktop_src ?>"
				     alt="<?= $image_alt ?>"
				     class="hero__image"
				     style="--parallax-position: 0%;">
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

<style type="text/css">
	.hero {
		<?php if (isset($opacity) && $opacity != '') { ?>
			--hero-opacity: <?= $opacity ?>;
		<?php } ?>
		<?php if (isset($background) && $background != '') { ?>
			--hero-background: <?= $background ?>;
		<?php } ?>
		<?php if (isset($text_color) && $text_color != '') { ?>
			--hero-text: <?= $text_color ?>;
		<?php } ?>
		<?php if (isset($hero_height) && $hero_height != '') { ?>
			--hero-height: <?= $hero_height ?>vh;
		<?php } ?>
	}
</style>

<?php do_action('breadcrumbs_below', $steps); ?>