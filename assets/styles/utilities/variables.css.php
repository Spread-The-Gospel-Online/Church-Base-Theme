:root {
	--primary: <?= get_option('css_color_primary'); ?>;
	--primary-hover: <?= get_option('css_color_primary-hover'); ?>;
	--secondary: <?= get_option('css_color_secondary'); ?>;
	--secondary-hover: <?= get_option('css_color_secondary-hover'); ?>;
	--tertiary: <?= get_option('css_color_tertiary'); ?>;
	--tertiary-hover: <?= get_option('css_color_tertiary-hover'); ?>;

	--white: <?= get_option('css_color_white'); ?>;
	--off-white: <?= get_option('css_color_off-white'); ?>;
	--grey-one: <?= get_option('css_color_grey-one'); ?>;
	--grey-two: <?= get_option('css_color_grey-two'); ?>;
	--grey-three: <?= get_option('css_color_grey-three'); ?>;
	--grey-four: <?= get_option('css_color_grey-four'); ?>;
	--black: <?= get_option('css_color_black'); ?>;

	--link: <?= get_option('css_color_link'); ?>;
	--link-hover: <?= get_option('css_color_link_hover'); ?>;
	--link-on: var(<?= church_get_best_contrast_option('css_color_link', 'css_color_grey-one', 'css_color_grey-four') ?>);

	--font-family-general: <?= get_option(get_option('font_general')) ?>;
	--font-family-headings: <?= get_option(get_option('font_headings')) ?>;

	--ccontain: <?= get_option('church_ccontain_default_size', 1252) ?>px;
	--number-columns-mobile: 1;
	--number-columns-tablet: 2;
	--number-columns: 2;

	--header-background: var(<?= get_option('css_header_background'); ?>);
	--header-text: var(<?= get_option('css_header_link_text'); ?>);
	--header-text-hover: var(<?= get_option('css_header_link_text_hover'); ?>);
	--submenu-background: var(<?= get_option('css_submenu_background') ?>);
	--submenu-text-color: var(<?= get_option('css_submenu_text') ?>);
	--submenu-text-color-hover: var(<?= get_option('css_submenu_text_hover') ?>);

	--logo-height: <?= get_option('church_logo_default_size', 115) ?>px;
	--logo-height-scrolled: <?= get_option('church_logo_scrolled_size', 90) ?>px;

	--hero-background: var(<?= get_option('css_hero_background_color') ?>);
	--hero-opacity: <?= get_option('hero_default_opacity') ?>;
	--hero-text: var(<?= get_option('css_hero_text_color') ?>);
	--hero-height: <?= get_option('hero_default_height', '40') ?>vh;

	--breadcrumbs: var(<?= get_option('css_breadcrumbs_background'); ?>);
	--breadcrumbs-transparent: <?= church_get_as_rgba('css_breadcrumbs_background', get_option('breadcrumbs_default_opacity')); ?>;
	--breadcrumbs-text: var(<?= get_option('css_breadcrumbs_text'); ?>);
	--breadcrumbs-text-hover: var(<?= get_option('css_breadcrumbs_text_hover'); ?>);	

	--footer-background: var(<?= get_option('css_footer_background') ?>);
	--footer-text: var(<?= get_option('css_footer_text') ?>);
	--copyright-background: var(<?= get_option('css_copyright_background') ?>);
	--copyright-text: var(<?= get_option('css_copyright_text') ?>);

	--border-width-small: 0px;
	--border-width-small: <?= get_option('church_border_width_small', 1) ?>px;
	--border-width-medium: <?= get_option('church_border_width_medium', 2) ?>px;
	--border-width-wide: <?= get_option('church_border_width_wide', 3) ?>px;

	--sermon-archive-grid-tablet-size: <?= get_option('church_archive_sermon_grid_tablet_size') ?>;
	--sermon-archive-grid-size: <?= get_option('church_archive_sermon_grid_size') ?>;
	--sermon-archive-margin: 3rem;
	--sermon-archive-row-gap: 3rem;
	--sermon-archive-col-gap: 2rem;

	--card-overlay-background: var(<?= get_option('css_card_overlay') ?>);
	--card-overlay-opacity: <?= get_option('card_overlay_opacity', 50) ?>;
	--card-overlay-opacity-hover: <?= get_option('card_overlay_opacity_hover', 50) ?>;
	--card-image-aspect-ratio: <?= get_option('church_archive_sermon_card_height', 50) ?>%;
	--card-contents-padding: <?= get_option('card_content_item_padding', 10) ?>px <?= get_option('card_content_item_padding', 10) * 2 ?>px;
	--card-contents-alignment: <?= get_option('card_content_text_align', 'left') ?>;
	--card-contents-spacing: <?= get_option('card_content_item_gap', 10) ?>px;
	--card-contents-background: <?= church_get_as_rgba('css_card_contents_background', get_option('card_background_opacity', 50)); ?>;
	--card-contents-text: var(<?= get_option('css_card_contents_text', '--black') ?>);
	--card-contents-links: var(<?= get_option('css_card_contents_links', '--primary') ?>);
	--card-contents-links-hover: var(<?= get_option('css_card_contents_links_hover', '--primary-hover') ?>);

	--sermon-content-item-width: <?= get_option('church_sermon_content_grid_size', 2) ?>;
	--sermon-content-width: <?= get_option('church_sermon_content_width', 800) ?>px;
	--sermon-download-background: var(<?= get_option('css_download_bg'); ?>);
	--sermon-download-background-hover: var(<?= get_option('css_download_bg_hover'); ?>);
	--sermon-download-text: var(<?= get_option('css_download_text'); ?>);
	--sermon-download-text-hover: var(<?= get_option('css_download_text_hover'); ?>);
	
	--calendar-header-background: var(<?= get_option('css_calendar_header_background') ?>);
	--calendar-header-text: var(<?= get_option('css_calendar_header_text') ?>);
	--calendar-outline: var(<?= get_option('css_calendar_outline') ?>);
	--calendar-background-one: var(<?= get_option('css_calendar_background_one') ?>);
	--calendar-background-two: var(<?= get_option('css_calendar_background_two') ?>);
	--calendar-border-width: var(--border-width-<?= get_option('church_calendar_border_width') ?>);

	--pagination-link: var(<?= get_option('css_pagination_interactive') ?>);
	--pagination-link-hover: var(<?= get_option('css_pagination_interactive_hover') ?>);
	--pagination-link-background: var(<?= get_option('css_pagination_interactive_background') ?>);
	--pagination-link-active: var(<?= get_option('css_pagination_current') ?>);
}