<?php

/*
	Layouts - shortcodes
*/
use Newsroom\Modules\Blog\Shortcodes\PostLayoutOne\PostLayoutOne;
use Newsroom\Modules\Blog\Shortcodes\PostLayoutTwo\PostLayoutTwo;
use Newsroom\Modules\Blog\Shortcodes\PostLayoutThree\PostLayoutThree;

/*
	Blocks - combinations of several layouts
*/
use Newsroom\Modules\Blog\Shortcodes\BlockOne\BlockOne;
use Newsroom\Modules\Blog\Shortcodes\BlockTwo\BlockTwo;
use Newsroom\Modules\Blog\Shortcodes\BlockThree\BlockThree;
use Newsroom\Modules\Blog\Shortcodes\BlockFour\BlockFour;
use Newsroom\Modules\Blog\Shortcodes\BlockFive\BlockFive;

/*
	Post Sliders - combinations of several layouts
*/
use Newsroom\Modules\Blog\Shortcodes\SliderPostOne\SliderPostOne;
use Newsroom\Modules\Blog\Shortcodes\SliderPostTwo\SliderPostTwo;
use Newsroom\Modules\Blog\Shortcodes\SliderPostTwo\SliderPostThree;
use Newsroom\Modules\Blog\Shortcodes\SliderPostTwo\SliderPostFour;

if (!function_exists('newsroom_elated_list_ajax')) {
    function newsroom_elated_list_ajax() {

        $params = ($_POST);

        $prefix_block = 'eltd_block_';
        $prefix_layout = 'eltd_post_layout_';

        switch ($params['base']) {
            case 'eltd_block_one' : {
                $newShortcode = new BlockOne();
            }
                break;
            case 'eltd_block_two' : {
                $newShortcode = new BlockTwo();
            }
                break;
            case 'eltd_block_three' : {
                $newShortcode = new BlockThree();
            }
                break;
            case 'eltd_block_four' : {
                $newShortcode = new BlockFour();
            }
                break;
            case 'eltd_block_five' : {
                $newShortcode = new BlockFive();
            }
                break;
            case 'eltd_post_layout_one' : {
                $newShortcode = new PostLayoutOne();
            }
                break;
            case 'eltd_post_layout_two' : {
                $newShortcode = new PostLayoutTwo();
            }
                break;
            case 'eltd_post_layout_three' : {
                $newShortcode = new PostLayoutThree();
            }
                break;
            case 'eltd_slider_post_one' : {
                $newShortcode = new SliderPostOne();
            }
                break;
            case 'eltd_slider_post_two' : {
                $newShortcode = new SliderPostTwo();
            }
                break;
            case 'eltd_slider_post_three' : {
                $newShortcode = new SliderPostThree();
            }
                break;
            case 'eltd_slider_post_four' : {
                $newShortcode = new SliderPostFour();
            }
                break;
        }

        $params['query_result'] = $newShortcode->generatePostsQuery($params);
        $html_response = $newShortcode->render($params);

        $show_next_page = true;
        if ($params['paged'] < 1 || $params['paged'] > $params['query_result']->max_num_pages) {
            $show_next_page = false;
        }


        $return_obj = array(
            'html' => $html_response,
            'showNextPage' => $show_next_page,
            'pagedResult' => $params['paged']
        );

        echo json_encode($return_obj);
        exit;
    }

    add_action('wp_ajax_newsroom_elated_list_ajax', 'newsroom_elated_list_ajax');
    add_action('wp_ajax_nopriv_newsroom_elated_list_ajax', 'newsroom_elated_list_ajax');
}