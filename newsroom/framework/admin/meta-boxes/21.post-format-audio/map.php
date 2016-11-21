<?php

/*** Audio Post Format ***/

$audio_post_format_meta_box = newsroom_elated_add_meta_box(
    array(
        'scope' => array('post'),
        'title' => esc_html__('Audio Post Format', 'newsroom'),
        'name' => 'post_format_audio_meta'
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'name' => 'eltd_audio_type_meta',
        'type' => 'select',
        'label' => esc_html__('Audio Type', 'newsroom'),
        'description' => esc_html__('Choose audio type', 'newsroom'),
        'parent' => $audio_post_format_meta_box,
        'default_value' => 'social_networks',
        'options' => array(
            'social_networks' => esc_html__('Embedded link', 'newsroom'),
            'self' => esc_html__('Selfhosted', 'newsroom')
        ),
        'args' => array(
            'dependence' => true,
            'hide' => array(
                'social_networks' => '#eltd_eltd_audio_self_hosted_container',
                'self' => '#eltd_eltd_audio_embedded_container'
            ),
            'show' => array(
                'social_networks' => '#eltd_eltd_audio_embedded_container',
                'self' => '#eltd_eltd_audio_self_hosted_container')
        )
    )
);

$eltd_audio_embedded_container = newsroom_elated_add_admin_container(
    array(
        'parent' => $audio_post_format_meta_box,
        'name' => 'eltd_audio_embedded_container',
        'hidden_property' => 'eltd_audio_type_meta',
        'hidden_value' => 'self'
    )
);

$eltd_audio_self_hosted_container = newsroom_elated_add_admin_container(
    array(
        'parent' => $audio_post_format_meta_box,
        'name' => 'eltd_audio_self_hosted_container',
        'hidden_property' => 'eltd_audio_type_meta',
        'hidden_value' => 'social_networks'
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'name' => 'eltd_post_audio_link_meta',
        'type' => 'text',
        'label' => esc_html__('Audio URL', 'newsroom'),
        'description' => esc_html__('Enter audio URL', 'newsroom'),
        'parent' => $eltd_audio_embedded_container,
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'name' => 'eltd_post_audio_mp3_link_meta',
        'type' => 'text',
        'label' => esc_html__('Selfhosted Audio URL', 'newsroom'),
        'description' => esc_html__('Enter audio URL for MP3 format', 'newsroom'),
        'parent' => $eltd_audio_self_hosted_container,
    )
);