<?php

if(!function_exists('newsroom_elated_vc_grid_elements_enabled')) {

	/**
	 * Function that checks if Visual Composer Grid Elements are enabled
	 *
	 * @return bool
	 */
	function newsroom_elated_vc_grid_elements_enabled() {

		return (newsroom_elated_options()->getOptionValue('enable_grid_elements') == 'yes') ? true : false;
	}
}

if(!function_exists('newsroom_elated_visual_composer_grid_elements')) {

	/**
	 * Removes Visual Composer Grid Elements post type if VC Grid option disabled
	 * and enables Visual Composer Grid Elements post type
	 * if VC Grid option enabled
	 */
	function newsroom_elated_visual_composer_grid_elements() {

		if(!newsroom_elated_vc_grid_elements_enabled()) {
			remove_action('init', 'vc_grid_item_editor_create_post_type');
		}
	}

	add_action('vc_after_init', 'newsroom_elated_visual_composer_grid_elements', 12);
}

if(!function_exists('newsroom_elated_get_vc_version')) {
	/**
	 * Return Visual Composer version string
	 *
	 * @return bool|string
	 */
	function newsroom_elated_get_vc_version() {
		if(newsroom_elated_visual_composer_installed()) {
			return WPB_VC_VERSION;
		}

		return false;
	}
}