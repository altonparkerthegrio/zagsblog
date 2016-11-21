<?php

if (!function_exists('newsroom_elated_footer_options_map')) {
    /**
     * Add footer options
     */
    function newsroom_elated_footer_options_map() {

        newsroom_elated_add_admin_page(
            array(
                'slug' => '_footer_page',
                'title' => esc_html__('Footer', 'newsroom'),
                'icon' => 'fa fa-sort-amount-asc'
            )
        );

        $footer_panel = newsroom_elated_add_admin_panel(
            array(
                'title' => esc_html__('Footer', 'newsroom'),
                'name' => 'footer',
                'page' => '_footer_page'
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'footer_in_grid',
                'default_value' => 'no',
                'label' => esc_html__('Footer in Grid', 'newsroom'),
                'description' => esc_html__('Enabling this option will place Footer content in grid', 'newsroom'),
                'parent' => $footer_panel,
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'show_footer_heading',
                'default_value' => 'yes',
                'label' => esc_html__('Show Footer Heading', 'newsroom'),
                'description' => esc_html__('Enabling this option will show Footer Heading area', 'newsroom'),
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'show_footer_top',
                'default_value' => 'yes',
                'label' => esc_html__('Show Footer Top', 'newsroom'),
                'description' => esc_html__('Enabling this option will show Footer Top area', 'newsroom'),
                'args' => array(
                    'dependence' => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#eltd_show_footer_top_container'
                ),
                'parent' => $footer_panel,
            )
        );

        $show_footer_top_container = newsroom_elated_add_admin_container(
            array(
                'name' => 'show_footer_top_container',
                'hidden_property' => 'show_footer_top',
                'hidden_value' => 'no',
                'parent' => $footer_panel
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'type' => 'select',
                'name' => 'footer_top_columns',
                'default_value' => '4',
                'label' => esc_html__('Footer Top Columns', 'newsroom'),
                'description' => esc_html__('Choose number of columns for Footer Top area', 'newsroom'),
                'options' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '5' => '3(25%+25%+50%)',
                    '6' => '3(50%+25%+25%)',
                    '4' => '4'
                ),
                'parent' => $show_footer_top_container,
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'show_footer_bottom',
                'default_value' => 'yes',
                'label' => esc_html__('Show Footer Bottom', 'newsroom'),
                'description' => esc_html__('Enabling this option will show Footer Bottom area', 'newsroom'),
                'args' => array(
                    'dependence' => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#eltd_show_footer_bottom_container'
                ),
                'parent' => $footer_panel,
            )
        );

        $show_footer_bottom_container = newsroom_elated_add_admin_container(
            array(
                'name' => 'show_footer_bottom_container',
                'hidden_property' => 'show_footer_bottom',
                'hidden_value' => 'no',
                'parent' => $footer_panel
            )
        );


        newsroom_elated_add_admin_field(
            array(
                'type' => 'select',
                'name' => 'footer_bottom_columns',
                'default_value' => '2',
                'label' => esc_html__('Footer Bottom Columns', 'newsroom'),
                'description' => esc_html__('Choose number of columns for Footer Bottom area', 'newsroom'),
                'options' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3'
                ),
                'parent' => $show_footer_bottom_container,
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'uncovering_footer',
                'default_value' => 'yes',
                'label' => esc_html__('Uncovering Footer', 'newsroom'),
                'description' => esc_html__('Set footer to have uncovering behavior', 'newsroom'),
                'parent' => $footer_panel,
            )
        );

    }

    add_action('newsroom_elated_options_map', 'newsroom_elated_footer_options_map', 11);
}