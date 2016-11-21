<?php

if(!function_exists('newsroom_elated_bbpress_style_dynamic_deps')) {
	/**
	 * Adds BBPress styles to dependencies array of style dynamic
	 * @param $deps
	 *
	 * @return array
	 */
	function newsroom_elated_bbpress_style_dynamic_deps($deps) {
        $deps[] = 'newsroom_elated_bb_press';

	    return $deps;
    }

	add_filter('newsroom_elated_style_dynamic_dependencies', 'newsroom_elated_bbpress_style_dynamic_deps');
}

if(!function_exists('newsroom_elated_bbpress_forums_display_page_title')) {
	/**
	 * Function that hooks to title area parameters filter and either displays or hides page title area
	 * based on global BBPress option
	 * @param $parameters
	 *
	 * @return mixed
	 */
	function newsroom_elated_bbpress_forums_display_page_title($parameters) {
		$show_title_area = newsroom_elated_options()->getOptionValue('bbpress_show_archive_title') === 'yes';

		if(bbp_is_forum_archive()) {
			$parameters['show_title_area'] = $show_title_area;
		}
	    return $parameters;
    }

	add_filter('newsroom_elated_title_area_height_params', 'newsroom_elated_bbpress_forums_display_page_title');
}

if(!function_exists('newsroom_elated_bbpress_forums_archive_title_text')) {
	/**
	 * Function that hooks to title text filter and changes it for forums achive page
	 * @param $title_text
	 *
	 * @return string
	 */
	function newsroom_elated_bbpress_forums_archive_title_text($title_text) {
        if(bbp_is_forum_archive()) {
	        $title_text = esc_html__('Forums', 'newsroom');
        }

	    return $title_text;
    }

	add_filter('newsroom_elated_title_text', 'newsroom_elated_bbpress_forums_archive_title_text');
}

if(!function_exists('newsroom_elated_bbpress_forums_slider_shortcode')) {
	/**
	 * Funtion that hooks to slider shortcode filter and adds slider to BBPress forums page
	 * if set in global options
	 *
	 * @param $shortcode
	 *
	 * @return bool|void
	 */
	function newsroom_elated_bbpress_forums_slider_shortcode($shortcode) {
		if(bbp_is_forum_archive()) {
			$option = newsroom_elated_options()->getOptionValue('bbpress_archive_slider');

			if($option !== '') {
				$shortcode = $option;
			}
		}

	    return $shortcode;
    }

	add_filter('newsroom_elated_slider_shortcode', 'newsroom_elated_bbpress_forums_slider_shortcode');
}

if(!function_exists('newsroom_elated_bbpress_sidebar_layout')) {
	/**
	 * Function that hooks to sidebar layout filter and changes it to option set for bbpress sidebar layout
	 * @param $layout
	 *
	 * @return bool|void
	 */
	function newsroom_elated_bbpress_sidebar_layout($layout) {
		if(is_bbpress()) {
			$layout_option = newsroom_elated_options()->getOptionValue('bbpress_sidebar_layout');

			if($layout_option !== '') {
				$layout = $layout_option;
			}
		}

	    return $layout;
    }

	add_filter('newsroom_elated_sidebar_layout', 'newsroom_elated_bbpress_sidebar_layout');
}

if(!function_exists('newsroom_elated_bbpress_sidebar')) {
	/**
	 * Function that hooks to sidebar filter and changes it to option set for bbpress sidebar
	 * @param $sidebar
	 *
	 * @return bool|void
	 */
	function newsroom_elated_bbpress_sidebar($sidebar) {
		if(is_bbpress()) {
			$sidebar_option = newsroom_elated_options()->getOptionValue('bbpress_sidebar');

			if($sidebar_option !== '') {
				$sidebar = $sidebar_option;
			}
		}

	    return $sidebar;
    }

	add_filter('newsroom_elated_sidebar', 'newsroom_elated_bbpress_sidebar');
}