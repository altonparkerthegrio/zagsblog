<?php

if (!function_exists('newsroom_elated_bbpress_options_map')) {
    /**
     * Maps options that are specific to BBPress
     */
    function newsroom_elated_bbpress_options_map() {
        $custom_sidebars = newsroom_elated_get_custom_sidebars();

        newsroom_elated_add_admin_page(
            array(
                'slug' => '_bbpress',
                'title' => esc_html__('BBPress', 'newsroom'),
                'icon' => 'fa fa-users'
            )
        );

        $panel_bbpress = newsroom_elated_add_admin_panel(
            array(
                'page' => '_bbpress',
                'name' => 'panel_bbpress',
                'title' => esc_html__('BBPress', 'newsroom'),
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'bbpress_archive_slider',
                'type' => 'text',
                'default_value' => '',
                'label' => esc_html__('Forums Page Slider Shortcode', 'newsroom'),
                'description' => esc_html__('Enter shortcode for slider that will be displayed on forums page', 'newsroom'),
                'parent' => $panel_bbpress,
                'args' => array(
                    'col_width' => 4
                )
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'bbpress_show_archive_title',
                'type' => 'yesno',
                'default_value' => 'yes',
                'label' => esc_html__('Display Page Title on Forums Page?', 'newsroom'),
                'description' => esc_html__('Enabling this option will display page title on forums page', 'newsroom'),
                'parent' => $panel_bbpress
            )
        );

        newsroom_elated_add_admin_field(array(
            'name' => 'bbpress_sidebar_layout',
            'type' => 'select',
            'label' => esc_html__('BBPress Sidebar', 'newsroom'),
            'description' => esc_html__('Choose a sidebar layout for all BBPress pages', 'newsroom'),
            'parent' => $panel_bbpress,
            'options' => array(
                'default' => esc_html__('No Sidebar', 'newsroom'),
                'sidebar-33-right' => esc_html__('Sidebar 1/3 Right', 'newsroom'),
                'sidebar-25-right' => esc_html__('Sidebar 1/4 Right', 'newsroom'),
                'sidebar-33-left' => esc_html__('Sidebar 1/3 Left', 'newsroom'),
                'sidebar-25-left' => esc_html__('Sidebar 1/4 Left', 'newsroom'),
            )
        ));


        if (count($custom_sidebars) > 0) {
            newsroom_elated_add_admin_field(array(
                'name' => 'bbpress_sidebar',
                'type' => 'selectblank',
                'label' => esc_html__('Sidebar to Display', 'newsroom'),
                'description' => esc_html__('Choose a sidebar to display on all BBPress pages. Default sidebar is "Sidebar Page', 'newsroom'),
                'parent' => $panel_bbpress,
                'options' => newsroom_elated_get_custom_sidebars()
            ));
        }
    }

    add_action('newsroom_elated_options_map', 'newsroom_elated_bbpress_options_map', 19);
}