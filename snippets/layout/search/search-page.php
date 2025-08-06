<section class="ccontain search-results">
	<form class="search-form"
		  method="GET"
		  action="<?= get_site_url() ?>">
		<div class="ccontain">
			<input name="s" type="text" value="<?= $the_query->query['s'] ?>" />
			<input type="submit" value="Search" />
		</div>
	</form>
	
	<div class="search-results__archive flexible-grid">
		<?php
			while ($the_query->have_posts()) {
				$the_query->the_post();
				util_render_snippet('layout/search/search-tile', array(
					'post' => get_post()
				), false);
			}
		?>
	</div>

	<?= util_render_snippet('common/pagination') ?>
</section>