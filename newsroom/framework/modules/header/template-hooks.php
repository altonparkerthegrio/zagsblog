<?php

//top header bar
add_action('newsroom_elated_before_page_header', 'newsroom_elated_get_header_top');

//mobile header
add_action('newsroom_elated_after_page_header', 'newsroom_elated_get_mobile_header');