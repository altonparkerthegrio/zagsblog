<?php

if (!function_exists('newsroom_elated_search_options_map')) {

    function newsroom_elated_search_options_map() {

        newsroom_elated_add_admin_page(
            array(
                'slug' => '_search_page',
                'title' => esc_html__('Search Page', 'newsroom'),
                'icon' => 'fa fa-search'
            )
        );

        $search_panel = newsroom_elated_add_admin_panel(
            array(
                'title' => esc_html__('Search Page', 'newsroom'),
                'name' => 'search',
                'page' => '_search_page'
            )
        );

        newsroom_elated_add_admin_field(array(
            'name' => 'enable_search_page_sidebar',
            'type' => 'select',
            'label' => esc_html__('Enable Sidebar for Search Pages', 'newsroom'),
            'description' => esc_html__('Enabling this option you will display sidebar on your Search Pages', 'newsroom'),
            'default_value' => 'yes',
            'parent' => $search_panel,
            'options' => array(
                'yes' => esc_html__('Yes', 'newsroom'),
                'no' => esc_html__('No', 'newsroom'),
            )
        ));

        $custom_sidebars = newsroom_elated_get_custom_sidebars();

        if (count($custom_sidebars) > 0) {
            newsroom_elated_add_admin_field(array(
                'name' => 'search_page_custom_sidebar',
                'type' => 'selectblank',
                'label' => esc_html__('Custom Sidebar to Display', 'newsroom'),
                'description' => esc_html__('Choose a custom sidebar to display on your Search Pages. Default sidebar is "Sidebar Page"', 'newsroom'),
                'parent' => $search_panel,
                'options' => newsroom_elated_get_custom_sidebars()
            ));
        }

    }

    add_action('newsroom_elated_options_map', 'newsroom_elated_search_options_map', 8);
}