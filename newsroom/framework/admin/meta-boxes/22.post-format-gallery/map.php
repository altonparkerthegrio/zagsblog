<?php

/*** Gallery Post Format ***/

$gallery_post_format_meta_box = newsroom_elated_add_meta_box(
    array(
        'scope' => array('post'),
        'title' => esc_html__('Gallery Post Format', 'newsroom'),
        'name' => 'post_format_gallery_meta'
    )
);

newsroom_elated_add_multiple_images_field(
    array(
        'name' => 'eltd_post_gallery_images_meta',
        'label' => esc_html__('Gallery Images', 'newsroom'),
        'description' => esc_html__('Choose your gallery images', 'newsroom'),
        'parent' => $gallery_post_format_meta_box,
    )
);
