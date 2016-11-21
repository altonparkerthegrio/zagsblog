<?php

if(!function_exists('newsroom_elated_bbpress_custom_styles')) {
    function newsroom_elated_bbpress_custom_styles() {
	    if(newsroom_elated_options()->getOptionValue('first_color') !== "") {
		    $color_selector = array(
			
		    );

		    $color_important_selector = array(

		    );

		    $background_color_selector = array(

		    );

		    $background_color_important_selector = array(

		    );

		    $border_color_selector = array(
		
		    );

		    echo newsroom_elated_dynamic_css($color_selector, array('color' => newsroom_elated_options()->getOptionValue('first_color')));
		    echo newsroom_elated_dynamic_css($color_important_selector, array('color' => newsroom_elated_options()->getOptionValue('first_color').'!important'));
		    echo newsroom_elated_dynamic_css('::selection', array('background' => newsroom_elated_options()->getOptionValue('first_color')));
		    echo newsroom_elated_dynamic_css('::-moz-selection', array('background' => newsroom_elated_options()->getOptionValue('first_color')));
		    echo newsroom_elated_dynamic_css($background_color_selector, array('background-color' => newsroom_elated_options()->getOptionValue('first_color')));
		    echo newsroom_elated_dynamic_css($background_color_important_selector, array('background-color' => newsroom_elated_options()->getOptionValue('first_color').'!important'));
		    echo newsroom_elated_dynamic_css($border_color_selector, array('border-color' => newsroom_elated_options()->getOptionValue('first_color')));
	    }
    }

	add_action('newsroom_elated_style_dynamic', 'newsroom_elated_bbpress_custom_styles');
}