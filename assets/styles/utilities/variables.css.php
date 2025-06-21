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
	--transparent: transparent;

	--link: <?= get_option('css_color_link'); ?>;
	--link-on: var(<?= church_get_best_contrast_option('css_color_link', 'css_color_grey-one', 'css_color_grey-four') ?>);
	--link-hover: <?= get_option('css_color_link-hover'); ?>;

	--button-background: var(<?= get_option('css_button_background'); ?>);
	--button-background-hover: var(<?= get_option('css_button_background_hover'); ?>);
	--button-border: var(<?= get_option('css_button_border'); ?>);
	--button-border-hover: var(<?= get_option('css_button_border_hover'); ?>);
	--button-text: var(<?= get_option('css_button_text'); ?>);
	--button-text-hover: var(<?= get_option('css_button_text_hover'); ?>);

	--ada-outline: <?= get_option('css_color_ada-outline'); ?>;
	--label-color: var(<?= get_option('css_label_color'); ?>);
	--input-border: var(<?= get_option('css_input_border'); ?>);
	--input-background: var(<?= get_option('css_input_background'); ?>);
	--input-background-hover: var(<?= get_option('css_input_background_hover'); ?>);
	--input-background-active: var(<?= get_option('css_input_background_active'); ?>);

	--font-family-general: <?= get_font_var('font_general') ?>;
	--font-family-headings: <?= get_font_var('font_headings') ?>;
	--font-size-general: <?= get_option('church_general_font_size', 16) ?>px;
	--font-header-transform: <?= get_option('heading_text_transform', 'none') ?>;
	--font-header-letter-spacing: <?= get_option('heading_text_letter_spacing', 0) ?>px;
	--font-header-line-height: <?= get_option('heading_text_line_height') ?>;
	--font-general-letter-spacing: <?= get_option('general_text_letter_spacing', 0) ?>px;
	--font-general-line-height: <?= get_option('general_text_line_height') ?>;

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
	--header-text-font-family: <?= get_font_var('font_header_menu_family') ?>;
	--header-text-transform: <?= get_option('header_menu_text_transform') ?>;
	--header-text-letter-spacing: <?= get_option('header_menu_letter_spacing', 0) ?>px;
	--header-text-font-size: <?= get_option('header_menu_font_size', 16) ?>px;
	--header-text-font-weight: <?= get_option('header_menu_font_weight', 400) ?>;

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

	--blockquote-max-width: <?= get_option('church_blockquote_max_width', 800) ?>px;
	--blockquote-quote-font: <?= get_font_var('font_blockquotes_quote') ?>;
	--blockquote-quote-font-size: <?= get_option('font_blockquotes_quote_size', 4) ?>rem;
	--blockquote-background: var(<?= get_option('css_blockquote_background'); ?>);
	--blockquote-name: var(<?= get_option('css_blockquote_name') ?>);


	--footer-padding: <?= get_option('church_footer_padding', 48) ?>px;
	--footer-pattern-width: <?= get_option('church_footer_pattern_width', 25) ?>%;
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
	--card-overlay-opacity: <?= get_option('card_overlay_opacity', 0.50) ?>;
	--card-overlay-opacity-hover: <?= get_option('card_overlay_opacity_hover', 0.50) ?>;
	--card-image-aspect-ratio: <?= get_option('church_archive_sermon_card_height', 50) ?>%;
	--card-contents-padding: <?= get_option('card_content_item_padding', 10) ?>px <?= get_option('card_content_item_padding', 10) * 2 ?>px;
	--card-contents-alignment: <?= get_option('card_content_text_align', 'left') ?>;
	--card-contents-spacing: <?= get_option('card_content_item_gap', 10) ?>px;
	--card-contents-background: <?= church_get_as_rgba('css_card_contents_background', get_option('card_background_opacity', .50)); ?>;
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