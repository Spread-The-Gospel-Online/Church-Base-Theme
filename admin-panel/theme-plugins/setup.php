<?php

class Church_Theme_Plugins_Page {

	// Keyed by plugin slug, which must match the plugin's folder name in wp-content/plugins.
	const PLUGINS = array(
		'mailchimp-newsletter-post-type' => array(
			'name' => 'Mailchimp Newsletter Post Type',
			'description' => 'Adds a Newsletters section and automatically imports your sent Mailchimp campaigns onto the site.',
			'github_url' => 'https://github.com/Spread-The-Gospel-Online/Newsletter-Plugin'
		)
	);

	const ERROR_MESSAGES = array(
		'unknown_plugin' => 'That plugin isn\'t one of the theme plugins.',
		'already_installed' => 'That plugin is already added - check the plugins page to ensure it is installed.',
		'missing_zip_archive' => 'The server is missing PHP\'s ZipArchive extension. Ask your host to enable it.',
		'download_failed' => 'The plugin couldn\'t be downloaded from GitHub. Try again in a few minutes.',
		'invalid_zip' => 'The downloaded file wasn\'t a valid zip.',
		'extract_failed' => 'The plugin couldn\'t be unpacked into the plugins folder.',
		'rename_failed' => 'The plugin was unpacked but couldn\'t be renamed to its plugin folder. Remove the leftover folder from wp-content/plugins and try again.'
	);

	const PAGE_SLUG = 'theme-plugins';

	public static function render () {
		require_once('templates/theme-plugins-page.php');
	}

	public static function can_manage_plugins () {
		// Administrators only. install_plugins also turns false when DISALLOW_FILE_MODS is set.
		return current_user_can('administrator') && current_user_can('install_plugins');
	}

	public static function is_plugin_installed ($slug) {
		return is_dir(WP_PLUGIN_DIR . '/' . $slug);
	}

	// Returns true, or an ERROR_MESSAGES key.
	public static function install_plugin ($slug) {
		if (!array_key_exists($slug, self::PLUGINS)) {
			return 'unknown_plugin';
		}
		if (self::is_plugin_installed($slug)) {
			return 'already_installed';
		}
		if (!class_exists('ZipArchive')) {
			return 'missing_zip_archive';
		}

		$github_url = self::PLUGINS[$slug]['github_url'];
		$zip_path = WP_PLUGIN_DIR . '/' . $slug . '.zip';

		try {
			// HEAD follows each repo's default branch. Streamed so large repos never sit in memory.
			$response = wp_remote_get(untrailingslashit($github_url) . '/archive/HEAD.zip', array(
				'timeout' => 60,
				'stream' => true,
				'filename' => $zip_path
			));
			if (is_wp_error($response) || wp_remote_retrieve_response_code($response) !== 200) {
				return 'download_failed';
			}

			return self::extract_plugin_zip($zip_path, $slug);
		} finally {
			if (file_exists($zip_path)) {
				wp_delete_file($zip_path);
			}
		}
	}

	// GitHub archives unpack to a single "{repo}-{branch}/" folder, which is renamed to the slug.
	private static function extract_plugin_zip ($zip_path, $slug) {
		$zip = new ZipArchive();
		if ($zip->open($zip_path) !== true) {
			return 'invalid_zip';
		}

		$top_folder = strtok((string) $zip->getNameIndex(0), '/');
		$top_folder_path = WP_PLUGIN_DIR . '/' . $top_folder;

		// Never unpack over an existing folder, and never let an entry land outside the top
		// folder (a crafted archive could otherwise overwrite other plugins).
		if (!$top_folder || $top_folder === '..' || file_exists($top_folder_path)
			|| !self::is_zip_inside_folder($zip, $top_folder)) {
			$zip->close();
			return 'extract_failed';
		}

		$is_extracted = $zip->extractTo(WP_PLUGIN_DIR);
		$zip->close();
		if (!$is_extracted) {
			return 'extract_failed';
		}

		if (!rename($top_folder_path, WP_PLUGIN_DIR . '/' . $slug)) {
			return 'rename_failed';
		}

		return true;
	}

	private static function is_zip_inside_folder ($zip, $top_folder) {
		for ($entry_index = 0; $entry_index < $zip->numFiles; $entry_index++) {
			$entry_name = (string) $zip->getNameIndex($entry_index);
			$is_inside_folder = strpos($entry_name, $top_folder . '/') === 0;
			if (!$is_inside_folder || strpos($entry_name, '..') !== false) {
				return false;
			}
		}
		return true;
	}

	public static function handle_install () {
		// Only act on this page's own submission.
		if (!isset($_POST['church_theme_plugins_nonce'])) {
			return;
		}
		if (!self::can_manage_plugins()) {
			return;
		}
		$nonce = sanitize_text_field(wp_unslash($_POST['church_theme_plugins_nonce']));
		if (!wp_verify_nonce($nonce, 'church_install_theme_plugin')) {
			return;
		}

		$slug = isset($_POST['church_plugin_slug']) ? sanitize_key(wp_unslash($_POST['church_plugin_slug'])) : '';
		$result = self::install_plugin($slug);

		$query_args = $result === true
			? array('installed' => $slug)
			: array('install_error' => $result);

		wp_safe_redirect(add_query_arg(
			array_merge(array('page' => self::PAGE_SLUG), $query_args),
			admin_url('options-general.php')
		));
		exit;
	}

	public static function render_notices () {
		if (!isset($_GET['page']) || $_GET['page'] !== self::PAGE_SLUG) {
			return;
		}
		if (!self::can_manage_plugins()) {
			return;
		}

		$installed_slug = isset($_GET['installed']) ? sanitize_key(wp_unslash($_GET['installed'])) : '';
		if (array_key_exists($installed_slug, self::PLUGINS)) {
			util_render_snippet('admin/theme-plugin-notice', array(
				'notice_type' => 'success',
				'message' => self::PLUGINS[$installed_slug]['name'] . ' installed.',
				'link_url' => admin_url('plugins.php'),
				'link_text' => 'Activate it from the Plugins page.'
			), false);
		}

		$error_code = isset($_GET['install_error']) ? sanitize_key(wp_unslash($_GET['install_error'])) : '';
		if (array_key_exists($error_code, self::ERROR_MESSAGES)) {
			util_render_snippet('admin/theme-plugin-notice', array(
				'notice_type' => 'error',
				'message' => self::ERROR_MESSAGES[$error_code]
			), false);
		}
	}
}

// Register the page under Settings, for administrators only.
add_action('admin_menu', function () {
	if (!Church_Theme_Plugins_Page::can_manage_plugins()) {
		return;
	}
	add_options_page(
		'Theme Plugins',
		'Theme Plugins',
		'administrator',
		Church_Theme_Plugins_Page::PAGE_SLUG,
		array('Church_Theme_Plugins_Page', 'render')
	);
});

add_action('admin_init', array('Church_Theme_Plugins_Page', 'handle_install'));

add_action('admin_notices', array('Church_Theme_Plugins_Page', 'render_notices'));
