<?php ob_start(); ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> style="margin-top: 0 !important">
	<head>
		<title><?= apply_filters('church_get_site_title', get_bloginfo('name')) ?></title>
		<link rel="icon" type="image/x-icon" href="<?= get_site_icon_url() ?>">

		<?php wp_head(); ?>

		<?php do_action('church_meta_stuffs'); ?>

		<?= util_render_snippet('layout/global/meta-tags') ?>

		<link rel="stylesheet" type="text/css" href="<?php echo get_site_url(); ?>/wp-includes/css/dist/block-library/style.min.css" />
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?<?= util_get_fonts() ?>&display=swap" rel="stylesheet">

		<?php block_header_area(); ?>
		
		<?php if (is_customize_preview() || current_user_can('administrator')) { ?>
			<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/styles/main.css.php">
			<style type="text/css">
				<?php include 'assets/styles/utilities/variables.css.php'; ?>
			</style>
		<?php } else { ?>
			<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/styles/main.build.css">
		<?php } ?>

		<?php if (get_option('enable_hero_parallax') == 'yes') { ?>
			<script type="module" src="<?php echo get_template_directory_uri(); ?>/assets/scripts/components/parallax.js"></script>
		<?php } ?>
	</head>

	<body <?php body_class(); ?>>
		<a href="#MainContent" class="skip-to-link">
			Skip to content
		</a>

		<?php util_render_snippet('layout/global/header', array(), false); ?>

		<div id="MainContent">
			<?php do_action('church_layout_before_hero'); ?>

<?php $contents = ob_get_clean(); ?>
<?php echo preg_replace('/\s+/', ' ', $contents); ?>