<?php

use Newsroom\Modules\Header\Lib\HeaderFactory;

if(!function_exists('newsroom_elated_get_header')) {
    /**
     * Loads header HTML based on header type option. Sets all necessary parameters for header
     * and defines newsroom_elated_header_type_parameters filter
     */
    function newsroom_elated_get_header() {
        $id = newsroom_elated_get_page_id();

        //will be read from options
        $header_type     = 'header-type3';
        $header_behavior = newsroom_elated_options()->getOptionValue('header_behaviour');

        if(HeaderFactory::getInstance()->validHeaderObject()) {
            $parameters = array(
                'hide_logo'          => newsroom_elated_options()->getOptionValue('hide_logo') == 'yes' ? true : false,
                'header_in_grid'          => newsroom_elated_options()->getOptionValue('header_in_grid') == 'yes' ? true : false,
                'logo_position'      => newsroom_elated_get_meta_field_intersect('logo_position',$id),
                'show_sticky'        => in_array($header_behavior, array(
                    'sticky-header-on-scroll-up',
                    'sticky-header-on-scroll-down-up'
                )) ? true : false,
            );

            $parameters = apply_filters('newsroom_elated_header_type_parameters', $parameters, $header_type);

            HeaderFactory::getInstance()->getHeaderObject()->loadTemplate($parameters);
        }
    }
}

if(!function_exists('newsroom_elated_get_header_top')) {
    /**
     * Loads header top HTML and sets parameters for it
     */
    function newsroom_elated_get_header_top() {

        $params = array(
            'column_widths'      => '33-33-33',
            'show_header_top'    => newsroom_elated_options()->getOptionValue('top_bar') == 'yes' ? true : false,
            'top_bar_in_grid'    => newsroom_elated_options()->getOptionValue('top_bar_in_grid') == 'yes' ? true : false
        );

        $params = apply_filters('newsroom_elated_header_top_params', $params);

        newsroom_elated_get_module_template_part('templates/parts/header-top', 'header', '', $params);
    }
}

if(!function_exists('newsroom_elated_get_logo')) {
    /**
     * Loads logo HTML
     *
     * @param $slug
     */
    function newsroom_elated_get_logo($slug = '') {

        $slug = $slug !== '' ? $slug : 'header-type3';

        if($slug == 'sticky'){
            $logo_image = newsroom_elated_options()->getOptionValue('logo_image_sticky');
        }else{
            $logo_image = newsroom_elated_options()->getOptionValue('logo_image');
        }

        $logo_image_dark = newsroom_elated_options()->getOptionValue('logo_image_dark');
        $logo_image_light = newsroom_elated_options()->getOptionValue('logo_image_light');
        $logo_image_transparent = newsroom_elated_options()->getOptionValue('logo_image_transparent');

        //get logo image dimensions and set style attribute for image link.
        $logo_dimensions = newsroom_elated_get_image_dimensions($logo_image);

        $logo_height = '';
        $logo_styles = '';
        if(is_array($logo_dimensions) && array_key_exists('height', $logo_dimensions)) {
            $logo_height = $logo_dimensions['height'];
            $logo_styles = 'height: '.intval($logo_height / 2).'px;'; //divided with 2 because of retina screens
        }

        $params = array(
            'logo_image'  => $logo_image,
            'logo_image_dark' => $logo_image_dark,
            'logo_image_light' => $logo_image_light,
            'logo_image_transparent' => $logo_image_transparent,
            'logo_styles' => $logo_styles,
            'header_in_grid'    => newsroom_elated_options()->getOptionValue('header_in_grid') == 'yes' ? true : false
        );

        newsroom_elated_get_module_template_part('templates/parts/logo', 'header', $slug, $params);
    }
}

if(!function_exists('newsroom_elated_get_main_menu')) {
    /**
     * Loads main menu HTML
     *
     * @param string $additional_class addition class to pass to template
     */
    function newsroom_elated_get_main_menu($additional_class = 'eltd-default-nav') {
        newsroom_elated_get_module_template_part('templates/parts/navigation', 'header', '', array('additional_class' => $additional_class));
    }
}

if(!function_exists('newsroom_elated_get_sticky_main_menu')) {
    /**
     * Loads main menu HTML
     *
     * @param string $additional_class addition class to pass to template
     */
    function newsroom_elated_get_sticky_main_menu($additional_class = 'eltd-default-nav') {
        newsroom_elated_get_module_template_part('templates/parts/sticky-navigation', 'header', '', array('additional_class' => $additional_class));
    }
}

if(!function_exists('newsroom_elated_get_sticky_header')) {
    /**
     * Loads sticky header behavior HTML
     * * @param $slug
     */
    function newsroom_elated_get_sticky_header($slug = '') {

        $parameters = array(
            'hide_logo' => newsroom_elated_options()->getOptionValue('hide_logo') == 'yes' ? true : false,
        );

        newsroom_elated_get_module_template_part('templates/behaviors/sticky-header', 'header', $slug, $parameters);
    }
}

if(!function_exists('newsroom_elated_get_mobile_header')) {
    /**
     * Loads mobile header HTML only if responsiveness is enabled
     */
    function newsroom_elated_get_mobile_header() {
        if(newsroom_elated_is_responsive_on()) {
            $header_type = 'header-type3';

            //this could be read from theme options
            $mobile_header_type = 'mobile-header';

            $parameters = array(
                'show_logo'              => newsroom_elated_options()->getOptionValue('hide_logo') == 'yes' ? false : true,
                'show_navigation_opener' => has_nav_menu('main-navigation')
            );

            newsroom_elated_get_module_template_part('templates/types/'.$mobile_header_type, 'header', $header_type, $parameters);
        }
    }
}

if(!function_exists('newsroom_elated_get_mobile_logo')) {
    /**
     * Loads mobile logo HTML. It checks if mobile logo image is set and uses that, else takes normal logo image
     *
     * @param string $slug
     */
    function newsroom_elated_get_mobile_logo($slug = '') {

        $slug = $slug !== '' ? $slug : 'header-type3';

        //check if mobile logo has been set and use that, else use normal logo
        if(newsroom_elated_options()->getOptionValue('logo_image_mobile') !== '') {
            $logo_image = newsroom_elated_options()->getOptionValue('logo_image_mobile');
        } else {
            $logo_image = newsroom_elated_options()->getOptionValue('logo_image');
        }

        //get logo image dimensions and set style attribute for image link.
        $logo_dimensions = newsroom_elated_get_image_dimensions($logo_image);

        $logo_height = '';
        $logo_styles = '';
        if(is_array($logo_dimensions) && array_key_exists('height', $logo_dimensions)) {
            $logo_height = $logo_dimensions['height'];
            $logo_styles = 'height: '.intval($logo_height / 2).'px'; //divided with 2 because of retina screens
        }

        //set parameters for logo
        $parameters = array(
            'logo_image'      => $logo_image,
            'logo_dimensions' => $logo_dimensions,
            'logo_height'     => $logo_height,
            'logo_styles'     => $logo_styles
        );

        newsroom_elated_get_module_template_part('templates/parts/mobile-logo', 'header', $slug, $parameters);
    }
}

if(!function_exists('newsroom_elated_get_mobile_nav')) {
    /**
     * Loads mobile navigation HTML
     */
    function newsroom_elated_get_mobile_nav() {

        $slug = 'header-type3';

        newsroom_elated_get_module_template_part('templates/parts/mobile-navigation', 'header', $slug);
    }
}