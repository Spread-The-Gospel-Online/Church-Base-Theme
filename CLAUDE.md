# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## What this is

A custom WordPress theme ("Church Theme") for church websites. It is **pure PHP + vanilla JS/CSS** — there is no `package.json`, `composer.json`, build tool, linter, or test suite. Development happens against a local XAMPP WordPress install; "running" the code means loading the WordPress site in a browser.

## CSS pipeline (important, non-obvious)

There is no Node build. CSS is assembled at runtime by PHP:

- `assets/styles/main.css.php` is the entry point. It `header()`s `Content-type: text/css`, then concatenates `utilities/resets.css`, every file in `components/*.css`, wraps `tablet/*.css` and `desktop/*.css` in `min-width` media queries, and appends two PHP-generated files: `utilities/gutenburg-color-classes.css.php` and `utilities/variables.css.php`.
- `variables.css.php` emits the entire `:root` custom-property set from `get_option()` values — every customizer setting flows into a CSS variable here. **Component CSS should reference these variables, not hardcode values.**
- Admins / customize-preview load `main.css.php` live (dynamic). Regular visitors load the static `assets/styles/main.build.css`.
- `main.build.css` is regenerated **only** on `customize_save_after` (see `core/customizer/core.php`), which renders `main.css.php` into the file. If you change component CSS and don't see it for logged-out users, the build file is stale — save the Customizer (or re-run that render) to refresh it.

To preview CSS changes without saving the customizer, view the site as an administrator (header.php serves the dynamic stylesheet to admins).

## Bootstrapping & module convention

`functions.php` requires five subsystem entry points in order: `core/`, `gutenberg-plugins/`, `settings/`, `admin-panel/`, `post-types/`.

Each subsystem's `index.php` is an autoloader following one of two patterns:
- **Flat**: `foreach (glob(__DIR__.'/*.php'))` requiring every sibling file (used in `settings/`, `core/hooks/`, `core/customizer/`, `core/utilities/`).
- **Nested**: `foreach (glob(__DIR__.'/*'))` requiring each subdirectory's `index.php` (used in `post-types/`, `gutenberg-plugins/`, `admin-panel/`).

**To add a feature, drop a file/folder into the right subsystem — it is picked up automatically. No manifest to edit.**

## Templating

`functions.php` overrides `template_include`. It builds a prefix (`single` for singular, `archive` for home/archive) and resolves `templates/{prefix}-{post_type}.php`, falling back to `templates/{prefix}.php`, with `templates/search.php` for search. Templates live in `templates/`.

Reusable view fragments are "snippets" rendered via `util_render_snippet($path, $vars, $return)` (`core/utilities/renderer.php`): it `extract()`s `$vars` and includes `snippets/{$path}.php`. Snippet output has whitespace collapsed (`preg_replace('/\s+/', ' ', ...)`) — same for `header.php`/full pages. Snippets are organized under `snippets/` by domain (`sermons/`, `events/`, `staff/`, `layout/`, `common/`, `icons/`).

## Custom post types & feature gating

Post types live in `post-types/{type}/` (`sermons`, `sermon-series`, `events`, `staff`, `ministries`, `layouts`, `global-settings`), typically with `setup.php` (registration), `query-controller.php`, `helpers.php`.

CPT registration is gated by `church_missing_type_support($post_type)` (`core/admin-utils.php`), which checks the `church_enabled_post_types` option. Each `register_post_type` returns early if its type isn't enabled. Respect this gate when adding post-type-dependent code.

Sermons can auto-import from an RSS feed: `post-types/sermons/sermon-xml-parser.php` + `scheduler.php` (cron). Settings page under `Sermons > Sermon Settings`.

## Gutenberg blocks

Server-rendered dynamic blocks live in `gutenberg-plugins/{block}/`, paired as: an editor JS script (`*-editor-script.js`, registered via `wp_enqueue_script` with `wp-blocks`/`wp-element`/etc.) and a PHP `render_callback`. Helper `church_util_register_gutenberg_server_callback($endpoint, $attributes, $callback)` (`core/utilities/gutenberg.php`) also exposes a block's renderer as a REST route under `church/v1` for live editor preview.

Every dynamic block implicitly receives the shared attributes `blockContainer`, `blockBottomMargin`, `blockBottomMarginDesktop`, `blockPadding`; `util_get_block_wrapper_classes()` turns them into wrapper classes (`ccontain`/`full-width`, `block-padding-*`, `mb-*`, `lg:mb-*`). Render callbacks generally just gather attributes and delegate to a snippet.

"Pattern blocks" (`gutenberg-plugins/pattern-blocks/`) render `wp_block` reusable patterns; several customizer settings store a pattern slug resolved via `util_get_pattern_object($option)` / `..._by_slug()`.

## Settings / Customizer

`settings/*.php` each register a Customizer section/controls (by domain: `hero`, `header`, `footer`, `fonts`, `site-colors`, `sermons`, `events`, `staff`, etc.). Theme appearance is driven almost entirely by `get_option()` values surfaced through `variables.css.php`.

Custom Customizer controls in `core/customizer/`: `Drag_And_Drop_Custom_Control` (orderable lists, e.g. sermon card order), `Sub_Section_Heading_Custom_Control`, subtitles. Conditional show/hide of controls uses `church_add_script_conditional($controls..., 'show_on', $value)` (`assets/scripts/templates/conditional-settings.js`).

Site colors define the `BASE_SITE_COLOR_OPTIONS` constant, fed into Gutenberg via `add_theme_support('editor-color-palette', ...)` and into `gutenburg-color-classes.css.php`.

## Frontend JS

Plain ES modules under `assets/scripts/` (`components/`, `templates/`, `utils/`, `web-components/`), loaded as `type="module"`. There are small custom web components (`html-for.js`, `html-if.js`). Parallax script is conditionally loaded based on the `church_enable_hero_parallax` option.

## Site setup requirements (from README)

- Permalinks **must** be set to "Post Name" for archives/CPT routing to work.
- Archive hero images are driven by creating a Page whose slug equals the post type (e.g. slug `sermons`). The theme surfaces admin notices for missing pages/menus (`snippets/admin/`, `admin-panel/notices/`).
