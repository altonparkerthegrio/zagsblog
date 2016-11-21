<?php

if (!function_exists('newsroom_elated_content_options_map')) {

    function newsroom_elated_content_options_map() {

        newsroom_elated_add_admin_page(
            array(
                'slug' => '_content_page',
                'title' => esc_html__('Content', 'newsroom'),
                'icon' => 'fa fa-institution'
            )
        );

        $panel_content = newsroom_elated_add_admin_panel(
            array(
                'page' => '_content_page',
                'name' => 'panel_content',
                'title' => esc_html__('General', 'newsroom')
            )
        );

        newsroom_elated_add_admin_field(array(
            'type' => 'text',
            'name' => 'content_top_padding',
            'description' => esc_html__('Enter top padding for content area for templates in full width. If you set this value then it\'s important to set also Content top padding for mobile header value', 'newsroom'),
            'default_value' => '20',
            'label' => esc_html__('Content Top Padding for Template in Full Width', 'newsroom'),
            'args' => array(
                'suffix' => 'px',
                'col_width' => 3
            ),
            'parent' => $panel_content
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'text',
            'name' => 'content_top_padding_in_grid',
            'description' => esc_html__('Enter top padding for content area for Templates in grid. If you set this value then it\'s important to set also Content top padding for mobile header value', 'newsroom'),
            'default_value' => '20',
            'label' => esc_html__('Content Top Padding for Templates in Grid', 'newsroom'),
            'args' => array(
                'suffix' => 'px',
                'col_width' => 3
            ),
            'parent' => $panel_content
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'text',
            'name' => 'content_top_padding_mobile',
            'description' => esc_html__('Enter top padding for content area for Mobile Header', 'newsroom'),
            'default_value' => '',
            'label' => esc_html__('Content Top Padding for Mobile Header', 'newsroom'),
            'args' => array(
                'suffix' => 'px',
                'col_width' => 3
            ),
            'parent' => $panel_content
        ));

    }

    add_action('newsroom_elated_options_map', 'newsroom_elated_content_options_map', 6);

}