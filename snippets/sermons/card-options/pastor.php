<?php if (!!$pastor) { ?>
	<a href="<?= $pastor_permalink ?>" class="<?= isset($extra_classes) ? $extra_classes : '' ?>">
		<?= $pastor->post_title ?>
	</a>
<?php } ?>