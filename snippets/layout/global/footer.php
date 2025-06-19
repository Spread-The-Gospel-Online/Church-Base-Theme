<?php
	$social_options = array('facebook', 'twitter', 'instagram');
	$footer_items = wp_get_nav_menu_items('footer');
	$footer_top_items = array_filter($footer_items, function ($item) {
		return $item->menu_item_parent == 0;
	});
	$number_columns = count($footer_top_items);

	$footer_pattern = util_get_pattern_object('church_footer_pattern');
	$menu_wrapper_classes = 'footer__menu-wrapper';
	if ($footer_pattern) {
		$menu_wrapper_classes .= ' footer__menu-wrapper--with-pattern';
	}
?>

<footer class="footer">
	<div class="ccontain">
		<ul class="social-links">
			<?php foreach ($social_options as $social_option) { ?>
				<?php $option_name = 'social_link_' . $social_option; ?>
				<?php if (get_option($option_name)) { ?>
					<li>
						<a href="<?= get_option($option_name) ?>" 
						   class="social-link" 
						   aria-label="visit our <?= $social_option ?> profile"
						   target="_blank">
							<?= util_render_snippet('icons/' . $social_option) ?>
						</a>
					</li>
				<?php } ?>
			<?php } ?>
		</ul>
	</div>
	<div class="ccontain <?= $menu_wrapper_classes ?>" style="--columns: <?= $number_columns ?>;">
		<?php if ($footer_pattern) { ?>
			<div>
				<?= util_get_actual_content($footer_pattern->post_content) ?>
			</div>
		<?php } ?>
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
			'menu_class' => 'footer-menu__list',
			'container' => 'nav',
			'container_class' => 'footer-menu footer-menu--desktop',
			'walker' => new CHRCH_Menu_Walker()
		]); ?>
	</div>
</footer>
<?php if (get_option('church_footer_display_copyright') == 'true') { ?>
	<div class="copyright text-small">
		<p class="ccontain">
			<?= str_replace('YYYY', date('Y'), get_option('copyright_text', 'Copyright @ YYYY')) ?>
		</p>
	</div>
<?php } ?>