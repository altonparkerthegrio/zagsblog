<?php

if (!function_exists('eltd_register_sidebars')) {
    /**
     * Function that registers theme's sidebars
     */
    function eltd_register_sidebars() {

        register_sidebar(array(
            'name' => esc_html__('Sidebar','newsroom'),
            'id' => 'sidebar',
            'description' => esc_html__('Default Sidebar','newsroom'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="eltd-section-title-holder"><h2 class="eltd-st-title">',
            'after_title' => '</h2></div>'
        ));
    }

    add_action('widgets_init', 'eltd_register_sidebars');
}

if (!function_exists('eltd_add_support_custom_sidebar')) {
    /**
     * Function that adds theme support for custom sidebars. It also creates NewsroomElatedSidebar object
     */
    function eltd_add_support_custom_sidebar() {
        add_theme_support('NewsroomElatedSidebar');
        if (get_theme_support('NewsroomElatedSidebar')) new NewsroomElatedSidebar();
    }

    add_action('after_setup_theme', 'eltd_add_support_custom_sidebar');
}
