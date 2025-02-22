<?php
	if (!$staff_img || $staff_img == '') {
		$staff_img = 'https://gravatar.com/avatar/000000000000000000000000000000000000000000000000000000?d=mp';
	}
?>

<a href="<?= get_site_url() ?>/staff/<?= $staff->post_name ?>" 
   class="staff-member staff-member--expanded staff-member--<?= $image_layout ?>">
	<img src="<?= $staff_img ?>"
		 alt="<?= $staff->post_title ?>"
		 class="staff-member__image" />
	<span>
		<?= $staff->post_title ?>
	</span>
</a>