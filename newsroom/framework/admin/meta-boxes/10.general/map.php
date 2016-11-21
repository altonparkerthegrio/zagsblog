<?php

$general_meta_box = newsroom_elated_add_meta_box(
    array(
        'scope' => array('page', 'post', 'forum', 'topic'),
        'title' => esc_html__('General', 'newsroom'),
        'name' => 'general_meta'
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'parent' => $general_meta_box,
        'type' => 'select',
        'name' => 'eltd_menu_area_style_meta',
        'default_value' => '',
        'label' => esc_html__('Menu Area Style', 'newsroom'),
        'description' => esc_html__('Choose predefined Menu Area style', 'newsroom'),
        'options' => array(
            '' => '',
            'dark' => esc_html__('Dark', 'newsroom'),
            'light' => esc_html__('Light', 'newsroom'),
            'transparent' => esc_html__('Transparent', 'newsroom')
        )
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'parent' => $general_meta_box,
        'type' => 'select',
        'name' => 'eltd_top_bar_style_meta',
        'default_value' => '',
        'label' => esc_html__('Top Bar Style', 'newsroom'),
        'description' => esc_html__('Choose predefined Top Bar style', 'newsroom'),
        'options' => array(
            '' => '',
            'dark' => esc_html__('Dark', 'newsroom'),
            'light' => esc_html__('Light', 'newsroom'),
            'transparent' => esc_html__('Transparent', 'newsroom')
        )
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'parent' => $general_meta_box,
        'name' => 'eltd_logo_position_meta',
        'type' => 'select',
        'default_value' => '',
        'label' => esc_html__('Logo position', 'newsroom'),
        'description' => esc_html__('Choose a logo position', 'newsroom'),
        'options' => array(
            '' => '',
            'center' => esc_html__('Center', 'newsroom'),
            'left' => esc_html__('Left', 'newsroom')
        )
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'name' => 'eltd_page_background_color_meta',
        'type' => 'color',
        'default_value' => '',
        'label' => esc_html__('Page Background Color', 'newsroom'),
        'description' => esc_html__('Choose background color for page content', 'newsroom'),
        'parent' => $general_meta_box
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'name' => 'eltd_boxed_meta',
        'type' => 'select',
        'default_value' => '',
        'label' => esc_html__('Boxed Layout', 'newsroom'),
        'description' => '',
        'parent' => $general_meta_box,
        'options' => array(
            '' => '',
            'yes' => esc_html__('Yes', 'newsroom'),
            'no' => esc_html__('No', 'newsroom'),
        ),
        'args' => array(
            "dependence" => true,
            'show' => array(
                '' => '',
                'yes' => '#eltd_eltd_boxed_container_meta',
                'no' => '',

            ),
            'hide' => array(
                '' => '#eltd_eltd_boxed_container_meta',
                'yes' => '',
                'no' => '#eltd_eltd_boxed_container_meta',
            )
        )
    )
);

$boxed_container = newsroom_elated_add_admin_container(
    array(
        'parent' => $general_meta_box,
        'name' => 'eltd_boxed_container_meta',
        'hidden_property' => 'eltd_boxed_meta',
        'hidden_values' => array('', 'no')
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'name' => 'eltd_page_background_color_in_box_meta',
        'type' => 'color',
        'label' => esc_html__('Page Background Color', 'newsroom'),
        'description' => esc_html__('Choose the page background color outside box.', 'newsroom'),
        'parent' => $boxed_container
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'name' => 'eltd_boxed_background_image_meta',
        'type' => 'image',
        'label' => esc_html__('Background Image', 'newsroom'),
        'description' => esc_html__('Choose an image to be displayed in background', 'newsroom'),
        'parent' => $boxed_container
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'name' => 'eltd_boxed_pattern_background_image_meta',
        'type' => 'image',
        'label' => esc_html__('Background Pattern', 'newsroom'),
        'description' => esc_html__('Choose an image to be used as background pattern', 'newsroom'),
        'parent' => $boxed_container
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'name' => 'eltd_boxed_background_image_attachment_meta',
        'type' => 'select',
        'default_value' => 'fixed',
        'label' => esc_html__('Background Image Attachment', 'newsroom'),
        'description' => esc_html__('Choose background image attachment', 'newsroom'),
        'parent' => $boxed_container,
        'options' => array(
            'fixed' => esc_html__('Fixed', 'newsroom'),
            'scroll' => esc_html__('Scroll', 'newsroom')
        )
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'name' => 'eltd_page_slider_meta',
        'type' => 'text',
        'default_value' => '',
        'label' => esc_html__('Slider Shortcode', 'newsroom'),
        'description' => esc_html__('Paste your slider shortcode here', 'newsroom'),
        'parent' => $general_meta_box
    )
);

$eltd_content_padding_group = newsroom_elated_add_admin_group(array(
    'name' => 'content_padding_group',
    'title' => esc_html__('Content Style', 'newsroom'),
    'description' => esc_html__('Define styles for Content area', 'newsroom'),
    'parent' => $general_meta_box
));

$eltd_content_padding_row = newsroom_elated_add_admin_row(array(
    'name' => 'eltd_content_padding_row',
    'next' => true,
    'parent' => $eltd_content_padding_group
));

newsroom_elated_add_meta_box_field(
    array(
        'name' => 'eltd_page_content_top_padding',
        'type' => 'textsimple',
        'default_value' => '',
        'label' => esc_html__('Content Top Padding', 'newsroom'),
        'parent' => $eltd_content_padding_row,
        'args' => array(
            'suffix' => 'px'
        )
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'name' => 'eltd_page_content_top_padding_mobile',
        'type' => 'selectblanksimple',
        'label' => esc_html__('Set this top padding for mobile header', 'newsroom'),
        'parent' => $eltd_content_padding_row,
        'options' => array(
            'yes' => esc_html__('Yes', 'newsroom'),
            'no' => esc_html__('No', 'newsroom'),
        )
    )
);

newsroom_elated_add_meta_box_field(
    array(
        'name' => 'eltd_page_comments_meta',
        'type' => 'selectblank',
        'label' => esc_html__('Show Comments', 'newsroom'),
        'description' => esc_html__('Enabling this option will show comments on your page', 'newsroom'),
        'parent' => $general_meta_box,
        'options' => array(
            'yes' => esc_html__('Yes', 'newsroom'),
            'no' => esc_html__('No', 'newsroom'),
        )
    )
);

if (newsroom_elated_options()->getOptionValue('header_type') != 'header-vertical') {
    newsroom_elated_add_meta_box_field(
        array(
            'name' => 'eltd_scroll_amount_for_sticky_meta',
            'type' => 'text',
            'label' => esc_html__('Scroll amount for sticky header appearance', 'newsroom'),
            'description' => esc_html__('Define scroll amount for sticky header appearance', 'newsroom'),
            'parent' => $general_meta_box,
            'args' => array(
                'col_width' => 2,
                'suffix' => 'px'
            )
        )
    );
}

newsroom_elated_add_meta_box_field(
    array(
        'type' => 'yesno',
        'name' => 'eltd_uncovering_footer_meta',
        'default_value' => 'yes',
        'label' => esc_html__('Uncovering Footer', 'newsroom'),
        'description' => esc_html__('Set footer to have uncovering behavior', 'newsroom'),
        'parent' => $general_meta_box,
    )
);