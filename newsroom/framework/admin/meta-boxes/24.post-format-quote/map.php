<?php

/*** Quote Post Format ***/

$quote_post_format_meta_box = newsroom_elated_add_meta_box(
    array(
        'scope' => array('post'),
        'title' => esc_html__('Quote Post Format', 'newsroom'),
        'name' => 'post_format_quote_meta'
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'name' => 'eltd_post_quote_author_meta',
        'type' => 'text',
        'label' => esc_html__('Quote Author', 'newsroom'),
        'description' => esc_html__('Enter Quote Author', 'newsroom'),
        'parent' => $quote_post_format_meta_box,

    )
);

