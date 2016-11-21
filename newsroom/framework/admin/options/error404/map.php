<?php

if (!function_exists('newsroom_elated_error_404_options_map')) {

    function newsroom_elated_error_404_options_map() {

        newsroom_elated_add_admin_page(array(
            'slug' => '__404_error_page',
            'title' => esc_html__('404 Error Page', 'newsroom'),
            'icon' => 'fa fa-exclamation-triangle'
        ));

        $panel_404_options = newsroom_elated_add_admin_panel(array(
            'page' => '__404_error_page',
            'name' => 'panel_404_options',
            'title' => esc_html__('404 Page Option', 'newsroom')
        ));

        newsroom_elated_add_admin_field(array(
            'parent' => $panel_404_options,
            'type' => 'text',
            'name' => '404_title',
            'default_value' => '',
            'label' => esc_html__('Title', 'newsroom'),
            'description' => 'Enter title for 404 page'
        ));

        newsroom_elated_add_admin_field(array(
            'parent' => $panel_404_options,
            'type' => 'text',
            'name' => '404_text',
            'default_value' => '',
            'label' => esc_html__('Text', 'newsroom'),
            'description' => esc_html__('Enter text for 404 page', 'newsroom')
        ));

        newsroom_elated_add_admin_field(array(
            'parent' => $panel_404_options,
            'type' => 'text',
            'name' => '404_back_to_home',
            'default_value' => '',
            'label' => esc_html__('Back to Home Button Label', 'newsroom'),
            'description' => esc_html__('Enter label for "Back to Home" button', 'newsroom')
        ));

    }

    add_action('newsroom_elated_options_map', 'newsroom_elated_error_404_options_map', 16);

}