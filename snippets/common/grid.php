<div id="grid-section-<?= $id ?>" class="grid-section <?= $classes ?>">
	<?= $tiles ?>
</div>
<style type="text/css">
	#grid-section-<?= $id ?> {
		grid-template-columns: repeat(<?= $mobile ?>, 1fr);
	}

	<?php util_render_snippet('utilities/media-queries', array(
		'size' => 'tablet',
		'rules' => <<<HTML
			#grid-section-$id {
				grid-template-columns: repeat($tablet, 1fr);
			}
		HTML
	), false); ?>

	<?php util_render_snippet('utilities/media-queries', array(
		'size' => 'desktop',
		'rules' => <<<HTML
			#grid-section-$id {
				grid-template-columns: repeat($desktop, 1fr);
			}
		HTML
	), false); ?>
</style>