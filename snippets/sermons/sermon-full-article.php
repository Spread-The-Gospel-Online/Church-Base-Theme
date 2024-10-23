<article class="sermon">
	<?php echo $sermon_link; ?>
	<?php if ($pastor) { ?>
		<p>from <?php echo $pastor->post_title; ?></p>
	<?php } ?>
	<?php echo $description; ?>
</article>