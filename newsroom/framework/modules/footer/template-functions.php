<?php

if (!function_exists('newsroom_elated_register_footer_sidebar')) {

    function newsroom_elated_register_footer_sidebar() {

        register_sidebar(array(
            'name' => esc_html__('Footer Heading','newsroom'),
            'id' => 'footer_heading',
            'description' => esc_html__('Footer Heading','newsroom'),
            'before_widget' => '<div id="%1$s" class="widget eltd-footer-heading %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="eltd-footer-widget-title-outer"><h5 class="eltd-footer-widget-title">',
            'after_title' => '</h5></div>'
        ));
        
        register_sidebar(array(
            'name' => esc_html__('Footer Column 1','newsroom'),
            'id' => 'footer_column_1',
            'description' => esc_html__('Footer Column 1','newsroom'),
            'before_widget' => '<div id="%1$s" class="widget eltd-footer-column-1 %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="eltd-footer-widget-title-outer"><h5 class="eltd-footer-widget-title">',
            'after_title' => '</h5></div>'
        ));

        register_sidebar(array(
            'name' => esc_html__('Footer Column 2','newsroom'),
            'id' => 'footer_column_2',
            'description' => esc_html__('Footer Column 2','newsroom'),
            'before_widget' => '<div id="%1$s" class="widget eltd-footer-column-2 %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="eltd-footer-widget-title-outer"><h5 class="eltd-footer-widget-title">',
            'after_title' => '</h5></div>'
        ));

        register_sidebar(array(
            'name' => esc_html__('Footer Column 3','newsroom'),
            'id' => 'footer_column_3',
            'description' => esc_html__('Footer Column 3','newsroom'),
            'before_widget' => '<div id="%1$s" class="widget eltd-footer-column-3 %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="eltd-footer-widget-title-outer"><h5 class="eltd-footer-widget-title">',
            'after_title' => '</h5></div>'
        ));

        register_sidebar(array(
            'name' => esc_html__('Footer Column 4','newsroom'),
            'id' => 'footer_column_4',
            'description' => esc_html__('Footer Column 4','newsroom'),
            'before_widget' => '<div id="%1$s" class="widget eltd-footer-column-4 %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="eltd-footer-widget-title-outer"><h5 class="eltd-footer-widget-title">',
            'after_title' => '</h5></div>'
        ));

        register_sidebar(array(
            'name' => esc_html__('Footer Text','newsroom'),
            'id' => 'footer_text',
            'description' => esc_html__('Footer Text','newsroom'),
            'before_widget' => '<div id="%1$s" class="widget eltd-footer-text %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="eltd-footer-widget-title-outer"><h5 class="eltd-footer-widget-title">',
            'after_title' => '</h5></div>'
        ));

        register_sidebar(array(
            'name' => esc_html__('Footer Bottom Left','newsroom'),
            'id' => 'footer_bottom_left',
            'description' => esc_html__('Footer Bottom Left','newsroom'),
            'before_widget' => '<div id="%1$s" class="widget eltd-footer-bottom-left %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="eltd-footer-widget-title-outer"><h5 class="eltd-footer-widget-title">',
            'after_title' => '</h5></div>'
        ));

        register_sidebar(array(
            'name' => esc_html__('Footer Bottom Right','newsroom'),
            'id' => 'footer_bottom_right',
            'description' => esc_html__('Footer Bottom Right','newsroom'),
            'before_widget' => '<div id="%1$s" class="widget eltd-footer-bottom-left %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="eltd-footer-widget-title-outer"><h5 class="eltd-footer-widget-title">',
            'after_title' => '</h5></div>'
        ));

    }

    add_action('widgets_init', 'newsroom_elated_register_footer_sidebar');

}

if (!function_exists('newsroom_elated_get_footer')) {
    /**
     * Loads footer HTML
     */
    function newsroom_elated_get_footer() {

        $parameters = array();
        $id = newsroom_elated_get_page_id();

        if(is_active_sidebar('footer_column_1') || is_active_sidebar('footer_column_2') || is_active_sidebar('footer_column_3') || is_active_sidebar('footer_column_4')) {
            $parameters['display_footer_top'] = (newsroom_elated_options()->getOptionValue('show_footer_top') == 'yes') ? true : false;
        }
        else {
            $parameters['display_footer_top'] = false;
        }

        if(is_active_sidebar('footer_bottom_left') || is_active_sidebar('footer_text') || is_active_sidebar('footer_bottom_right')) {
            $parameters['display_footer_bottom'] = (newsroom_elated_options()->getOptionValue('show_footer_bottom') == 'yes') ? true : false;
        }
        else {
            $parameters['display_footer_bottom'] = false;
        }

        if(is_active_sidebar('footer_heading')) {
            $parameters['display_footer_heading'] = (newsroom_elated_options()->getOptionValue('show_footer_heading') == 'yes') ? true : false;
        }
        else {
            $parameters['display_footer_heading'] = false;
        }

        newsroom_elated_get_module_template_part('templates/footer', 'footer', '', $parameters);
    }
}

if (!function_exists('newsroom_elated_get_footer_top')) {
    /**
     * Return footer top HTML
     */
    function newsroom_elated_get_footer_top() {

        $parameters = array();

        $parameters['footer_in_grid'] = (newsroom_elated_options()->getOptionValue('footer_in_grid') == 'yes') ? true : false;
        $parameters['footer_top_classes'] = (newsroom_elated_options()->getOptionValue('footer_in_grid') == 'yes') ? '' : 'eltd-footer-top-full';
        $parameters['footer_top_columns'] = newsroom_elated_options()->getOptionValue('footer_top_columns');

        newsroom_elated_get_module_template_part('templates/parts/footer-top', 'footer', '', $parameters);
    }
}

if (!function_exists('newsroom_elated_get_footer_heading')) {
    /**
     * Return footer top HTML
     */
    function newsroom_elated_get_footer_heading() {

        $parameters = array();

        $parameters['footer_heading_classes'] = (newsroom_elated_options()->getOptionValue('footer_in_grid') == 'yes') ? '' : 'eltd-footer-top-full';
        $parameters['footer_in_grid'] = (newsroom_elated_options()->getOptionValue('footer_in_grid') == 'yes') ? true : false;

        newsroom_elated_get_module_template_part('templates/parts/footer-heading', 'footer', '', $parameters);
    }
}

if (!function_exists('newsroom_elated_get_footer_bottom')) {
    /**
     * Return footer bottom HTML
     */
    function newsroom_elated_get_footer_bottom() {

        $parameters = array();

        $parameters['footer_in_grid'] = (newsroom_elated_options()->getOptionValue('footer_in_grid') == 'yes') ? true : false;
        $parameters['footer_bottom_classes'] = (newsroom_elated_options()->getOptionValue('footer_in_grid') == 'yes') ? '' : 'eltd-footer-top-full';
        $parameters['footer_bottom_columns'] = newsroom_elated_options()->getOptionValue('footer_bottom_columns');

        newsroom_elated_get_module_template_part('templates/parts/footer-bottom', 'footer', '', $parameters);
    }
}

//Functions for loading sidebars

if (!function_exists('newsroom_elated_get_footer_sidebar_25_25_50')) {

    function newsroom_elated_get_footer_sidebar_25_25_50() {
        newsroom_elated_get_module_template_part('templates/sidebars/sidebar-three-columns-25-25-50', 'footer');
    }
}

if (!function_exists('newsroom_elated_get_footer_sidebar_50_25_25')) {

    function newsroom_elated_get_footer_sidebar_50_25_25() {
        newsroom_elated_get_module_template_part('templates/sidebars/sidebar-three-columns-50-25-25', 'footer');
    }
}

if (!function_exists('newsroom_elated_get_footer_sidebar_four_columns')) {

    function newsroom_elated_get_footer_sidebar_four_columns() {
        newsroom_elated_get_module_template_part('templates/sidebars/sidebar-four-columns', 'footer');
    }
}

if (!function_exists('newsroom_elated_get_footer_sidebar_three_columns')) {

    function newsroom_elated_get_footer_sidebar_three_columns() {
        newsroom_elated_get_module_template_part('templates/sidebars/sidebar-three-columns', 'footer');
    }
}

if (!function_exists('newsroom_elated_get_footer_sidebar_two_columns')) {

    function newsroom_elated_get_footer_sidebar_two_columns() {
        newsroom_elated_get_module_template_part('templates/sidebars/sidebar-two-columns', 'footer');
    }
}

if (!function_exists('newsroom_elated_get_footer_sidebar_one_column')) {

    function newsroom_elated_get_footer_sidebar_one_column() {
        newsroom_elated_get_module_template_part('templates/sidebars/sidebar-one-column', 'footer');
    }
}

if (!function_exists('newsroom_elated_get_footer_bottom_sidebar_three_columns')) {

    function newsroom_elated_get_footer_bottom_sidebar_three_columns() {
        newsroom_elated_get_module_template_part('templates/sidebars/sidebar-bottom-three-columns', 'footer');
    }
}

if (!function_exists('newsroom_elated_get_footer_bottom_sidebar_two_columns')) {

    function newsroom_elated_get_footer_bottom_sidebar_two_columns() {
        newsroom_elated_get_module_template_part('templates/sidebars/sidebar-bottom-two-columns', 'footer');
    }
}

if (!function_exists('newsroom_elated_get_footer_bottom_sidebar_one_column')) {

    function newsroom_elated_get_footer_bottom_sidebar_one_column() {
        newsroom_elated_get_module_template_part('templates/sidebars/sidebar-bottom-one-column', 'footer');
    }
}