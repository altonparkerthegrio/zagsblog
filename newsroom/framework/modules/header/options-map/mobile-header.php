<?php

if (!function_exists('newsroom_elated_mobile_header_options_map')) {

    function newsroom_elated_mobile_header_options_map() {

        $panel_mobile_header = newsroom_elated_add_admin_panel(array(
            'title' => esc_html__('Mobile header', 'newsroom'),
            'name' => 'panel_mobile_header',
            'page' => '_header_page'
        ));

        newsroom_elated_add_admin_field(array(
            'name' => 'mobile_header_height',
            'type' => 'text',
            'label' => esc_html__('Mobile Header Height', 'newsroom'),
            'description' => esc_html__('Enter height for mobile header in pixels', 'newsroom'),
            'parent' => $panel_mobile_header,
            'args' => array(
                'col_width' => 3,
                'suffix' => 'px'
            )
        ));

        newsroom_elated_add_admin_field(array(
            'name' => 'mobile_header_background_color',
            'type' => 'color',
            'label' => esc_html__('Mobile Header Background Color', 'newsroom'),
            'description' => esc_html__('Choose color for mobile header', 'newsroom'),
            'parent' => $panel_mobile_header
        ));

        newsroom_elated_add_admin_field(array(
            'name' => 'mobile_menu_background_color',
            'type' => 'color',
            'label' => esc_html__('Mobile Menu Background Color', 'newsroom'),
            'description' => esc_html__('Choose color for mobile menu', 'newsroom'),
            'parent' => $panel_mobile_header
        ));

        newsroom_elated_add_admin_field(array(
            'name' => 'mobile_logo_height',
            'type' => 'text',
            'label' => esc_html__('Logo Height For Mobile Header', 'newsroom'),
            'description' => esc_html__('Define logo height for screen size smaller than 1000px', 'newsroom'),
            'parent' => $panel_mobile_header,
            'args' => array(
                'col_width' => 3,
                'suffix' => 'px'
            )
        ));

        newsroom_elated_add_admin_field(array(
            'name' => 'mobile_logo_height_phones',
            'type' => 'text',
            'label' => esc_html__('Logo Height For Mobile Devices', 'newsroom'),
            'description' => esc_html__('Define logo height for screen size smaller than 480px', 'newsroom'),
            'parent' => $panel_mobile_header,
            'args' => array(
                'col_width' => 3,
                'suffix' => 'px'
            )
        ));

        newsroom_elated_add_admin_section_title(array(
            'name' => 'mobile_opener_panel',
            'parent' => $panel_mobile_header,
            'title' => esc_html__('Mobile Menu Opener', 'newsroom')
        ));

        newsroom_elated_add_admin_field(array(
            'name' => 'mobile_icon_color',
            'type' => 'color',
            'label' => esc_html__('Mobile Navigation Icon Color', 'newsroom'),
            'description' => esc_html__('Choose color for icon header', 'newsroom'),
            'parent' => $panel_mobile_header
        ));

        newsroom_elated_add_admin_field(array(
            'name' => 'mobile_icon_hover_color',
            'type' => 'color',
            'label' => esc_html__('Mobile Navigation Icon Hover Color', 'newsroom'),
            'description' => esc_html__('Choose hover color for mobile navigation icon ', 'newsroom'),
            'parent' => $panel_mobile_header
        ));
    }

    add_action('newsroom_elated_after_header_options_map', 'newsroom_elated_mobile_header_options_map');

}