<?php

// Single source of truth for the documentation pages: enumerate the Markdown files in
// pages/ and key them by slug. Feeds both the submenu registration and the page renderer.
// slug  = filename without `.md` (a leading number, e.g. `1-`, orders the pages)
// title = filename with the leading number prefix dropped, dashes -> spaces, title-cased
function church_documentation_get_pages () {
	$pages = array();
	$dir = get_template_directory() . '/admin-panel/documentation/pages/';

	foreach (glob($dir . '*.md') as $path) {
		$slug = basename($path, '.md');
		$title_slug = preg_replace('/^\d+[-\s]*/', '', $slug); // drop leading "1-" ordering prefix
		$pages[$slug] = array(
			'title' => ucwords(str_replace('-', ' ', $title_slug)),
			'path' => $path,
		);
	}

	return $pages;
}
