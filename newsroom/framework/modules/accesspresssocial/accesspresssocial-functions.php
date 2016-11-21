<?php

if (!function_exists('newsroom_elated_access_press_social_plugin')) {
    /**
     * Map Access Press Social Count plugin
     * Hooks on vc_after_init action
     */
    function newsroom_elated_access_press_social_plugin() {

        newsroom_elated_add_admin_page(
            array(
                'slug' => '_aps_plugin_page',
                'title' => esc_html__('Access Press Social', 'newsroom'),
                'icon' => 'fa fa-home'
            )
        );

        $aps_panel = newsroom_elated_add_admin_panel(
            array(
                'title' => esc_html__('Access Press Social Count', 'newsroom'),
                'name' => 'aps_plugin',
                'page' => '_aps_plugin_page'
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'parent' => $aps_panel,
                'type' => 'select',
                'name' => 'aps_custom_style',
                'default_value' => '',
                'label' => esc_html__('Enable Custom Style', 'newsroom'),
                'description' => esc_html__('Enabling this option you will set our custom style for Access Press Social Count elements', 'newsroom'),
                'options' => array(
                    'apsc-custom-style-enabled' => esc_html__('Yes', 'newsroom'),
                    '' => esc_html__('No', 'newsroom'),
                )
            )
        );
    }

    add_action('newsroom_elated_options_map', 'newsroom_elated_access_press_social_plugin', 18);
}