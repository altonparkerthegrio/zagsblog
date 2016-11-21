<?php

if (!function_exists('newsroom_elated_header_options_map')) {

    function newsroom_elated_header_options_map() {

        newsroom_elated_add_admin_page(
            array(
                'slug' => '_header_page',
                'title' => esc_html__('Header', 'newsroom'),
                'icon' => 'fa fa-header'
            )
        );

        /****** HEADER PANEL ******/

        $panel_header = newsroom_elated_add_admin_panel(
            array(
                'page' => '_header_page',
                'name' => 'panel_header',
                'title' => esc_html__('Header', 'newsroom')
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'parent' => $panel_header,
                'type' => 'select',
                'name' => 'header_behaviour',
                'default_value' => 'sticky-header-on-scroll-up',
                'label' => esc_html__('Choose Header behaviour', 'newsroom'),
                'description' => esc_html__('Select the behaviour of header when you scroll down to page', 'newsroom'),
                'options' => array(
                    'sticky-header-on-scroll-up' => esc_html__('Sticky on scrol up', 'newsroom'),
                    'sticky-header-on-scroll-down-up' => esc_html__('Sticky on scrol up/down', 'newsroom')
                )
            )
        );

        // top bar area

        newsroom_elated_add_admin_field(
            array(
                'name' => 'top_bar',
                'type' => 'yesno',
                'default_value' => 'yes',
                'label' => esc_html__('Top Bar', 'newsroom'),
                'description' => esc_html__('Enabling this option will show top bar area', 'newsroom'),
                'parent' => $panel_header,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#eltd_top_bar_container"
                )
            )
        );

        $top_bar_container = newsroom_elated_add_admin_container(array(
            'name' => 'top_bar_container',
            'parent' => $panel_header,
            'hidden_property' => 'top_bar',
            'hidden_value' => 'no'
        ));

        newsroom_elated_add_admin_field(
            array(
                'name' => 'top_bar_in_grid',
                'type' => 'yesno',
                'default_value' => 'yes',
                'label' => esc_html__('Top Bar in grid', 'newsroom'),
                'description' => esc_html__('Set top bar content to be in grid', 'newsroom'),
                'parent' => $top_bar_container,
                'args' => array()
            )
        );

        newsroom_elated_add_admin_field(array(
            'name' => 'top_bar_background_color',
            'type' => 'color',
            'label' => esc_html__('Background Color', 'newsroom'),
            'description' => esc_html__('Set background color for top bar', 'newsroom'),
            'parent' => $top_bar_container
        ));


        newsroom_elated_add_admin_field(
            array(
                'parent' => $top_bar_container,
                'type' => 'select',
                'name' => 'top_bar_style',
                'default_value' => '',
                'label' => esc_html__('Top Bar Style', 'newsroom'),
                'description' => esc_html__('Choose predefined Top Bar style', 'newsroom'),
                'options' => array(
                    '' => '',
                    'dark' => esc_html__('Dark', 'newsroom'),
                    'light' => esc_html__('Light', 'newsroom'),
                    'transparent' => esc_html__('Transparent', 'newsroom')
                )
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'top_bar_bottom_border',
                'type' => 'yesno',
                'default_value' => 'yes',
                'label' => esc_html__('Bottom Border', 'newsroom'),
                'description' => esc_html__('Set top bar bottom border', 'newsroom'),
                'parent' => $top_bar_container,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#eltd_top_bar_border_container"
                )
            )
        );

        $top_bar_border_container = newsroom_elated_add_admin_container(array(
            'name' => 'top_bar_border_container',
            'parent' => $top_bar_container,
            'hidden_property' => 'top_bar_bottom_border',
            'hidden_value' => 'no'
        ));

        newsroom_elated_add_admin_field(array(
            'name' => 'top_bar_bottom_border_color',
            'type' => 'color',
            'label' => esc_html__('Border Color', 'newsroom'),
            'description' => esc_html__('Set bottom border color for top bar, deafult is #e4e4e4', 'newsroom'),
            'parent' => $top_bar_border_container
        ));

        newsroom_elated_add_admin_field(
            array(
                'name' => 'hide_top_bar_on_mobile',
                'type' => 'yesno',
                'default_value' => 'yes',
                'label' => esc_html__('Hide Top Bar on Mobile Devices', 'newsroom'),
                'description' => esc_html__('Enabling this option you will hide top header area on mobile devices', 'newsroom'),
                'parent' => $top_bar_container
            )
        );

// logo area

        newsroom_elated_add_admin_field(
            array(
                'parent' => $panel_header,
                'type' => 'yesno',
                'name' => 'header_in_grid',
                'default_value' => 'no',
                'label' => esc_html__('Header in grid', 'newsroom'),
                'description' => esc_html__('Set logo area content to be in grid', 'newsroom'),
                'args' => array()
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'parent' => $panel_header,
                'type' => 'text',
                'name' => 'logo_area_height_header_type3',
                'default_value' => '',
                'label' => esc_html__('Logo Area Height', 'newsroom'),
                'description' => esc_html__('Enter logo area height (default is 103px)', 'newsroom'),
                'args' => array(
                    'col_width' => 3,
                    'suffix' => 'px'
                )
            )
        );

        newsroom_elated_add_admin_field(array(
            'name' => 'logo_area_background_color',
            'type' => 'color',
            'label' => esc_html__('Logo Area Background Color', 'newsroom'),
            'description' => esc_html__('Set background color for logo area', 'newsroom'),
            'parent' => $panel_header
        ));

        // menu area

        newsroom_elated_add_admin_field(
            array(
                'parent' => $panel_header,
                'type' => 'text',
                'name' => 'menu_area_height_header_type3',
                'default_value' => '',
                'label' => esc_html__('Menu Area Height', 'newsroom'),
                'description' => esc_html__('Enter menu area height (default is 49px)', 'newsroom'),
                'args' => array(
                    'col_width' => 3,
                    'suffix' => 'px'
                )
            )
        );

        newsroom_elated_add_admin_field(array(
            'name' => 'menu_area_background_color',
            'type' => 'color',
            'label' => esc_html__('Menu Area Background Color', 'newsroom'),
            'description' => esc_html__('Set background color for menu area', 'newsroom'),
            'parent' => $panel_header
        ));

        newsroom_elated_add_admin_field(
            array(
                'parent' => $panel_header,
                'type' => 'select',
                'name' => 'menu_area_style',
                'default_value' => '',
                'label' => esc_html__('Menu Area Style', 'newsroom'),
                'description' => esc_html__('Choose predefined Menu Area style', 'newsroom'),
                'options' => array(
                    '' => '',
                    'dark' => esc_html__('Dark', 'newsroom'),
                    'light' => esc_html__('Light', 'newsroom'),
                    'transparent' => esc_html__('Transparent', 'newsroom')
                )
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'menu_area_border',
                'type' => 'yesno',
                'default_value' => 'yes',
                'label' => esc_html__('Menu Area top border', 'newsroom'),
                'description' => esc_html__('Set top border on menu area', 'newsroom'),
                'parent' => $panel_header,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#eltd_menu_area_border_container"
                )
            )
        );

        $menu_area_border_container = newsroom_elated_add_admin_container(array(
            'name' => 'menu_area_border_container',
            'parent' => $panel_header,
            'hidden_property' => 'menu_area_border',
            'hidden_value' => 'no'
        ));

        newsroom_elated_add_admin_field(array(
            'name' => 'menu_area_border_color',
            'type' => 'color',
            'label' => esc_html__('Border Color', 'newsroom'),
            'description' => esc_html__('Set top/bottom border color for menu area, deafult is #e4e4e4', 'newsroom'),
            'parent' => $menu_area_border_container
        ));


        /****** STICKY HEADER PANEL ******/

        $panel_sticky_header = newsroom_elated_add_admin_panel(
            array(
                'title' => esc_html__('Sticky Header', 'newsroom'),
                'name' => 'panel_sticky_header',
                'page' => '_header_page'
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'name' => 'scroll_amount_for_sticky',
                'type' => 'text',
                'label' => esc_html__('Scroll Amount for Sticky', 'newsroom'),
                'description' => esc_html__('Enter scroll amount for Sticky Menu to appear (deafult is header height)', 'newsroom'),
                'parent' => $panel_sticky_header,
                'args' => array(
                    'col_width' => 2,
                    'suffix' => 'px'
                )
            )
        );

        newsroom_elated_add_admin_field(array(
            'name' => 'sticky_header_background_color',
            'type' => 'color',
            'label' => esc_html__('Background Color', 'newsroom'),
            'description' => esc_html__('Set background color for sticky header', 'newsroom'),
            'parent' => $panel_sticky_header
        ));

        newsroom_elated_add_admin_field(array(
            'name' => 'sticky_header_transparency',
            'type' => 'text',
            'label' => esc_html__('Sticky Header Transparency', 'newsroom'),
            'description' => esc_html__('Enter transparency for sticky header (value from 0 to 1)', 'newsroom'),
            'parent' => $panel_sticky_header,
            'args' => array(
                'col_width' => 1
            )
        ));

        newsroom_elated_add_admin_field(array(
            'name' => 'sticky_header_height',
            'type' => 'text',
            'label' => esc_html__('Sticky Header Height', 'newsroom'),
            'description' => esc_html__('Enter height for sticky header (default is 54px)', 'newsroom'),
            'parent' => $panel_sticky_header,
            'args' => array(
                'col_width' => 2,
                'suffix' => 'px'
            )
        ));

        $group_sticky_header_menu = newsroom_elated_add_admin_group(array(
            'title' => esc_html__('Sticky Header Menu', 'newsroom'),
            'name' => 'group_sticky_header_menu',
            'parent' => $panel_sticky_header,
            'description' => esc_html__('Define styles for sticky menu items', 'newsroom'),
        ));

        $row1_sticky_header_menu = newsroom_elated_add_admin_row(array(
            'name' => 'row1',
            'parent' => $group_sticky_header_menu
        ));

        newsroom_elated_add_admin_field(array(
            'name' => 'sticky_color',
            'type' => 'colorsimple',
            'label' => esc_html__('Text Color', 'newsroom'),
            'description' => '',
            'parent' => $row1_sticky_header_menu
        ));

        newsroom_elated_add_admin_field(array(
            'name' => 'sticky_hovercolor',
            'type' => 'colorsimple',
            'label' => esc_html__('Hover/Active color', 'newsroom'),
            'description' => '',
            'parent' => $row1_sticky_header_menu
        ));

        $row2_sticky_header_menu = newsroom_elated_add_admin_row(array(
            'name' => 'row2',
            'parent' => $group_sticky_header_menu
        ));

        newsroom_elated_add_admin_field(
            array(
                'name' => 'sticky_google_fonts',
                'type' => 'fontsimple',
                'label' => esc_html__('Font Family', 'newsroom'),
                'default_value' => '-1',
                'parent' => $row2_sticky_header_menu,
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'type' => 'textsimple',
                'name' => 'sticky_fontsize',
                'label' => esc_html__('Font Size', 'newsroom'),
                'default_value' => '',
                'parent' => $row2_sticky_header_menu,
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'type' => 'textsimple',
                'name' => 'sticky_lineheight',
                'label' => esc_html__('Line height', 'newsroom'),
                'default_value' => '',
                'parent' => $row2_sticky_header_menu,
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'type' => 'selectblanksimple',
                'name' => 'sticky_texttransform',
                'label' => esc_html__('Text transform', 'newsroom'),
                'default_value' => '',
                'options' => newsroom_elated_get_text_transform_array(),
                'parent' => $row2_sticky_header_menu
            )
        );

        $row3_sticky_header_menu = newsroom_elated_add_admin_row(array(
            'name' => 'row3',
            'parent' => $group_sticky_header_menu
        ));

        newsroom_elated_add_admin_field(
            array(
                'type' => 'selectblanksimple',
                'name' => 'sticky_fontstyle',
                'default_value' => '',
                'label' => esc_html__('Font Style', 'newsroom'),
                'options' => newsroom_elated_get_font_style_array(),
                'parent' => $row3_sticky_header_menu
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'type' => 'selectblanksimple',
                'name' => 'sticky_fontweight',
                'default_value' => '',
                'label' => esc_html__('Font Weight', 'newsroom'),
                'options' => newsroom_elated_get_font_weight_array(),
                'parent' => $row3_sticky_header_menu
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'type' => 'textsimple',
                'name' => 'sticky_letterspacing',
                'label' => esc_html__('Letter Spacing', 'newsroom'),
                'default_value' => '',
                'parent' => $row3_sticky_header_menu,
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        /****** MAIN MENU PANEL ******/

        $panel_main_menu = newsroom_elated_add_admin_panel(
            array(
                'title' => esc_html__('Main Menu', 'newsroom'),
                'name' => 'panel_main_menu',
                'page' => '_header_page'
            )
        );

        newsroom_elated_add_admin_section_title(
            array(
                'parent' => $panel_main_menu,
                'name' => 'main_menu_area_title',
                'title' => esc_html__('Main Menu General Settings', 'newsroom')
            )
        );

        $first_level_group = newsroom_elated_add_admin_group(
            array(
                'parent' => $panel_main_menu,
                'name' => 'first_level_group',
                'title' => esc_html__('1st Level Menu', 'newsroom'),
                'description' => esc_html__('Define styles for 1st level in Top Navigation Menu', 'newsroom')
            )
        );

        $first_level_row1 = newsroom_elated_add_admin_row(
            array(
                'parent' => $first_level_group,
                'name' => 'first_level_row1'
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'parent' => $first_level_row1,
                'type' => 'colorsimple',
                'name' => 'menu_color',
                'default_value' => '',
                'label' => esc_html__('Text Color', 'newsroom'),
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'parent' => $first_level_row1,
                'type' => 'colorsimple',
                'name' => 'menu_hovercolor',
                'default_value' => '',
                'label' => esc_html__('Hover Text Color', 'newsroom'),
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'parent' => $first_level_row1,
                'type' => 'colorsimple',
                'name' => 'menu_activecolor',
                'default_value' => '',
                'label' => esc_html__('Active Text Color', 'newsroom'),
            )
        );

        $first_level_row5 = newsroom_elated_add_admin_row(
            array(
                'parent' => $first_level_group,
                'name' => 'first_level_row5',
                'next' => true
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'parent' => $first_level_row5,
                'type' => 'fontsimple',
                'name' => 'menu_google_fonts',
                'default_value' => '-1',
                'label' => esc_html__('Font Family', 'newsroom'),
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'parent' => $first_level_row5,
                'type' => 'textsimple',
                'name' => 'menu_fontsize',
                'default_value' => '',
                'label' => esc_html__('Font Size', 'newsroom'),
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'parent' => $first_level_row5,
                'type' => 'textsimple',
                'name' => 'menu_lineheight',
                'default_value' => '',
                'label' => esc_html__('Line Height', 'newsroom'),
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'parent' => $first_level_row5,
                'type' => 'selectblanksimple',
                'name' => 'menu_fontweight',
                'default_value' => '',
                'label' => esc_html__('Font Weight', 'newsroom'),
                'options' => newsroom_elated_get_font_weight_array()
            )
        );

        $first_level_row6 = newsroom_elated_add_admin_row(
            array(
                'parent' => $first_level_group,
                'name' => 'first_level_row6',
                'next' => true
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'parent' => $first_level_row6,
                'type' => 'selectblanksimple',
                'name' => 'menu_fontstyle',
                'default_value' => '',
                'label' => esc_html__('Font Style', 'newsroom'),
                'options' => newsroom_elated_get_font_style_array()
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'parent' => $first_level_row6,
                'type' => 'textsimple',
                'name' => 'menu_letterspacing',
                'default_value' => '',
                'label' => esc_html__('Letter Spacing', 'newsroom'),
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'parent' => $first_level_row6,
                'type' => 'selectblanksimple',
                'name' => 'menu_texttransform',
                'default_value' => '',
                'label' => esc_html__('Text Transform', 'newsroom'),
                'options' => newsroom_elated_get_text_transform_array()
            )
        );

        newsroom_elated_add_admin_field(
            array(
                'parent' => $panel_main_menu,
                'type' => 'color',
                'name' => 'dropdown_background_color',
                'default_value' => '',
                'label' => esc_html__('Dropdown Background Color', 'newsroom'),
            )
        );

        do_action('newsroom_elated_after_header_options_map');

    }

    add_action('newsroom_elated_options_map', 'newsroom_elated_header_options_map', 3);
}