<?php $width = get_option('theme_width_' . $size); ?>

@media screen and (min-width: <?= $width ?>px) {
	<?= $rules ?>
}