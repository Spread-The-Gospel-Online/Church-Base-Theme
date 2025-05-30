<div class="notice notice-warning">
	<p>
		You are missing a menu for <?= ucwords(str_replace('-', ' ', $missing_menu)) ?>.
	</p>
	<p>
		<form method="POST" action="<?= admin_url('nav-menus.php?action=edit&menu=0') ?>">
			<button class="button button-primary">
				Add <?= ucwords(str_replace('-', ' ', $missing_menu)) ?>
			</button>
		</form>
	</p>
</div>