<?php foreach (BASE_SITE_COLOR_OPTIONS as $color_option) { ?>
	.has-<?= $color_option['slug'] ?>-background-color { 
		background-color: var(--<?= $color_option['slug'] ?>);
	}

	<?php /* need to deal with GB just adding the link color class */ ?>
	.has-<?= $color_option['slug'] ?>-color { 
		color: var(--<?= $color_option['slug'] ?>);
	}
<?php } ?>