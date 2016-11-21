<?php

if (!function_exists('newsroom_elated_page_options_map')) {

    function newsroom_elated_page_options_map() {

        newsroom_elated_add_admin_page(
            array(
                'slug' => '_page_page',
                'title' => esc_html__('Page', 'newsroom'),
                'icon' => 'fa fa-institution'
            )
        );

        $custom_sidebars = newsroom_elated_get_custom_sidebars();

        $panel_sidebar = newsroom_elated_add_admin_panel(
            array(
                'page' => '_page_page',
                'name' => 'panel_sidebar',
                'title' => esc_html__('Design Style', 'newsroom')
            )
        );

        newsroom_elated_add_admin_field(array(
            'name' => 'page_sidebar_layout',
            'type' => 'select',
            'label' => esc_html__('Sidebar Layout', 'newsroom'),
            'description' => esc_html__('Choose a sidebar layout for pages', 'newsroom'),
            'default_value' => 'default',
            'parent' => $panel_sidebar,
            'options' => array(
                'default' => esc_html__('No Sidebar', 'newsroom'),
                'sidebar-33-right' => esc_html__('Sidebar 1/3 Right', 'newsroom'),
                'sidebar-25-right' => esc_html__('Sidebar 1/4 Right', 'newsroom'),
                'sidebar-33-left' => esc_html__('Sidebar 1/3 Left', 'newsroom'),
                'sidebar-25-left' => esc_html__('Sidebar 1/4 Left', 'newsroom')
            )
        ));


        if (count($custom_sidebars) > 0) {
            newsroom_elated_add_admin_field(array(
                'name' => 'page_custom_sidebar',
                'type' => 'selectblank',
                'label' => esc_html__('Sidebar to Display', 'newsroom'),
                'description' => esc_html__('Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'newsroom'),
                'parent' => $panel_sidebar,
                'options' => $custom_sidebars
            ));
        }

        newsroom_elated_add_admin_field(array(
            'name' => 'page_show_comments',
            'type' => 'yesno',
            'label' => esc_html__('Show Comments', 'newsroom'),
            'description' => esc_html__('Enabling this option will show comments on your page', 'newsroom'),
            'default_value' => 'yes',
            'parent' => $panel_sidebar
        ));

    }

    add_action('newsroom_elated_options_map', 'newsroom_elated_page_options_map', 5);

}