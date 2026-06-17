<?php

// "Documentation" admin area: a top-level menu (just below Settings) with one submenu per
// Markdown file in pages/. Every submenu links to this same page via a ?doc=<slug> query
// arg; render() reads that arg, loads the matching file, and renders it as HTML.
class Church_Documentation_Page {
	public static function render () {
		$pages = church_documentation_get_pages();

		// Resolve the requested doc against the known slugs (whitelist) — the file path
		// always comes from the trusted glob map, never from raw input.
		$slug = isset($_GET['doc']) ? sanitize_file_name(wp_unslash($_GET['doc'])) : '';
		if (!isset($pages[$slug])) {
			$slug = !empty($pages) ? array_key_first($pages) : '';
		}

		$current = $slug !== '' ? $pages[$slug] : null;
		$html = '';
		if ($current) {
			$html = church_documentation_markdown_to_html(file_get_contents($current['path']));
		}

		include get_template_directory() . '/admin-panel/documentation/templates/documentation-page.php';
	}
}

add_action('admin_menu', function () {
	add_menu_page(
		'Documentation',
		'Documentation',
		'administrator',
		'church-documentation',
		array('Church_Documentation_Page', 'render'),
		'dashicons-book',
		81 // just below Settings (80)
	);

	// One submenu per Markdown file, all pointing at the shared page with a ?doc arg.
	foreach (church_documentation_get_pages() as $slug => $page) {
		add_submenu_page(
			'church-documentation',
			$page['title'],
			$page['title'],
			'administrator',
			'church-documentation&doc=' . $slug,
			array('Church_Documentation_Page', 'render')
		);
	}
});
