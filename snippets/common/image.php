<picture class="image-wrapper <?= isset($wrapper_classes) ? $wrapper_classes : '' ?>">
	<?php if (isset($tablet_src)) { ?>
		<source srcset="<?= $tablet_src ?>" media="(min-width: <?= get_option('theme_width_tablet') ?>)" />
	<?php } ?>
	<?php if (isset($desktop_src)) { ?>
		<source srcset="<?= $desktop_src ?>" media="(min-width: <?= get_option('theme_width_desktop') ?>)" />
	<?php } ?>
	<img src="<?= $src ?>"
	     alt="<?= $alt ?>"
	     class="image <?= isset($extra_classes) ? $extra_classes : '' ?>" 
	     loading="<?= isset($loading) ? $loading : 'lazy' ?>"/>
</picture>