<?php
	$logo_src = get_option('header_logo');
	$is_fixed = get_option('header_is_fixed', 'no'); 
	$header_classes = '';
	$header_anchor_height = 0;
	if ($is_fixed == 'yes') {
		$header_classes .= ' header--is-fixed';
	}
?>

<?php if ($is_fixed == 'yes') { ?>
	<script type="module" src="<?php echo get_template_directory_uri(); ?>/assets/scripts/components/fixed-header.js"></script>
	<div data-fixed-header-observer style="width: 100%; height: <?= get_option('church_logo_default_size', 115) ?>px; z-index: -1; background: var(--header-background);"></div>
<?php } ?>
<header class="header<?php echo $header_classes; ?>">
	<div class="header__contents ccontain">
		<a class="header__logo-link" href="<?= get_site_url() ?>" aria-label="go to site homepage">
			<img class="header__logo"
				 src="<?php echo $logo_src; ?>"
				 alt="Site logo" />
		</a>
		<?php util_render_snippet('/layout/global/main-menu', array(), false); ?>
	</div>
</header>