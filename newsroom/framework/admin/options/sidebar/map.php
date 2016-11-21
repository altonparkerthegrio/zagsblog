<?php

if (!function_exists('newsroom_elated_sidebar_options_map')) {

    function newsroom_elated_sidebar_options_map() {

        newsroom_elated_add_admin_page(
            array(
                'slug' => '_sidebar_page',
                'title' => esc_html__('Sidebar', 'newsroom'),
                'icon' => 'fa fa-bars'
            )
        );

        $panel_widgets = newsroom_elated_add_admin_panel(
            array(
                'page' => '_sidebar_page',
                'name' => 'panel_widgets',
                'title' => esc_html__('Widgets', 'newsroom')
            )
        );

        /**
         * Navigation style
         */
        newsroom_elated_add_admin_field(array(
            'type' => 'color',
            'name' => 'sidebar_background_color',
            'default_value' => '',
            'label' => esc_html__('Sidebar Background Color', 'newsroom'),
            'description' => esc_html__('Choose background color for sidebar', 'newsroom'),
            'parent' => $panel_widgets
        ));

        $group_sidebar_padding = newsroom_elated_add_admin_group(array(
            'name' => 'group_sidebar_padding',
            'title' => esc_html__('Padding', 'newsroom'),
            'parent' => $panel_widgets
        ));

        $row_sidebar_padding = newsroom_elated_add_admin_row(array(
            'name' => 'row_sidebar_padding',
            'parent' => $group_sidebar_padding
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'sidebar_padding_top',
            'default_value' => '',
            'label' => esc_html__('Top Padding', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_sidebar_padding
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'sidebar_padding_right',
            'default_value' => '',
            'label' => esc_html__('Right Padding', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_sidebar_padding
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'sidebar_padding_bottom',
            'default_value' => '',
            'label' => esc_html__('Bottom Padding', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_sidebar_padding
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'sidebar_padding_left',
            'default_value' => '',
            'label' => esc_html__('Left Padding', 'newsroom'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_sidebar_padding
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'select',
            'name' => 'sidebar_alignment',
            'default_value' => '',
            'label' => esc_html__('Text Alignment', 'newsroom'),
            'description' => esc_html__('Choose text aligment', 'newsroom'),
            'options' => array(
                'left' => esc_html__('Left', 'newsroom'),
                'center' => esc_html__('Center', 'newsroom'),
                'right' => esc_html__('Right', 'newsroom')
            ),
            'parent' => $panel_widgets
        ));

    }

    add_action('newsroom_elated_options_map', 'newsroom_elated_sidebar_options_map', 7);
}