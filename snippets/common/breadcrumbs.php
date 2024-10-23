<?php if (get_option('display_breadcrumbs') != 'no') { ?>
	<div class="breadcrumbs <?= $extra_classes ?>">
		<ul class="ccontain breadcrumbs__list">
			<li class="breadcrumbs__item">
				<a href="<?= get_site_url() ?>">
					Home
				</a>
			</li>
			<?php foreach ($steps as $index => $step) { ?>
				<?php $breadcrumb_element = (array_key_last($steps) == $index) ? 'span' : 'a'; ?>
				<?php $step_link = church_get_general_url($step['type'], $step['slug'], array_key_exists('prefix_type', $step) ? $step['prefix_type'] : false, array_key_exists('prefix_slug', $step) ? $step['prefix_slug'] : false); ?>
				<?php $classes = 'breadcrumbs__item'; ?>
				<?php if (array_key_last($steps) == $index) { $classes .= ' desktop-only'; } ?>
				<li class="<?= $classes ?>">
					<<?= $breadcrumb_element ?> href="<?= get_site_url(); ?><?= $step_link['url'] ?>">
						<?= $step_link['text'] ?>
					</<?= $breadcrumb_element ?>>
				</li>	
			<?php } ?>
		</ul>
	</div>
<?php } ?>