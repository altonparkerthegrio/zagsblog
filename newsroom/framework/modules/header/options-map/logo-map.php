<?php

if (!function_exists('newsroom_elated_logo_options_map')) {

    function newsroom_elated_logo_options_map() {

        newsroom_elated_add_admin_page(
            array(
                'slug' => '_logo_page',
                'title' => esc_html__('Logo', 'newsroom'),
                'icon' => 'fa fa-coffee'
            )
        );

        $panel_logo = newsroom_elated_add_admin_panel(
            array(
                'page' => '_logo_page',
                'name' => 'panel_logo',
                'title' => esc_html__('Logo', 'newsroom')
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'parent' => $panel_logo,
                'type' => 'yesno',
                'name' => 'hide_logo',
                'default_value' => 'no',
                'label' => esc_html__('Hide Logo', 'newsroom'),
                'description' => esc_html__('Enabling this option will hide logo image', 'newsroom'),
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "#eltd_hide_logo_container",
                    "dependence_show_on_yes" => ""
                )
            )
        );

        $hide_logo_container = newsroom_elated_add_admin_container(
            array(
                'parent' => $panel_logo,
                'name' => 'hide_logo_container',
                'hidden_property' => 'hide_logo',
                'hidden_value' => 'yes'
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'parent' => $hide_logo_container,
                'name' => 'logo_position',
                'type' => 'select',
                'default_value' => 'center',
                'label' => esc_html__('Logo position', 'newsroom'),
                'description' => esc_html__('Choose a logo position', 'newsroom'),
                'options' => array(
                    'center' => esc_html__('Center', 'newsroom'),
                    'left' => esc_html__('Left', 'newsroom')
                )
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'logo_image',
                'type' => 'image',
                'default_value' => ELATED_ASSETS_ROOT . "/img/logo.png",
                'label' => esc_html__('Logo Image - Default', 'newsroom'),
                'description' => esc_html__('Choose a default logo image to display', 'newsroom'),
                'parent' => $hide_logo_container
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'logo_image_dark',
                'type' => 'image',
                'default_value' => ELATED_ASSETS_ROOT . "/img/logo.png",
                'label' => esc_html__('Logo Image - Dark', 'newsroom'),
                'description' => esc_html__('Choose a default logo image to display', 'newsroom'),
                'parent' => $hide_logo_container
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'logo_image_light',
                'type' => 'image',
                'default_value' => ELATED_ASSETS_ROOT . "/img/logo.png",
                'label' => esc_html__('Logo Image - Light', 'newsroom'),
                'description' => esc_html__('Choose a default logo image to display', 'newsroom'),
                'parent' => $hide_logo_container
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'logo_image_transparent',
                'type' => 'image',
                'default_value' => ELATED_ASSETS_ROOT . "/img/logo-transparent.png",
                'label' => esc_html__('Logo Image - Transparent', 'newsroom'),
                'description' => esc_html__('Choose a default logo image to display', 'newsroom'),
                'parent' => $hide_logo_container
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'logo_image_sticky',
                'type' => 'image',
                'default_value' => ELATED_ASSETS_ROOT . "/img/logo-sticky.png",
                'label' => esc_html__('Logo Image - Sticky', 'newsroom'),
                'description' => esc_html__('Choose a default logo image to display', 'newsroom'),
                'parent' => $hide_logo_container
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'logo_image_mobile',
                'type' => 'image',
                'default_value' => ELATED_ASSETS_ROOT . "/img/logo-mobile.png",
                'label' => esc_html__('Logo Image - Mobile', 'newsroom'),
                'description' => esc_html__('Choose a default logo image to display', 'newsroom'),
                'parent' => $hide_logo_container
            )
        );
    }

    add_action('newsroom_elated_options_map', 'newsroom_elated_logo_options_map', 2);

}