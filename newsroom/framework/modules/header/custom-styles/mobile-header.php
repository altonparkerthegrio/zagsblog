<?php

if(!function_exists('newsroom_elated_mobile_header_general_styles')) {
    /**
     * Generates general custom styles for mobile header
     */
    function newsroom_elated_mobile_header_general_styles() {
        $mobile_header_styles = array();
        if(newsroom_elated_options()->getOptionValue('mobile_header_height') !== '') {
            $mobile_header_styles['height'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('mobile_header_height')).'px';
        }

        if(newsroom_elated_options()->getOptionValue('mobile_header_background_color')) {
            $mobile_header_styles['background-color'] = newsroom_elated_options()->getOptionValue('mobile_header_background_color');
        }

        echo newsroom_elated_dynamic_css('.eltd-mobile-header .eltd-mobile-header-inner', $mobile_header_styles);


		if(newsroom_elated_options()->getOptionValue('mobile_menu_background_color')) {
			echo newsroom_elated_dynamic_css(
				'.eltd-mobile-header .eltd-mobile-nav',
				array("background-color" => newsroom_elated_options()->getOptionValue('mobile_menu_background_color'))
			);
		}
    }

    add_action('newsroom_elated_style_dynamic', 'newsroom_elated_mobile_header_general_styles');
}

if(!function_exists('newsroom_elated_mobile_logo_styles')) {
    /**
     * Generates styles for mobile logo
     */
    function newsroom_elated_mobile_logo_styles() {
        if(newsroom_elated_options()->getOptionValue('mobile_logo_height') !== '') { ?>
            @media only screen and (max-width: 1000px) {
            <?php echo newsroom_elated_dynamic_css(
                '.eltd-mobile-header .eltd-mobile-logo-wrapper a',
                array('height' => newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('mobile_logo_height')).'px !important')
            ); ?>
            }
        <?php }

        if(newsroom_elated_options()->getOptionValue('mobile_logo_height_phones') !== '') { ?>
            @media only screen and (max-width: 480px) {
            <?php echo newsroom_elated_dynamic_css(
                '.eltd-mobile-header .eltd-mobile-logo-wrapper a',
                array('height' => newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('mobile_logo_height_phones')).'px !important')
            ); ?>
            }
        <?php }
    }

    add_action('newsroom_elated_style_dynamic', 'newsroom_elated_mobile_logo_styles');
}

if(!function_exists('newsroom_elated_mobile_icon_styles')) {
    /**
     * Generates styles for mobile icon opener
     */
    function newsroom_elated_mobile_icon_styles() {
    	
        if(newsroom_elated_options()->getOptionValue('mobile_icon_color') !== '') {
            echo newsroom_elated_dynamic_css(
                '.eltd-mobile-header .eltd-mobile-menu-opener .eltd-mobile-opener-icon-holder .eltd-line',
                array('background-color' => newsroom_elated_options()->getOptionValue('mobile_icon_color')));
        }

        if(newsroom_elated_options()->getOptionValue('mobile_icon_hover_color') !== '') {
            echo newsroom_elated_dynamic_css(
                '.eltd-mobile-header .eltd-mobile-menu-opener a:hover .eltd-mobile-opener-icon-holder .eltd-line',
                array('background-color' => newsroom_elated_options()->getOptionValue('mobile_icon_hover_color')));
        }
    }

    add_action('newsroom_elated_style_dynamic', 'newsroom_elated_mobile_icon_styles');
}