<?php

if (!function_exists('newsroom_elated_title_area_typography_style')) {

    function newsroom_elated_title_area_typography_style(){

        $title_styles = array();

        if(newsroom_elated_options()->getOptionValue('page_title_color') !== '') {
            $title_styles['color'] = newsroom_elated_options()->getOptionValue('page_title_color');
        }
        if(newsroom_elated_options()->getOptionValue('page_title_google_fonts') !== '-1') {
            $title_styles['font-family'] = newsroom_elated_get_formatted_font_family(newsroom_elated_options()->getOptionValue('page_title_google_fonts'));
        }
        if(newsroom_elated_options()->getOptionValue('page_title_fontsize') !== '') {
            $title_styles['font-size'] = newsroom_elated_options()->getOptionValue('page_title_fontsize').'px';
        }
        if(newsroom_elated_options()->getOptionValue('page_title_lineheight') !== '') {
            $title_styles['line-height'] = newsroom_elated_options()->getOptionValue('page_title_lineheight').'px';
        }
        if(newsroom_elated_options()->getOptionValue('page_title_texttransform') !== '') {
            $title_styles['text-transform'] = newsroom_elated_options()->getOptionValue('page_title_texttransform');
        }
        if(newsroom_elated_options()->getOptionValue('page_title_fontstyle') !== '') {
            $title_styles['font-style'] = newsroom_elated_options()->getOptionValue('page_title_fontstyle');
        }
        if(newsroom_elated_options()->getOptionValue('page_title_fontweight') !== '') {
            $title_styles['font-weight'] = newsroom_elated_options()->getOptionValue('page_title_fontweight');
        }
        if(newsroom_elated_options()->getOptionValue('page_title_letter_spacing') !== '') {
            $title_styles['letter-spacing'] = newsroom_elated_options()->getOptionValue('page_title_letter_spacing').'px';
        }

        $title_selector = array(
            '.eltd-title .eltd-title-holder .eltd-title-text',
            '.single-post.single-format-standard .eltd-title .eltd-title-holder .eltd-title-text'
        );

        echo newsroom_elated_dynamic_css($title_selector, $title_styles);


        $breadcrumb_styles = array();

        if(newsroom_elated_options()->getOptionValue('page_breadcrumb_color') !== '') {
            $breadcrumb_styles['color'] = newsroom_elated_options()->getOptionValue('page_breadcrumb_color');
        }
        if(newsroom_elated_options()->getOptionValue('page_breadcrumb_google_fonts') !== '-1') {
            $breadcrumb_styles['font-family'] = newsroom_elated_get_formatted_font_family(newsroom_elated_options()->getOptionValue('page_breadcrumb_google_fonts'));
        }
        if(newsroom_elated_options()->getOptionValue('page_breadcrumb_fontsize') !== '') {
            $breadcrumb_styles['font-size'] = newsroom_elated_options()->getOptionValue('page_breadcrumb_fontsize').'px';
        }
        if(newsroom_elated_options()->getOptionValue('page_breadcrumb_lineheight') !== '') {
            $breadcrumb_styles['line-height'] = newsroom_elated_options()->getOptionValue('page_breadcrumb_lineheight').'px';
        }
        if(newsroom_elated_options()->getOptionValue('page_breadcrumb_texttransform') !== '') {
            $breadcrumb_styles['text-transform'] = newsroom_elated_options()->getOptionValue('page_breadcrumb_texttransform');
        }
        if(newsroom_elated_options()->getOptionValue('page_breadcrumb_fontstyle') !== '') {
            $breadcrumb_styles['font-style'] = newsroom_elated_options()->getOptionValue('page_breadcrumb_fontstyle');
        }
        if(newsroom_elated_options()->getOptionValue('page_breadcrumb_fontweight') !== '') {
            $breadcrumb_styles['font-weight'] = newsroom_elated_options()->getOptionValue('page_breadcrumb_fontweight');
        }
        if(newsroom_elated_options()->getOptionValue('page_breadcrumb_letter_spacing') !== '') {
            $breadcrumb_styles['letter-spacing'] = newsroom_elated_options()->getOptionValue('page_breadcrumb_letter_spacing').'px';
        }

        $breadcrumb_selector = array(
            '.eltd-title .eltd-title-holder .eltd-breadcrumbs a, .eltd-title .eltd-title-holder .eltd-breadcrumbs span'
        );

        echo newsroom_elated_dynamic_css($breadcrumb_selector, $breadcrumb_styles);

        $breadcrumb_selector_styles = array();
        if(newsroom_elated_options()->getOptionValue('page_breadcrumb_hovercolor') !== '') {
            $breadcrumb_selector_styles['color'] = newsroom_elated_options()->getOptionValue('page_breadcrumb_hovercolor').' !important';
        }

        $breadcrumb_hover_selector = array(
            '.eltd-title .eltd-title-holder .eltd-breadcrumbs a:hover'
        );

        echo newsroom_elated_dynamic_css($breadcrumb_hover_selector, $breadcrumb_selector_styles);


        $title_info_styles = array();

        if(newsroom_elated_options()->getOptionValue('page_title_info_color') !== '') {
            $title_color['color'] = newsroom_elated_options()->getOptionValue('page_title_info_color');
			$title_color_selector = array(
			'.single-post .eltd-title .eltd-title-cat, .single-post .eltd-title .eltd-pt-info-section'
			);

			echo newsroom_elated_dynamic_css($title_color_selector, $title_color);
        }
        if(newsroom_elated_options()->getOptionValue('page_title_info_google_fonts') !== '-1') {
            $title_info_styles['font-family'] = newsroom_elated_get_formatted_font_family(newsroom_elated_options()->getOptionValue('page_title_info_google_fonts'));
        }
        if(newsroom_elated_options()->getOptionValue('page_title_info_fontsize') !== '') {
            $title_info_styles['font-size'] = newsroom_elated_options()->getOptionValue('page_title_info_fontsize').'px';
            echo newsroom_elated_dynamic_css('.single-post .eltd-title .eltd-pt-info-section > div', array('font-size' => ($title_info_styles['font-size'] - 3).'px' ));
        }
        if(newsroom_elated_options()->getOptionValue('page_title_info_lineheight') !== '') {
            $title_info_styles['line-height'] = newsroom_elated_options()->getOptionValue('page_title_info_lineheight').'px';
        }
        if(newsroom_elated_options()->getOptionValue('page_title_info_texttransform') !== '') {
            $title_info_styles['text-transform'] = newsroom_elated_options()->getOptionValue('page_title_info_texttransform');
        }
        if(newsroom_elated_options()->getOptionValue('page_title_info_fontstyle') !== '') {
            $title_info_styles['font-style'] = newsroom_elated_options()->getOptionValue('page_title_info_fontstyle');
        }
        if(newsroom_elated_options()->getOptionValue('page_title_info_fontweight') !== '') {
            $title_info_styles['font-weight'] = newsroom_elated_options()->getOptionValue('page_title_info_fontweight');
        }
        if(newsroom_elated_options()->getOptionValue('page_title_info_letter_spacing') !== '') {
            $title_info_styles['letter-spacing'] = newsroom_elated_options()->getOptionValue('page_title_info_letter_spacing').'px';
        }

        $title_info_selector = array(
            '.single-post .eltd-title .eltd-post-info-category,.single-post.single-format-standard .eltd-title .eltd-title-post-author, .single-post .eltd-title .eltd-pt-info-section > div'
        );

        echo newsroom_elated_dynamic_css($title_info_selector, $title_info_styles);

        $title_info_selector_styles = array();
        if(newsroom_elated_options()->getOptionValue('page_title_info_hover_color') !== '') {
            $title_info_selector_styles['color'] = newsroom_elated_options()->getOptionValue('page_title_info_hover_color').' !important';
        }

        $title_info_hover_selector = array(
            '.single-post .eltd-title .eltd-post-info-category a:hover',
            '.single-post.single-format-standard .eltd-title .eltd-title-post-author a:hover',
            '.single-post .eltd-title .eltd-pt-info-section > div a:hover'
        );

        echo newsroom_elated_dynamic_css($title_info_hover_selector, $title_info_selector_styles);

        if(newsroom_elated_options()->getOptionValue('page_title_info_author_color') !== '') {
            $title_info_author['color'] = newsroom_elated_options()->getOptionValue('page_title_info_author_color');

			echo newsroom_elated_dynamic_css('.single-post.single-format-standard .eltd-title .eltd-title-post-author', $title_info_author);
        }

    }

    add_action('newsroom_elated_style_dynamic', 'newsroom_elated_title_area_typography_style');

}


