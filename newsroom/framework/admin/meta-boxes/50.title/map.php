<?php

$title_meta_box = newsroom_elated_add_meta_box(
    array(
        'scope' => array('page', 'post', 'forum', 'topic'),
        'title' => esc_html__('Title', 'newsroom'),
        'name' => 'title_meta'
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'name' => 'eltd_show_title_area_meta',
        'type' => 'select',
        'default_value' => '',
        'label' => esc_html__('Show Title Area', 'newsroom'),
        'description' => esc_html__('Disabling this option will turn off page title area', 'newsroom'),
        'parent' => $title_meta_box,
        'options' => array(
            '' => '',
            'no' => esc_html__('No', 'newsroom'),
            'yes' => esc_html__('Yes', 'newsroom')
        ),
        'args' => array(
            "dependence" => true,
            "hide" => array(
                "" => "",
                "no" => "#eltd_eltd_show_title_area_meta_container",
                "yes" => ""
            ),
            "show" => array(
                "" => "#eltd_eltd_show_title_area_meta_container",
                "no" => "",
                "yes" => "#eltd_eltd_show_title_area_meta_container"
            )
        )
    )
);

$show_title_area_meta_container = newsroom_elated_add_admin_container(
    array(
        'parent' => $title_meta_box,
        'name' => 'eltd_show_title_area_meta_container',
        'hidden_property' => 'eltd_show_title_area_meta',
        'hidden_value' => 'no'
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'name' => 'eltd_title_area_type_meta',
        'type' => 'select',
        'default_value' => '',
        'label' => esc_html__('Title Area Type', 'newsroom'),
        'description' => esc_html__('Choose title type', 'newsroom'),
        'parent' => $show_title_area_meta_container,
        'options' => array(
            '' => '',
            'standard' => esc_html__('Standard', 'newsroom'),
            'breadcrumb' => esc_html__('Breadcrumb', 'newsroom')
        ),
        'args' => array(
            "dependence" => true,
            "hide" => array(
                "standard" => "",
                "standard" => "",
                "breadcrumb" => "#eltd_eltd_title_area_type_meta_container"
            ),
            "show" => array(
                "" => "#eltd_eltd_title_area_type_meta_container",
                "standard" => "#eltd_eltd_title_area_type_meta_container",
                "breadcrumb" => ""
            )
        )
    )
);

$title_area_type_meta_container = newsroom_elated_add_admin_container(
    array(
        'parent' => $show_title_area_meta_container,
        'name' => 'eltd_title_area_type_meta_container',
        'hidden_property' => 'eltd_title_area_type_meta',
        'hidden_value' => '',
        'hidden_values' => array('breadcrumb'),
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'name' => 'eltd_title_area_enable_breadcrumbs_meta',
        'type' => 'select',
        'default_value' => '',
        'label' => esc_html__('Enable Breadcrumbs', 'newsroom'),
        'description' => esc_html__('This option will display Breadcrumbs in Title Area', 'newsroom'),
        'parent' => $title_area_type_meta_container,
        'options' => array(
            '' => '',
            'no' => esc_html__('No', 'newsroom'),
            'yes' => esc_html__('Yes', 'newsroom')
        ),
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'name' => 'eltd_title_area_content_alignment_meta',
        'type' => 'select',
        'default_value' => '',
        'label' => esc_html__('Content Alignment', 'newsroom'),
        'description' => esc_html__('Specify title content alignment', 'newsroom'),
        'parent' => $show_title_area_meta_container,
        'options' => array(
            '' => '',
            'left' => esc_html__('Left', 'newsroom'),
            'center' => esc_html__('Center', 'newsroom'),
            'right' => esc_html__('Right', 'newsroom')
        )
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'name' => 'eltd_title_color_meta',
        'type' => 'color',
        'label' => esc_html__('Title Color', 'newsroom'),
        'description' => esc_html__('Choose a color for title text', 'newsroom'),
        'parent' => $show_title_area_meta_container
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'name' => 'eltd_title_breadcrumb_color_meta',
        'type' => 'color',
        'label' => esc_html__('Title Breadcrumbs Color', 'newsroom'),
        'description' => esc_html__('Choose a color for breadcrumb text', 'newsroom'),
        'parent' => $show_title_area_meta_container
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'name' => 'eltd_title_info_color_meta',
        'type' => 'color',
        'label' => esc_html__('Title Info Color', 'newsroom'),
        'description' => esc_html__('Choose a color for title info text (only for posts)', 'newsroom'),
        'parent' => $show_title_area_meta_container
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'name' => 'eltd_title_area_background_color_meta',
        'type' => 'color',
        'label' => esc_html__('Background Color', 'newsroom'),
        'description' => esc_html__('Choose a background color for Title Area', 'newsroom'),
        'parent' => $show_title_area_meta_container
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'name' => 'eltd_hide_background_image_meta',
        'type' => 'yesno',
        'default_value' => 'no',
        'label' => esc_html__('Hide Background Image', 'newsroom'),
        'description' => esc_html__('Enable this option to hide background image in Title Area', 'newsroom'),
        'parent' => $show_title_area_meta_container,
        'args' => array(
            "dependence" => true,
            "dependence_hide_on_yes" => "#eltd_eltd_hide_background_image_meta_container",
            "dependence_show_on_yes" => ""
        )
    )
);

$hide_background_image_meta_container = newsroom_elated_add_admin_container(
    array(
        'parent' => $show_title_area_meta_container,
        'name' => 'eltd_hide_background_image_meta_container',
        'hidden_property' => 'eltd_hide_background_image_meta',
        'hidden_value' => 'yes'
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'name' => 'eltd_title_area_background_image_meta',
        'type' => 'image',
        'label' => esc_html__('Background Image', 'newsroom'),
        'description' => esc_html__('Choose an Image for Title Area', 'newsroom'),
        'parent' => $hide_background_image_meta_container
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'name' => 'eltd_title_area_background_image_responsive_meta',
        'type' => 'select',
        'default_value' => '',
        'label' => esc_html__('Background Responsive Image', 'newsroom'),
        'description' => esc_html__('Enabling this option will make Title background image responsive', 'newsroom'),
        'parent' => $hide_background_image_meta_container,
        'options' => array(
            '' => '',
            'no' => esc_html__('No', 'newsroom'),
            'yes' => esc_html__('Yes', 'newsroom')
        ),
        'args' => array(
            "dependence" => true,
            "hide" => array(
                "" => "",
                "no" => "",
                "yes" => "#eltd_eltd_title_area_height_meta"
            ),
            "show" => array(
                "" => "#eltd_eltd_title_area_height_meta",
                "no" => "#eltd_eltd_title_area_height_meta",
                "yes" => ""
            )
        )
    )
);

newsroom_elated_add_meta_box_field(array(
    'name' => 'eltd_title_area_height_meta',
    'type' => 'text',
    'label' => esc_html__('Height', 'newsroom'),
    'description' => esc_html__('Set a height for Title Area', 'newsroom'),
    'parent' => $show_title_area_meta_container,
    'args' => array(
        'col_width' => 2,
        'suffix' => 'px'
    )
));

newsroom_elated_add_meta_box_field(
    array(
        'name' => 'eltd_title_area_border_color_meta',
        'type' => 'color',
        'label' => esc_html__('Bottom Border Color', 'newsroom'),
        'description' => esc_html__('Choose a bottom border color for Title Area', 'newsroom'),
        'parent' => $show_title_area_meta_container
    )
);