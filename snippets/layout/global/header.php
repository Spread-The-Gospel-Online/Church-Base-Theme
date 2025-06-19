<?php
	$logo_src = get_option('header_logo');
	$is_fixed = get_option('header_is_fixed', 'no'); 
	$is_transparent = get_option('header_is_transparent', 'no');
	$watcher_classes = 'header__watcher';
	$extra_watcher_styles = '';

	$header_classes = '';
	$header_anchor_height = 0;
	if ($is_fixed == 'yes') {
		$header_classes .= 'header--is-fixed';
	}
	if ($is_transparent == 'yes') {
		$watcher_classes .= ' header__watcher--transparent';
		$header_classes .= ' header--transparent';	
	}
?>

<?php if ($is_fixed == 'yes') { ?>
	<script type="module" src="<?php echo get_template_directory_uri(); ?>/assets/scripts/components/fixed-header.js"></script>
	<div class="<?= $watcher_classes ?>" data-fixed-header-observer></div>
<?php } ?>

<header class="header <?= $header_classes; ?>">
	<div class="header__contents ccontain">
		<a class="header__logo-link" href="<?= get_site_url() ?>" aria-label="go to site homepage">
			<img class="header__logo"
				 src="<?php echo $logo_src; ?>"
				 alt="Site logo" />
		</a>
		<?php util_render_snippet('/layout/global/main-menu', array(), false); ?>
		<button aria-label="Open Search Form"
				class="header__search-trigger"
				onclick="window.setState('searchOpen', !window.getState('searchOpen'))">
			<?= util_render_snippet('icons/search', array(
				'classes' => 'header__search-trigger-icon'
			)) ?>
		</button>
	</div>
	<?= util_render_snippet('layout/global/search') ?>
</header>