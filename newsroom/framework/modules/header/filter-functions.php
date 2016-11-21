<?php

if (!function_exists('newsroom_elated_header_class')) {
    /**
     * Function that adds class to header based on theme options
     * @param array array of classes from main filter
     * @return array array of classes with added header class
     */
    function newsroom_elated_header_class($classes) {
        $header_type = 'header-type3';

        $classes[] = 'eltd-' . $header_type;

        return $classes;
    }

    add_filter('body_class', 'newsroom_elated_header_class');
}

if (!function_exists('newsroom_elated_header_behaviour_class')) {
    /**
     * Function that adds behaviour class to header based on theme options
     * @param array array of classes from main filter
     * @return array array of classes with added behaviour class
     */
    function newsroom_elated_header_behaviour_class($classes) {

        $classes[] = 'eltd-' . newsroom_elated_options()->getOptionValue('header_behaviour');

        return $classes;
    }

    add_filter('body_class', 'newsroom_elated_header_behaviour_class');
}

if (!function_exists('newsroom_elated_header_style_class')) {
    /**
     * Function that adds behaviour class to header based on theme options
     * @param array array of classes from main filter
     * @return array array of classes with added behaviour class
     */
    function newsroom_elated_header_style_class($classes) {

        $id = newsroom_elated_get_page_id();

        if (newsroom_elated_get_meta_field_intersect('top_bar_style', $id) !== '') {
            $classes[] = 'eltd-top-bar-' . newsroom_elated_get_meta_field_intersect('top_bar_style', $id);
        }
        if (newsroom_elated_get_meta_field_intersect('menu_area_style', $id) !== '') {
            $classes[] = 'eltd-menu-area-' . newsroom_elated_get_meta_field_intersect('menu_area_style', $id);
        }

        return $classes;
    }

    add_filter('body_class', 'newsroom_elated_header_style_class');
}

if (!function_exists('newsroom_elated_mobile_header_class')) {
    function newsroom_elated_mobile_header_class($classes) {
        $classes[] = 'eltd-default-mobile-header';

        $classes[] = 'eltd-sticky-up-mobile-header';

        return $classes;
    }

    add_filter('body_class', 'newsroom_elated_mobile_header_class');
}

if (!function_exists('newsroom_elated_header_global_js_var')) {
    function newsroom_elated_header_global_js_var($global_variables) {

        $global_variables['eltdTopBarHeight'] = newsroom_elated_get_top_bar_height();
        $global_variables['eltdStickyHeaderHeight'] = newsroom_elated_get_sticky_header_height();
        $global_variables['eltdStickyHeaderTransparencyHeight'] = newsroom_elated_get_sticky_header_height_of_complete_transparency();
        $global_variables['eltdMobileHeaderHeight'] = newsroom_elated_get_mobile_header_height();

        return $global_variables;
    }

    add_filter('newsroom_elated_js_global_variables', 'newsroom_elated_header_global_js_var');
}

if (!function_exists('newsroom_elated_header_per_page_js_var')) {
    function newsroom_elated_header_per_page_js_var($perPageVars) {

        $perPageVars['eltdStickyScrollAmount'] = newsroom_elated_get_sticky_scroll_amount();

        return $perPageVars;
    }

    add_filter('newsroom_elated_per_page_js_vars', 'newsroom_elated_header_per_page_js_var');
}

if (!function_exists('newsroom_elated_aps_custom_style_class')) {
    function newsroom_elated_aps_custom_style_class($classes) {

        if (newsroom_elated_options()->getOptionValue('aps_custom_style') !== '') {
            $classes[] = 'eltd-' . newsroom_elated_options()->getOptionValue('aps_custom_style');
        }

        return $classes;
    }

    add_filter('body_class', 'newsroom_elated_aps_custom_style_class');
}