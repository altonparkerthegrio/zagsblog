<?php

/*** Video Post Format ***/

$video_post_format_meta_box = newsroom_elated_add_meta_box(
    array(
        'scope' => array('post'),
        'title' => esc_html__('Video Post Format', 'newsroom'),
        'name' => 'post_format_video_meta'
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'name' => 'eltd_video_type_meta',
        'type' => 'select',
        'label' => esc_html__('Video Type', 'newsroom'),
        'description' => esc_html__('Choose video type', 'newsroom'),
        'parent' => $video_post_format_meta_box,
        'default_value' => 'social_networks',
        'options' => array(
            'social_networks' => esc_html__('Embedded link', 'newsroom'),
            'self' => esc_html__('Selfhosted', 'newsroom')
        ),
        'args' => array(
            'dependence' => true,
            'hide' => array(
                'social_networks' => '#eltd_eltd_video_self_hosted_container',
                'self' => '#eltd_eltd_video_embedded_container'
            ),
            'show' => array(
                'social_networks' => '#eltd_eltd_video_embedded_container',
                'self' => '#eltd_eltd_video_self_hosted_container')
        )
    )
);

$eltd_video_embedded_container = newsroom_elated_add_admin_container(
    array(
        'parent' => $video_post_format_meta_box,
        'name' => 'eltd_video_embedded_container',
        'hidden_property' => 'eltd_video_type_meta',
        'hidden_value' => 'self'
    )
);

$eltd_video_self_hosted_container = newsroom_elated_add_admin_container(
    array(
        'parent' => $video_post_format_meta_box,
        'name' => 'eltd_video_self_hosted_container',
        'hidden_property' => 'eltd_video_type_meta',
        'hidden_value' => 'social_networks'
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'name' => 'eltd_post_video_link_meta',
        'type' => 'text',
        'label' => esc_html__('Video URL', 'newsroom'),
        'description' => esc_html__('Enter video URL', 'newsroom'),
        'parent' => $eltd_video_embedded_container,
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'name' => 'eltd_post_video_image_meta',
        'type' => 'image',
        'label' => esc_html__('Video Image', 'newsroom'),
        'description' => esc_html__('Upload video image', 'newsroom'),
        'parent' => $eltd_video_self_hosted_container,
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'name' => 'eltd_post_video_mp4_link_meta',
        'type' => 'text',
        'label' => esc_html__('Selfhosted Video URL', 'newsroom'),
        'description' => esc_html__('Enter video URL for MP4 format', 'newsroom'),
        'parent' => $eltd_video_self_hosted_container,
    )
);