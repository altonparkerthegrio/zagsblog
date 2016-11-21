<?php

if (!function_exists('newsroom_elated_side_area_over_content_style')) {

    function newsroom_elated_side_area_over_content_style() {

        if (newsroom_elated_options()->getOptionValue('side_area_type') == 'side-menu-slide-over-content') {


            $width = newsroom_elated_options()->getOptionValue('side_area_slide_over_content_width');
            if ($width !== '') {

                if ($width == 'width-290') {
                    $width = '290px';
                } elseif ($width == 'width-340') {
                    $width = '340px';
                } else {
                    $width = '390px';
                }

                echo newsroom_elated_dynamic_css('.eltd-side-menu-slide-over-content .eltd-side-menu', array(
                    'left' => '-' . $width,
                    'width' => $width
                ));
            }
        }

    }

    add_action('newsroom_elated_style_dynamic', 'newsroom_elated_side_area_over_content_style');

}

if (!function_exists('newsroom_elated_side_area_icon_color_styles')) {

    function newsroom_elated_side_area_icon_color_styles() {

        if (newsroom_elated_options()->getOptionValue('side_area_icon_color') !== '') {

            echo newsroom_elated_dynamic_css('a.eltd-side-menu-button-opener', array(
                'color' => newsroom_elated_options()->getOptionValue('side_area_icon_color')
            ));

        }
        if (newsroom_elated_options()->getOptionValue('side_area_icon_hover_color') !== '') {

            echo newsroom_elated_dynamic_css('a.eltd-side-menu-button-opener:hover', array(
                'color' => newsroom_elated_options()->getOptionValue('side_area_icon_hover_color')
            ));

        }


    }

    add_action('newsroom_elated_style_dynamic', 'newsroom_elated_side_area_icon_color_styles');

}

if (!function_exists('newsroom_elated_side_area_alignment')) {

    function newsroom_elated_side_area_alignment() {

        if (newsroom_elated_options()->getOptionValue('side_area_aligment')) {

            echo newsroom_elated_dynamic_css('.eltd-side-menu-slide-over-content .eltd-side-menu', array(
                'text-align' => newsroom_elated_options()->getOptionValue('side_area_aligment')
            ));

        }

    }

    add_action('newsroom_elated_style_dynamic', 'newsroom_elated_side_area_alignment');

}

if (!function_exists('newsroom_elated_side_area_styles')) {

    function newsroom_elated_side_area_styles() {

        $side_area_styles = array();

        if (newsroom_elated_options()->getOptionValue('side_area_background_color') !== '') {
            $side_area_styles['background-color'] = newsroom_elated_options()->getOptionValue('side_area_background_color');
        }

        if (!empty($side_area_styles)) {
            echo newsroom_elated_dynamic_css('.eltd-side-menu', $side_area_styles);
        }

        if (newsroom_elated_options()->getOptionValue('side_area_close_icon') == 'dark') {
            echo newsroom_elated_dynamic_css('.eltd-side-menu a.eltd-close-side-menu span, .eltd-side-menu a.eltd-close-side-menu i', array(
                'color' => '#000000'
            ));
        }

        if (newsroom_elated_options()->getOptionValue('side_area_close_icon_size') !== '') {
            echo newsroom_elated_dynamic_css('.eltd-side-menu a.eltd-close-side-menu', array(
                'height' => newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('side_area_close_icon_size')) . 'px',
                'width' => newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('side_area_close_icon_size')) . 'px',
                'line-height' => newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('side_area_close_icon_size')) . 'px',
                'padding' => 0,
            ));
            echo newsroom_elated_dynamic_css('.eltd-side-menu a.eltd-close-side-menu span, .eltd-side-menu a.eltd-close-side-menu i', array(
                'font-size' => newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('side_area_close_icon_size')) . 'px',
                'height' => newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('side_area_close_icon_size')) . 'px',
                'width' => newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('side_area_close_icon_size')) . 'px',
                'line-height' => newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('side_area_close_icon_size')) . 'px',
            ));
        }

    }

    add_action('newsroom_elated_style_dynamic', 'newsroom_elated_side_area_styles');

}

if (!function_exists('newsroom_elated_side_area_title_styles')) {

    function newsroom_elated_side_area_title_styles() {

        $title_styles = array();

        if (newsroom_elated_options()->getOptionValue('side_area_title_color') !== '') {
            $title_styles['color'] = newsroom_elated_options()->getOptionValue('side_area_title_color');
        }

        if (newsroom_elated_options()->getOptionValue('side_area_title_fontsize') !== '') {
            $title_styles['font-size'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('side_area_title_fontsize')) . 'px';
        }

        if (newsroom_elated_options()->getOptionValue('side_area_title_lineheight') !== '') {
            $title_styles['line-height'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('side_area_title_lineheight')) . 'px';
        }

        if (newsroom_elated_options()->getOptionValue('side_area_title_texttransform') !== '') {
            $title_styles['text-transform'] = newsroom_elated_options()->getOptionValue('side_area_title_texttransform');
        }

        if (newsroom_elated_options()->getOptionValue('side_area_title_google_fonts') !== '-1') {
            $title_styles['font-family'] = newsroom_elated_get_formatted_font_family(newsroom_elated_options()->getOptionValue('side_area_title_google_fonts')) . ', sans-serif';
        }

        if (newsroom_elated_options()->getOptionValue('side_area_title_fontstyle') !== '') {
            $title_styles['font-style'] = newsroom_elated_options()->getOptionValue('side_area_title_fontstyle');
        }

        if (newsroom_elated_options()->getOptionValue('side_area_title_fontweight') !== '') {
            $title_styles['font-weight'] = newsroom_elated_options()->getOptionValue('side_area_title_fontweight');
        }

        if (newsroom_elated_options()->getOptionValue('side_area_title_letterspacing') !== '') {
            $title_styles['letter-spacing'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('side_area_title_letterspacing')) . 'px';
        }

        if (!empty($title_styles)) {

            echo newsroom_elated_dynamic_css('.eltd-side-menu-title h4, .eltd-side-menu-title h5', $title_styles);

        }

    }

    add_action('newsroom_elated_style_dynamic', 'newsroom_elated_side_area_title_styles');

}

if (!function_exists('newsroom_elated_side_area_text_styles')) {

    function newsroom_elated_side_area_text_styles() {
        $text_styles = array();

        if (newsroom_elated_options()->getOptionValue('side_area_text_google_fonts') !== '-1') {
            $text_styles['font-family'] = newsroom_elated_get_formatted_font_family(newsroom_elated_options()->getOptionValue('side_area_text_google_fonts')) . ', sans-serif';
        }

        if (newsroom_elated_options()->getOptionValue('side_area_text_fontsize') !== '') {
            $text_styles['font-size'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('side_area_text_fontsize')) . 'px';
        }

        if (newsroom_elated_options()->getOptionValue('side_area_text_lineheight') !== '') {
            $text_styles['line-height'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('side_area_text_lineheight')) . 'px';
        }

        if (newsroom_elated_options()->getOptionValue('side_area_text_letterspacing') !== '') {
            $text_styles['letter-spacing'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('side_area_text_letterspacing')) . 'px';
        }

        if (newsroom_elated_options()->getOptionValue('side_area_text_fontweight') !== '') {
            $text_styles['font-weight'] = newsroom_elated_options()->getOptionValue('side_area_text_fontweight');
        }

        if (newsroom_elated_options()->getOptionValue('side_area_text_fontstyle') !== '') {
            $text_styles['font-style'] = newsroom_elated_options()->getOptionValue('side_area_text_fontstyle');
        }

        if (newsroom_elated_options()->getOptionValue('side_area_text_texttransform') !== '') {
            $text_styles['text-transform'] = newsroom_elated_options()->getOptionValue('side_area_text_texttransform');
        }

        if (newsroom_elated_options()->getOptionValue('side_area_text_color') !== '') {
            $text_styles['color'] = newsroom_elated_options()->getOptionValue('side_area_text_color');
        }

        if (!empty($text_styles)) {

            echo newsroom_elated_dynamic_css(array(
                '.eltd-side-menu .widget',
                '.eltd-side-menu .widget.widget_search form',
                '.eltd-side-menu .widget.widget_search form input[type="text"]',
                '.eltd-side-menu .widget.widget_search form input[type="submit"]',
                '.eltd-side-menu .widget h6',
                '.eltd-side-menu .widget h6 a',
                '.eltd-side-menu .widget p',
                '.eltd-side-menu .widget li a',
                '.eltd-side-menu #wp-calendar caption',
                '.eltd-side-menu .widget li',
                '.eltd-side-menu h3',
                '.eltd-side-menu .widget.widget_archive select',
                '.eltd-side-menu .widget.widget_categories select',
                '.eltd-side-menu .widget.widget_text select',
                '.eltd-side-menu .widget.widget_search form input[type="submit"]',
                '.eltd-side-menu #wp-calendar th',
                '.eltd-side-menu #wp-calendar td',
                '.eltd-side-menu .q_social_icon_holder i.simple_social',
                '.eltd-side-menu .widget .screen-reader-text',
                '.eltd-side-menu span'
            ),
                $text_styles
            );
        }

    }

    add_action('newsroom_elated_style_dynamic', 'newsroom_elated_side_area_text_styles');

}

if (!function_exists('newsroom_elated_side_area_link_styles')) {

    function newsroom_elated_side_area_link_styles() {
        $link_styles = array();

        if (newsroom_elated_options()->getOptionValue('sidearea_link_font_family') !== '-1') {
            $link_styles['font-family'] = newsroom_elated_get_formatted_font_family(newsroom_elated_options()->getOptionValue('sidearea_link_font_family')) . ',sans-serif';
        }

        if (newsroom_elated_options()->getOptionValue('sidearea_link_font_size') !== '') {
            $link_styles['font-size'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('sidearea_link_font_size')) . 'px';
        }

        if (newsroom_elated_options()->getOptionValue('sidearea_link_line_height') !== '') {
            $link_styles['line-height'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('sidearea_link_line_height')) . 'px';
        }

        if (newsroom_elated_options()->getOptionValue('sidearea_link_letter_spacing') !== '') {
            $link_styles['letter-spacing'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('sidearea_link_letter_spacing')) . 'px';
        }

        if (newsroom_elated_options()->getOptionValue('sidearea_link_font_weight') !== '') {
            $link_styles['font-weight'] = newsroom_elated_options()->getOptionValue('sidearea_link_font_weight');
        }

        if (newsroom_elated_options()->getOptionValue('sidearea_link_font_style') !== '') {
            $link_styles['font-style'] = newsroom_elated_options()->getOptionValue('sidearea_link_font_style');
        }

        if (newsroom_elated_options()->getOptionValue('sidearea_link_text_transform') !== '') {
            $link_styles['text-transform'] = newsroom_elated_options()->getOptionValue('sidearea_link_text_transform');
        }

        if (newsroom_elated_options()->getOptionValue('sidearea_link_color') !== '') {
            $link_styles['color'] = newsroom_elated_options()->getOptionValue('sidearea_link_color');
        }

        if (!empty($link_styles)) {

            echo newsroom_elated_dynamic_css('.eltd-side-menu .widget li a, .eltd-side-menu .widget a:not(.qbutton),.eltd-side-menu .widget.widget_rss li a.rsswidget', $link_styles);

        }

        if (newsroom_elated_options()->getOptionValue('sidearea_link_hover_color') !== '') {
            echo newsroom_elated_dynamic_css('.eltd-side-menu .widget a:hover, .eltd-side-menu .widget li:hover, .eltd-side-menu .widget li:hover>a,.eltd-side-menu .widget.widget_rss li a.rsswidget:hover', array(
                'color' => newsroom_elated_options()->getOptionValue('sidearea_link_hover_color')
            ));
        }

    }

    add_action('newsroom_elated_style_dynamic', 'newsroom_elated_side_area_link_styles');

}