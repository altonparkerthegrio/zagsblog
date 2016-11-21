<?php

/*** Link Post Format ***/

$link_post_format_meta_box = newsroom_elated_add_meta_box(
    array(
        'scope' => array('post'),
        'title' => esc_html__('Link Post Format', 'newsroom'),
        'name' => 'post_format_link_meta'
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'name' => 'eltd_post_link_link_meta',
        'type' => 'text',
        'label' => esc_html__('Link', 'newsroom'),
        'description' => esc_html__('Enter link', 'newsroom'),
        'parent' => $link_post_format_meta_box,

    )
);

