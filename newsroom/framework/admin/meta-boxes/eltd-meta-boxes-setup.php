<?php

add_action('after_setup_theme', 'newsroom_elated_meta_boxes_map_init', 1);
function newsroom_elated_meta_boxes_map_init() {
    /**
    * Loades all meta-boxes by going through all folders that are placed directly in meta-boxes folder
    * and loads map.php file in each.
    *
    * @see http://php.net/manual/en/function.glob.php
    */

    do_action('newsroom_elated_before_meta_boxes_map');

	global $newsroom_options;
	global $newsroom_Framework;
	global $newsroom_options_fontstyle;
	global $newsroom_options_fontweight;
	global $newsroom_options_texttransform;
	global $newsroom_options_fontdecoration;
	global $newsroom_options_arrows_type;

    foreach(glob(ELATED_FRAMEWORK_ROOT_DIR.'/admin/meta-boxes/*/map.php') as $meta_box_load) {
        include_once $meta_box_load;
    }

	do_action('newsroom_elated_meta_boxes_map');

	do_action('newsroom_elated_after_meta_boxes_map');
}