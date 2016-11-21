<?php

if (!function_exists('newsroom_elated_reset_options_map')) {
    /**
     * Reset options panel
     */
    function newsroom_elated_reset_options_map() {

        newsroom_elated_add_admin_page(
            array(
                'slug' => '_reset_page',
                'title' => esc_html__('Reset', 'newsroom'),
                'icon' => 'fa fa-retweet'
            )
        );

        $panel_reset = newsroom_elated_add_admin_panel(
            array(
                'page' => '_reset_page',
                'name' => 'panel_reset',
                'title' => esc_html__('Reset', 'newsroom')
            )
        );

        newsroom_elated_add_admin_field(array(
            'type' => 'yesno',
            'name' => 'reset_to_defaults',
            'default_value' => 'no',
            'label' => esc_html__('Reset to Defaults', 'newsroom'),
            'description' => esc_html__('This option will reset all Elated Options values to defaults', 'newsroom'),
            'parent' => $panel_reset
        ));

    }

    add_action('newsroom_elated_options_map', 'newsroom_elated_reset_options_map', 25);
}