<section class="upcoming-events flexible-grid <?= $classes ?>" style="--number-columns: <?= $columns ?>">
	<?php foreach ($events as $event) { ?>
		<div>
			<h3>
				<?= $event->post_name ?>
			</h3>
		</div>
	<?php } ?>
</section>