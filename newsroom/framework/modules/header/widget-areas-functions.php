<?php

if (!function_exists('newsroom_elated_register_top_header_areas')) {
    /**
     * Registers widget areas for top header bar when it is enabled
     */
    function newsroom_elated_register_top_header_areas() {
        $top_bar_enabled = newsroom_elated_options()->getOptionValue('top_bar');

        if ($top_bar_enabled == 'yes') {
            register_sidebar(array(
                'name' => esc_html__('Top Bar Left', 'newsroom'),
                'id' => 'eltd-top-bar-left',
                'before_widget' => '<div id="%1$s" class="widget %2$s eltd-top-bar-widget">',
                'after_widget' => '</div>',
                'before_title' => '<h6 class="eltd-top-bar-heading">',
                'after_title' => '</h6>'
            ));

            register_sidebar(array(
                'name' => esc_html__('Top Bar Center', 'newsroom'),
                'id' => 'eltd-top-bar-center',
                'before_widget' => '<div id="%1$s" class="widget %2$s eltd-top-bar-widget">',
                'after_widget' => '</div>',
                'before_title' => '<h6 class="eltd-top-bar-heading">',
                'after_title' => '</h6>'
            ));

            register_sidebar(array(
                'name' => esc_html__('Top Bar Right', 'newsroom'),
                'id' => 'eltd-top-bar-right',
                'before_widget' => '<div id="%1$s" class="widget %2$s eltd-top-bar-widget">',
                'after_widget' => '</div>',
                'before_title' => '<h6 class="eltd-top-bar-heading">',
                'after_title' => '</h6>'
            ));
        }
    }

    add_action('widgets_init', 'newsroom_elated_register_top_header_areas');
}

if (!function_exists('newsroom_elated_register_header_areas')) {
    /**
     * Registers widget areas for mobile header
     */
    function newsroom_elated_register_header_areas() {

        if (newsroom_elated_is_responsive_on()) {
            register_sidebar(array(
                'name' => esc_html__('Left From Main Menu', 'newsroom'),
                'id' => 'eltd-left-from-main-menu',
                'before_widget' => '<div id="%1$s" class="widget %2$s eltd-left-from-main-menu">',
                'after_widget' => '</div>',
                'description' => esc_html__('Widgets added here will appear on the left hand side from the mobile logo, only if position of logo is "center"', 'newsroom')
            ));
        }

        if (newsroom_elated_is_responsive_on()) {
            register_sidebar(array(
                'name' => esc_html__('Right From Main Menu', 'newsroom'),
                'id' => 'eltd-right-from-main-menu',
                'before_widget' => '<div id="%1$s" class="widget %2$s eltd-right-from-main-menu">',
                'after_widget' => '</div>',
                'description' => esc_html__('Widgets added here will appear on the right hand side from the mobile logo', 'newsroom')
            ));
        }

        if (newsroom_elated_is_responsive_on()) {
            register_sidebar(array(
                'name' => esc_html__('Left From Logo', 'newsroom'),
                'id' => 'eltd-left-from-logo',
                'before_widget' => '<div id="%1$s" class="widget %2$s eltd-left-from-logo">',
                'after_widget' => '</div>',
                'description' => esc_html__('Widgets added here will appear on the left hand side from the logo, only if position of logo is "center"', 'newsroom')
            ));
        }

        if (newsroom_elated_is_responsive_on()) {
            register_sidebar(array(
                'name' => esc_html__('Right From Logo', 'newsroom'),
                'id' => 'eltd-right-from-logo',
                'before_widget' => '<div id="%1$s" class="widget %2$s eltd-right-from-logo">',
                'after_widget' => '</div>',
                'description' => esc_html__('Widgets added here will appear on the right hand side from the logo', 'newsroom')
            ));
        }
    }

    add_action('widgets_init', 'newsroom_elated_register_header_areas');
}

if (!function_exists('newsroom_elated_register_sticky_header_areas')) {
    /**
     * Registers widget area for sticky header
     */
    function newsroom_elated_register_sticky_header_areas() {
        if (in_array(newsroom_elated_options()->getOptionValue('header_behaviour'), array('sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up'))) {
            register_sidebar(array(
                'name' => esc_html__('Sticky Right', 'newsroom'),
                'id' => 'eltd-sticky-right',
                'before_widget' => '<div id="%1$s" class="widget %2$s eltd-sticky-right">',
                'after_widget' => '</div>',
                'description' => esc_html__('Widgets added here will appear on the right hand side in sticky menu', 'newsroom')
            ));
        }
    }

    add_action('widgets_init', 'newsroom_elated_register_sticky_header_areas');
}

if (!function_exists('newsroom_elated_register_mobile_header_areas')) {
    /**
     * Registers widget areas for mobile header
     */
    function newsroom_elated_register_mobile_header_areas() {
        if (newsroom_elated_is_responsive_on()) {
            register_sidebar(array(
                'name' => esc_html__('Right From Mobile Logo', 'newsroom'),
                'id' => 'eltd-right-from-mobile-logo',
                'before_widget' => '<div id="%1$s" class="widget %2$s eltd-right-from-mobile-logo">',
                'after_widget' => '</div>',
                'description' => esc_html__('Widgets added here will appear on the right hand side from the mobile logo', 'newsroom')
            ));
        }
    }

    add_action('widgets_init', 'newsroom_elated_register_mobile_header_areas');
}