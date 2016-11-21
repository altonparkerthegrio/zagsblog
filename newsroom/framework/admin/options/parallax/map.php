<?php

if (!function_exists('newsroom_elated_parallax_options_map')) {
    /**
     * Parallax options page
     */
    function newsroom_elated_parallax_options_map() {

        newsroom_elated_add_admin_page(
            array(
                'slug' => '_parallax_page',
                'title' => esc_html__('Parallax', 'newsroom'),
                'icon' => 'fa fa-unsorted'
            )
        );

        $panel_parallax = newsroom_elated_add_admin_panel(
            array(
                'page' => '_parallax_page',
                'name' => 'panel_parallax',
                'title' => esc_html__('Parallax', 'newsroom')
            )
        );

        newsroom_elated_add_admin_field(array(
            'type' => 'onoff',
            'name' => 'parallax_on_off',
            'default_value' => 'off',
            'label' => esc_html__('Parallax on touch devices', 'newsroom'),
            'description' => esc_html__('Enabling this option will allow parallax on touch devices', 'newsroom'),
            'parent' => $panel_parallax
        ));

        newsroom_elated_add_admin_field(array(
            'type' => 'text',
            'name' => 'parallax_min_height',
            'default_value' => '300',
            'label' => esc_html__('Parallax Min Height', 'newsroom'),
            'description' => esc_html__('Set a minimum height for parallax images on small displays (phones, tablets, etc.)', 'newsroom'),
            'args' => array(
                'col_width' => 3,
                'suffix' => 'px'
            ),
            'parent' => $panel_parallax
        ));

    }

    add_action('newsroom_elated_options_map', 'newsroom_elated_parallax_options_map', 17);

}