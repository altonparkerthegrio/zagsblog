<?php  

if(!function_exists('newsroom_elated_uncovering_footer')) {
    /**
     * Function that adds behaviour class to body based on theme options
     * @param array array of classes from main filter
     * @return array array of classes with added behaviour class
     */
    function newsroom_elated_uncovering_footer($classes) {
        $id = newsroom_elated_get_page_id();

        if(newsroom_elated_get_meta_field_intersect('uncovering_footer', $id ) == 'yes') {
	        $classes[] = 'eltd-uncovering-footer';
        }
        
        return $classes;
    }

    add_filter('body_class', 'newsroom_elated_uncovering_footer');
}