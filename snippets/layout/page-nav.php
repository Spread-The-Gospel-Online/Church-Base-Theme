<?php $child_links = get_pages(array('child_of' => $parent_page)); ?>

<aside class="page-content__sidebar gbc">
	<ul class="page-content__sidebar-list">
		<li class="summary-select__item">
			<a href="<?= get_permalink($parent_post) ?>">
				<?= $parent_post->post_title ?>
			</a>
		</li>
		<?php foreach($child_links as $child) { ?>
			<li>
				<a href="<?= get_permalink($child) ?>">
					<?= $child->post_title ?>
				</a>
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
					<a href="<?= get_permalink($parent_post) ?>">
						<?= $parent_post->post_title ?>
					</a>
				</li>
				<?php foreach($child_links as $child) { ?>
					<li class="summary-select__item">
						<a href="<?= get_permalink($child) ?>">
							<?= $child->post_title ?>
						</a>
					</li>
				<?php } ?>
			</ul>
		</summaruy>
	</div>
</aside>