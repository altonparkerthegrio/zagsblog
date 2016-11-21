<?php

$standard_post_format_meta_box = newsroom_elated_add_meta_box(
    array(
        'scope' => array('post'),
        'title' => esc_html__('Standard Post Format', 'newsroom'),
        'name' => 'post_format_standard_meta'
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'name' => 'eltd_show_featured_post',
        'type' => 'select',
        'default_value' => 'no',
        'label' => esc_html__('Set as featured post', 'newsroom'),
        'description' => esc_html__('Enable this option will show this post as featured', 'newsroom'),
        'parent' => $standard_post_format_meta_box,
        'options' => array(
            'no' => esc_html__('No', 'newsroom'),
            'yes' => esc_html__('Yes', 'newsroom')
        )
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'name' => 'eltd_blog_masonry_dimensions',
        'type' => 'selectblank',
        'label' => esc_html__('Dimensions for Masonry', 'newsroom'),
        'description' => esc_html__('Choose image layout in Blog Masonry shortcode', 'newsroom'),
        'parent' => $standard_post_format_meta_box,
        'options' => array(
            'default' => esc_html__('Default', 'newsroom'),
            'large-width' => esc_html__('Large width', 'newsroom'),
            'large-height' => esc_html__('Large height', 'newsroom')
        ),
        'default_value' => 'default'
    )
);