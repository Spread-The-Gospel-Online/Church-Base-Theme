<section class="<?= isset($classes) ? $classes : '' ?>">
	<h2>Recent Sermons</h2>
	<div class="flexible-grid" style="--number-columns: <?= $columns ?>">
		<?php foreach ($sermons as $sermon) { ?>
			<?= util_render_snippet('sermons/sermon-article', array(
				'sermon' => $sermon
			), false) ?>
		<?php } ?>
	</div>		
</section>