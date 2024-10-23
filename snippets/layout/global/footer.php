<footer class="footer">
	<div class="ccontain">
		<?php add_filter('church-menu-main-class', function () { return 'footer-menu'; }); ?>
		<?php wp_nav_menu([
			'theme_location' => 'footer-menu',
			'menu_class' => 'footer-menu',
			'container' => 'nav',
			'container_class' => 'footer-menu footer-menu--mobile',
			'walker' => new CHRCH_Accordion_Menu_Walker()
		]); ?>
		<?php wp_nav_menu([
			'theme_location' => 'footer-menu',
			'menu_class' => 'footer-menu',
			'container' => 'nav',
			'container_class' => 'footer-menu footer-menu--desktop',
			'walker' => new CHRCH_Menu_Walker()
		]); ?>
	</div>
</footer>
<div class="copyright text-small">
	<p class="ccontain">
		<?= str_replace('YYYY', date('Y'), get_option('copyright_text', 'Copyright @ YYYY')) ?>
	</p>
</div>