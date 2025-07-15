<?php $child_links = get_pages(array(
	'child_of' => $parent_page,
	'sort_column' => 'menu_order'
)); ?>

<aside class="page-content__sidebar gbc">
	<ul class="page-content__sidebar-list">
		<li class="summary-select__item">
			<?php if ($parent_post->ID != $post->ID) { ?>
				<a href="<?= get_permalink($parent_post) ?>">
					<?= $parent_post->post_title ?>
				</a>
			<?php } else { ?>
				<?= $parent_post->post_title ?>
			<?php } ?>
		</li>
		<?php foreach($child_links as $child) { ?>
			<li>
				<?php if ($child->ID != $post->ID) { ?>
					<a href="<?= get_permalink($child) ?>">
						<?= $child->post_title ?>
					</a>
				<?php } else { ?>
					<?= $child->post_title ?>
				<?php } ?>
			</li>
		<?php } ?>
	</ul>

	<div class="page-content__sidebar-select ccontain">
		<details class="summary-select">
			<summary class="summary-select__summary">
				View Page: <?= $post->post_title ?>
				<?= util_render_snippet('icons/chevron-down', array(
					'classes' => 'summary-select__icon'
				)) ?>
			</summary>
			<ul class="summary-select__contents">
				<li class="summary-select__item">
					<?php if ($parent_post->ID != $post->ID) { ?>
						<a href="<?= get_permalink($parent_post) ?>">
							<?= $parent_post->post_title ?>
						</a>
					<?php } else { ?>
						<?= $parent_post->post_title ?>
					<?php } ?>
				</li>
				<?php foreach($child_links as $child) { ?>
					<li>
						<?php if ($child->ID != $post->ID) { ?>
							<a href="<?= get_permalink($child) ?>">
								<?= $child->post_title ?>
							</a>
						<?php } else { ?>
							<?= $child->post_title ?>
						<?php } ?>
					</li>
				<?php } ?>
			</ul>
		</summaruy>
	</div>
</aside>