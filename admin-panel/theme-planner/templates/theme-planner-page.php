<?php
	$families = Church_Theme_Planner_Page::FAMILIES;
	$shade_steps = Church_Theme_Planner_Page::SHADE_STEPS;
?>

<div class="wrap">

	<h1>Theme Planner</h1>
	<p>Pick a <strong>Primary</strong> color, then use the suggestions to fill <strong>Secondary</strong> and <strong>Accent</strong>. The lighter shades of each family are generated automatically; click <em>Save Colors</em> to apply them across the site.</p>

	<style>
		.tp-family {
			margin: 24px 0 32px;
		}
		.tp-picker {
			display: flex;
			align-items: center;
			gap: 10px;
			margin-bottom: 14px;
			font-weight: 600;
		}
		.tp-picker input[type="color"] {
			width: 48px;
			height: 34px;
			padding: 0;
			border: 1px solid #8c8f94;
			border-radius: 4px;
			cursor: pointer;
			background: none;
		}
		.tp-swatch-row {
			display: flex;
			flex-wrap: wrap;
			gap: 14px;
		}
		.tp-swatch-item {
			width: 120px;
		}
		.tp-swatch {
			height: 64px;
			border-radius: 6px;
			border: 1px solid rgba(0, 0, 0, 0.12);
			box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.15);
		}
		.tp-swatch-name {
			display: block;
			margin-top: 6px;
			font-size: 12px;
			color: #50575e;
		}
		.tp-suggestions {
			margin-top: 16px;
			padding: 14px;
			border: 1px solid #dcdcde;
			border-radius: 6px;
			max-width: 460px;
		}
		.tp-scheme {
			display: flex;
			align-items: center;
			gap: 10px;
			margin-bottom: 12px;
			font-weight: 600;
		}
		.tp-suggestion-swatches {
			display: flex;
			gap: 24px;
			margin-bottom: 14px;
		}
		.tp-suggestion-item {
			display: flex;
			align-items: center;
			gap: 8px;
		}
		.tp-suggestion-item .tp-swatch-name {
			margin-top: 0;
		}
		.tp-suggestion-actions {
			display: flex;
			gap: 8px;
			margin: 0;
		}
		.tp-swatch--mini {
			width: 32px;
			height: 32px;
			border-radius: 50%;
		}
	</style>

	<form method="post">
		<?php wp_nonce_field('church_save_theme_planner', 'church_theme_planner_nonce'); ?>

		<?php foreach ($families as $family) :
			$base_key = 'css_color_' . $family . '-100';
			$base_value = get_option($base_key, '#000000');
			$family_label = ucfirst($family);
		?>
			<div class="tp-family">
				<h2><?= esc_html($family_label) ?></h2>

				<label class="tp-picker">
					<span><?= esc_html($family_label) ?> color</span>
					<input type="color"
						   name="<?= esc_attr($base_key) ?>"
						   value="<?= esc_attr($base_value) ?>"
						   data-tp-picker
						   data-family="<?= esc_attr($family) ?>" />
				</label>

				<div class="tp-swatch-row">
					<div class="tp-swatch-item">
						<div class="tp-swatch"
							 data-tp-swatch
							 data-family="<?= esc_attr($family) ?>"
							 data-shade="100"
							 style="background: <?= esc_attr($base_value) ?>"></div>
						<span class="tp-swatch-name"><?= esc_html($family_label . ' 100') ?></span>
					</div>

					<?php foreach ($shade_steps as $shade => $lighten) :
						$variant_key = 'css_color_' . $family . '-' . $shade;
						$variant_value = get_option($variant_key, $base_value);
					?>
						<div class="tp-swatch-item">
							<div class="tp-swatch"
								 data-tp-swatch
								 data-family="<?= esc_attr($family) ?>"
								 data-shade="<?= esc_attr($shade) ?>"
								 style="background: <?= esc_attr($variant_value) ?>"></div>
							<span class="tp-swatch-name"><?= esc_html($family_label . ' ' . $shade) ?></span>
							<input type="hidden"
								   name="<?= esc_attr($variant_key) ?>"
								   value="<?= esc_attr($variant_value) ?>"
								   data-tp-variant
								   data-family="<?= esc_attr($family) ?>"
								   data-shade="<?= esc_attr($shade) ?>"
								   data-lighten="<?= esc_attr($lighten) ?>" />
						</div>
					<?php endforeach; ?>
				</div>

				<?php if ($family === 'primary') : ?>
					<div class="tp-suggestions">
						<label class="tp-scheme">
							<span>Suggestion type</span>
							<select data-tp-scheme>
								<option value="split-complementary">Split complementary</option>
								<option value="triadic">Triadic</option>
								<option value="analogous">Analogous</option>
							</select>
						</label>

						<div class="tp-suggestion-swatches">
							<div class="tp-suggestion-item">
								<div class="tp-swatch tp-swatch--mini" data-tp-suggestion="secondary"></div>
								<span class="tp-swatch-name">&rarr; Secondary</span>
							</div>
							<div class="tp-suggestion-item">
								<div class="tp-swatch tp-swatch--mini" data-tp-suggestion="accent"></div>
								<span class="tp-swatch-name">&rarr; Accent</span>
							</div>
						</div>

						<p class="tp-suggestion-actions">
							<button type="button" class="button" data-tp-swap>Swap</button>
							<button type="button" class="button button-primary" data-tp-apply-suggestions>Apply to Secondary &amp; Accent</button>
						</p>
					</div>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>

		<?php $accent_value = get_option('css_color_accent', '#A8854A'); ?>
		<div class="tp-family">
			<h2>Accent</h2>

			<label class="tp-picker">
				<span>Accent color</span>
				<input type="color"
					   name="css_color_accent"
					   value="<?= esc_attr($accent_value) ?>"
					   data-tp-picker
					   data-family="accent" />
			</label>

			<div class="tp-swatch-row">
				<div class="tp-swatch-item">
					<div class="tp-swatch"
						 data-tp-swatch
						 data-family="accent"
						 data-shade="100"
						 style="background: <?= esc_attr($accent_value) ?>"></div>
					<span class="tp-swatch-name">Accent</span>
				</div>
			</div>
		</div>

		<?php submit_button('Save Colors'); ?>
	</form>

</div>
