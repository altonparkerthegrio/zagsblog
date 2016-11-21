<?php

if (!function_exists('newsroom_elated_get_shortcode_params')) {
    /**
     * Function that returns array of predefined params formatted for Visual Composer
     *
     * @param $signature string base param of shortcode
     *
     * @return array of params
     *
     */
    function newsroom_elated_get_shortcode_params($signature) {

        switch ($signature) {
            case "eltd_block_one":
                return newsroom_elated_get_block_one_params();
                break;
            case "eltd_block_two":
                return newsroom_elated_get_block_two_params();
                break;
            case "eltd_block_three":
                return newsroom_elated_get_block_three_params();
                break;
            case "eltd_block_four":
                return newsroom_elated_get_block_four_params();
                break;
            case "eltd_block_five":
                return newsroom_elated_get_block_five_params();
                break;
            case "eltd_post_layout_one":
                return newsroom_elated_get_layout_one_params();
                break;
            case "eltd_post_layout_two":
                return newsroom_elated_get_layout_two_params();
                break;
            case "eltd_post_layout_three":
                return newsroom_elated_get_layout_three_params();
                break;
            case "eltd_slider_post_one":
                return newsroom_elated_get_slider_one_params();
                break;
            case "eltd_slider_post_two":
                return newsroom_elated_get_slider_two_params();
                break;
            case "eltd_slider_post_three":
                return newsroom_elated_get_slider_three_params();
                break;
            case "eltd_slider_post_four":
                return newsroom_elated_get_slider_four_params();
                break;
            default:
                return newsroom_elated_get_shortcode_params_default($signature);
                break;
        }
    }
}

if (!function_exists('newsroom_elated_get_shortcode_params_names')) {
    /**
     * Function that returns array of predefined names which will be used for shortcode
     * This is used just to set default values
     *
     * @param $params_array array with all params for shortcode with empty value
     *
     * @return array of names with empty values
     *
     */
    function newsroom_elated_get_shortcode_params_names($params_array) {
        $params_names = array();

        foreach ($params_array as $param) {
            $params_names[$param['param_name']] = '';
        }

        $params_names['offset'] = '';

        return $params_names;
    }
}

if (!function_exists('newsroom_elated_get_post_categories_VC')) {
    /**
     * Function that returns array of categories formatted for Visual Composer
     *
     * @return array of categories where key is category name and value is category id
     *
     * @see eltd_get_post_categories
     */
    function newsroom_elated_get_post_categories_VC() {
        return array_flip(newsroom_elated_get_post_categories());
    }
}

if (!function_exists('newsroom_elated_get_post_categories')) {
    /**
     * Function that returns associative array of post categories,
     * where key is category id and value is category name
     * @return array
     */
    function newsroom_elated_get_post_categories() {
        $vc_array = $post_categories = array();
        $vc_array[0] = esc_html__('All Categories', 'newsroom');
        $post_categories = get_categories();
        foreach ($post_categories as $cat) {
            $vc_array[$cat->cat_ID] = $cat->name;
        }
        return $vc_array;
    }
}

if (!function_exists('newsroom_elated_get_authors')) {
    /**
     * Function that returns associative array of authors,
     * where key is author id and value is author name
     * @return array
     */
    function newsroom_elated_get_authors() {
        $vc_array = $authors = array();
        $vc_array[0] = esc_html__('All Authors', 'newsroom');
        $authors = get_users();
        foreach ($authors as $author) {
            $vc_array[$author->ID] = $author->display_name;
        }
        return $vc_array;
    }
}

if (!function_exists('newsroom_elated_get_authors_VC')) {
    /**
     * Function that returns array of authors formatted for Visual Composer
     *
     * @return array of authors where key is category name and value is category id
     *
     * @see newsroom_elated_get_authors
     */
    function newsroom_elated_get_authors_VC() {
        return array_flip(newsroom_elated_get_authors());
    }
}

if (!function_exists('newsroom_elated_get_sort_array')) {
    /**
     * Function that returns array of sort properties for list shortcode formatted for Visual Composer
     *
     * @return array of sort properties for formatted for Visual Composer
     *
     */
    function newsroom_elated_get_sort_array() {
        $sort_array = array(
            '' => '',
            esc_html__('Latest', 'newsroom') => 'latest',
            esc_html__('Random', 'newsroom') => 'random',
            esc_html__('Random Posts Today', 'newsroom') => 'random_today',
            esc_html__('Random in Last 7 Days', 'newsroom') => 'random_seven_days',
            esc_html__('Most Commented', 'newsroom') => 'comments',
            esc_html__('Title', 'newsroom') => 'title',
            esc_html__('Popular', 'newsroom') => 'popular',
            esc_html__('Featured Posts First', 'newsroom') => 'featured_first'
        );
        return $sort_array;
    }
}

if (!function_exists('newsroom_elated_get_query')) {
    /**
     * Function that returns query from params
     *
     * @return WP_Query
     *
     */
    function newsroom_elated_get_query($params) {
        $params = shortcode_atts(
            array(
                'post_type' => 'post',
                'number_of_posts' => '-1',
                'author_id' => '',
                'category_id' => '',
                'category_slug' => '',
                'orderby' => 'date',
                'order' => '',
                'tag_slug' => '',
                'post_in' => '',
                'post_not_in' => '',
                'sort' => '',
                'offset' => '0',
                'paged' => '',
                'pagination' => 'no',
                'pagination_type' => '',
                'post_status' => 'publish'
            ), $params);

        $query_array = array();

        $query_array['post_status'] = $params['post_status']; //to ensure that ajax call will not return 'private' posts

        $categoryExist = true;
        $categoryHasPosts = true;
        if (is_wp_error(get_the_category_by_ID($params['category_id']))) {
            $categoryExist = false;
        } else {
            $categoryHasPosts = get_posts('cat=' . $params['category_id']);
            if (empty($categoryHasPosts)) {
                $categoryHasPosts = false;
            }
        }
        if ($params['category_id'] !== '' && $categoryExist && $categoryHasPosts) {
            $query_array['cat'] = $params['category_id'];
        }
        if ($params['category_slug'] !== '') {
            $query_array['category_name'] = $params['category_slug'];
        }
        $userExist = true;
        if (get_the_author_meta('display_name', $params['author_id']) === '') {
            $userExist = false;
        }
        if ($params['author_id'] !== "" && $userExist) {
            $query_array['author'] = $params['author_id'];
        }
        if (!empty($params['tag_slug'])) {
            $query_array['tag'] = str_replace(' ', '-', $params['tag_slug']);
        }
        if (!empty($params['post_not_in'])) {
            $query_array['post__not_in'] = explode(",", $params['post_not_in']);
        }
        if (!empty($params['post_in'])) {
            $query_array['post__in'] = explode(",", $params['post_in']);
        }

        $query_array['ignore_sticky_posts'] = '1';

        switch ($params['sort']) {
            case 'latest':
                $query_array['orderby'] = 'date';
                break;

            case 'random':
                $query_array['orderby'] = 'rand';
                break;

            case 'random_today':
                $query_array['orderby'] = 'rand';
                $query_array['year'] = date('Y');
                $query_array['monthnum'] = date('n');
                $query_array['day'] = date('j');
                break;

            case 'random_seven_days':
                $query_array['date_query'] = array(
                    'column' => 'post_date_gmt',
                    'after' => '1 week ago'
                );
                break;

            case 'comments':
                $query_array['orderby'] = 'comment_count';
                $query_array['order'] = 'DESC';
                break;

            case 'title':
                $query_array['orderby'] = 'title';
                $query_array['order'] = 'ASC';
                break;

            case 'popular':
                $query_array['meta_key'] = 'count_post_views';
                $query_array['orderby'] = 'meta_value_num';
                $query_array['order'] = 'ASC';
                break;
            case 'featured_first':
                $query_array['meta_key'] = 'eltd_show_featured_post';
                $query_array['orderby'] = 'meta_value';
                $query_array['order'] = 'DESC';
                break;
        }

        $query_array['posts_per_page'] = $params['number_of_posts'];

        if (!empty($params['order'])) {
            $query_array['order'] = $params['order'];
        }

        if ($params['paged'] == '') {
            if (get_query_var('paged')) {
                $params['paged'] = get_query_var('paged');
            } elseif (get_query_var('page')) {
                $params['paged'] = get_query_var('page');
            }
        }

        if (!empty($params['paged'])) {
            $query_array['paged'] = $params['paged'];
        } else {
            $query_array['paged'] = 1;
        }

        if (!empty($params['offset'])) {
            if ($query_array['paged'] > 1) {
                $query_array['offset'] = $params['offset'] + (($params['paged'] - 1) * $params['number_of_posts']);
            } else {
                $query_array['offset'] = $params['offset'];
            }
        }

        $list_query = new WP_Query($query_array);

        return $list_query;
    }
}

if (!function_exists('newsroom_elated_get_filtered_params')) {
    /**
     * Function that returns associative array without prefix.
     * This function is used for block shortcodes (prefix_param -> param)
     *
     * @param $params array which need to be filtered
     * @param $prefix string part of key that need to be removed
     *
     * @return array
     */

    function newsroom_elated_get_filtered_params($params, $prefix) {
        $params_filtered = array();

        foreach ($params as $key => $value) {
            $new_key = substr($key, strlen($prefix) + 1);
            $params_filtered[$new_key] = $value;
        }

        return $params_filtered;
    }
}

if (!function_exists('newsroom_elated_get_title_substring')) {
    /**
     * Function that returns substring of title
     *
     * @param $title string that need to be shorten
     * @param $length size of substring
     *
     * @return array
     */

    function newsroom_elated_get_title_substring($title, $length) {


        $pieces = explode(" ", $title);

        $new_title = esc_attr($title);

        if ($length !== '' && count($pieces) > $length) {
            $first_part = implode(" ", array_splice($pieces, 0, $length));
            $new_title = $first_part . '...';
        }

        return $new_title;

    }
}

/***** Slider Group Visual Composer Options for Shortcodes *****/
if (!function_exists('newsroom_elated_get_slider_shortcode_params')) {
    /**
     * Function that returns array of slider predefined params formatted for Visual Composer
     *
     * @return array of params
     *
     */
    function newsroom_elated_get_slider_shortcode_params($exclude_options = array()) {

        $params_array = array();

        // SLIDER OPTIONS - START

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => esc_html__('Slider Height (px)', 'newsroom'),
            'param_name' => 'slider_height',
            'value' => '335',
            'save_always' => true,
            'description' => '',
            'group' => esc_html__('Slider', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => esc_html__('Number of Post Per Slide', 'newsroom'),
            'param_name' => 'slider_slides_to_show',
            'value' => '3',
            'save_always' => true,
            'description' => esc_html__('Set number of posts visible in one slide', 'newsroom'),
            'group' => esc_html__('Slider', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => esc_html__('Number of Post To Scroll', 'newsroom'),
            'param_name' => 'slider_slides_to_scroll',
            'value' => '1',
            'save_always' => true,
            'description' => esc_html__('Set number of posts visible in one slide', 'newsroom'),
            'group' => esc_html__('Slider', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Autoplay', 'newsroom'),
            'param_name' => 'slider_autoplay',
            'value' => array(
                esc_html__('Default', 'newsroom') => '',
                esc_html__('Yes', 'newsroom') => 'true',
                esc_html__('No', 'newsroom') => 'false'
            ),
            'save_always' => true,
            'description' => '',
            'group' => esc_html__('Slider', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => esc_html__('Autoplay Speed', 'newsroom'),
            'param_name' => 'slider_autoplay_speed',
            'description' => esc_html__('Time between two transitions (milliseconds)', 'newsroom'),
            'value' => '3000',
            'save_always' => true,
            'dependency' => array(
                'element' => 'slider_autoplay',
                'value' => 'true'
            ),
            'group' => esc_html__('Slider', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Pause Autoplay on Hover', 'newsroom'),
            'param_name' => 'slider_autoplay_pause',
            'value' => array(
                esc_html__('Default', 'newsroom') => '',
                esc_html__('Yes', 'newsroom') => 'true',
                esc_html__('No', 'newsroom') => 'false'
            ),
            'save_always' => true,
            'dependency' => array(
                'element' => 'slider_autoplay',
                'value' => 'true'
            ),
            'description' => esc_html__('Pause autoplay on hover', 'newsroom'),
            'group' => esc_html__('Slider', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => esc_html__('Transition duration', 'newsroom'),
            'param_name' => 'slider_speed',
            'description' => esc_html__('Duration of transition between two slides (miliseconds)', 'newsroom'),
            'value' => '300',
            'save_always' => true,
            'group' => esc_html__('Slider', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Show Prev/Next Navigation', 'newsroom'),
            'param_name' => 'slider_arrows',
            'value' => array(
                esc_html__('Default', 'newsroom') => '',
                esc_html__('Yes', 'newsroom') => 'true',
                esc_html__('No', 'newsroom') => 'false'
            ),
            'save_always' => true,
            'description' => '',
            'group' => esc_html__('Slider', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Show paginated navigation', 'newsroom'),
            'param_name' => 'slider_dots',
            'value' => array(
                esc_html__('Default', 'newsroom') => '',
                esc_html__('Yes', 'newsroom') => 'true',
                esc_html__('No', 'newsroom') => 'false'
            ),
            'save_always' => true,
            'description' => '',
            'group' => esc_html__('Slider', 'newsroom'),
        );

        // SLIDER OPTIONS - END

        if (is_array($exclude_options) && count($exclude_options)) {
            foreach ($exclude_options as $exclude_key) {
                foreach ($params_array as $params_item) {
                    if ($exclude_key == $params_item['param_name']) {
                        $key = array_search($params_item, $params_array);
                        unset($params_array[$key]);
                    }
                }
            }
        }

        return $params_array;
    }
}


/***** General Group Visual Composer Options for Shortcodes *****/
if (!function_exists('newsroom_elated_get_general_shortcode_params')) {
    /**
     * Function that returns array of general predefined params formatted for Visual Composer
     *
     * @return array of params
     *
     */
    function newsroom_elated_get_general_shortcode_params($exclude_options = array()) {

        $params_array = array();

        // GENERAL OPTIONS - START

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra Class Name', 'newsroom'),
            'param_name' => 'extra_class_name',
            'description' => '',
            'group' => esc_html__('General', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => 'Number of Posts',
            'param_name' => 'number_of_posts',
            'description' => '',
            'value' => '6',
            'save_always' => true,
            'group' => esc_html__('General', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => 'Number of Posts',
            'param_name' => 'number_of_posts_dropdown',
            'value' => array(
                'Default' => '5',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6' => '6',
                '7' => '7',
            ),
            'description' => '',
            'save_always' => true,
            'group' => esc_html__('General', 'newsroom'),
        );

        $params_array[] = array(
            "type" => "dropdown",
            "class" => "",
            "heading" => "Number of Columns",
            "param_name" => "column_number",
            "value" => array(
                "" => "",
                "One" => 1,
                "Two" => 2,
                "Three" => 3,
                "Four" => 4,
                "Five" => 5
            ),
            'description' => '',
            'group' => esc_html__('General', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => 'Block Proportion',
            'param_name' => 'block_proportion',
            'value' => array(
                '1/2+1/2' => 'two_half',
                '2/3+1/3' => 'two_third_one_third',
                '1/3+2/3' => 'one_third_two_third',
                '3/4+1/4' => 'three_fourths_one_fourth'
            ),
            'save_always' => true,
            'description' => '',
            'group' => esc_html__('General', 'newsroom'),
        );

        $params_array[] = array(
            "type" => "dropdown",
            "class" => "",
            "heading" => "Category",
            "value" => newsroom_elated_get_post_categories_VC(),
            "param_name" => "category_id",
            'save_always' => true,
            'group' => esc_html__('General', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => 'Category Slug',
            'param_name' => 'category_slug',
            'description' => 'Leave empty for all or use comma for list',
            'group' => esc_html__('General', 'newsroom'),
        );

        $params_array[] = array(
            "type" => "dropdown",
            "admin_label" => true,
            "class" => "",
            "heading" => "Choose Author",
            "param_name" => "author_id",
            "value" => newsroom_elated_get_authors_VC(),
            "description" => "",
            'save_always' => true,
            'group' => esc_html__('General', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => 'Tag Slug',
            'param_name' => 'tag_slug',
            'description' => 'Leave empty for all or use comma for list',
            'group' => esc_html__('General', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => 'Include Posts',
            'param_name' => 'post_in',
            'description' => 'Enter the IDs of the posts you want to display',
            'group' => esc_html__('General', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => 'Exclude Posts',
            'param_name' => 'post_not_in',
            'description' => 'Enter the IDs of the posts you want to exclude',
            'group' => esc_html__('General', 'newsroom'),
        );

        $params_array[] = array(
            "type" => "dropdown",
            "admin_label" => true,
            "class" => "",
            "heading" => "Sort",
            "param_name" => "sort",
            "value" => newsroom_elated_get_sort_array(),
            "description" => "",
            'group' => esc_html__('General', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => 'Layout Title',
            'param_name' => 'title',
            'description' => '',
            'group' => esc_html__('General', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => 'Slider Title',
            'param_name' => 'carousel_title',
            'description' => '',
            'group' => esc_html__('General', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => 'Bottom Padding (px)',
            'param_name' => 'padding_bottom',
            'description' => 'Set bottom padding for layout item (px)',
            'value' => '22',
            'save_always' => true,
            'group' => esc_html__('General', 'newsroom'),
        );

        // GENERAL OPTIONS - END

        if (is_array($exclude_options) && count($exclude_options)) {
            foreach ($exclude_options as $exclude_key) {
                foreach ($params_array as $params_item) {
                    if ($exclude_key == $params_item['param_name']) {
                        $key = array_search($params_item, $params_array);
                        unset($params_array[$key]);
                    }
                }
            }
        }

        return $params_array;
    }
}

/***** Feature Group Visual Composer Options for Shortcodes *****/
if (!function_exists('newsroom_elated_get_feature_shortcode_params')) {
    /**
     * Function that returns array of feature predefined params formatted for Visual Composer
     *
     * @return array of params
     *
     */
    function newsroom_elated_get_feature_shortcode_params($exclude_options = array()) {

        $params_array = array();

        // FEATURE OPTIONS - START

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Image Size', 'newsroom'),
            'param_name' => 'featured_thumb_image_size',
            'value' => array(
                esc_html__('Original', 'newsroom') => 'original',
                esc_html__('Landscape', 'newsroom') => 'landscape',
                esc_html__('Portrait', 'newsroom') => 'portrait',
                esc_html__('Square', 'newsroom') => 'square',
                esc_html__('Custom', 'newsroom') => 'custom_size'
            ),
            'save_always' => true,
            'description' => '',
            'group' => esc_html__('Featured Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => esc_html__('Image Width (px)', 'newsroom'),
            'param_name' => 'featured_thumb_image_width',
            'description' => esc_html__('Set custom image width (px)', 'newsroom'),
            'dependency' => array(
                'element' => 'featured_thumb_image_size',
                'value' => array('custom_size')
            ),
            'group' => esc_html__('Featured Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => esc_html__('Image Height (px)', 'newsroom'),
            'param_name' => 'featured_thumb_image_height',
            'description' => esc_html__('Set custom image height (px)', 'newsroom'),
            'dependency' => array(
                'element' => 'featured_thumb_image_size',
                'value' => array('custom_size')
            ),
            'group' => esc_html__('Featured Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => esc_html__('Custom Image Width (px)', 'newsroom'),
            'param_name' => 'featured_custom_thumb_image_width',
            'description' => esc_html__('Set custom image width (px)', 'newsroom'),
            'group' => esc_html__('Featured Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => esc_html__('Custom Image Height (px)', 'newsroom'),
            'param_name' => 'featured_custom_thumb_image_height',
            'description' => esc_html__('Set custom image height (px)', 'newsroom'),
            'group' => esc_html__('Featured Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Title Tag', 'newsroom'),
            'param_name' => 'featured_title_tag',
            'value' => array(
                esc_html__('Default', 'newsroom') => '',
                'h2' => 'h2',
                'h3' => 'h3',
                'h4' => 'h4',
                'h5' => 'h5',
                'h6' => 'h6',
            ),
            'description' => '',
            'group' => esc_html__('Featured Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => esc_html__('Title Font Size (px)', 'newsroom'),
            'param_name' => 'featured_title_font_size',
            'value' => '35',
            'description' => esc_html__('Set custom font size for title (px)', 'newsroom'),
            'save_always' => true,
            'group' => esc_html__('Featured Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Title Width', 'newsroom'),
            'param_name' => 'featured_title_width',
            'value' => array(
                esc_html__('Default', 'newsroom') => '',
                '50%' => '50',
                '100%' => '100',
            ),
            'description' => esc_html__('Set title width (%)', 'newsroom'),
            'save_always' => true,
            'group' => esc_html__('Featured Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => esc_html__('Title Max Words', 'newsroom'),
            'param_name' => 'featured_title_length',
            'description' => esc_html__('Enter max words of title post list that you want to display', 'newsroom'),
            'group' => esc_html__('Featured Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Display Excerpt', 'newsroom'),
            'param_name' => 'featured_display_excerpt',
            'value' => array(
                esc_html__('Default', 'newsroom') => '',
                esc_html__('Yes', 'newsroom') => 'yes',
                esc_html__('No', 'newsroom') => 'no'
            ),
            'description' => '',
            'group' => esc_html__('Featured Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => esc_html__('Max. Excerpt Length', 'newsroom'),
            'param_name' => 'featured_excerpt_length',
            'value' => '',
            'description' => esc_html__('Enter max of words that can be shown for excerpt', 'newsroom'),
            'dependency' => array(
                'element' => 'featured_display_excerpt',
                'value' => array('yes')
            ),
            'group' => esc_html__('Featured Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Display Read More', 'newsroom'),
            'param_name' => 'featured_display_read_more',
            'value' => array(
                esc_html__('Default', 'newsroom') => '',
                esc_html__('Yes', 'newsroom') => 'yes',
                esc_html__('No', 'newsroom') => 'no'
            ),
            'description' => '',
            'group' => esc_html__('Featured Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Display Date', 'newsroom'),
            'param_name' => 'featured_display_date',
            'value' => array(
                esc_html__('Default', 'newsroom') => '',
                esc_html__('Yes', 'newsroom') => 'yes',
                esc_html__('No', 'newsroom') => 'no'
            ),
            'description' => '',
            'group' => esc_html__('Featured Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => esc_html__('Date Format', 'newsroom'),
            'param_name' => 'featured_date_format',
            'description' => esc_html__('Enter the date format that you want to display', 'newsroom'),
            'dependency' => array(
                'element' => 'featured_display_date',
                'value' => array('yes', '')
            ),
            'group' => esc_html__('Featured Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Display Category', 'newsroom'),
            'param_name' => 'featured_display_category',
            'value' => array(
                esc_html__('Default', 'newsroom') => '',
                esc_html__('Yes', 'newsroom') => 'yes',
                esc_html__('No', 'newsroom') => 'no'
            ),
            'description' => '',
            'group' => esc_html__('Featured Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Display Author', 'newsroom'),
            'param_name' => 'featured_display_author',
            'value' => array(
                esc_html__('Default', 'newsroom') => '',
                esc_html__('Yes', 'newsroom') => 'yes',
                esc_html__('No', 'newsroom') => 'no'
            ),
            'description' => '',
            'group' => esc_html__('Featured Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Display Comments', 'newsroom'),
            'param_name' => 'featured_display_comments',
            'value' => array(
                esc_html__('Default', 'newsroom') => '',
                esc_html__('Yes', 'newsroom') => 'yes',
                esc_html__('No', 'newsroom') => 'no',
            ),
            'description' => '',
            'group' => esc_html__('Featured Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Display Like', 'newsroom'),
            'param_name' => 'featured_display_like',
            'value' => array(
                esc_html__('Default', 'newsroom') => '',
                esc_html__('Yes', 'newsroom') => 'yes',
                esc_html__('No', 'newsroom') => 'no'
            ),
            'description' => '',
            'group' => esc_html__('Featured Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Display Count', 'newsroom'),
            'param_name' => 'featured_display_count',
            'value' => array(
                esc_html__('Default', 'newsroom') => '',
                esc_html__('Yes', 'newsroom') => 'yes',
                esc_html__('No', 'newsroom') => 'no'
            ),
            'description' => '',
            'group' => esc_html__('Featured Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Display Post Type Icon', 'newsroom'),
            'param_name' => 'featured_display_post_type_icon',
            'value' => array(
                esc_html__('Default', 'newsroom') => '',
                esc_html__('Yes', 'newsroom') => 'yes',
                esc_html__('No', 'newsroom') => 'no',
            ),
            'description' => '',
            'group' => esc_html__('Featured Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Post Type Icon Size', 'newsroom'),
            'param_name' => 'featured_post_type_icon_size',
            'value' => array(
                esc_html__('Small', 'newsroom') => 'small',
                esc_html__('Medium', 'newsroom') => 'medium',
                esc_html__('Large', 'newsroom') => 'large'
            ),
            'save_always' => true,
            'description' => '',
            'dependency' => array(
                'element' => 'featured_display_post_type_icon',
                'value' => array('yes')
            ),
            'group' => esc_html__('Featured Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Display share links', 'newsroom'),
            'param_name' => 'featured_display_share',
            'value' => array(
                esc_html__('Default', 'newsroom') => '',
                esc_html__('Yes', 'newsroom') => 'yes',
                esc_html__('No', 'newsroom') => 'no',
            ),
            'group' => esc_html__('Featured Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Display background pattern', 'newsroom'),
            'param_name' => 'featured_display_background_pattern',
            'value' => array(
                esc_html__('Default', 'newsroom') => '',
                esc_html__('Yes', 'newsroom') => 'yes',
                esc_html__('No', 'newsroom') => 'no',
            ),
            'group' => esc_html__('Featured Item', 'newsroom'),
        );

        // FEATURE OPTIONS - END

        if (is_array($exclude_options) && count($exclude_options)) {
            foreach ($exclude_options as $exclude_key) {
                foreach ($params_array as $params_item) {
                    if ($exclude_key == $params_item['param_name']) {
                        $key = array_search($params_item, $params_array);
                        unset($params_array[$key]);
                    }
                }
            }
        }

        return $params_array;
    }
}

/***** Non-Feature Group Visual Composer Options for Shortcodes *****/
if (!function_exists('newsroom_elated_get_non_feature_shortcode_params')) {
    /**
     * Function that returns array of non-feature predefined params formatted for Visual Composer
     *
     * @return array of params
     *
     */
    function newsroom_elated_get_non_feature_shortcode_params($exclude_options = array()) {

        $params_array = array();

        // NON-FEATURED OPTIONS - START

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Image Size', 'newsroom'),
            'param_name' => 'thumb_image_size',
            'value' => array(
                esc_html__('Original', 'newsroom') => 'original',
                esc_html__('Landscape', 'newsroom') => 'landscape',
                esc_html__('Portrait', 'newsroom') => 'portrait',
                esc_html__('Square', 'newsroom') => 'square',
                esc_html__('Custom', 'newsroom') => 'custom_size'
            ),
            'save_always' => true,
            'description' => '',
            'group' => esc_html__('Post Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => esc_html__('Image Width (px)', 'newsroom'),
            'param_name' => 'thumb_image_width',
            'description' => esc_html__('Set custom image width (px)', 'newsroom'),
            'dependency' => array('
            element' => 'thumb_image_size',
                'value' => array('custom_size')
            ),
            'group' => esc_html__('Post Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => esc_html__('Image Height (px)', 'newsroom'),
            'param_name' => 'thumb_image_height',
            'description' => esc_html__('Set custom image height (px)', 'newsroom'),
            'dependency' => array('
            element' => 'thumb_image_size',
                'value' => array('custom_size')
            ),
            'group' => esc_html__('Post Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => esc_html__('Custom Image Width (px)', 'newsroom'),
            'param_name' => 'custom_thumb_image_width',
            'description' => esc_html__('Set custom image width (px)', 'newsroom'),
            'group' => esc_html__('Post Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => esc_html__('Custom Image Height (px)', 'newsroom'),
            'param_name' => 'custom_thumb_image_height',
            'description' => esc_html__('Set custom image height (px)', 'newsroom'),
            'group' => esc_html__('Post Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Title Tag', 'newsroom'),
            'param_name' => 'title_tag',
            'value' => array(
                esc_html__('Default', 'newsroom') => '',
                'h2' => 'h2',
                'h3' => 'h3',
                'h4' => 'h4',
                'h5' => 'h5',
                'h6' => 'h6',
            ),
            'description' => '',
            'group' => esc_html__('Post Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => esc_html__('Title Font Size (px)', 'newsroom'),
            'param_name' => 'title_font_size',
            'value' => '',
            'description' => esc_html__('Set custom font size for title (px)', 'newsroom'),
            'save_always' => true,
            'group' => esc_html__('Post Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Title Width', 'newsroom'),
            'param_name' => 'title_width',
            'value' => array(
                esc_html__('Default', 'newsroom') => '',
                esc_html__('50%', 'newsroom') => '50',
                esc_html__('100%', 'newsroom') => '100',
            ),
            'description' => esc_html__('Set title width (%)', 'newsroom'),
            'save_always' => true,
            'group' => esc_html__('Post Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => esc_html__('Title Max Words', 'newsroom'),
            'param_name' => 'title_length',
            'description' => esc_html__('Enter max words of title post list that you want to display', 'newsroom'),
            'group' => esc_html__('Post Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Display Date', 'newsroom'),
            'param_name' => 'display_date',
            'value' => array(
                esc_html__('Default', 'newsroom') => '',
                esc_html__('Yes', 'newsroom') => 'yes',
                esc_html__('No', 'newsroom') => 'no'
            ),
            'description' => '',
            'group' => esc_html__('Post Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => esc_html__('Date Format', 'newsroom'),
            'param_name' => 'date_format',
            'description' => esc_html__('Enter the date format that you want to display', 'newsroom'),
            'dependency' => array('
            element' => 'display_date',
                'value' => array('yes', '')
            ),
            'group' => esc_html__('Post Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Display Category', 'newsroom'),
            'param_name' => 'display_category',
            'value' => array(
                esc_html__('Default', 'newsroom') => '',
                esc_html__('Yes', 'newsroom') => 'yes',
                esc_html__('No', 'newsroom') => 'no'
            ),
            'description' => '',
            'group' => esc_html__('Post Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Display Author', 'newsroom'),
            'param_name' => 'display_author',
            'value' => array(
                esc_html__('Default', 'newsroom') => '',
                esc_html__('Yes', 'newsroom') => 'yes',
                esc_html__('No', 'newsroom') => 'no'
            ),
            'description' => '',
            'group' => esc_html__('Post Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Display Comments', 'newsroom'),
            'param_name' => 'display_comments',
            'value' => array(
                esc_html__('Default', 'newsroom') => '',
                esc_html__('Yes', 'newsroom') => 'yes',
                esc_html__('No', 'newsroom') => 'no',
            ),
            'description' => '',
            'group' => esc_html__('Post Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Display Like', 'newsroom'),
            'param_name' => 'display_like',
            'value' => array(
                esc_html__('Default', 'newsroom') => '',
                esc_html__('Yes', 'newsroom') => 'yes',
                esc_html__('No', 'newsroom') => 'no'
            ),
            'description' => '',
            'group' => esc_html__('Post Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Display Count', 'newsroom'),
            'param_name' => 'display_count',
            'value' => array(
                esc_html__('Default', 'newsroom') => '',
                esc_html__('Yes', 'newsroom') => 'yes',
                esc_html__('No', 'newsroom') => 'no'
            ),
            'description' => '',
            'group' => esc_html__('Post Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Display Excerpt', 'newsroom'),
            'param_name' => 'display_excerpt',
            'value' => array(
                esc_html__('Default', 'newsroom') => '',
                esc_html__('Yes', 'newsroom') => 'yes',
                esc_html__('No', 'newsroom') => 'no'
            ),
            'description' => '',
            'group' => esc_html__('Post Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'textfield',
            'heading' => esc_html__('Max. Excerpt Length', 'newsroom'),
            'param_name' => 'excerpt_length',
            'value' => '',
            'description' => esc_html__('Enter max of words that can be shown for excerpt', 'newsroom'),
            'dependency' => array('
            element' => 'display_excerpt',
                'value' => array('yes')
            ),
            'group' => esc_html__('Post Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Display Read More', 'newsroom'),
            'param_name' => 'display_read_more',
            'value' => array(
                esc_html__('Default', 'newsroom') => '',
                esc_html__('Yes', 'newsroom') => 'yes',
                esc_html__('No', 'newsroom') => 'no'
            ),
            'description' => '',
            'group' => esc_html__('Post Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Display Post Type Icon', 'newsroom'),
            'param_name' => 'display_post_type_icon',
            'value' => array(
                esc_html__('Default', 'newsroom') => '',
                esc_html__('Yes', 'newsroom') => 'yes',
                esc_html__('No', 'newsroom') => 'no',
            ),
            'save_always' => true,
            'description' => '',
            'group' => esc_html__('Post Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Post Type Icon Size', 'newsroom'),
            'param_name' => 'post_type_icon_size',
            'value' => array(
                esc_html__('Small', 'newsroom') => 'small',
                esc_html__('Medium', 'newsroom') => 'medium',
                esc_html__('Large', 'newsroom') => 'large'
            ),
            'save_always' => true,
            'description' => '',
            'dependency' => array('
            element' => 'display_post_type_icon',
                'value' => array('yes')
            ),
            'group' => esc_html__('Post Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Display share links', 'newsroom'),
            'param_name' => 'display_share',
            'value' => array(
                esc_html__('Default', 'newsroom') => '',
                esc_html__('Yes', 'newsroom') => 'yes',
                esc_html__('No', 'newsroom') => 'no',
            ),
            'group' => esc_html__('Post Item', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Display background pattern', 'newsroom'),
            'param_name' => 'display_background_pattern',
            'value' => array(
                esc_html__('Default', 'newsroom') => '',
                esc_html__('Yes', 'newsroom') => 'yes',
                esc_html__('No', 'newsroom') => 'no',
            ),
            'group' => esc_html__('Post Item', 'newsroom'),
        );

        // NON-FEATURED OPTIONS - END

        if (is_array($exclude_options) && count($exclude_options)) {
            foreach ($exclude_options as $exclude_key) {
                foreach ($params_array as $params_item) {
                    if ($exclude_key == $params_item['param_name']) {
                        $key = array_search($params_item, $params_array);
                        unset($params_array[$key]);
                    }
                }
            }
        }

        return $params_array;
    }
}

/***** Pagination Group Visual Composer Options for Shortcodes *****/
if (!function_exists('newsroom_elated_get_pagination_shortcode_params')) {
    /**
     * Function that returns array of pagination predefined params formatted for Visual Composer
     *
     * @return array of params
     *
     */
    function newsroom_elated_get_pagination_shortcode_params($exclude_options = array()) {

        $params_array = array();

        // PAGINATION OPTIONS - START

        $params_array[] = array(
            'type' => 'dropdown',
            'class' => '',
            'heading' => esc_html__('Pagination', 'newsroom'),
            'param_name' => 'display_pagination',
            'value' => array(
                esc_html__('No', 'newsroom') => 'no',
                esc_html__('Yes', 'newsroom') => 'yes'
            ),
            'save_always' => true,
            'description' => '',
            'group' => esc_html__('Pagination', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'class' => '',
            'heading' => esc_html__('Pagination Type', 'newsroom'),
            'param_name' => 'pagination_type',
            'value' => array(
                esc_html__('Horizontal Navigation', 'newsroom') => 'np-horizontal',
                esc_html__('Load More', 'newsroom') => 'load-more',
                esc_html__('Infinite Scroll', 'newsroom') => 'infinite'
            ),
            'description' => '',
            'save_always' => true,
            'dependency' => array(
                'element' => 'display_pagination',
                'value' => array('yes')
            ),
            'group' => esc_html__('Pagination', 'newsroom'),
        );

        // PAGINATION OPTIONS - END

        if (is_array($exclude_options) && count($exclude_options)) {
            foreach ($exclude_options as $exclude_key) {
                foreach ($params_array as $params_item) {
                    if ($exclude_key == $params_item['param_name']) {
                        $key = array_search($params_item, $params_array);
                        unset($params_array[$key]);
                    }
                }
            }
        }

        return $params_array;
    }
}

/***** Navigation Group Visual Composer Options for Shortcodes *****/
if (!function_exists('newsroom_elated_get_navigation_shortcode_params')) {
    /**
     * Function that returns array of navigation predefined params formatted for Visual Composer
     *
     * @return array of params
     *
     */
    function newsroom_elated_get_navigation_shortcode_params($exclude_options = array()) {

        $params_array = array();

        // NAVIGATION OPTIONS - START

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Display Navigation', 'newsroom'),
            'param_name' => 'display_navigation',
            'value' => array(
                esc_html__('Yes', 'newsroom') => 'yes',
                esc_html__('No', 'newsroom') => 'no'
            ),
            'save_always' => true,
            'description' => '',
            'group' => esc_html__('Navigation', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Display Control', 'newsroom'),
            'param_name' => 'display_control',
            'value' => array(
                esc_html__('No', 'newsroom') => 'no',
                esc_html__('Thumbnails', 'newsroom') => 'thumbnails',
                esc_html__('Paging', 'newsroom') => 'paging'
            ),
            'description' => '',
            'save_always' => true,
            'group' => esc_html__('Navigation', 'newsroom'),
        );

        $params_array[] = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Display Paging', 'newsroom'),
            'param_name' => 'display_paging',
            'value' => array(
                esc_html__('No', 'newsroom') => 'no',
                esc_html__('Yes', 'newsroom') => 'yes'
            ),
            'description' => '',
            'save_always' => true,
            'group' => esc_html__('Navigation', 'newsroom'),
        );

        // NAVIGATION OPTIONS - END

        if (is_array($exclude_options) && count($exclude_options)) {
            foreach ($exclude_options as $exclude_key) {
                foreach ($params_array as $params_item) {
                    if ($exclude_key == $params_item['param_name']) {
                        $key = array_search($params_item, $params_array);
                        unset($params_array[$key]);
                    }
                }
            }
        }

        return $params_array;
    }
}

/***** Default Visual Composer Options for Shortcodes *****/
if (!function_exists('newsroom_elated_get_shortcode_params_default')) {
    /**
     * Function that returns array of default predefined params formatted for Visual Composer
     *
     * @return array of params
     *
     */
    function newsroom_elated_get_shortcode_params_default($exclude_options = array()) {

        // GENERAL OPTIONS - BEGIN

        $params_general_array = newsroom_elated_get_general_shortcode_params();

        // GENERAL OPTIONS - END

        // FEATURED POST OPTIONS - START

        $params_feature_array = newsroom_elated_get_feature_shortcode_params();

        // FEATURED POST OPTIONS - END

        // NON-FEATURED POSTS OPTIONS - START

        $params_non_feature_array = newsroom_elated_get_non_feature_shortcode_params();

        // NON-FEATURED POSTS OPTIONS - END

        // PAGINATION OPTIONS - START

        $params_pagination_array = newsroom_elated_get_pagination_shortcode_params();

        // PAGINATION OPTIONS - END

        // NAVIGATION OPTIONS - START

        $params_navigation_array = newsroom_elated_get_navigation_shortcode_params();

        // NAVIGATION OPTIONS - END              

        $params_array = array_merge($params_general_array, $params_feature_array, $params_non_feature_array, $params_pagination_array, $params_navigation_array);

        if (is_array($exclude_options) && count($exclude_options)) {
            foreach ($exclude_options as $exclude_key) {
                foreach ($params_array as $params_item) {
                    if ($exclude_key == $params_item['param_name']) {
                        $key = array_search($params_item, $params_array);
                        unset($params_array[$key]);
                    }
                }
            }
        }

        return $params_array;
    }
}


/***** Visual Composer Options for Block One Shortcode *****/
if (!function_exists('newsroom_elated_get_block_one_params')) {
    /**
     * Function that returns array of predefined params formatted for Visual Composer
     *
     * @return array of params
     *
     */
    function newsroom_elated_get_block_one_params() {

        // GENERAL OPTIONS - BEGIN

        $params_general_array = newsroom_elated_get_general_shortcode_params(
            array(
                'carousel_title',
                'column_number',
                'number_of_posts',
                'block_proportion',
                'padding_bottom',
                'number_of_posts_dropdown',
            ));

        // GENERAL OPTIONS - END

        // FEATURED POST OPTIONS - START

        $params_feature_array = newsroom_elated_get_feature_shortcode_params(
            array(
                'featured_custom_thumb_image_width',
                'featured_custom_thumb_image_height',
                'featured_title_font_size',
                'featured_title_width',
                'featured_display_background_pattern',
            ));


        // FEATURED POST OPTIONS - END

        // NON-FEATURED POSTS OPTIONS - START

        // NON-FEATURED POSTS OPTIONS - END

        // PAGINATION OPTIONS - START

        $params_pagination_array = newsroom_elated_get_pagination_shortcode_params();

        // PAGINATION OPTIONS - END

        $params_array = array_merge($params_general_array, $params_feature_array, $params_pagination_array);

        return $params_array;
    }
}


/***** Visual Composer Options for Block Two Shortcode *****/
if (!function_exists('newsroom_elated_get_block_two_params')) {
    /**
     * Function that returns array of predefined params formatted for Visual Composer
     *
     * @return array of params
     *
     */
    function newsroom_elated_get_block_two_params() {

        // GENERAL OPTIONS - BEGIN

        $params_general_array = newsroom_elated_get_general_shortcode_params(
            array(
                'carousel_title',
                'column_number',
                'block_proportion',
                'padding_bottom',
                'number_of_posts'
            ));

        // GENERAL OPTIONS - END

        // FEATURED POST OPTIONS - START

        $params_feature_array = newsroom_elated_get_feature_shortcode_params(
            array(
                'featured_custom_thumb_image_width',
                'featured_custom_thumb_image_height',
                'featured_title_font_size',
                'featured_title_width',
            ));


        // FEATURED POST OPTIONS - END

        // NON-FEATURED POSTS OPTIONS - START

        $params_non_feature_array = newsroom_elated_get_non_feature_shortcode_params(
            array(
                'custom_thumb_image_width',
                'custom_thumb_image_height',
                'title_font_size',
                'title_width',
                'display_share',
                'display_read_more',
                'display_background_pattern',
            ));

        // NON-FEATURED POSTS OPTIONS - END

        // PAGINATION OPTIONS - START

        $params_pagination_array = newsroom_elated_get_pagination_shortcode_params();

        // PAGINATION OPTIONS - END

        $params_array = array_merge($params_general_array, $params_feature_array, $params_non_feature_array, $params_pagination_array);

        return $params_array;
    }
}


/***** Visual Composer Options for Block Three Shortcode *****/
if (!function_exists('newsroom_elated_get_block_three_params')) {
    /**
     * Function that returns array of predefined params formatted for Visual Composer
     *
     * @return array of params
     *
     */
    function newsroom_elated_get_block_three_params() {

        // GENERAL OPTIONS - BEGIN

        $params_general_array = newsroom_elated_get_general_shortcode_params(
            array(
                'carousel_title',
                'column_number',
                'number_of_posts',
                'block_proportion',
                'number_of_posts_dropdown',
            ));

        // GENERAL OPTIONS - END

        // FEATURED POST OPTIONS - START

        $params_feature_array = newsroom_elated_get_feature_shortcode_params(
            array(
                'featured_custom_thumb_image_width',
                'featured_custom_thumb_image_height',
                'featured_title_tag',
                'featured_display_read_more',
                'featured_title_width',
            ));

        // FEATURED POST OPTIONS - END

        // NON-FEATURED POSTS OPTIONS - START

        // NON-FEATURED POSTS OPTIONS - END

        // PAGINATION OPTIONS - START

        $params_pagination_array = newsroom_elated_get_pagination_shortcode_params();

        // PAGINATION OPTIONS - END

        $params_array = array_merge($params_general_array, $params_feature_array, $params_pagination_array);

        return $params_array;
    }
}


/***** Visual Composer Options for Block Four Shortcode *****/
if (!function_exists('newsroom_elated_get_block_four_params')) {
    /**
     * Function that returns array of predefined params formatted for Visual Composer
     *
     * @return array of params
     *
     */
    function newsroom_elated_get_block_four_params() {

        // GENERAL OPTIONS - BEGIN

        $params_general_array = newsroom_elated_get_general_shortcode_params(
            array(
                'carousel_title',
                'column_number',
                'block_proportion',
                'padding_bottom',
                'number_of_posts',
            ));

        // GENERAL OPTIONS - END

        // FEATURED POST OPTIONS - START

        $params_feature_array = newsroom_elated_get_feature_shortcode_params(
            array(
                'featured_custom_thumb_image_width',
                'featured_custom_thumb_image_height',
                'featured_title_font_size',
                'featured_title_width',
                'featured_display_read_more',
                'featured_display_background_pattern',
            ));

        // FEATURED POST OPTIONS - END

        // NON-FEATURED POSTS OPTIONS - START

        $params_non_feature_array = newsroom_elated_get_non_feature_shortcode_params(
            array(
                'thumb_image_size',
                'thumb_image_width',
                'thumb_image_height',
                'title_font_size',
                'title_width',
                'display_read_more',
                'display_background_pattern',
            ));

        // NON-FEATURED POSTS OPTIONS - END

        // PAGINATION OPTIONS - START

        $params_pagination_array = newsroom_elated_get_pagination_shortcode_params();

        // PAGINATION OPTIONS - END

        $params_array = array_merge($params_general_array, $params_feature_array, $params_non_feature_array, $params_pagination_array);

        return $params_array;
    }
}


/***** Visual Composer Options for Block Five Shortcode *****/
if (!function_exists('newsroom_elated_get_block_five_params')) {
    /**
     * Function that returns array of predefined params formatted for Visual Composer
     *
     * @return array of params
     *
     */
    function newsroom_elated_get_block_five_params() {

        // GENERAL OPTIONS - BEGIN

        $params_general_array = newsroom_elated_get_general_shortcode_params(
            array(
                'carousel_title',
                'column_number',
                'padding_bottom',
                'number_of_posts'
            ));

        // GENERAL OPTIONS - END

        // FEATURED POST OPTIONS - START

        $params_feature_array = newsroom_elated_get_feature_shortcode_params(
            array(
                'featured_custom_thumb_image_width',
                'featured_custom_thumb_image_height',
                'featured_title_font_size',
                'featured_title_width',
                'featured_display_read_more',
                'featured_display_background_pattern',
            ));


        // FEATURED POST OPTIONS - END

        // NON-FEATURED POSTS OPTIONS - START

        $params_non_feature_array = newsroom_elated_get_non_feature_shortcode_params(
            array(
                'thumb_image_size',
                'thumb_image_width',
                'thumb_image_height',
                'title_font_size',
                'title_width',
                'display_read_more',
                'display_background_pattern',
            ));

        // NON-FEATURED POSTS OPTIONS - END

        // PAGINATION OPTIONS - START

        $params_pagination_array = newsroom_elated_get_pagination_shortcode_params();

        // PAGINATION OPTIONS - END

        $params_array = array_merge($params_general_array, $params_feature_array, $params_non_feature_array, $params_pagination_array);

        return $params_array;
    }
}


/***** Visual Composer Options for Layout One Shortcode *****/
if (!function_exists('newsroom_elated_get_layout_one_params')) {
    /**
     * Function that returns array of predefined params formatted for Visual Composer
     *
     * @return array of params
     *
     */
    function newsroom_elated_get_layout_one_params() {

        // GENERAL OPTIONS - BEGIN

        $params_general_array = newsroom_elated_get_general_shortcode_params(
            array(
                'carousel_title',
                'block_proportion',
                'padding_bottom',
                'number_of_posts_dropdown',
            ));

        // GENERAL OPTIONS - END

        // NON-FEATURED POSTS OPTIONS - START

        $params_non_feature_array = newsroom_elated_get_non_feature_shortcode_params(
            array(
                'custom_thumb_image_width',
                'custom_thumb_image_height',
                'title_width',
                'display_read_more',
                'display_background_pattern',
            ));

        // NON-FEATURED POSTS OPTIONS - END

        // PAGINATION OPTIONS - START

        $params_pagination_array = newsroom_elated_get_pagination_shortcode_params();

        // PAGINATION OPTIONS - END

        $params_array = array_merge($params_general_array, $params_non_feature_array, $params_pagination_array);

        return $params_array;
    }
}


/***** Visual Composer Options for Layout Two Shortcode *****/
if (!function_exists('newsroom_elated_get_layout_two_params')) {
    /**
     * Function that returns array of predefined params formatted for Visual Composer
     *
     * @return array of params
     *
     */
    function newsroom_elated_get_layout_two_params() {

        // GENERAL OPTIONS - BEGIN

        $params_general_array = newsroom_elated_get_general_shortcode_params(
            array(
                'carousel_title',
                'block_proportion',
                'padding_bottom',
                'number_of_posts_dropdown',
            ));

        // GENERAL OPTIONS - END

        // NON-FEATURED POSTS OPTIONS - START

        $params_non_feature_array = newsroom_elated_get_non_feature_shortcode_params(
            array(
                'thumb_image_size',
                'thumb_image_width',
                'thumb_image_height',
                'title_font_size',
                'title_width',
                'display_read_more',
                'display_background_pattern',
            ));

        // NON-FEATURED POSTS OPTIONS - END

        // PAGINATION OPTIONS - START

        $params_pagination_array = newsroom_elated_get_pagination_shortcode_params();

        // PAGINATION OPTIONS - END

        $params_array = array_merge($params_general_array, $params_non_feature_array, $params_pagination_array);

        return $params_array;
    }
}


/***** Visual Composer Options for Layout Three Shortcode *****/
if (!function_exists('newsroom_elated_get_layout_three_params')) {
    /**
     * Function that returns array of predefined params formatted for Visual Composer
     *
     * @return array of params
     *
     */
    function newsroom_elated_get_layout_three_params() {

        // GENERAL OPTIONS - BEGIN

        $params_general_array = newsroom_elated_get_general_shortcode_params(
            array(
                'carousel_title',
                'block_proportion',
                'number_of_posts_dropdown',
                'title',
            ));

        // GENERAL OPTIONS - END

        // NON-FEATURED POSTS OPTIONS - START

        $params_non_feature_array = newsroom_elated_get_non_feature_shortcode_params(
            array(
                'custom_thumb_image_width',
                'custom_thumb_image_height',
                'title_tag',
                'display_read_more',
                'display_share',
            ));


        // ADDITIONAL NON FEATURED ARRAY

        $params_non_feature_additonal_array = array(
            array(
                'type' => 'textfield',
                'class' => '',
                'group' => esc_html__('Responsiveness', 'newsroom'),
                'heading' => esc_html__('Bottom Padding on screen size between 1280px-1600px', 'newsroom'),
                'param_name' => 'layout_bottom_padding_1280_1600',
                'value' => '',
                'description' => esc_html__('Set bottom padding for layout item (px)', 'newsroom'),
            ),
            array(
                'type' => 'textfield',
                'class' => '',
                'group' => esc_html__('Responsiveness', 'newsroom'),
                'heading' => esc_html__('Bottom Padding on screen size between 1024px-1280px', 'newsroom'),
                'param_name' => 'layout_bottom_padding_1024_1280',
                'value' => '',
                'description' => esc_html__('Set bottom padding for layout item (px)', 'newsroom'),
            ),
            array(
                'type' => 'textfield',
                'class' => '',
                'group' => esc_html__('Responsiveness', 'newsroom'),
                'heading' => esc_html__('Padding on screen size between 768px-1024px', 'newsroom'),
                'param_name' => 'layout_bottom_padding_768_1024',
                'value' => '',
                'description' => esc_html__('Set bottom padding for layout item (px)', 'newsroom'),
            ),
            array(
                'type' => 'textfield',
                'class' => '',
                'group' => esc_html__('Responsiveness', 'newsroom'),
                'heading' => esc_html__('Bottom Padding on screen size between 600px-768px', 'newsroom'),
                'param_name' => 'layout_bottom_padding_600_768',
                'value' => '',
                'description' => esc_html__('Set bottom padding for layout item (px)', 'newsroom'),
            ),
            array(
                'type' => 'textfield',
                'class' => '',
                'group' => esc_html__('Responsiveness', 'newsroom'),
                'heading' => esc_html__('Bottom Padding on screen size between 480px-600px', 'newsroom'),
                'param_name' => 'layout_bottom_padding_480_600',
                'value' => '',
                'description' => esc_html__('Set bottom padding for layout item (px)', 'newsroom'),
            ),
            array(
                'type' => 'textfield',
                'class' => '',
                'group' => esc_html__('Responsiveness', 'newsroom'),
                'heading' => esc_html__('Bottom Padding on Screen Size Bellow 480px', 'newsroom'),
                'param_name' => 'layout_bottom_padding_480',
                'value' => '',
                'description' => esc_html__('Set bottom padding for layout item (px)', 'newsroom'),
            )
        );

        $params_non_feature_array = array_merge($params_non_feature_additonal_array, $params_non_feature_array);

        // NON-FEATURED POSTS OPTIONS - END

        // PAGINATION OPTIONS - START

        $params_pagination_array = newsroom_elated_get_pagination_shortcode_params();

        // PAGINATION OPTIONS - END

        $params_array = array_merge($params_general_array, $params_non_feature_array, $params_pagination_array);

        return $params_array;
    }
}


/***** Visual Composer Options for Slider One Shortcode *****/
if (!function_exists('newsroom_elated_get_slider_one_params')) {
    /**
     * Function that returns array of predefined params formatted for Visual Composer
     *
     * @return array of params
     *
     */
    function newsroom_elated_get_slider_one_params() {

        // SLIDER OPTIONS - BEGIN

        $params_slider_array = newsroom_elated_get_slider_shortcode_params(
            array(
                'slider_height',
            ));

        // SLIDER OPTIONS - END

        // GENERAL OPTIONS - BEGIN

        $params_general_array = newsroom_elated_get_general_shortcode_params(
            array(
                'carousel_title',
                'column_number',
                'block_proportion',
                'padding_bottom',
                'number_of_posts_dropdown',
                'title',
            ));

        // GENERAL OPTIONS - END

        // FEATURED POST OPTIONS - START

        // FEATURED POST OPTIONS - END

        // NON-FEATURED POSTS OPTIONS - START

        $params_non_feature_array = newsroom_elated_get_non_feature_shortcode_params(
            array(
                'custom_thumb_image_width',
                'custom_thumb_image_height',
                'title_font_size',
                'title_width',
                'display_read_more',
                'display_background_pattern',
            ));

        // NON-FEATURED POSTS OPTIONS - END

        // PAGINATION OPTIONS - START

        // PAGINATION OPTIONS - END

        $params_array = array_merge($params_general_array, $params_slider_array, $params_non_feature_array);

        return $params_array;
    }
}


/***** Visual Composer Options for Slider Two Shortcode *****/
if (!function_exists('newsroom_elated_get_slider_two_params')) {
    /**
     * Function that returns array of predefined params formatted for Visual Composer
     *
     * @return array of params
     *
     */
    function newsroom_elated_get_slider_two_params() {

        // SLIDER OPTIONS - BEGIN

        $params_slider_array = newsroom_elated_get_slider_shortcode_params(
            array(
                'slider_height',
            ));

        // SLIDER OPTIONS - END

        // GENERAL OPTIONS - BEGIN

        $params_general_array = newsroom_elated_get_general_shortcode_params(
            array(
                'carousel_title',
                'column_number',
                'block_proportion',
                'padding_bottom',
                'number_of_posts_dropdown',
                'title',
            ));

        // GENERAL OPTIONS - END

        // FEATURED POST OPTIONS - START

        // FEATURED POST OPTIONS - END

        // NON-FEATURED POSTS OPTIONS - START

        $params_array = newsroom_elated_get_non_feature_shortcode_params(
            array(
                'custom_thumb_image_width',
                'custom_thumb_image_height',
                'title_font_size',
                'title_width',
                'display_read_more',
                'display_background_pattern',
            ));

        // NON-FEATURED POSTS OPTIONS - END

        // PAGINATION OPTIONS - START

        // PAGINATION OPTIONS - END

        $params_array = array_merge($params_general_array, $params_slider_array, $params_array);

        return $params_array;
    }
}


/***** Visual Composer Options for Slider Three Shortcode *****/
if (!function_exists('newsroom_elated_get_slider_three_params')) {
    /**
     * Function that returns array of predefined params formatted for Visual Composer
     *
     * @return array of params
     *
     */
    function newsroom_elated_get_slider_three_params() {

        // SLIDER OPTIONS - BEGIN

        $params_slider_array = newsroom_elated_get_slider_shortcode_params(
            array(
                'slider_slides_to_scroll',
                'slider_slides_to_show',
                'slider_dots',
                'slider_arrows',
            ));

        // SLIDER OPTIONS - END

        // GENERAL OPTIONS - BEGIN

        $params_general_array = newsroom_elated_get_general_shortcode_params(
            array(
                'carousel_title',
                'column_number',
                'block_proportion',
                'padding_bottom',
                'number_of_posts',
                'title',
            ));

        // GENERAL OPTIONS - END

        // FEATURED POST OPTIONS - START

        $params_feature_array = newsroom_elated_get_feature_shortcode_params(
            array(
                'featured_custom_thumb_image_width',
                'featured_custom_thumb_image_height',
                'featured_thumb_image_size',
                'featured_thumb_image_width',
                'featured_thumb_image_height',
                'featured_title_tag',
                'featured_title_width',
                'featured_display_post_type_icon',
                'featured_post_type_icon_size',
                'featured_display_read_more',
                'featured_display_background_pattern',
            ));


        // FEATURED POST OPTIONS - END

        // NON-FEATURED POSTS OPTIONS - START

        $params_non_feature_array = newsroom_elated_get_non_feature_shortcode_params(
            array(
                'custom_thumb_image_width',
                'custom_thumb_image_height',
                'thumb_image_size',
                'thumb_image_width',
                'thumb_image_height',
                'title_font_size',
                'title_width',
                'display_post_type_icon',
                'post_type_icon_size',
                'display_read_more',
                'display_background_pattern',
                'display_excerpt',
                'excerpt_length',
                'display_share',
            ));

        // NON-FEATURED POSTS OPTIONS - END

        // PAGINATION OPTIONS - START

        // PAGINATION OPTIONS - END

        $params_array = array_merge($params_general_array, $params_slider_array, $params_feature_array, $params_non_feature_array);

        return $params_array;
    }
}


/***** Visual Composer Options for Slider Three Shortcode *****/
if (!function_exists('newsroom_elated_get_slider_four_params')) {
    /**
     * Function that returns array of predefined params formatted for Visual Composer
     *
     * @return array of params
     *
     */
    function newsroom_elated_get_slider_four_params() {

        // SLIDER OPTIONS - BEGIN

        $params_slider_array = newsroom_elated_get_slider_shortcode_params(
            array(
                'slider_slides_to_scroll',
                'slider_slides_to_show',
                'slider_dots',
                'slider_arrows',
            ));

        // SLIDER OPTIONS - END

        // GENERAL OPTIONS - BEGIN

        $params_general_array = newsroom_elated_get_general_shortcode_params(
            array(
                'column_number',
                'block_proportion',
                'padding_bottom',
                'number_of_posts',
                'title',
            ));

        // GENERAL OPTIONS - END

        // FEATURED POST OPTIONS - START

        $params_feature_array = newsroom_elated_get_feature_shortcode_params(
            array(
                'featured_custom_thumb_image_width',
                'featured_custom_thumb_image_height',
                'featured_title_font_size',
                'featured_title_width',
                'featured_display_read_more',
                'featured_display_background_pattern',
            ));


        // FEATURED POST OPTIONS - END

        // NON-FEATURED POSTS OPTIONS - START

        $params_non_feature_array = newsroom_elated_get_non_feature_shortcode_params(
            array(
                'custom_thumb_image_width',
                'custom_thumb_image_height',
                'title_font_size',
                'title_width',
                'display_read_more',
                'display_background_pattern',
            ));

        // NON-FEATURED POSTS OPTIONS - END

        // PAGINATION OPTIONS - START

        // PAGINATION OPTIONS - END

        $params_array = array_merge($params_general_array, $params_slider_array, $params_feature_array, $params_non_feature_array);

        return $params_array;
    }
}