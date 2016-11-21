<?php

if(!function_exists('newsroom_elated_is_responsive_on')) {
    /**
     * Checks whether responsive mode is enabled in theme options
     * @return bool
     */
    function newsroom_elated_is_responsive_on() {
        return newsroom_elated_options()->getOptionValue('responsiveness') !== 'no';
    }
}