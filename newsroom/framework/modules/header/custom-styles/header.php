<?php

if(!function_exists('newsroom_elated_header_top_bar_styles')) {
    /**
     * Generates styles for header top bar
     */
    function newsroom_elated_header_top_bar_styles() {

        $background_color = newsroom_elated_options()->getOptionValue('top_bar_background_color');
        $top_bar_styles = array();

        if($background_color !== '') {
            $top_bar_styles['background-color'] = $background_color;
        }

        if(newsroom_elated_options()->getOptionValue('top_bar_bottom_border') == 'yes'){
            if(newsroom_elated_options()->getOptionValue('top_bar_bottom_border_color') !== ""){
                $top_bar_styles['border-bottom'] = '1px solid '.newsroom_elated_options()->getOptionValue('top_bar_bottom_border_color');
            }else{
                // it is enabled by default
            }
        }
        elseif(newsroom_elated_options()->getOptionValue('top_bar_bottom_border') == 'no'){
            $top_bar_styles['border-bottom'] = 'none';
        }

        echo newsroom_elated_dynamic_css('.eltd-top-bar', $top_bar_styles);
    }

    add_action('newsroom_elated_style_dynamic', 'newsroom_elated_header_top_bar_styles');
}

if(!function_exists('newsroom_elated_header_top_bar_responsive_styles')) {
    /**
     * Generates styles for header top bar
     */
    function newsroom_elated_header_top_bar_responsive_styles() {

        $hide_top_bar_on_mobile = newsroom_elated_options()->getOptionValue('hide_top_bar_on_mobile');

        if($hide_top_bar_on_mobile === 'yes') { ?>
            @media only screen and (max-width: 700px) {
                .eltd-top-bar {
                    height: 0;
                    display: none;
                }
            }
        <?php }
    }

    add_action('newsroom_elated_style_dynamic', 'newsroom_elated_header_top_bar_responsive_styles');
}

if(!function_exists('newsroom_elated_header_type3_logo_styles')) {
    /**
     * Generates styles for header type 3 logo
     */
    function newsroom_elated_header_type3_logo_styles() {

        $logo_area_header_type3_styles = array();

        if(newsroom_elated_options()->getOptionValue('logo_area_height_header_type3') !== '') {
            $header_type3_height = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('logo_area_height_header_type3'));

            $logo_area_header_type3_styles['height'] = $header_type3_height.'px';

            $max_height = intval($header_type3_height).'px';
            echo newsroom_elated_dynamic_css('.eltd-header-type3 .eltd-page-header .eltd-logo-wrapper a', array('max-height' => $max_height));
        }

        if (newsroom_elated_options()->getOptionValue('logo_area_background_color')) {
            $logo_area_header_type3_styles['background-color'] = esc_url(newsroom_elated_options()->getOptionValue('logo_area_background_color'));
        }

        echo newsroom_elated_dynamic_css('.eltd-header-type3 .eltd-page-header .eltd-logo-area', $logo_area_header_type3_styles);
    }

    add_action('newsroom_elated_style_dynamic', 'newsroom_elated_header_type3_logo_styles');
}

if(!function_exists('newsroom_elated_header_type3_menu_area_styles')) {
    /**
     * Generates styles for header type 3 menu area
     */
    function newsroom_elated_header_type3_menu_area_styles() {

        $menu_area_header_type3_styles = array();

        if(newsroom_elated_options()->getOptionValue('menu_area_height_header_type3') !== '') {
            $menu_area_header_type3_styles['height'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('menu_area_height_header_type3')).'px';
        }

        $menu_area_header_type3_color_styles = array();
        if(newsroom_elated_options()->getOptionValue('menu_area_background_color') !== '') {
            $menu_area_header_type3_color_styles['background-color'] = newsroom_elated_options()->getOptionValue('menu_area_background_color');
        }

        if(newsroom_elated_options()->getOptionValue('menu_area_border') == 'yes'){
            if(newsroom_elated_options()->getOptionValue('menu_area_border_color') !== ""){
                $menu_area_header_type3_color_styles['border-top'] = '1px solid '.newsroom_elated_options()->getOptionValue('menu_area_border_color');

            }else{
                // default state
            }
        }
        elseif(newsroom_elated_options()->getOptionValue('menu_area_border') == 'no'){
            $menu_area_header_type3_color_styles['border-top'] = 'none';
        }

        echo newsroom_elated_dynamic_css('.eltd-header-type3 .eltd-page-header .eltd-menu-area', $menu_area_header_type3_styles);
        echo newsroom_elated_dynamic_css('.eltd-header-type3 .eltd-page-header .eltd-menu-area .eltd-vertical-align-containers', $menu_area_header_type3_color_styles);
    }

    add_action('newsroom_elated_style_dynamic', 'newsroom_elated_header_type3_menu_area_styles');
}

if(!function_exists('newsroom_elated_sticky_header_styles')) {
    /**
     * Generates styles for sticky haeder
     */
    function newsroom_elated_sticky_header_styles() {

        if(newsroom_elated_options()->getOptionValue('sticky_header_background_color') !== '') {

            $sticky_header_background_color              = newsroom_elated_options()->getOptionValue('sticky_header_background_color');
            $sticky_header_background_color_transparency = 1;

            if(newsroom_elated_options()->getOptionValue('sticky_header_transparency') !== '') {
                $sticky_header_background_color_transparency = newsroom_elated_options()->getOptionValue('sticky_header_transparency');
            }

            echo newsroom_elated_dynamic_css('.eltd-page-header .eltd-sticky-header .eltd-sticky-holder', array('background-color' => newsroom_elated_rgba_color($sticky_header_background_color, $sticky_header_background_color_transparency)));
        }

        if(newsroom_elated_options()->getOptionValue('sticky_header_height') !== '') {
            $sticky_header_height = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('sticky_header_height'));
            $max_height = intval($sticky_header_height * 0.9).'px';

            echo newsroom_elated_dynamic_css('.eltd-page-header .eltd-sticky-header', array('height' => $sticky_header_height.'px'));
            echo newsroom_elated_dynamic_css('.eltd-page-header .eltd-sticky-header .eltd-sticky-holder .eltd-logo-wrapper a', array('max-height' => $max_height));
        }

        $sticky_menu_item_styles = array();
        if(newsroom_elated_options()->getOptionValue('sticky_color') !== '') {
            $sticky_menu_item_styles['color'] = newsroom_elated_options()->getOptionValue('sticky_color');
        }
        if(newsroom_elated_options()->getOptionValue('sticky_google_fonts') !== '-1') {
            $sticky_menu_item_styles['font-family'] = newsroom_elated_get_formatted_font_family(newsroom_elated_options()->getOptionValue('sticky_google_fonts'));
        }
        if(newsroom_elated_options()->getOptionValue('sticky_fontsize') !== '') {
            $sticky_menu_item_styles['font-size'] = newsroom_elated_options()->getOptionValue('sticky_fontsize').'px';
        }
        if(newsroom_elated_options()->getOptionValue('sticky_lineheight') !== '') {
            $sticky_menu_item_styles['line-height'] = newsroom_elated_options()->getOptionValue('sticky_lineheight').'px';
        }
        if(newsroom_elated_options()->getOptionValue('sticky_texttransform') !== '') {
            $sticky_menu_item_styles['text-transform'] = newsroom_elated_options()->getOptionValue('sticky_texttransform');
        }
        if(newsroom_elated_options()->getOptionValue('sticky_fontstyle') !== '') {
            $sticky_menu_item_styles['font-style'] = newsroom_elated_options()->getOptionValue('sticky_fontstyle');
        }
        if(newsroom_elated_options()->getOptionValue('sticky_fontweight') !== '') {
            $sticky_menu_item_styles['font-weight'] = newsroom_elated_options()->getOptionValue('sticky_fontweight');
        }
        if(newsroom_elated_options()->getOptionValue('sticky_letterspacing') !== '') {
            $sticky_menu_item_styles['letter-spacing'] = newsroom_elated_options()->getOptionValue('sticky_letterspacing').'px';
        }

        $sticky_menu_item_selector = array(
            '.eltd-page-header .eltd-sticky-header .eltd-main-menu.eltd-sticky-nav > ul > li > a'
        );

        echo newsroom_elated_dynamic_css($sticky_menu_item_selector, $sticky_menu_item_styles);

        $sticky_menu_item_hover_styles = array();
        if(newsroom_elated_options()->getOptionValue('sticky_hovercolor') !== '') {
            $sticky_menu_item_hover_styles['color'] = newsroom_elated_options()->getOptionValue('sticky_hovercolor');
        }

        $sticky_menu_item_hover_selector = array(
            '.eltd-page-header .eltd-sticky-header .eltd-main-menu.eltd-sticky-nav > ul > li:hover > a',
            '.eltd-page-header .eltd-sticky-header .eltd-main-menu.eltd-sticky-nav > ul > li.eltd-active-item:hover > a'
        );

        echo newsroom_elated_dynamic_css($sticky_menu_item_hover_selector, $sticky_menu_item_hover_styles);
    }

    add_action('newsroom_elated_style_dynamic', 'newsroom_elated_sticky_header_styles');
}

if(!function_exists('newsroom_elated_main_menu_styles')) {
    /**
     * Generates styles for main menu
     */
    function newsroom_elated_main_menu_styles() {

        if(newsroom_elated_options()->getOptionValue('menu_color') !== '' || newsroom_elated_options()->getOptionValue('menu_fontsize') != '' || newsroom_elated_options()->getOptionValue('menu_lineheight') != '' || newsroom_elated_options()->getOptionValue('menu_fontstyle') !== '' || newsroom_elated_options()->getOptionValue('menu_fontweight') !== '' || newsroom_elated_options()->getOptionValue('menu_texttransform') !== '' || newsroom_elated_options()->getOptionValue('menu_letterspacing') !== '' || newsroom_elated_options()->getOptionValue('menu_google_fonts') != "-1") { ?>
            .eltd-main-menu.eltd-default-nav > ul > li > a {
            <?php if(newsroom_elated_options()->getOptionValue('menu_color')) { ?> color: <?php echo esc_attr(newsroom_elated_options()->getOptionValue('menu_color')); ?>; <?php } ?>
            <?php if(newsroom_elated_options()->getOptionValue('menu_google_fonts') != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', newsroom_elated_options()->getOptionValue('menu_google_fonts'))); ?>', sans-serif;
            <?php } ?>
            <?php if(newsroom_elated_options()->getOptionValue('menu_fontsize') !== '') { ?> font-size: <?php echo esc_attr(newsroom_elated_options()->getOptionValue('menu_fontsize')); ?>px; <?php } ?>
            <?php if(newsroom_elated_options()->getOptionValue('menu_lineheight') !== '') { ?> line-height: <?php echo esc_attr(newsroom_elated_options()->getOptionValue('menu_lineheight')); ?>px; <?php } ?>
            <?php if(newsroom_elated_options()->getOptionValue('menu_fontstyle') !== '') { ?> font-style: <?php echo esc_attr(newsroom_elated_options()->getOptionValue('menu_fontstyle')); ?>; <?php } ?>
            <?php if(newsroom_elated_options()->getOptionValue('menu_fontweight') !== '') { ?> font-weight: <?php echo esc_attr(newsroom_elated_options()->getOptionValue('menu_fontweight')); ?>; <?php } ?>
            <?php if(newsroom_elated_options()->getOptionValue('menu_texttransform') !== '') { ?> text-transform: <?php echo esc_attr(newsroom_elated_options()->getOptionValue('menu_texttransform')); ?>;  <?php } ?>
            <?php if(newsroom_elated_options()->getOptionValue('menu_letterspacing') !== '') { ?> letter-spacing: <?php echo esc_attr(newsroom_elated_options()->getOptionValue('menu_letterspacing')); ?>px; <?php } ?>
            }
        <?php } ?>

        <?php if(newsroom_elated_options()->getOptionValue('menu_hovercolor') !== '') { ?>
            .eltd-main-menu.eltd-default-nav > ul > li:hover > a,
            .eltd-main-menu.eltd-default-nav > ul > li.eltd-active-item:hover > a {
                color: <?php echo esc_attr(newsroom_elated_options()->getOptionValue('menu_hovercolor')); ?> !important;
            }
        <?php } ?>

        <?php if(newsroom_elated_options()->getOptionValue('menu_activecolor') !== '') { ?>
            .eltd-main-menu.eltd-default-nav > ul > li.eltd-active-item > a {
                color: <?php echo esc_attr(newsroom_elated_options()->getOptionValue('menu_activecolor')); ?>;
            }
        <?php } ?>

        <?php

        $dropdown_styles = array();
        if(newsroom_elated_options()->getOptionValue('dropdown_background_color') !== '') {
            $dropdown_styles['background-color'] = newsroom_elated_options()->getOptionValue('dropdown_background_color');
        }

        $dropdown_selector = array(
            '.eltd-drop-down .eltd-menu-second .eltd-menu-inner > ul,
            li.eltd-menu-narrow .eltd-menu-second .eltd-menu-inner ul,
            .eltd-top-bar #lang_sel ul ul'
        );

        echo newsroom_elated_dynamic_css($dropdown_selector, $dropdown_styles);


    }

    add_action('newsroom_elated_style_dynamic', 'newsroom_elated_main_menu_styles');
}