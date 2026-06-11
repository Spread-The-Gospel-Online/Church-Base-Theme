<?php
	$social_options = array('facebook', 'twitter', 'instagram', 'youtube');
	$active_social_options = array_filter($social_options, function ($social_option) {
		return get_option('church_social_link_' . $social_option);
	});
?>

<?php if ($active_social_options) { ?>
	<div class="ccontain">
		<ul class="social-links">
			<?php foreach ($active_social_options as $social_option) { ?>
				<?php $option_name = 'church_social_link_' . $social_option; ?>
				<li>
					<a href="<?= get_option($option_name) ?>"
					   class="social-link"
					   aria-label="visit our <?= $social_option ?> profile"
					   target="_blank">
						<?= util_render_snippet('icons/' . $social_option) ?>
					</a>
				</li>
			<?php } ?>
		</ul>
	</div>
<?php } ?>
