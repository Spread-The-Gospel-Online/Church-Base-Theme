<?php
    $staffPosts = get_posts(array(
        'post_type' => 'staff',
        'post__in' => explode(',', $staff_ids)
    ));
?>

<div class="flexible-grid <?= $classes ?>" style="--number-columns: <?= $columns ?>; --staff-image-width: <?= $image_width ?>px;">
    <?php 
        foreach ($staffPosts as $staff) {
            $snippet = $view == 'compact' ? 'compact' : 'expanded';
            $image_id = get_post_thumbnail_id($staff);
            $image_src = $image_id ? wp_get_attachment_image_src($image_id, 'full', false)[0] : false;
            util_render_snippet('staff/staff-member-' . $snippet, array(
                'staff' => $staff,
                'staff_img' => $image_src,
                'image_layout' => $image_layout,
            ), false);
        }
    ?>
</div>