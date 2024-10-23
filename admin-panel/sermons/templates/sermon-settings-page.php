<div class="wrap">

	<h1>Sermon Settings</h1>
	
	<form method="post" action="options.php"> 
		<?php settings_fields( 'brg-sermons' ); ?>
		<?php do_settings_sections( 'brg-sermons' ); ?>

		<div class="options-table">
			<div class="option">
				<div>Sermon Feed</div>
				<div>
					<input type="text" 
						   name="sermon_feed" 
						   value="<?php echo esc_attr( get_option('sermon_feed') ); ?>" />
				</div>
				<div class="info">
					Leave blank for no feed and manual sermon uploads
				</div>
			</div>
		</div>

		<?php submit_button(); ?>
	</form>

	<?php if (get_option('sermon_feed')) { ?>
		<form method="post">
			<input type="hidden" name="manual-fetch-sermons" value="yappa" />
			<?php submit_button('Fetch Sermons'); ?>
		</form>
	<?php } ?>

	<style type="text/css">
		.options-table {
			margin-top: 2rem;
		}

		.option {
			display: grid;
			grid-template-columns: repeat(2, 1fr);
			font-size: 1.25rem;
		}

		.option .info {
			font-size: 0.8em;
		}
	</style>
</div>