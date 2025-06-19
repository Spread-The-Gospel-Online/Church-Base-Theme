<?php
	$menu_alignment = get_option('header_menu_alignment', 'middle');
	$menu_extra_classes = 'header__main-menu--' . $menu_alignment;
	
	wp_nav_menu([
		'theme_location' => 'primary-menu',
		'menu_class' => 'main-menu',
		'container' => 'nav',
		'container_class' => 'header__main-menu desktop-only ' . $menu_extra_classes,
		'walker' => new CHRCH_Menu_Walker()
	]);
?>

<button data-open-mobile-menu
		class="mobile-only button button--icon">
	<?= util_render_snippet('icons/menu', array(), false) ?>
</button>
<div class="header__mobile-wrapper ccontain" data-mobile-menu>
	<button class="header__close-menu" 
			aria-name="close mobile menu"
			data-close-mobile-menu>
	</button>
	<?php wp_nav_menu([
		'theme_location' => 'primary-menu',
		'menu_class' => 'main-menu',
		'container' => 'nav',
		'container_class' => 'header__mobile-menu mobile-only',
		'walker' => new CHRCH_Accordion_Menu_Walker()
	]); ?>
</div>