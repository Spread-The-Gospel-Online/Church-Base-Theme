<?php

class Church_Theme_Planner_Page {

	// The color families the planner manages. The picked color fills each
	// family's "-100" slot (the darkest, which the site's --primary/--secondary
	// actually use); the lighter variants below are generated from it.
	const FAMILIES = array('primary', 'secondary');

	// Fixed lighten steps used to generate the lighter variants from the picked
	// "-100" color. The value is the fraction to tint toward white. Tuned to
	// roughly approximate the default ramp — adjust here to change the spacing.
	const SHADE_STEPS = array(
		'200' => 0.12,
		'300' => 0.28,
		'400' => 0.45,
	);

	// Populated with the page hook suffix so assets load only on this screen.
	public static $hook = '';

	public static function render () {
		require_once('templates/theme-planner-page.php');
	}

	// Every css_color_* option key this page is allowed to write.
	public static function managed_option_keys () {
		$keys = array();
		foreach (self::FAMILIES as $family) {
			$keys[] = 'css_color_' . $family . '-100';
			foreach (array_keys(self::SHADE_STEPS) as $shade) {
				$keys[] = 'css_color_' . $family . '-' . $shade;
			}
		}
		// Accent is a single color (no ramp) — the picked/suggested value only.
		$keys[] = 'css_color_accent';
		return $keys;
	}

	public static function handle_save () {
		// Only act on this page's own submission — never touch other admin pages.
		if (!isset($_POST['church_theme_planner_nonce'])) {
			return;
		}
		if (!current_user_can('administrator')) {
			return;
		}
		$nonce = sanitize_text_field(wp_unslash($_POST['church_theme_planner_nonce']));
		if (!wp_verify_nonce($nonce, 'church_save_theme_planner')) {
			return;
		}

		foreach (self::managed_option_keys() as $key) {
			if (!isset($_POST[$key])) {
				continue;
			}
			$hex = sanitize_hex_color(wp_unslash($_POST[$key]));
			// Skip empty/invalid values so a cleared field can't wipe a color.
			if ($hex) {
				update_option($key, $hex);
			}
		}

		// Regenerate the static stylesheet so logged-out visitors see the change.
		if (function_exists('church_rebuild_main_build_css')) {
			church_rebuild_main_build_css();
		}

		// main.css.php emits a "text/css" header when the rebuild includes it,
		// so we must redirect + exit rather than render this request as HTML.
		wp_safe_redirect(admin_url('themes.php?page=theme-planner&updated=1'));
		exit;
	}
}

// Register the page under Appearance.
add_action('admin_menu', function () {
	Church_Theme_Planner_Page::$hook = add_theme_page(
		'Theme Planner',
		'Theme Planner',
		'administrator',
		'theme-planner',
		array('Church_Theme_Planner_Page', 'render')
	);
});

// Load the page's script only on the Theme Planner screen.
add_action('admin_enqueue_scripts', function ($hook_suffix) {
	if ($hook_suffix !== Church_Theme_Planner_Page::$hook) {
		return;
	}
	wp_enqueue_script(
		'church-theme-planner',
		get_template_directory_uri() . '/admin-panel/theme-planner/theme-planner.js',
		array(),
		null,
		true
	);
});

// Handle the Save Colors form submission.
add_action('admin_init', array('Church_Theme_Planner_Page', 'handle_save'));

// Success notice after a save redirect.
add_action('admin_notices', function () {
	if (!isset($_GET['page']) || $_GET['page'] !== 'theme-planner') {
		return;
	}
	if (!isset($_GET['updated'])) {
		return;
	}
	echo '<div class="notice notice-success is-dismissible"><p>Colors saved.</p></div>';
});
