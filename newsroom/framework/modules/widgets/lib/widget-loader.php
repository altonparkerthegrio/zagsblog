<?php

if (!function_exists('newsroom_elated_register_widgets')) {

    function newsroom_elated_register_widgets() {

        $widgets = array(
            'NewsroomElatedBreakingNews',
            'NewsroomElatedDateWidget',
            'NewsroomElatedImageWidget',
            'NewsroomElatedPostLayoutOne',
            'NewsroomElatedPostLayoutTwo',
            'NewsroomElatedPostLayoutTabs',
            'NewsroomElatedRecentComments',
            'NewsroomElatedSearchForm',
            'NewsroomElatedSeparatorWidget',
            'NewsroomElatedSocialIconWidget',
            'NewsroomElatedStickySidebar',
            'NewsroomElatedSideAreaOpener',
            'NewsroomElatedWeatherWidget',
        );

        foreach ($widgets as $widget) {
            register_widget($widget);
        }
    }
}

add_action('widgets_init', 'newsroom_elated_register_widgets');