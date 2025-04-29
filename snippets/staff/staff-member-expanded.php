<?php
	if (!$staff_img || $staff_img == '') {
		$staff_img = 'https://gravatar.com/avatar/000000000000000000000000000000000000000000000000000000?d=mp';
	}
?>

<div class="staff-member staff-member--expanded staff-member--<?= $image_layout ?>">
	<a href="<?= get_site_url() ?>/staff/<?= $staff->post_name ?>">
		<img src="<?= $staff_img ?>"
			 alt="<?= $staff->post_title ?>"
			 class="staff-member__image" />
	</a>
	<span class="staff-member__content">
		<a href="<?= get_site_url() ?>/staff/<?= $staff->post_name ?>">
			<?= $staff->post_title ?>
		</a>
		<span>
			<?= $staff->post_excerpt ?>
		</span>
	</span>
</div>