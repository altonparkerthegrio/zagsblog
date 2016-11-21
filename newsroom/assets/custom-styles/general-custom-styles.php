<?php
if (!function_exists('newsroom_elated_design_styles')) {
    /**
     * Generates general custom styles
     */
    function newsroom_elated_design_styles()
    {

        if (newsroom_elated_options()->getOptionValue('google_fonts')) {
            $font_family = newsroom_elated_options()->getOptionValue('google_fonts');
            if (newsroom_elated_is_font_option_valid($font_family)) {
                echo newsroom_elated_dynamic_css('body', array('font-family' => newsroom_elated_get_font_option_val($font_family)));
            }
        }

        if (newsroom_elated_options()->getOptionValue('first_color') !== "") {
            $color_selector = array(
                'a:hover',
                'h1 a:hover',
                'h2 a:hover',
                'h3 a:hover',
                'h4 a:hover',
                'h5 a:hover',
                'h6 a:hover',
                'p a:hover',
                '.eltd-comment-holder .eltd-comment-links a:hover',
                '.eltd-post-author-comment .eltd-comment-info .eltd-comment-author-label',
                '.eltd-post-author-comment .eltd-comment-info .eltd-comment-mark',
                '.eltd-post-author-comment .eltd-comment-text .eltd-text-holder:before',
                '.eltd-top-bar #lang_sel ul li:hover .lang_sel_sel',
                '.eltd-top-bar #lang_sel ul ul a:hover',
                '.eltd-main-menu>ul>li.eltd-active-item>a',
                '.eltd-main-menu>ul>li.eltd-active-item>a',
                '.eltd-main-menu>ul>li:hover>a',
                '.eltd-drop-down .eltd-menu-second .eltd-menu-inner ul li.eltd-menu-sub:hover a i.eltd_menu_arrow',
                '.eltd-drop-down .eltd-menu-wide .eltd-menu-second .eltd-menu-inner>ul>li>a .menu_icon_wrapper i',
                '.eltd-top-bar .widget.widget_nav_menu ul li a:hover',
                '.eltd-mobile-header .eltd-mobile-nav a:hover',
                '.eltd-mobile-header .eltd-mobile-nav h6:hover',
                '.eltd-menu-area-light .eltd-main-menu.eltd-default-nav>ul>li.eltd-active-item>a',
                '.eltd-transparent .eltd-main-menu.eltd-default-nav>ul>li.eltd-active-item>a',
                '.eltd-btn.eltd-btn-solid:not(.eltd-btn-custom-hover-color):hover .eltd-btn-icon-element',
                '.eltd-btn.eltd-btn-solid.eltd-read-more .eltd-btn-icon-element',
                '.eltd-icon-shortcode .eltd-icon-element',
                '.eltd-social-share-holder.eltd-dropdown:hover .eltd-social-share-dropdown-opener:before',
                '.eltd-bnl-holder .eltd-social-share-holder.eltd-dropdown .eltd-social-share-dropdown-opener::before',
                '.eltd-bnl-holder .eltd-bnl-outer .eltd-bnl-inner .eltd-post-item .eltd-post-item-inner .eltd-post-info-category a:hover',
                '.eltd-bnl-holder .eltd-bnl-outer .eltd-bnl-inner .eltd-post-item .eltd-post-item-inner .eltd-pt-meta-section>div a:hover',
                '.eltd-blog-masonry-holder .eltd-blog-masonry-item .eltd-pt-info-section>div>div',
                '.eltd-blog-holder.eltd-blog-type-standard article.sticky .eltd-post-title a',
                '.eltd-blog-holder.eltd-blog-type-standard article .eltd-post-content .eltd-post-info-category a:hover',
                '.eltd-blog-holder.eltd-blog-type-standard article .eltd-post-content .eltd-post-info>div a:hover',
                '.eltd-blog-holder.eltd-blog-type-standard article .eltd-social-share-holder.eltd-dropdown .eltd-social-share-dropdown-opener::before',
                '.eltd-post-pag-np-horizontal.eltd-post-layout-light .eltd-bnl-nav-icon:hover',
                '.eltd-post-pag-np-horizontal.eltd-post-layout-dark .eltd-bnl-nav-icon:hover',
                '.single-post .eltd-post-info>div a:hover',
                '.single-post .eltd-related-posts-holder .eltd-post-columns-inner .eltd-post-item .eltd-post-info-category a:hover',
                '.single-post .eltd-related-posts-holder .eltd-post-columns-inner .eltd-post-item .eltd-pt-meta-section>div a:hover',
                '.single-post .eltd-single-tags-holder .eltd-tags a:hover',
                '.eltd-bn-holder ul.eltd-bn-slide .eltd-bn-text a:hover',
                '.eltd-rpc-holder .eltd-rpc-inner ul li .eltd-rpc-date:hover',
                '.eltd-weather-widget-holder .eltd-weather-today-temp div span',
                '.eltd-weather-widget-holder .eltd-weather-todays-stats .eltd-weather-todays-description',
                '.eltd-main-menu ul li .eltd-plw-tabs .eltd-plw-tabs-tab:hover>a',
                '.eltd-main-menu ul li .eltd-plw-tabs .eltd-plw-tabs-tab.eltd-plw-tabs-active-item>a',
                '.eltd-side-menu-button-opener'

            );


            $color_important_selector = array(
                '.eltd-btn.eltd-btn-solid:not(.eltd-btn-custom-hover-color):hover',
                '.eltd-btn.eltd-btn-solid.eltd-read-more'
            );

            $background_color_selector = array(
                '.eltd-pagination ul li a:hover',
                '.eltd-pagination ul li.active span',
                '.ooter .widget #wp-calendar td#today',
                '.wpb_widgetised_column .widget #wp-calendar td#today',
                '.side.eltd-sidebar .widget #wp-calendar td#today',
                '.eltd-icon-shortcode.circle',
                '.eltd-icon-shortcode.square',
                '.eltd-post-pag-np-horizontal .eltd-bnl-navigation-holder .eltd-paging-button-holder.eltd-bnl-paging-active .eltd-paging-button',
                '.eltd-post-pag-np-horizontal .eltd-bnl-navigation-holder .eltd-paging-button-holder:hover .eltd-paging-button',
                '.single-post .eltd-single-links-pages .eltd-single-links-pages-inner>a:hover',
                '.single-post .eltd-single-links-pages .eltd-single-links-pages-inner>span',
                '.widget_eltd_instagram_widget .eltd-instagram-feed-heading a:hover span',
                '.eltd-side-menu .widget #wp-calendar td#today',
                '#eltd-back-to-top > span',
                '.eltd-post-ajax-preloader .eltd-cube:before'
            );

            $background_color_important_selector = array(
                '.eltd-btn.eltd-btn-outline:not(.eltd-btn-custom-hover-bg):hover'
            );

            $border_color_selector = array(
                '.eltd-dark .eltd-search-menu-holder .eltd-search-field:focus',
                '.eltd-light .eltd-search-menu-holder .eltd-search-field:focus',
                '.eltd-main-menu ul li .eltd-plw-tabs .eltd-plw-tabs-tab:hover'
            );

            $woo_color_selector = array();
            $woo_background_color_selector = array();

            if (newsroom_elated_is_woocommerce_installed()) {
                $woo_color_selector = array(
                    '.woocommerce .eltd-product-info-holder .price del',
                    '.woocommerce .star-rating span',
                    '.eltd-woocommerce-page.eltd-woocommerce-single-page .woocommerce-tabs ul.tabs>li.active a',
                    '.eltd-woocommerce-page.eltd-woocommerce-single-page .woocommerce-tabs ul.tabs>li:hover a',
                    '.eltd-woocommerce-page.eltd-woocommerce-single-page .comment-respond .stars a.active:after',
                    '.eltd-shopping-cart-dropdown ul li a:hover',
                    '.eltd-shopping-cart-dropdown span.eltd-quantity',
                    '.eltd-woocommerce-page .eltd-content .eltd-quantity-buttons .eltd-quantity-minus:hover',
                    '.eltd-woocommerce-page .eltd-content .eltd-quantity-buttons .eltd-quantity-plus:hover',
                    '.eltd-woocommerce-page .woocommerce-info .showcoupon:hover',
                    '.eltd-woocommerce-page table.cart tr.cart_item td.product-name a:hover',
                    '.eltd-woocommerce-page table.cart tr.cart_item td.product-remove a:hover',
                    '.woocommerce-page aside.eltd-sidebar .widget.widget_products ul li del',
                    '.woocommerce-page aside.eltd-sidebar .widget.widget_recently_viewed_products ul li del',
                    '.woocommerce-page aside.eltd-sidebar .widget.widget_top_rated_products ul li del',
                    '.select2-container .select2-choice:hover',
                    '.select2-container .select2-choice:hover .select2-arrow'

                );

                $woo_background_color_selector = array(
                    '.woocommerce-pagination .page-numbers li a:hover',
                    '.woocommerce-pagination .page-numbers li span.current',
                    '.woocommerce-pagination .page-numbers li span.current:hover',
                    '.woocommerce-pagination .page-numbers li span:hover',
                    '.woocommerce-page aside.eltd-sidebar .widget.widget_price_filter .ui-slider-horizontal .ui-slider-range',
                    '.woocommerce-page aside.eltd-sidebar .widget #wp-calendar td#today',
                    '.select2-drop .select2-results .select2-highlighted'
                );

            }

            $bb_color_selector = array();

            if (newsroom_elated_bbpress_installed()) {
                $bb_color_selector = array(
                    '#bbpress-forums div.bbp-breadcrumb .bbp-breadcrumb-home:hover',
                    '#bbpress-forums div.bbp-breadcrumb .bbp-breadcrumb-current',
                    '#bbpress-forums .forum-titles > li.bbp-forum-freshness > a:hover',
                    '#bbpress-forums .forum-titles > li.bbp-topic-freshness > a:hover',
                    '#bbpress-forums .bbp-body > ul > li.bbp-forum-freshness > a:hover',
                    '#bbpress-forums .bbp-body > ul > li.bbp-topic-freshness > a:hover',
                    '#bbpress-forums .bbp-topics ul.sticky:after'


                );
            }


            $color_selector = array_merge($color_selector, $woo_color_selector, $bb_color_selector);
            $background_color_selector = array_merge($background_color_selector, $woo_background_color_selector);

            echo newsroom_elated_dynamic_css('::selection', array('background' => newsroom_elated_options()->getOptionValue('first_color')));
            echo newsroom_elated_dynamic_css('::-moz-selection', array('background' => newsroom_elated_options()->getOptionValue('first_color')));
            echo newsroom_elated_dynamic_css($color_selector, array('color' => newsroom_elated_options()->getOptionValue('first_color')));
            echo newsroom_elated_dynamic_css($color_important_selector, array('color' => newsroom_elated_options()->getOptionValue('first_color') . '!important'));
            echo newsroom_elated_dynamic_css($background_color_selector, array('background-color' => newsroom_elated_options()->getOptionValue('first_color')));
            echo newsroom_elated_dynamic_css($background_color_important_selector, array('background-color' => newsroom_elated_options()->getOptionValue('first_color') . '!important'));
            echo newsroom_elated_dynamic_css($border_color_selector, array('border-color' => newsroom_elated_options()->getOptionValue('first_color')));
        }

        if (newsroom_elated_options()->getOptionValue('page_background_color')) {
            $background_color_selector = array(
                '.eltd-wrapper-inner',
                '.eltd-content',
                '.eltd-boxed .eltd-wrapper .eltd-wrapper-inner',
                '.eltd-boxed .eltd-wrapper .eltd-content'
            );
            echo newsroom_elated_dynamic_css($background_color_selector, array('background-color' => newsroom_elated_options()->getOptionValue('page_background_color')));
        }

        if (newsroom_elated_options()->getOptionValue('selection_color')) {
            echo newsroom_elated_dynamic_css('::selection', array('background' => newsroom_elated_options()->getOptionValue('selection_color')));
            echo newsroom_elated_dynamic_css('::-moz-selection', array('background' => newsroom_elated_options()->getOptionValue('selection_color')));
        }

        $boxed_background_style = array();
        if (newsroom_elated_options()->getOptionValue('page_background_color_in_box')) {
            $boxed_background_style['background-color'] = newsroom_elated_options()->getOptionValue('page_background_color_in_box');
        }

        if (newsroom_elated_options()->getOptionValue('boxed_background_image')) {
            $boxed_background_style['background-image'] = 'url(' . esc_url(newsroom_elated_options()->getOptionValue('boxed_background_image')) . ')';
            $boxed_background_style['background-position'] = 'center 0px';
            $boxed_background_style['background-repeat'] = 'no-repeat';
        }

        if (newsroom_elated_options()->getOptionValue('boxed_pattern_background_image')) {
            $boxed_background_style['background-image'] = 'url(' . esc_url(newsroom_elated_options()->getOptionValue('boxed_pattern_background_image')) . ')';
            $boxed_background_style['background-position'] = '0px 0px';
            $boxed_background_style['background-repeat'] = 'repeat';
        }

        if (newsroom_elated_options()->getOptionValue('boxed_background_image_attachment')) {
            $boxed_background_style['background-attachment'] = (newsroom_elated_options()->getOptionValue('boxed_background_image_attachment'));
            if (newsroom_elated_options()->getOptionValue('boxed_background_image_attachment') == 'fixed') {
                $boxed_background_style['background-size'] = 'cover';
            }
        }

        echo newsroom_elated_dynamic_css('.eltd-boxed', $boxed_background_style);
    }

    add_action('newsroom_elated_style_dynamic', 'newsroom_elated_design_styles');
}


if (!function_exists('newsroom_elated_content_styles')) {
    /**
     * Generates content custom styles
     */
    function newsroom_elated_content_styles()
    {

        $content_style = array();
        if (newsroom_elated_options()->getOptionValue('content_top_padding') !== '') {
            $padding_top = (newsroom_elated_options()->getOptionValue('content_top_padding'));
            $content_style['padding-top'] = newsroom_elated_filter_px($padding_top) . 'px';
        }

        $content_selector = array(
            '.eltd-content .eltd-content-inner > .eltd-full-width > .eltd-full-width-inner',
        );

        echo newsroom_elated_dynamic_css($content_selector, $content_style);

        $content_style_in_grid = array();
        if (newsroom_elated_options()->getOptionValue('content_top_padding_in_grid') !== '') {
            $padding_top_in_grid = (newsroom_elated_options()->getOptionValue('content_top_padding_in_grid'));
            $content_style_in_grid['padding-top'] = newsroom_elated_filter_px($padding_top_in_grid) . 'px';

        }

        $content_selector_in_grid = array(
            '.eltd-content .eltd-content-inner > .eltd-container > .eltd-container-inner',
        );

        echo newsroom_elated_dynamic_css($content_selector_in_grid, $content_style_in_grid);

    }

    add_action('newsroom_elated_style_dynamic', 'newsroom_elated_content_styles');
}


if (!function_exists('newsroom_elated_h1_styles')) {

    function newsroom_elated_h1_styles()
    {

        $h1_styles = array();

        if (newsroom_elated_options()->getOptionValue('h1_color') !== '') {
            $h1_styles['color'] = newsroom_elated_options()->getOptionValue('h1_color');
        }
        if (newsroom_elated_options()->getOptionValue('h1_google_fonts') !== '-1') {
            $h1_styles['font-family'] = newsroom_elated_get_formatted_font_family(newsroom_elated_options()->getOptionValue('h1_google_fonts'));
        }
        if (newsroom_elated_options()->getOptionValue('h1_fontsize') !== '') {
            $h1_styles['font-size'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('h1_fontsize')) . 'px';
        }
        if (newsroom_elated_options()->getOptionValue('h1_lineheight') !== '') {
            $h1_styles['line-height'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('h1_lineheight')) . 'px';
        }
        if (newsroom_elated_options()->getOptionValue('h1_texttransform') !== '') {
            $h1_styles['text-transform'] = newsroom_elated_options()->getOptionValue('h1_texttransform');
        }
        if (newsroom_elated_options()->getOptionValue('h1_fontstyle') !== '') {
            $h1_styles['font-style'] = newsroom_elated_options()->getOptionValue('h1_fontstyle');
        }
        if (newsroom_elated_options()->getOptionValue('h1_fontweight') !== '') {
            $h1_styles['font-weight'] = newsroom_elated_options()->getOptionValue('h1_fontweight');
        }
        if (newsroom_elated_options()->getOptionValue('h1_letterspacing') !== '') {
            $h1_styles['letter-spacing'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('h1_letterspacing')) . 'px';
        }

        $h1_selector = array(
            'h1'
        );

        if (!empty($h1_styles)) {
            echo newsroom_elated_dynamic_css($h1_selector, $h1_styles);
        }
    }

    add_action('newsroom_elated_style_dynamic', 'newsroom_elated_h1_styles');
}

if (!function_exists('newsroom_elated_h2_styles')) {

    function newsroom_elated_h2_styles()
    {

        $h2_styles = array();

        if (newsroom_elated_options()->getOptionValue('h2_color') !== '') {
            $h2_styles['color'] = newsroom_elated_options()->getOptionValue('h2_color');
        }
        if (newsroom_elated_options()->getOptionValue('h2_google_fonts') !== '-1') {
            $h2_styles['font-family'] = newsroom_elated_get_formatted_font_family(newsroom_elated_options()->getOptionValue('h2_google_fonts'));
        }
        if (newsroom_elated_options()->getOptionValue('h2_fontsize') !== '') {
            $h2_styles['font-size'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('h2_fontsize')) . 'px';
        }
        if (newsroom_elated_options()->getOptionValue('h2_lineheight') !== '') {
            $h2_styles['line-height'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('h2_lineheight')) . 'px';
        }
        if (newsroom_elated_options()->getOptionValue('h2_texttransform') !== '') {
            $h2_styles['text-transform'] = newsroom_elated_options()->getOptionValue('h2_texttransform');
        }
        if (newsroom_elated_options()->getOptionValue('h2_fontstyle') !== '') {
            $h2_styles['font-style'] = newsroom_elated_options()->getOptionValue('h2_fontstyle');
        }
        if (newsroom_elated_options()->getOptionValue('h2_fontweight') !== '') {
            $h2_styles['font-weight'] = newsroom_elated_options()->getOptionValue('h2_fontweight');
        }
        if (newsroom_elated_options()->getOptionValue('h2_letterspacing') !== '') {
            $h2_styles['letter-spacing'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('h2_letterspacing')) . 'px';
        }

        $h2_selector = array(
            'h2'
        );

        if (!empty($h2_styles)) {
            echo newsroom_elated_dynamic_css($h2_selector, $h2_styles);
        }
    }

    add_action('newsroom_elated_style_dynamic', 'newsroom_elated_h2_styles');
}

if (!function_exists('newsroom_elated_h3_styles')) {

    function newsroom_elated_h3_styles()
    {

        $h3_styles = array();

        if (newsroom_elated_options()->getOptionValue('h3_color') !== '') {
            $h3_styles['color'] = newsroom_elated_options()->getOptionValue('h3_color');
        }
        if (newsroom_elated_options()->getOptionValue('h3_google_fonts') !== '-1') {
            $h3_styles['font-family'] = newsroom_elated_get_formatted_font_family(newsroom_elated_options()->getOptionValue('h3_google_fonts'));
        }
        if (newsroom_elated_options()->getOptionValue('h3_fontsize') !== '') {
            $h3_styles['font-size'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('h3_fontsize')) . 'px';
        }
        if (newsroom_elated_options()->getOptionValue('h3_lineheight') !== '') {
            $h3_styles['line-height'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('h3_lineheight')) . 'px';
        }
        if (newsroom_elated_options()->getOptionValue('h3_texttransform') !== '') {
            $h3_styles['text-transform'] = newsroom_elated_options()->getOptionValue('h3_texttransform');
        }
        if (newsroom_elated_options()->getOptionValue('h3_fontstyle') !== '') {
            $h3_styles['font-style'] = newsroom_elated_options()->getOptionValue('h3_fontstyle');
        }
        if (newsroom_elated_options()->getOptionValue('h3_fontweight') !== '') {
            $h3_styles['font-weight'] = newsroom_elated_options()->getOptionValue('h3_fontweight');
        }
        if (newsroom_elated_options()->getOptionValue('h3_letterspacing') !== '') {
            $h3_styles['letter-spacing'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('h3_letterspacing')) . 'px';
        }

        $h3_selector = array(
            'h3'
        );

        if (!empty($h3_styles)) {
            echo newsroom_elated_dynamic_css($h3_selector, $h3_styles);
        }
    }

    add_action('newsroom_elated_style_dynamic', 'newsroom_elated_h3_styles');
}

if (!function_exists('newsroom_elated_h4_styles')) {

    function newsroom_elated_h4_styles()
    {

        $h4_styles = array();

        if (newsroom_elated_options()->getOptionValue('h4_color') !== '') {
            $h4_styles['color'] = newsroom_elated_options()->getOptionValue('h4_color');
        }
        if (newsroom_elated_options()->getOptionValue('h4_google_fonts') !== '-1') {
            $h4_styles['font-family'] = newsroom_elated_get_formatted_font_family(newsroom_elated_options()->getOptionValue('h4_google_fonts'));
        }
        if (newsroom_elated_options()->getOptionValue('h4_fontsize') !== '') {
            $h4_styles['font-size'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('h4_fontsize')) . 'px';
        }
        if (newsroom_elated_options()->getOptionValue('h4_lineheight') !== '') {
            $h4_styles['line-height'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('h4_lineheight')) . 'px';
        }
        if (newsroom_elated_options()->getOptionValue('h4_texttransform') !== '') {
            $h4_styles['text-transform'] = newsroom_elated_options()->getOptionValue('h4_texttransform');
        }
        if (newsroom_elated_options()->getOptionValue('h4_fontstyle') !== '') {
            $h4_styles['font-style'] = newsroom_elated_options()->getOptionValue('h4_fontstyle');
        }
        if (newsroom_elated_options()->getOptionValue('h4_fontweight') !== '') {
            $h4_styles['font-weight'] = newsroom_elated_options()->getOptionValue('h4_fontweight');
        }
        if (newsroom_elated_options()->getOptionValue('h4_letterspacing') !== '') {
            $h4_styles['letter-spacing'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('h4_letterspacing')) . 'px';
        }

        $h4_selector = array(
            'h4'
        );

        if (!empty($h4_styles)) {
            echo newsroom_elated_dynamic_css($h4_selector, $h4_styles);
        }
    }

    add_action('newsroom_elated_style_dynamic', 'newsroom_elated_h4_styles');
}

if (!function_exists('newsroom_elated_h5_styles')) {

    function newsroom_elated_h5_styles()
    {

        $h5_styles = array();

        if (newsroom_elated_options()->getOptionValue('h5_color') !== '') {
            $h5_styles['color'] = newsroom_elated_options()->getOptionValue('h5_color');
        }
        if (newsroom_elated_options()->getOptionValue('h5_google_fonts') !== '-1') {
            $h5_styles['font-family'] = newsroom_elated_get_formatted_font_family(newsroom_elated_options()->getOptionValue('h5_google_fonts'));
        }
        if (newsroom_elated_options()->getOptionValue('h5_fontsize') !== '') {
            $h5_styles['font-size'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('h5_fontsize')) . 'px';
        }
        if (newsroom_elated_options()->getOptionValue('h5_lineheight') !== '') {
            $h5_styles['line-height'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('h5_lineheight')) . 'px';
        }
        if (newsroom_elated_options()->getOptionValue('h5_texttransform') !== '') {
            $h5_styles['text-transform'] = newsroom_elated_options()->getOptionValue('h5_texttransform');
        }
        if (newsroom_elated_options()->getOptionValue('h5_fontstyle') !== '') {
            $h5_styles['font-style'] = newsroom_elated_options()->getOptionValue('h5_fontstyle');
        }
        if (newsroom_elated_options()->getOptionValue('h5_fontweight') !== '') {
            $h5_styles['font-weight'] = newsroom_elated_options()->getOptionValue('h5_fontweight');
        }
        if (newsroom_elated_options()->getOptionValue('h5_letterspacing') !== '') {
            $h5_styles['letter-spacing'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('h5_letterspacing')) . 'px';
        }

        $h5_selector = array(
            'h5'
        );

        if (!empty($h5_styles)) {
            echo newsroom_elated_dynamic_css($h5_selector, $h5_styles);
        }
    }

    add_action('newsroom_elated_style_dynamic', 'newsroom_elated_h5_styles');
}

if (!function_exists('newsroom_elated_h6_styles')) {

    function newsroom_elated_h6_styles()
    {

        $h6_styles = array();

        if (newsroom_elated_options()->getOptionValue('h6_color') !== '') {
            $h6_styles['color'] = newsroom_elated_options()->getOptionValue('h6_color');
        }
        if (newsroom_elated_options()->getOptionValue('h6_google_fonts') !== '-1') {
            $h6_styles['font-family'] = newsroom_elated_get_formatted_font_family(newsroom_elated_options()->getOptionValue('h6_google_fonts'));
        }
        if (newsroom_elated_options()->getOptionValue('h6_fontsize') !== '') {
            $h6_styles['font-size'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('h6_fontsize')) . 'px';
        }
        if (newsroom_elated_options()->getOptionValue('h6_lineheight') !== '') {
            $h6_styles['line-height'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('h6_lineheight')) . 'px';
        }
        if (newsroom_elated_options()->getOptionValue('h6_texttransform') !== '') {
            $h6_styles['text-transform'] = newsroom_elated_options()->getOptionValue('h6_texttransform');
        }
        if (newsroom_elated_options()->getOptionValue('h6_fontstyle') !== '') {
            $h6_styles['font-style'] = newsroom_elated_options()->getOptionValue('h6_fontstyle');
        }
        if (newsroom_elated_options()->getOptionValue('h6_fontweight') !== '') {
            $h6_styles['font-weight'] = newsroom_elated_options()->getOptionValue('h6_fontweight');
        }
        if (newsroom_elated_options()->getOptionValue('h6_letterspacing') !== '') {
            $h6_styles['letter-spacing'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('h6_letterspacing')) . 'px';
        }

        $h6_selector = array(
            'h6'
        );

        if (!empty($h6_styles)) {
            echo newsroom_elated_dynamic_css($h6_selector, $h6_styles);
        }
    }

    add_action('newsroom_elated_style_dynamic', 'newsroom_elated_h6_styles');
}

if (!function_exists('newsroom_elated_text_styles')) {

    function newsroom_elated_text_styles()
    {

        $text_styles = array();

        if (newsroom_elated_options()->getOptionValue('text_color') !== '') {
            $text_styles['color'] = newsroom_elated_options()->getOptionValue('text_color');
        }
        if (newsroom_elated_options()->getOptionValue('text_google_fonts') !== '-1') {
            $text_styles['font-family'] = newsroom_elated_get_formatted_font_family(newsroom_elated_options()->getOptionValue('text_google_fonts'));
        }
        if (newsroom_elated_options()->getOptionValue('text_fontsize') !== '') {
            $text_styles['font-size'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('text_fontsize')) . 'px';
        }
        if (newsroom_elated_options()->getOptionValue('text_lineheight') !== '') {
            $text_styles['line-height'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('text_lineheight')) . 'px';
        }
        if (newsroom_elated_options()->getOptionValue('text_texttransform') !== '') {
            $text_styles['text-transform'] = newsroom_elated_options()->getOptionValue('text_texttransform');
        }
        if (newsroom_elated_options()->getOptionValue('text_fontstyle') !== '') {
            $text_styles['font-style'] = newsroom_elated_options()->getOptionValue('text_fontstyle');
        }
        if (newsroom_elated_options()->getOptionValue('text_fontweight') !== '') {
            $text_styles['font-weight'] = newsroom_elated_options()->getOptionValue('text_fontweight');
        }
        if (newsroom_elated_options()->getOptionValue('text_letterspacing') !== '') {
            $text_styles['letter-spacing'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('text_letterspacing')) . 'px';
        }

        $text_selector = array(
            'p'
        );

        if (!empty($text_styles)) {
            echo newsroom_elated_dynamic_css($text_selector, $text_styles);
        }
    }

    add_action('newsroom_elated_style_dynamic', 'newsroom_elated_text_styles');
}

if (!function_exists('newsroom_elated_boxy_text_styles')) {

    function newsroom_elated_boxy_text_styles()
    {

        $text_styles = array();

        if (newsroom_elated_options()->getOptionValue('text_color') !== '') {
            $text_styles['color'] = newsroom_elated_options()->getOptionValue('text_color');
        }
        if (newsroom_elated_options()->getOptionValue('text_fontsize') !== '') {
            $text_styles['font-size'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('text_fontsize')) . 'px';
        }
        if (newsroom_elated_options()->getOptionValue('text_lineheight') !== '') {
            $text_styles['line-height'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('text_lineheight')) . 'px';
        }
        if (newsroom_elated_options()->getOptionValue('text_fontweight') !== '') {
            $text_styles['font-weight'] = newsroom_elated_options()->getOptionValue('text_fontweight');
        }

        $text_selector = array(
            'body'
        );

        if (!empty($text_styles)) {
            echo newsroom_elated_dynamic_css($text_selector, $text_styles);
        }
    }

    add_action('newsroom_elated_style_dynamic', 'newsroom_elated_boxy_text_styles');
}

if (!function_exists('newsroom_elated_link_styles')) {

    function newsroom_elated_link_styles()
    {

        $link_styles = array();

        if (newsroom_elated_options()->getOptionValue('link_color') !== '') {
            $link_styles['color'] = newsroom_elated_options()->getOptionValue('link_color');
        }
        if (newsroom_elated_options()->getOptionValue('link_fontstyle') !== '') {
            $link_styles['font-style'] = newsroom_elated_options()->getOptionValue('link_fontstyle');
        }
        if (newsroom_elated_options()->getOptionValue('link_fontweight') !== '') {
            $link_styles['font-weight'] = newsroom_elated_options()->getOptionValue('link_fontweight');
        }
        if (newsroom_elated_options()->getOptionValue('link_fontdecoration') !== '') {
            $link_styles['text-decoration'] = newsroom_elated_options()->getOptionValue('link_fontdecoration');
        }

        $link_selector = array(
            'a',
            'p a'
        );

        if (!empty($link_styles)) {
            echo newsroom_elated_dynamic_css($link_selector, $link_styles);
        }
    }

    add_action('newsroom_elated_style_dynamic', 'newsroom_elated_link_styles');
}

if (!function_exists('newsroom_elated_link_hover_styles')) {

    function newsroom_elated_link_hover_styles()
    {

        $link_hover_styles = array();

        if (newsroom_elated_options()->getOptionValue('link_hovercolor') !== '') {
            $link_hover_styles['color'] = newsroom_elated_options()->getOptionValue('link_hovercolor');
        }
        if (newsroom_elated_options()->getOptionValue('link_hover_fontdecoration') !== '') {
            $link_hover_styles['text-decoration'] = newsroom_elated_options()->getOptionValue('link_hover_fontdecoration');
        }

        $link_hover_selector = array(
            'a:hover',
            'p a:hover'
        );

        if (!empty($link_hover_styles)) {
            echo newsroom_elated_dynamic_css($link_hover_selector, $link_hover_styles);
        }

        $link_heading_hover_styles = array();

        if (newsroom_elated_options()->getOptionValue('link_hovercolor') !== '') {
            $link_heading_hover_styles['color'] = newsroom_elated_options()->getOptionValue('link_hovercolor');
        }

        $link_heading_hover_selector = array(
            'h1 a:hover',
            'h2 a:hover',
            'h3 a:hover',
            'h4 a:hover',
            'h5 a:hover',
            'h6 a:hover'
        );

        if (!empty($link_heading_hover_styles)) {
            echo newsroom_elated_dynamic_css($link_heading_hover_selector, $link_heading_hover_styles);
        }
    }

    add_action('newsroom_elated_style_dynamic', 'newsroom_elated_link_hover_styles');
}

if (!function_exists('newsroom_elated_sidebar_styles')) {

    function newsroom_elated_sidebar_styles()
    {

        $sidebar_styles = array();

        if (newsroom_elated_options()->getOptionValue('sidebar_background_color') !== '') {
            $sidebar_styles['background-color'] = newsroom_elated_options()->getOptionValue('sidebar_background_color');
        }

        if (newsroom_elated_options()->getOptionValue('sidebar_padding_top') !== '') {
            $sidebar_styles['padding-top'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('sidebar_padding_top')) . 'px';
        }

        if (newsroom_elated_options()->getOptionValue('sidebar_padding_right') !== '') {
            $sidebar_styles['padding-right'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('sidebar_padding_right')) . 'px';
        }

        if (newsroom_elated_options()->getOptionValue('sidebar_padding_bottom') !== '') {
            $sidebar_styles['padding-bottom'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('sidebar_padding_bottom')) . 'px';
        }

        if (newsroom_elated_options()->getOptionValue('sidebar_padding_left') !== '') {
            $sidebar_styles['padding-left'] = newsroom_elated_filter_px(newsroom_elated_options()->getOptionValue('sidebar_padding_left')) . 'px';
        }

        if (newsroom_elated_options()->getOptionValue('sidebar_alignment') !== '') {
            $sidebar_styles['text-align'] = newsroom_elated_options()->getOptionValue('sidebar_alignment');
        }

        if (!empty($sidebar_styles)) {
            echo newsroom_elated_dynamic_css('aside.eltd-sidebar', $sidebar_styles);
        }
    }

    add_action('newsroom_elated_style_dynamic', 'newsroom_elated_sidebar_styles');
}