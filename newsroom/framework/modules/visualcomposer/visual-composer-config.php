<?php

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if (function_exists('vc_set_as_theme')) {
    vc_set_as_theme(true);
}

/**
 * Change path for overridden templates
 */
if (function_exists('vc_set_shortcodes_templates_dir')) {
    $dir = ELATED_ROOT_DIR . '/vc-templates';
    vc_set_shortcodes_templates_dir($dir);
}

if (!function_exists('newsroom_elated_configure_visual_composer')) {
    /**
     * Configuration for Visual Composer
     * Hooks on vc_after_init action
     */
    function newsroom_elated_configure_visual_composer() {

        /**
         * Removing shortcodes
         */
        vc_remove_element("vc_wp_search");
        vc_remove_element("vc_wp_meta");
        vc_remove_element("vc_wp_recentcomments");
        vc_remove_element("vc_wp_calendar");
        vc_remove_element("vc_wp_pages");
        vc_remove_element("vc_wp_tagcloud");
        vc_remove_element("vc_wp_custommenu");
        vc_remove_element("vc_wp_text");
        vc_remove_element("vc_wp_posts");
        vc_remove_element("vc_wp_links");
        vc_remove_element("vc_wp_categories");
        vc_remove_element("vc_wp_archives");
        vc_remove_element("vc_wp_rss");
        vc_remove_element("vc_teaser_grid");
        vc_remove_element("vc_button");
        vc_remove_element("vc_cta_button");
        vc_remove_element("vc_cta_button2");
        vc_remove_element("vc_message");
        vc_remove_element("vc_tour");
        vc_remove_element("vc_progress_bar");
        vc_remove_element("vc_pie");
        vc_remove_element("vc_posts_slider");
        vc_remove_element("vc_toggle");
        vc_remove_element("vc_images_carousel");
        vc_remove_element("vc_posts_grid");
        vc_remove_element("vc_carousel");
        vc_remove_element("vc_btn");
        vc_remove_element("vc_cta");
        vc_remove_element("vc_round_chart");
        vc_remove_element("vc_line_chart");
        vc_remove_element("vc_tta_accordion");
        vc_remove_element("vc_tta_tour");
        vc_remove_element("vc_tta_tabs");
        vc_remove_element("vc_separator");

        /**
         * Remove unused parameters
         */
        if (function_exists('vc_remove_param')) {
            vc_remove_param('vc_row', 'full_width');
            vc_remove_param('vc_row', 'full_height');
            vc_remove_param('vc_row', 'content_placement');
            vc_remove_param('vc_row', 'video_bg');
            vc_remove_param('vc_row', 'video_bg_url');
            vc_remove_param('vc_row', 'video_bg_parallax');
            vc_remove_param('vc_row', 'parallax');
            vc_remove_param('vc_row', 'parallax_image');
            vc_remove_param('vc_row', 'gap');
            vc_remove_param('vc_row', 'columns_placement');
            vc_remove_param('vc_row', 'equal_height');
            vc_remove_param('vc_widget_sidebar', 'title');
        }
    }

    add_action('vc_after_init', 'newsroom_elated_configure_visual_composer');
}

if (!function_exists('newsroom_elated_configure_visual_composer_grid_elemets')) {

    /**
     * Configuration for Visual Composer for Grid Elements
     * Hooks on vc_after_init action
     */

    function newsroom_elated_configure_visual_composer_grid_elemets() {

        /**
         * Remove Grid Elements if grid elements disabled
         */
        vc_remove_element('vc_basic_grid');
        vc_remove_element('vc_media_grid');
        vc_remove_element('vc_masonry_grid');
        vc_remove_element('vc_masonry_media_grid');
        vc_remove_element('vc_icon');
        vc_remove_element('vc_button2');
        vc_remove_element("vc_custom_heading");

        /**
         * Remove unused parameters from grid elements
         */
        if (function_exists('vc_remove_param')) {
            vc_remove_param('vc_basic_grid', 'button_style');
            vc_remove_param('vc_basic_grid', 'button_color');
            vc_remove_param('vc_basic_grid', 'button_size');
            vc_remove_param('vc_basic_grid', 'filter_color');
            vc_remove_param('vc_basic_grid', 'filter_style');
            vc_remove_param('vc_media_grid', 'button_style');
            vc_remove_param('vc_media_grid', 'button_color');
            vc_remove_param('vc_media_grid', 'button_size');
            vc_remove_param('vc_media_grid', 'filter_color');
            vc_remove_param('vc_media_grid', 'filter_style');
            vc_remove_param('vc_masonry_grid', 'button_style');
            vc_remove_param('vc_masonry_grid', 'button_color');
            vc_remove_param('vc_masonry_grid', 'button_size');
            vc_remove_param('vc_masonry_grid', 'filter_color');
            vc_remove_param('vc_masonry_grid', 'filter_style');
            vc_remove_param('vc_masonry_media_grid', 'button_style');
            vc_remove_param('vc_masonry_media_grid', 'button_color');
            vc_remove_param('vc_masonry_media_grid', 'button_size');
            vc_remove_param('vc_masonry_media_grid', 'filter_color');
            vc_remove_param('vc_masonry_media_grid', 'filter_style');
            vc_remove_param('vc_basic_grid', 'paging_color');
            vc_remove_param('vc_basic_grid', 'arrows_color');
            vc_remove_param('vc_media_grid', 'paging_color');
            vc_remove_param('vc_media_grid', 'arrows_color');
            vc_remove_param('vc_masonry_grid', 'paging_color');
            vc_remove_param('vc_masonry_grid', 'arrows_color');
            vc_remove_param('vc_masonry_media_grid', 'paging_color');
            vc_remove_param('vc_masonry_media_grid', 'arrows_color');
        }
    }

    add_action('vc_after_init', 'newsroom_elated_configure_visual_composer_grid_elemets');
}

if (!function_exists('newsroom_elated_configure_visual_composer_frontend_editor')) {
    /**
     * Configuration for Visual Composer FrontEnd Editor
     * Hooks on vc_after_init action
     */
    function newsroom_elated_configure_visual_composer_frontend_editor() {

        /**
         * Remove frontend editor
         */
        if (function_exists('vc_disable_frontend')) {
            vc_disable_frontend();
        }
    }

    add_action('vc_after_init', 'newsroom_elated_configure_visual_composer_frontend_editor');
}

if (class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Eltd_Image_With_Hover_Info extends WPBakeryShortCodesContainer
    {
    }
}

/*** Row ***/
if (!function_exists('newsroom_elated_vc_row_map')) {
    /**
     * Map VC Row shortcode
     * Hooks on vc_after_init action
     */
    function newsroom_elated_vc_row_map() {

        $animations = array(
            esc_html__('No animation', 'newsroom') => '',
            esc_html__('Elements Shows From Left Side', 'newsroom') => 'eltd-element-from-left',
            esc_html__('Elements Shows From Right Side', 'newsroom') => 'eltd-element-from-right',
            esc_html__('Elements Shows From Top Side', 'newsroom') => 'eltd-element-from-top',
            esc_html__('Elements Shows From Bottom Side', 'newsroom') => 'eltd-element-from-bottom',
            esc_html__('Elements Shows From Fade', 'newsroom') => 'eltd-element-from-fade'
        );

        vc_add_param('vc_row', array(
            'type' => 'dropdown',
            'class' => '',
            'heading' => esc_html__('Row Type', 'newsroom'),
            'param_name' => 'row_type',
            'value' => array(
                esc_html__('Row', 'newsroom') => 'row',
                esc_html__('Parallax', 'newsroom') => 'parallax'
            )
        ));

        vc_add_param('vc_row', array(
            'type' => 'dropdown',
            'class' => '',
            'heading' => esc_html__('Content Width', 'newsroom'),
            'param_name' => 'content_width',
            'value' => array(
                esc_html__('Full Width', 'newsroom') => 'full-width',
                esc_html__('In Grid', 'newsroom') => 'grid'
            )
        ));

        vc_add_param('vc_row', array(
            'type' => 'textfield',
            'class' => '',
            'heading' => esc_html__('Anchor ID', 'newsroom'),
            'param_name' => 'anchor',
            'value' => '',
            'description' => esc_html__('For example "home"', 'newsroom')
        ));

        vc_add_param('vc_row', array(
            'type' => 'dropdown',
            'class' => '',
            'heading' => esc_html__('Content Aligment', 'newsroom'),
            'param_name' => 'content_aligment',
            'value' => array(
                esc_html__('Left', 'newsroom') => 'left',
                esc_html__('Center', 'newsroom') => 'center',
                esc_html__('Right', 'newsroom') => 'right'
            )
        ));

        vc_add_param('vc_row', array(
            'type' => 'dropdown',
            'class' => '',
            'heading' => esc_html__('Video Background', 'newsroom'),
            'value' => array(
                esc_html__('No', 'newsroom') => '',
                esc_html__('Yes', 'newsroom') => 'show_video'
            ),
            'param_name' => 'video',
            'description' => '',
            'dependency' => Array('element' => 'row_type', 'value' => array('row'))
        ));

        vc_add_param('vc_row', array(
            'type' => 'dropdown',
            'class' => '',
            'heading' => esc_html__('Video Overlay', 'newsroom'),
            'value' => array(
                esc_html__('No', 'newsroom') => '',
                esc_html__('Yes', 'newsroom') => 'show_video_overlay'
            ),
            'param_name' => 'video_overlay',
            'description' => '',
            'dependency' => Array('element' => 'video', 'value' => array('show_video'))
        ));

        vc_add_param('vc_row', array(
            'type' => 'attach_image',
            'class' => '',
            'heading' => esc_html__('Video Overlay Image (pattern)', 'newsroom'),
            'value' => '',
            'param_name' => 'video_overlay_image',
            'description' => '',
            'dependency' => Array('element' => 'video_overlay', 'value' => array('show_video_overlay'))
        ));

        vc_add_param('vc_row', array(
            'type' => 'textfield',
            'class' => '',
            'heading' => esc_html__('Video Background (webm) File URL', 'newsroom'),
            'value' => '',
            'param_name' => 'video_webm',
            'description' => '',
            'dependency' => Array('element' => 'video', 'value' => array('show_video'))
        ));

        vc_add_param('vc_row', array(
            'type' => 'textfield',
            'class' => '',
            'heading' => esc_html__('Video Background (mp4) file URL', 'newsroom'),
            'value' => '',
            'param_name' => 'video_mp4',
            'description' => '',
            'dependency' => Array('element' => 'video', 'value' => array('show_video'))
        ));

        vc_add_param('vc_row', array(
            'type' => 'textfield',
            'class' => '',
            'heading' => esc_html__('Video Background (ogv) file URL', 'newsroom'),
            'value' => '',
            'param_name' => 'video_ogv',
            'description' => '',
            'dependency' => Array('element' => 'video', 'value' => array('show_video'))
        ));

        vc_add_param('vc_row', array(
            'type' => 'attach_image',
            'class' => '',
            'heading' => esc_html__('Video Preview Image', 'newsroom'),
            'value' => '',
            'param_name' => 'video_image',
            'description' => '',
            'dependency' => Array('element' => 'video', 'value' => array('show_video'))
        ));

        vc_add_param('vc_row', array(
            'type' => 'attach_image',
            'class' => '',
            'heading' => esc_html__('Parallax Background image', 'newsroom'),
            'value' => '',
            'param_name' => 'parallax_background_image',
            'description' => esc_html__('Please note that for parallax row type, background image from Design Options will not work so you should to fill this field', 'newsroom'),
            'dependency' => Array('element' => 'row_type', 'value' => array('parallax'))
        ));

        vc_add_param('vc_row', array(
            'type' => 'textfield',
            'class' => '',
            'heading' => esc_html__('Parallax speed', 'newsroom'),
            'param_name' => 'parallax_speed',
            'value' => '',
            'dependency' => Array('element' => 'row_type', 'value' => array('parallax'))
        ));

        vc_add_param('vc_row', array(
            'type' => 'dropdown',
            'heading' => esc_html__('CSS Animation', 'newsroom'),
            'param_name' => 'css_animation',
            'value' => $animations,
            'description' => '',
            'dependency' => Array('element' => 'row_type', 'value' => array('row'))
        ));

        vc_add_param('vc_row', array(
            'type' => 'textfield',
            'heading' => esc_html__('Transition delay (ms)', 'newsroom'),
            'param_name' => 'transition_delay',
            'admin_label' => true,
            'value' => '',
            'description' => '',
            'dependency' => array('element' => 'css_animation', 'not_empty' => true)
        ));

        /*** Row Inner ***/

        vc_add_param('vc_row_inner', array(
            'type' => 'dropdown',
            'class' => '',
            'heading' => esc_html__('Row Type', 'newsroom'),
            'param_name' => 'row_type',
            'value' => array(
                esc_html__('Row', 'newsroom') => 'row',
                esc_html__('Parallax', 'newsroom') => 'parallax'
            )
        ));

        vc_add_param('vc_row_inner', array(
            'type' => 'dropdown',
            'class' => '',
            'heading' => esc_html__('Content Width', 'newsroom'),
            'param_name' => 'content_width',
            'value' => array(
                esc_html__('Full Width', 'newsroom') => 'full-width',
                esc_html__('In Grid', 'newsroom') => 'grid'
            )
        ));

        vc_add_param('vc_row_inner', array(
            'type' => 'dropdown',
            'class' => '',
            'heading' => esc_html__('Content Aligment', 'newsroom'),
            'param_name' => 'content_aligment',
            'value' => array(
                esc_html__('Left', 'newsroom') => 'left',
                esc_html__('Center', 'newsroom') => 'center',
                esc_html__('Right', 'newsroom') => 'right'
            )
        ));

        vc_add_param('vc_row_inner', array(
            'type' => 'attach_image',
            'class' => '',
            'heading' => esc_html__('Parallax Background image', 'newsroom'),
            'value' => '',
            'param_name' => 'parallax_background_image',
            'description' => esc_html__('Please note that for parallax row type, background image from Design Options will not work so you should to fill this field', 'newsroom'),
            'dependency' => Array('element' => 'row_type', 'value' => array('parallax'))
        ));

        vc_add_param('vc_row_inner', array(
            'type' => 'textfield',
            'class' => '',
            'heading' => esc_html__('Parallax speed', 'newsroom'),
            'param_name' => 'parallax_speed',
            'value' => '',
            'dependency' => Array('element' => 'row_type', 'value' => array('parallax'))
        ));

        vc_add_param('vc_row_inner', array(
            'type' => 'dropdown',
            'heading' => esc_html__('CSS Animation', 'newsroom'),
            'param_name' => 'css_animation',
            'admin_label' => true,
            'value' => $animations,
            'description' => '',
            'dependency' => Array('element' => 'row_type', 'value' => array('row'))

        ));

        vc_add_param('vc_row_inner', array(
            'type' => 'textfield',
            'heading' => esc_html__('Transition delay (ms)', 'newsroom'),
            'param_name' => 'transition_delay',
            'admin_label' => true,
            'value' => '',
            'description' => '',
            'dependency' => Array('element' => 'row_type', 'value' => array('row'))

        ));
    }

    add_action('vc_after_init', 'newsroom_elated_vc_row_map');
}