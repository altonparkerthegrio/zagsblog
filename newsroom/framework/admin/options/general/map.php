<?php

if (!function_exists('newsroom_elated_general_options_map')) {
    /**
     * General options page
     */
    function newsroom_elated_general_options_map() {

        newsroom_elated_add_admin_page(
            array(
                'slug' => '',
                'title' => 'General',
                'icon' => 'fa fa-institution'
            )
        );

        $panel_design_style = newsroom_elated_add_admin_panel(
            array(
                'page' => '',
                'name' => 'panel_design_style',
                'title' => esc_html__('Design Style', 'newsroom'),
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'google_fonts',
                'type' => 'font',
                'default_value' => '-1',
                'label' => esc_html__('Font Family', 'newsroom'),
                'description' => esc_html__('Choose a default Google font for your site', 'newsroom'),
                'parent' => $panel_design_style
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'additional_google_fonts',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Additional Google Fonts', 'newsroom'),
                'description' => '',
                'parent' => $panel_design_style,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#eltd_additional_google_fonts_container"
                )
            )
        );

        $additional_google_fonts_container = newsroom_elated_add_admin_container(
            array(
                'parent' => $panel_design_style,
                'name' => 'additional_google_fonts_container',
                'hidden_property' => 'additional_google_fonts',
                'hidden_value' => 'no'
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'additional_google_font1',
                'type' => 'font',
                'default_value' => '-1',
                'label' => esc_html__('Font Family', 'newsroom'),
                'description' => esc_html__('Choose additional Google font for your site', 'newsroom'),
                'parent' => $additional_google_fonts_container
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'additional_google_font2',
                'type' => 'font',
                'default_value' => '-1',
                'label' => esc_html__('Font Family', 'newsroom'),
                'description' => esc_html__('Choose additional Google font for your site', 'newsroom'),
                'parent' => $additional_google_fonts_container
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'additional_google_font3',
                'type' => 'font',
                'default_value' => '-1',
                'label' => esc_html__('Font Family', 'newsroom'),
                'description' => esc_html__('Choose additional Google font for your site', 'newsroom'),
                'parent' => $additional_google_fonts_container
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'additional_google_font4',
                'type' => 'font',
                'default_value' => '-1',
                'label' => esc_html__('Font Family', 'newsroom'),
                'description' => esc_html__('Choose additional Google font for your site', 'newsroom'),
                'parent' => $additional_google_fonts_container
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'additional_google_font5',
                'type' => 'font',
                'default_value' => '-1',
                'label' => esc_html__('Font Family', 'newsroom'),
                'description' => esc_html__('Choose additional Google font for your site', 'newsroom'),
                'parent' => $additional_google_fonts_container
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'first_color',
                'type' => 'color',
                'label' => esc_html__('First Main Color', 'newsroom'),
                'description' => esc_html__('Choose the most dominant theme color. Default color is #1d1c1d', 'newsroom'),
                'parent' => $panel_design_style
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'page_background_color',
                'type' => 'color',
                'label' => esc_html__('Page Background Color', 'newsroom'),
                'description' => esc_html__('Choose the background color for page content. Default color is #f3f3f3', 'newsroom'),
                'parent' => $panel_design_style
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'selection_color',
                'type' => 'color',
                'label' => esc_html__('Text Selection Color', 'newsroom'),
                'description' => esc_html__('Choose the color users see when selecting text', 'newsroom'),
                'parent' => $panel_design_style
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'boxed',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Boxed Layout', 'newsroom'),
                'description' => '',
                'parent' => $panel_design_style,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "#eltd_fixed_image_container",
                    "dependence_show_on_yes" => "#eltd_boxed_container"
                )
            )
        );

        $boxed_container = newsroom_elated_add_admin_container(
            array(
                'parent' => $panel_design_style,
                'name' => 'boxed_container',
                'hidden_property' => 'boxed',
                'hidden_value' => 'no'
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'page_background_color_in_box',
                'type' => 'color',
                'label' => esc_html__('Page Background Color', 'newsroom'),
                'description' => esc_html__('Choose the page background color outside box.', 'newsroom'),
                'parent' => $boxed_container
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'boxed_background_image',
                'type' => 'image',
                'label' => esc_html__('Background Image', 'newsroom'),
                'description' => esc_html__('Choose an image to be displayed in background', 'newsroom'),
                'parent' => $boxed_container
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'boxed_pattern_background_image',
                'type' => 'image',
                'label' => esc_html__('Background Pattern', 'newsroom'),
                'description' => esc_html__('Choose an image to be used as background pattern', 'newsroom'),
                'parent' => $boxed_container
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'boxed_background_image_attachment',
                'type' => 'select',
                'default_value' => 'fixed',
                'label' => esc_html__('Background Image Attachment', 'newsroom'),
                'description' => esc_html__('Choose background image attachment', 'newsroom'),
                'parent' => $boxed_container,
                'options' => array(
                    'fixed' => esc_html__('Fixed', 'newsroom'),
                    'scroll' => esc_html__('Scroll', 'newsroom')
                )
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'element_appear_amount',
                'type' => 'text',
                'label' => esc_html__('Element Appearance', 'newsroom'),
                'description' => esc_html__('For animated elements, set distance (related to browser bottom) to start the animation', 'newsroom'),
                'parent' => $panel_design_style,
                'args' => array(
                    'col_width' => 2,
                    'suffix' => 'px'
                )
            )
        );

        $panel_settings = newsroom_elated_add_admin_panel(
            array(
                'page' => '',
                'name' => 'panel_settings',
                'title' => esc_html__('Settings', 'newsroom')
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'smooth_scroll',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Smooth Scroll', 'newsroom'),
                'description' => esc_html__('Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'newsroom'),
                'parent' => $panel_settings
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'show_back_button',
                'type' => 'yesno',
                'default_value' => 'yes',
                'label' => esc_html__('Show "Back To Top Button"', 'newsroom'),
                'description' => esc_html__('Enabling this option will display a Back to Top button on every page', 'newsroom'),
                'parent' => $panel_settings
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'responsiveness',
                'type' => 'yesno',
                'default_value' => 'yes',
                'label' => esc_html__('Responsiveness', 'newsroom'),
                'description' => esc_html__('Enabling this option will make all pages responsive', 'newsroom'),
                'parent' => $panel_settings
            )
        );

        $panel_custom_code = newsroom_elated_add_admin_panel(
            array(
                'page' => '',
                'name' => 'panel_custom_code',
                'title' => esc_html__('Custom Code', 'newsroom')
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'custom_css',
                'type' => 'textarea',
                'label' => esc_html__('Custom CSS', 'newsroom'),
                'description' => esc_html__('Enter your custom CSS here', 'newsroom'),
                'parent' => $panel_custom_code
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'custom_js',
                'type' => 'textarea',
                'label' => esc_html__('Custom JS', 'newsroom'),
                'description' => esc_html__('Enter your custom Javascript here', 'newsroom'),
                'parent' => $panel_custom_code
            )
        );

        $panel_google_api = newsroom_elated_add_admin_panel(
            array(
                'page' => '',
                'name' => 'panel_google_api',
                'title' => esc_html__('Google API', 'newsroom')
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'google_maps_api_key',
                'type' => 'text',
                'label' => esc_html__('Google Maps Api Key', 'newsroom'),
                'description' => esc_html__('Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our to our documentation. Temporarily you can use "AIzaSyAidINa74sv7bt7Y3vqjKjM7m0PgJN1bhk"', 'newsroom'),
                'parent' => $panel_google_api
            )
        );
    }

    add_action('newsroom_elated_options_map', 'newsroom_elated_general_options_map', 1);
}