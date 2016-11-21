<?php
if (!function_exists('newsroom_elated_get_blog')) {
    /**
     * Function which return holder for all blog lists
     *
     * @return holder.php template
     */
    function newsroom_elated_get_blog($type) {

        $sidebar = newsroom_elated_sidebar_layout();
        $template = "";

        $current_cat_id = newsroom_elated_get_current_object_id();
        $cat_array = get_option("post_tax_term_$current_cat_id");

        if (isset($cat_array['template']) && $cat_array['template'] != 'default') {
            $template = $cat_array['template'];
        } elseif (newsroom_elated_options()->getOptionValue('category_unique_layout') !== '') {
            $template = newsroom_elated_options()->getOptionValue('category_unique_layout');
        }

        $params = array(
            "blog_type" => $type,
            "sidebar" => $sidebar,
            "custom_widget" => $template
        );
        newsroom_elated_get_module_template_part('templates/lists/holder', 'blog', '', $params);
    }
}

if (!function_exists('newsroom_elated_get_blog_type')) {

    /**
     * Function which create query for blog lists
     *
     * @return blog list template
     */

    function newsroom_elated_get_blog_type($type) {
        global $wp_query;

        $id = newsroom_elated_get_page_id();
        $category = get_post_meta($id, "eltd_blog_category_meta", true);
        $post_number = esc_attr(get_post_meta($id, "eltd_show_posts_per_page_meta", true));

        $paged = newsroom_elated_paged();

        if (!is_archive()) {
            $blog_query = new WP_Query('post_type=post&paged=' . $paged . '&cat=' . $category . '&posts_per_page=' . $post_number . '&post_status=publish');
        } else {
            $blog_query = $wp_query;
        }

        if (newsroom_elated_options()->getOptionValue('blog_page_range') != "") {
            $blog_page_range = esc_attr(newsroom_elated_options()->getOptionValue('blog_page_range'));
        } else {
            $blog_page_range = $blog_query->max_num_pages;
        }
        $params = array(
            'blog_query' => $blog_query,
            'paged' => $paged,
            'blog_page_range' => $blog_page_range,
            'blog_type' => $type
        );

        newsroom_elated_get_module_template_part('templates/lists/' . $type, 'blog', '', $params);
    }
}

if (!function_exists('newsroom_elated_get_post_format_html')) {

    /**
     * Function which return html for post formats
     * @param $type
     * @return post hormat template
     */

    function newsroom_elated_get_post_format_html($type = "") {

        $post_format = get_post_format();
        $supported_post_formats = array('audio', 'video', 'link', 'quote', 'gallery');

        if (in_array($post_format, $supported_post_formats)) {
            $post_format = $post_format;
        } else {
            $post_format = 'standard';
        }

        $slug = '';
        if ($type !== "") {
            $slug = $type;
        }

        $params = array();

        $chars_array = newsroom_elated_blog_lists_number_of_chars();
        if (isset($chars_array[$type])) {
            $params['excerpt_length'] = $chars_array[$type];
        } else {
            $params['excerpt_length'] = '';
        }

        $display_category = 'yes';
        if (newsroom_elated_options()->getOptionValue('blog_list_category') !== '') {
            $display_category = newsroom_elated_options()->getOptionValue('blog_list_category');
        }

        $params['display_category'] = $display_category;

        $display_date = 'yes';
        if (newsroom_elated_options()->getOptionValue('blog_list_date') !== '') {
            $display_date = newsroom_elated_options()->getOptionValue('blog_list_date');
        }

        $params['display_date'] = $display_date;

        $display_author = 'no';
        if (newsroom_elated_options()->getOptionValue('blog_list_author') !== '') {
            $display_author = newsroom_elated_options()->getOptionValue('blog_list_author');
        }

        $params['display_author'] = $display_author;

        $display_comments = 'yes';
        if (newsroom_elated_options()->getOptionValue('blog_list_comment') !== '') {
            $display_comments = newsroom_elated_options()->getOptionValue('blog_list_comment');
        }

        $params['display_comments'] = $display_comments;

        $display_like = 'no';
        if (newsroom_elated_options()->getOptionValue('blog_list_like') !== '') {
            $display_like = newsroom_elated_options()->getOptionValue('blog_list_like');
        }

        $params['display_like'] = $display_like;

        $display_share = 'no';
        if (newsroom_elated_options()->getOptionValue('blog_list_share') !== '') {
            $display_share = newsroom_elated_options()->getOptionValue('blog_list_share');
        }

        $params['display_share'] = $display_share;

        $display_feature_image = true;
        if (newsroom_elated_options()->getOptionValue('blog_list_feature_image') === 'no') {
            $display_feature_image = false;
        }

        $params['display_feature_image'] = $display_feature_image;

        $display_read_more = false;
        if (newsroom_elated_options()->getOptionValue('blog_list_read_more') === 'yes') {
            $display_read_more = true;
        }

        $params['display_read_more'] = $display_read_more;

        $disable_bottom_padding = '';
        if ($display_share == 'yes' || $display_read_more == true) {
            $disable_bottom_padding = 'eltd-more-section-enabled';
        }
        $params['disable_bottom_padding'] = $disable_bottom_padding;

        newsroom_elated_get_module_template_part('templates/lists/post-formats/' . $post_format, 'blog', $slug, $params);
    }
}

if (!function_exists('newsroom_elated_get_default_blog_list')) {
    /**
     * Function which return default blog list for archive post types
     *
     * @return post format template
     */

    function newsroom_elated_get_default_blog_list() {

        $blog_list = newsroom_elated_options()->getOptionValue('blog_list_type');

        if (strpos($blog_list, 'type') !== false) {
            $blog_list = 'unique-type';
        }

        return $blog_list;
    }
}

if (!function_exists('newsroom_elated_get_category_blog_list')) {
    /**
     * Function which return blog list for category post types
     *
     * @return post format template
     */

    function newsroom_elated_get_category_blog_list() {

        $blog_list = newsroom_elated_options()->getOptionValue('blog_list_type');

        if (strpos($blog_list, 'type') !== false) {
            $blog_list = 'unique-type';
        }

        if (newsroom_elated_options()->getOptionValue('unique_category_layout') === 'yes') {
            $blog_list = 'unique-category-layout';
        }

        return $blog_list;
    }
}

if (!function_exists('newsroom_elated_get_author_blog_list')) {
    /**
     * Function which return blog list for author post types
     *
     * @return post format template
     */

    function newsroom_elated_get_author_blog_list() {

        $blog_list = newsroom_elated_options()->getOptionValue('blog_list_type');

        if (strpos($blog_list, 'type') !== false) {
            $blog_list = 'unique-type';
        }

        if (newsroom_elated_options()->getOptionValue('unique_author_layout') === 'yes') {
            $blog_list = 'unique-author-layout';
        }

        return $blog_list;
    }
}

if (!function_exists('newsroom_elated_get_tag_blog_list')) {
    /**
     * Function which return blog list for tag post types
     *
     * @return post format template
     */

    function newsroom_elated_get_tag_blog_list() {

        $blog_list = newsroom_elated_options()->getOptionValue('blog_list_type');

        if (strpos($blog_list, 'type') !== false) {
            $blog_list = 'unique-type';
        }

        if (newsroom_elated_options()->getOptionValue('unique_tag_layout') === 'yes') {
            $blog_list = 'unique-tag-layout';
        }

        return $blog_list;
    }
}


if (!function_exists('newsroom_elated_pagination')) {

    /**
     * Function which return pagination
     *
     * @return blog list pagination html
     */

    function newsroom_elated_pagination($pages = '', $range = 4, $paged = 1) {

        $showitems = $range + 1;

        if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            if (!$pages) {
                $pages = 1;
            }
        }
        if (1 != $pages) {

            echo '<span class="eltd-pagination-new-holder">' . get_the_posts_pagination() . '</span>';

            echo '<div class="eltd-pagination">';
            echo '<ul>';
            if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) {
                echo '<li class="eltd-pagination-first-page"><a href="' . esc_url(get_pagenum_link(1)) . '"><span class="eltd-pagination-icon arrow_carrot-2left"></span></a></li>';
            }
            if ($paged > 1) {
                echo "<li class='eltd-pagination-prev'><a href='" . esc_url(get_pagenum_link($paged - 1)) . "'><span class='eltd-pagination-icon arrow_carrot-left'></span></a></li>";
            }
            for ($i = 1; $i <= $pages; $i++) {
                if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                    echo ($paged == $i) ? "<li class='active'><span>" . $i . "</span></li>" : "<li><a href='" . get_pagenum_link($i) . "' class='inactive'>" . $i . "</a></li>";
                }
            }
            if ($paged !== intval($pages)) {
                echo '<li class="eltd-pagination-next"><a href="';
                if ($pages > $paged) {
                    echo esc_url(get_pagenum_link($paged + 1));
                } else {
                    echo esc_url(get_pagenum_link($paged));
                }
                echo '"><span class="eltd-pagination-icon arrow_carrot-right"></span></a></li>';
            }

            if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages) {
                echo '<li class="eltd-pagination-last-page"><a href="' . esc_url(get_pagenum_link($pages)) . '"><span class="eltd-pagination-icon arrow_carrot-2right"></span></a></li>';
            }
            echo '</ul>';
            echo "</div>";
        }
    }
}

if (!function_exists('newsroom_elated_has_thumbnail')) {
    /**
     * Function that loads check if thumbnail exist
     */
    function newsroom_elated_has_thumbnail() {


        if (get_post_format() == 'gallery') {
            return get_post_meta(get_the_ID(), 'eltd_post_gallery_images_meta', true);
        } else {
            return has_post_thumbnail();

        }
    }
}


if (!function_exists('newsroom_elated_post_info')) {
    /**
     * Function that loads parts of blog post info section
     * Possible options are:
     * 1. date
     * 2. category
     * 3. author
     * 4. comments
     * 5. like
     * 6. share
     *
     * @param $config array of sections to load
     */
    function newsroom_elated_post_info($config) {
        $default_config = array(
            'category' => '',
            'date' => '',
            'author' => '',
            'comments' => '',
            'like' => '',
            'count' => '',
            'share' => ''
        );

        extract(shortcode_atts($default_config, $config));

        if ($category == 'yes') {
            newsroom_elated_get_module_template_part('templates/parts/post-info/post-info-category', 'blog');
        }
        if ($date == 'yes') {
            newsroom_elated_get_module_template_part('templates/parts/post-info/post-info-date', 'blog', '', array('date_format' => ''));
        }
        if ($author == 'yes') {
            newsroom_elated_get_module_template_part('templates/parts/post-info/post-info-author', 'blog');
        }
        if ($like == 'yes') {
            newsroom_elated_get_module_template_part('templates/parts/post-info/post-info-like', 'blog');
        }
        if ($count == 'yes') {
            newsroom_elated_get_module_template_part('templates/parts/post-info/post-info-count', 'blog');
        }
        if ($comments == 'yes') {
            newsroom_elated_get_module_template_part('templates/parts/post-info/post-info-comments', 'blog');
        }
        if ($share == 'yes') {
            newsroom_elated_get_module_template_part('templates/parts/post-info/post-info-share', 'blog', '', array('type' => 'dropdown'));
        }
    }
}

if (!function_exists('newsroom_elated_post_info_date')) {
    /**
     * Function that loads parts of blog post date info section
     *
     * @param $config array of sections to load
     */
    function newsroom_elated_post_info_date($config) {
        $default_config = array(
            'date' => '',
            'date_format' => ''
        );

        $params = (shortcode_atts($default_config, $config));

        if ($params['date'] == 'yes') {
            newsroom_elated_get_module_template_part('templates/parts/post-info/post-info-date', 'blog', '', $params);
        }
    }
}

if (!function_exists('newsroom_elated_post_info_category')) {
    /**
     * Function that loads parts of blog post category info section
     *
     * @param $config array of sections to load
     */
    function newsroom_elated_post_info_category($config) {
        $default_config = array(
            'category' => ''
        );

        $params = (shortcode_atts($default_config, $config));

        if ($params['category'] == 'yes') {
            newsroom_elated_get_module_template_part('templates/parts/post-info/post-info-category', 'blog', '', $params);
        }
    }
}

if (!function_exists('newsroom_elated_post_info_author')) {
    /**
     * Function that loads parts of blog post author info section
     *
     * @param $config array of sections to load
     */
    function newsroom_elated_post_info_author($config) {
        $default_config = array(
            'author' => ''
        );

        $params = (shortcode_atts($default_config, $config));

        if ($params['author'] == 'yes') {
            newsroom_elated_get_module_template_part('templates/parts/post-info/post-info-author', 'blog', '', $params);
        }
    }
}

if (!function_exists('newsroom_elated_post_info_comments')) {
    /**
     * Function that loads parts of blog post comments info section
     *
     * @param $config array of sections to load
     */
    function newsroom_elated_post_info_comments($config) {
        $default_config = array(
            'comments' => ''
        );

        $params = (shortcode_atts($default_config, $config));

        if ($params['comments'] == 'yes') {
            newsroom_elated_get_module_template_part('templates/parts/post-info/post-info-comments', 'blog', '', $params);
        }
    }
}

if (!function_exists('newsroom_elated_post_info_like')) {
    /**
     * Function that loads parts of blog post author info section
     *
     * @param $config array of sections to load
     */
    function newsroom_elated_post_info_like($config) {
        $default_config = array(
            'like' => ''
        );

        $params = (shortcode_atts($default_config, $config));

        if ($params['like'] == 'yes') {
            newsroom_elated_get_module_template_part('templates/parts/post-info/post-info-like', 'blog', '', $params);
        }
    }
}

if (!function_exists('newsroom_elated_post_info_count')) {
    /**
     * Function that loads parts of blog post author info section
     *
     * @param $config array of sections to load
     */
    function newsroom_elated_post_info_count($config) {
        $default_config = array(
            'count' => ''
        );

        $params = (shortcode_atts($default_config, $config));

        if ($params['count'] == 'yes') {
            newsroom_elated_get_module_template_part('templates/parts/post-info/post-info-count', 'blog', '', $params);
        }
    }
}

if (!function_exists('newsroom_elated_post_info_share')) {
    /**
     * Function that loads parts of blog post share info section
     *
     * @param $config array of sections to load
     */
    function newsroom_elated_post_info_share($config) {
        $default_config = array(
            'share' => '',
            'type' => 'dropdown',
        );

        $params = (shortcode_atts($default_config, $config));

        if ($params['share'] == 'yes') {
            newsroom_elated_get_module_template_part('templates/parts/post-info/post-info-share', 'blog', '', $params);
        }
    }
}

if (!function_exists('newsroom_elated_post_info_type')) {
    /**
     * Function that loads parts of blog post type icon section
     *
     * @param $config array of sections to load
     */
    function newsroom_elated_post_info_type($config) {
        $default_config = array(
            'icon' => '',
            'size' => '',
        );

        $params = (shortcode_atts($default_config, $config));

        $params['post_type'] = get_post_format() ? 'eltd-post-' . get_post_format() : 'eltd-post-standard';

        if ($params['post_type'] == 'eltd-post-video') {
            $params['video_link'] = newsroom_elated_get_single_blog_video_link(get_the_ID());
        }

        if ($params['icon'] == 'yes') {
            newsroom_elated_get_module_template_part('templates/parts/post-info/post-info-icon-type', 'blog', '', $params);
        }
    }
}

if (!function_exists('newsroom_elated_get_single_blog_video_link')) {

    function newsroom_elated_get_single_blog_video_link($postID) {
        $_video_type = get_post_meta($postID, "eltd_video_type_meta", true);

        $video_link = '';

        if ($_video_type == "social_networks") {
            $video_link = esc_attr(get_post_meta(get_the_ID(), "eltd_post_video_link_meta", true));
        } elseif ($_video_type == "self") {
            $video_link = esc_url(get_post_meta(get_the_ID(), "eltd_post_video_mp4_link_meta", true)) . '?iframe=true';
        }

        return $video_link;
    }
}

if (!function_exists('newsroom_elated_excerpt')) {
    /**
     * Function that cuts post excerpt to the number of word based on previosly set global
     * variable $word_count, which is defined in eltd_set_blog_word_count function.
     *
     * It current post has read more tag set it will return content of the post, else it will return post excerpt
     *
     */
    function newsroom_elated_excerpt($excerpt_length) {
        global $post;

        if (post_password_required()) {
            echo get_the_password_form();
        } //does current post has read more tag set?
        elseif (newsroom_elated_post_has_read_more()) {
            global $more;

            //override global $more variable so this can be used in blog templates
            $more = 0;
            the_content(true);
        } //is word count set to something different that 0?
        elseif ($excerpt_length != '0') {
            //if word count is set and different than empty take that value, else that general option from theme options
            $word_count = '45';
            if (isset($excerpt_length) && $excerpt_length != "") {
                $word_count = $excerpt_length;
            } elseif (newsroom_elated_options()->getOptionValue('number_of_chars') != '') {
                $word_count = esc_attr(newsroom_elated_options()->getOptionValue('number_of_chars'));
            }
            //if post excerpt field is filled take that as post excerpt, else that content of the post
            $post_excerpt = $post->post_excerpt != "" ? $post->post_excerpt : strip_tags($post->post_content);

            //remove leading dots if those exists
            $clean_excerpt = strlen($post_excerpt) && strpos($post_excerpt, '...') ? strstr($post_excerpt, '...', true) : $post_excerpt;

            //if clean excerpt has text left
            if ($clean_excerpt !== '') {
                //explode current excerpt to words
                $excerpt_word_array = explode(' ', $clean_excerpt);

                //cut down that array based on the number of the words option
                $excerpt_word_array = array_slice($excerpt_word_array, 0, $word_count);

                //and finally implode words together
                $excerpt = implode(' ', $excerpt_word_array);

                //is excerpt different than empty string?
                if ($excerpt !== '') {
                    echo '<p class="eltd-post-excerpt">' . wp_kses_post($excerpt) . '</p>';
                }
            }
        }
    }
}

if (!function_exists('newsroom_elated_layout_background_pattern')) {
    /**
     * Function that loads background pattern
     *
     * @param $config array of sections to load
     */
    function newsroom_elated_layout_background_pattern($config) {
        $default_config = array(
            'background_pattern' => ''
        );

        $params = (shortcode_atts($default_config, $config));

        if ($params['background_pattern'] == 'yes') {
            newsroom_elated_get_module_template_part('templates/lists/block-and-layout/pattern-background', 'blog', '', $params);
        }
    }
}

if (!function_exists('newsroom_elated_get_blog_single')) {

    /**
     * Function which return holder for single posts
     *
     * @return single holder.php template
     */

    function newsroom_elated_get_blog_single() {
        $sidebar = newsroom_elated_sidebar_layout();

        $params = array(
            "sidebar" => $sidebar
        );

        newsroom_elated_get_module_template_part('templates/single/holder', 'blog', '', $params);
    }
}

if (!function_exists('newsroom_elated_get_single_title_html')) {

    /**
     * Function return header and post info on single.php page
     *
     *
     * @return single.php html
     */
    function newsroom_elated_get_single_title_html() {

        $params = array();

        $display_category = 'yes';
        if (newsroom_elated_options()->getOptionValue('blog_single_category') !== '') {
            $display_category = newsroom_elated_options()->getOptionValue('blog_single_category');
        }

        $display_date = 'yes';
        if (newsroom_elated_options()->getOptionValue('blog_single_date') !== '') {
            $display_date = newsroom_elated_options()->getOptionValue('blog_single_date');
        }

        $display_author = 'yes';
        if (newsroom_elated_options()->getOptionValue('blog_single_author') !== '') {
            $display_author = newsroom_elated_options()->getOptionValue('blog_single_author');
        }

        $display_comments = newsroom_elated_show_comments() ? 'yes' : 'no';

        $display_like = 'no';
        if (newsroom_elated_options()->getOptionValue('blog_single_like') !== '') {
            $display_like = newsroom_elated_options()->getOptionValue('blog_single_like');
        }

        $display_count = 'yes';
        if (newsroom_elated_options()->getOptionValue('blog_single_count') !== '') {
            $display_count = newsroom_elated_options()->getOptionValue('blog_single_count');
        }


        $params['post_type'] = get_post_format();
        if ($params['post_type'] === false) {
            $params['post_type'] = 'standard';
        };
        $params['display_category'] = $display_category;
        $params['display_date'] = $display_date;
        $params['display_author'] = $display_author;
        $params['display_comments'] = $display_comments;
        $params['display_like'] = $display_like;
        $params['display_count'] = $display_count;

        newsroom_elated_get_module_template_part('templates/single/parts/meta', 'blog', '', $params);
        newsroom_elated_get_module_template_part('templates/single/parts/title', 'blog', '', $params);
        newsroom_elated_get_module_template_part('templates/single/parts/share', 'blog', '', array('type' => 'dropdown'));
    }
}


if (!function_exists('newsroom_elated_get_single_html')) {

    /**
     * Function return all parts on single.php page
     *
     *
     * @return single.php html
     */
    function newsroom_elated_get_single_html() {

        $post_format = get_post_format();
        if ($post_format === false) {
            $post_format = 'standard';
        }

        $params = array();

        $display_category = 'yes';
        if (newsroom_elated_options()->getOptionValue('blog_single_category') !== '') {
            $display_category = newsroom_elated_options()->getOptionValue('blog_single_category');
        }

        $display_date = 'yes';
        if (newsroom_elated_options()->getOptionValue('blog_single_date') !== '') {
            $display_date = newsroom_elated_options()->getOptionValue('blog_single_date');
        }

        $display_author = 'yes';
        if (newsroom_elated_options()->getOptionValue('blog_single_author') !== '') {
            $display_author = newsroom_elated_options()->getOptionValue('blog_single_author');
        }

        $display_comments = 'yes';
        if (newsroom_elated_options()->getOptionValue('blog_single_comment') !== '') {
            $display_comments = newsroom_elated_options()->getOptionValue('blog_single_comment');
        }

        $display_like = 'no';
        if (newsroom_elated_options()->getOptionValue('blog_single_like') !== '') {
            $display_like = newsroom_elated_options()->getOptionValue('blog_single_like');
        }

        $display_count = 'yes';
        if (newsroom_elated_options()->getOptionValue('blog_single_count') !== '') {
            $display_count = newsroom_elated_options()->getOptionValue('blog_single_count');
        }

        $params['display_category'] = $display_category;
        $params['display_date'] = $display_date;
        $params['display_author'] = $display_author;
        $params['display_comments'] = $display_comments;
        $params['display_like'] = $display_like;
        $params['display_count'] = $display_count;

        newsroom_elated_get_single_title_html();

        newsroom_elated_get_module_template_part('templates/single/post-formats/' . $post_format, 'blog', '', $params);

        newsroom_elated_get_module_template_part('templates/single/parts/tags', 'blog');

        newsroom_elated_get_module_template_part('templates/single/parts/author-info', 'blog');

        newsroom_elated_get_module_template_part('templates/single/parts/single-navigation', 'blog');

        if (newsroom_elated_show_comments()) {
            comments_template('', true);
        }
    }
}

if (!function_exists('newsroom_elated_get_single_related_posts')) {

    /**
     * Function returns related posts on single.php page
     *
     *
     * @return single.php html
     */
    function newsroom_elated_get_single_related_posts() {

        $post_id = newsroom_elated_get_page_id();

        //Related posts
        $related_posts_params = array();
        $show_related = (newsroom_elated_options()->getOptionValue('blog_single_related_posts') == 'yes') ? true : false;
        if ($show_related) {
            $related_post_number = 6;
            $related_posts_options = array('posts_per_page' => $related_post_number);
            $related_posts_image_size = (newsroom_elated_options()->getOptionValue('blog_single_related_image_size') !== '') ? intval(newsroom_elated_options()->getOptionValue('blog_single_related_image_size')) : '';
            $related_posts_title_size = (newsroom_elated_options()->getOptionValue('blog_single_related_title_size') !== '') ? intval(newsroom_elated_options()->getOptionValue('blog_single_related_title_size')) : '35';
            $related_posts_params = array('related_posts' => newsroom_elated_get_related_post_type($post_id, $related_posts_options), 'related_posts_image_size' => $related_posts_image_size, 'related_posts_title_size' => $related_posts_title_size, 'related_posts_number' => $related_post_number);
        }

        if ($show_related) {
            newsroom_elated_get_module_template_part('templates/single/parts/related-posts', 'blog', '', $related_posts_params);
        }
    }
}

if (!function_exists('newsroom_elated_additional_post_items')) {

    /**
     * Function which return parts on single.php which are just below content
     *
     * @return single.php html
     */
    function newsroom_elated_additional_post_items() {

        $args_pages = array(
            'before' => '<div class="eltd-single-links-pages"><div class="eltd-single-links-pages-inner">',
            'after' => '</div></div>',
            'link_before' => '<span>',
            'link_after' => '</span>',
            'pagelink' => '%'
        );

        wp_link_pages($args_pages);
    }

    add_action('newsroom_elated_before_blog_article_closed_tag', 'newsroom_elated_additional_post_items');
}

if (!function_exists('newsroom_elated_additional_post_list_items')) {

    /**
     * Function which return parts on default blog list which are just below content
     *
     * @return tags html
     */
    function newsroom_elated_additional_post_list_items() {

        newsroom_elated_get_module_template_part('templates/lists/parts/tags', 'blog');

        $args_pages = array(
            'before' => '<div class="eltd-single-links-pages"><div class="eltd-single-links-pages-inner">',
            'after' => '</div></div>',
            'link_before' => '<span>',
            'link_after' => '</span>',
            'pagelink' => '%'
        );

        wp_link_pages($args_pages);

    }

    add_action('newsroom_elated_blog_list_tags', 'newsroom_elated_additional_post_list_items');
}


if (!function_exists('newsroom_elated_comment')) {

    /**
     * Function which modify default wordpress comments
     *
     * @return comments html
     */
    function newsroom_elated_comment($comment, $args, $depth) {

        $GLOBALS['comment'] = $comment;

        global $post;

        $is_pingback_comment = $comment->comment_type == 'pingback';
        $is_author_comment = $post->post_author == $comment->user_id;

        $comment_class = 'eltd-comment clearfix';

        if ($is_author_comment) {
            $comment_class .= ' eltd-post-author-comment';
        }

        if ($is_pingback_comment) {
            $comment_class .= ' eltd-pingback-comment';
        }
        ?>
        <li>
        <div class="<?php echo esc_attr($comment_class); ?>">
            <?php if (!$is_pingback_comment) { ?>
                <div class="eltd-comment-image"> <?php echo newsroom_elated_kses_img(get_avatar($comment, 90)); ?> </div>
            <?php } ?>
            <div class="eltd-comment-text-and-info">
                <div class="eltd-comment-info-and-links">
                    <h6 class="eltd-comment-name">
                        <?php if ($is_pingback_comment) {
                            esc_html_e('Pingback:', 'newsroom');
                        } ?>
                        <span class="eltd-comment-author"><?php echo wp_kses_post(get_comment_author_link()); ?></span>
                        <?php if ($is_author_comment) { ?>
                            <span class="eltd-comment-author-label"><?php esc_html_e('(Author)', 'newsroom'); ?></span>
                        <?php } ?>
                        <span class="eltd-comment-mark"><?php esc_html_e('/', 'newsroom'); ?></span>
                        <span class="eltd-comment-date"><?php comment_time(get_option('date_format')); ?></span>
                    </h6>
                </div>
                <?php if (!$is_pingback_comment) { ?>
                    <div class="eltd-comment-text">
                        <div class="eltd-text-holder" id="comment-<?php echo comment_ID(); ?>">
                            <?php comment_text(); ?>
                        </div>
                    </div>
                <?php } ?>
                <h6 class="eltd-comment-links">
                    <?php
                    comment_reply_link(array_merge($args, array('reply_text' => esc_html__('Reply', 'newsroom'), 'depth' => $depth, 'max_depth' => $args['max_depth'])));
                    ?>
                    <span class="eltd-comment-mark"><?php esc_html_e('/', 'newsroom'); ?></span>
                    <?php
                    edit_comment_link(esc_html__('Edit', 'newsroom'));
                    ?>
                </h6>
            </div>
        </div>
        <?php //li tag will be closed by WordPress after looping through child elements
        ?>
        <?php
    }
}

if (!function_exists('newsroom_elated_blog_archive_pages_classes')) {

    /**
     * Function which create classes for container in archive pages
     *
     * @return array
     */
    function newsroom_elated_blog_archive_pages_classes($blog_type) {

        $classes = array();
        if (in_array($blog_type, newsroom_elated_blog_full_width_types())) {
            $classes['holder'] = 'eltd-full-width';
            $classes['inner'] = 'eltd-full-width-inner';
        } elseif (in_array($blog_type, newsroom_elated_blog_grid_types())) {
            $classes['holder'] = 'eltd-container';
            $classes['inner'] = 'eltd-container-inner clearfix';
        }

        return $classes;
    }
}

if (!function_exists('newsroom_elated_blog_full_width_types')) {

    /**
     * Function which return all full width blog types
     *
     * @return array
     */
    function newsroom_elated_blog_full_width_types() {

        $types = array();

        return $types;
    }
}

if (!function_exists('newsroom_elated_blog_grid_types')) {

    /**
     * Function which return in grid blog types
     *
     * @return array
     */
    function newsroom_elated_blog_grid_types() {

        $types = array('standard', 'standard-whole-post', 'unique-category-layout', 'unique-author-layout', 'unique-tag-layout', 'unique-type');

        return $types;
    }
}

if (!function_exists('newsroom_elated_blog_types')) {

    /**
     * Function which return all blog types
     *
     * @return array
     */
    function newsroom_elated_blog_types() {

        $types = array_merge(newsroom_elated_blog_grid_types(), newsroom_elated_blog_full_width_types());

        return $types;
    }
}

if (!function_exists('newsroom_elated_blog_templates')) {

    /**
     * Function which return all blog templates names
     *
     * @return array
     */
    function newsroom_elated_blog_templates() {

        $templates = array();
        $grid_templates = newsroom_elated_blog_grid_types();
        $full_templates = newsroom_elated_blog_full_width_types();
        foreach ($grid_templates as $grid_template) {
            array_push($templates, 'blog-' . $grid_template);
        }
        foreach ($full_templates as $full_template) {
            array_push($templates, 'blog-' . $full_template);
        }

        return $templates;
    }
}

if (!function_exists('newsroom_elated_blog_lists_number_of_chars')) {

    /**
     * Function that return number of characters for different lists based on options
     *
     * @return int
     */
    function newsroom_elated_blog_lists_number_of_chars() {

        $number_of_chars = '';
        if (newsroom_elated_options()->getOptionValue('number_of_chars')) {
            $number_of_chars = newsroom_elated_options()->getOptionValue('number_of_chars');
        }

        return $number_of_chars;
    }
}

if (!function_exists('newsroom_elated_excerpt_length')) {

    /**
     * Function that changes excerpt length based on theme options
     * @param $length int original value
     * @return int changed value
     */
    function newsroom_elated_excerpt_length($length) {

        if (newsroom_elated_options()->getOptionValue('number_of_chars') !== '') {
            return esc_attr(newsroom_elated_options()->getOptionValue('number_of_chars'));
        } else {
            return 45;
        }
    }

    add_filter('excerpt_length', 'newsroom_elated_excerpt_length', 999);
}

if (!function_exists('newsroom_elated_post_has_read_more')) {

    /**
     * Function that checks if current post has read more tag set
     * @return int position of read more tag text. It will return false if read more tag isn't set
     */
    function newsroom_elated_post_has_read_more() {
        global $post;

        return strpos($post->post_content, '<!--more-->');
    }
}

if (!function_exists('newsroom_elated_post_has_title')) {

    /**
     * Function that checks if current post has title or not
     * @return bool
     */
    function newsroom_elated_post_has_title() {
        return get_the_title() !== '';
    }
}

if (!function_exists('newsroom_elated_modify_read_more_link')) {

    /**
     * Function that modifies read more link output.
     * Hooks to the_content_more_link
     * @return string modified output
     */
    function newsroom_elated_modify_read_more_link() {
        $link = '<div class="eltd-more-link-container">';
        $link .= newsroom_elated_get_button_html(array(
            'link' => get_permalink() . '#more-' . get_the_ID(),
            'text' => esc_html__('Continue reading', 'newsroom')
        ));

        $link .= '</div>';

        return $link;
    }

    add_filter('the_content_more_link', 'newsroom_elated_modify_read_more_link');
}

if (!function_exists('newsroom_elated_load_blog_assets')) {

    /**
     * Function that checks if blog assets should be loaded
     *
     * @see eltd_is_blog_template()
     * @see is_home()
     * @see is_single()
     * @see eltd_has_blog_shortcode()
     * @see is_archive()
     * @see is_search()
     * @see eltd_has_blog_widget()
     * @return bool
     */
    function newsroom_elated_load_blog_assets() {
        return newsroom_elated_is_blog_template() || is_home() || is_single() || is_archive() || is_search();
    }
}

if (!function_exists('newsroom_elated_is_blog_template')) {

    /**
     * Checks if current template page is blog template page.
     *
     * @param string current page. Optional parameter.
     *
     * @return bool
     *
     * @see newsroom_elated_get_page_template_name()
     */
    function newsroom_elated_is_blog_template($current_page = '') {

        if ($current_page == '') {
            $current_page = newsroom_elated_get_page_template_name();
        }

        $blog_templates = newsroom_elated_blog_templates();

        return in_array($current_page, $blog_templates);
    }
}

if (!function_exists('newsroom_elated_read_more_button')) {

    /**
     * Function that outputs read more button html if necessary.
     * It checks if read more button should be outputted only if option for given template is enabled and post does'nt have read more tag
     * and if post isn't password protected
     *
     * @param string $option name of option to check
     * @param string $class additional class to add to button
     *
     */
    function newsroom_elated_read_more_button($option = '', $class = '') {
        if ($option != '') {
            $show_read_more_button = newsroom_elated_options()->getOptionValue($option) == 'yes';
        } else {
            $show_read_more_button = 'yes';
        }
        if ($show_read_more_button && !newsroom_elated_post_has_read_more() && !post_password_required()) {
            echo newsroom_elated_get_button_html(array(
                'size' => '',
                'type' => 'solid',
                'link' => get_the_permalink(),
                'text' => esc_html__('Read More', 'newsroom'),
                'icon_pack' => 'ion_icons',
                'ion_icon' => 'ion-android-arrow-forward',
                'custom_class' => $class
            ));
        }
    }
}

if (!function_exists('newsroom_elated_update_post_count_views')) {

    function newsroom_elated_update_post_count_views() {
        $postID = newsroom_elated_get_page_id();
        if (is_singular('post')) {
            if (isset($_COOKIE['eltd-post-views_' . $postID])) {
                return;
            } else {
                $count = get_post_meta($postID, 'count_post_views', true);
                if ($count === '') {
                    update_post_meta($postID, 'count_post_views', 1);
                    setcookie('eltd-post-views_' . $postID, $postID, time() * 20, '/');
                } else {
                    $count++;
                    update_post_meta($postID, 'count_post_views', $count);
                    setcookie('eltd-post-views_' . $postID, $postID, time() * 20, '/');
                }
            }
        }
    }

    add_action('wp', 'newsroom_elated_update_post_count_views');
}

if (!function_exists('newsroom_elated_get_post_count_views')) {

    function newsroom_elated_get_post_count_views($postID) {
        $count = get_post_meta($postID, 'count_post_views', true);
        if ($count === '') {
            update_post_meta($postID, 'count_post_views', '0');
            return 0;
        }
        return $count;
    }
}

function newsroom_elated_taxonomy_custom_fields($tag) {
    $t_id = $tag->term_id; // Get the ID of the category you're editing  
    $term_meta = get_option("post_tax_term_$t_id");
    ?>

    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="shortcode"><?php esc_html_e('Template', 'newsroom'); ?></label>
        </th>
        <td>
            <select name="term_meta[template]" id="term_meta[template]">
                <option <?php if (isset($term_meta['template']) && $term_meta['template'] == '') {
                    echo "selected='selected'";
                } ?> value='default'><?php esc_html_e('Default', 'newsroom'); ?>
                </option>
                <option <?php if (isset($term_meta['template']) && $term_meta['template'] == 'type_standard') {
                    echo "selected='selected'";
                } ?> value='type_standard'><?php esc_html_e('Template Standard', 'newsroom'); ?>
                </option>
                <option <?php if (isset($term_meta['template']) && $term_meta['template'] == 'type1') {
                    echo "selected='selected'";
                } ?> value='type1'><?php esc_html_e('Template 1', 'newsroom'); ?>
                </option>
                <option <?php if (isset($term_meta['template']) && $term_meta['template'] == 'type2') {
                    echo "selected='selected'";
                } ?> value='type2'><?php esc_html_e('Template 2', 'newsroom'); ?>
                </option>
                <option <?php if (isset($term_meta['template']) && $term_meta['template'] == 'type3') {
                    echo "selected='selected'";
                } ?> value='type3'><?php esc_html_e('Template 3', 'newsroom'); ?>
                </option>
            </select>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="shortcode"><?php esc_html_e('Sidebar Layout', 'newsroom'); ?></label>
        </th>
        <td>
            <select name="term_meta[sidebar_layout]" id="term_meta[sidebar_layout]">
                <option <?php if (isset($term_meta['sidebar_layout']) && $term_meta['sidebar_layout'] == 'default') {
                    echo "selected='selected'";
                } ?> value='default'><?php esc_html_e('Default', 'newsroom'); ?>
                </option>
                <option <?php if (isset($term_meta['sidebar_layout']) && $term_meta['sidebar_layout'] == 'no-sidebar') {
                    echo "selected='selected'";
                } ?> value='no-sidebar'><?php esc_html_e('No Sidebar', 'newsroom'); ?>
                </option>
                <option <?php if (isset($term_meta['sidebar_layout']) && $term_meta['sidebar_layout'] == 'sidebar-33-right') {
                    echo "selected='selected'";
                } ?> value='sidebar-33-right'><?php esc_html_e('Sidebar 1/3 Right', 'newsroom'); ?>
                </option>
                <option <?php if (isset($term_meta['sidebar_layout']) && $term_meta['sidebar_layout'] == 'sidebar-25-right') {
                    echo "selected='selected'";
                } ?> value='sidebar-25-right'><?php esc_html_e('Sidebar 1/4 Right', 'newsroom'); ?>
                </option>
                <option <?php if (isset($term_meta['sidebar_layout']) && $term_meta['sidebar_layout'] == 'sidebar-33-left') {
                    echo "selected='selected'";
                } ?> value='sidebar-33-left'><?php esc_html_e('Sidebar 1/3 Left', 'newsroom'); ?>
                </option>
                <option <?php if (isset($term_meta['sidebar_layout']) && $term_meta['sidebar_layout'] == 'sidebar-25-left') {
                    echo "selected='selected'";
                } ?> value='sidebar-25-left'><?php esc_html_e('Sidebar 1/4 Left', 'newsroom'); ?>
                </option>
            </select>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="shortcode"><?php esc_html_e('Custom Sidebar To Display', 'newsroom'); ?></label>
        </th>
        <td>
            <select name="term_meta[custom_sidebar]" id="term_meta[custom_sidebar]">
                <option <?php if (isset($term_meta['custom_sidebar']) && $term_meta['custom_sidebar'] == '') {
                    echo "selected='selected'";
                } ?> value=''></option>
                <?php
                $custom_sidebars = newsroom_elated_get_custom_sidebars();
                foreach ($custom_sidebars as $key => $value) { ?>
                    <option <?php if (isset($term_meta['custom_sidebar']) && $term_meta['custom_sidebar'] == $key) {
                        echo "selected='selected'";
                    } ?> value='<?php echo esc_attr($key); ?>'><?php echo esc_attr($value); ?></option>
                <?php } ?>

            </select>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="shortcode"><?php esc_html_e('Template Settings', 'newsroom'); ?></label>
        </th>
    </tr>
    <tr>
        <th scope="row" valign="top">
            <label for="shortcode"><?php esc_html_e(' - Post Settings', 'newsroom'); ?></label>
            <p class="description"><?php esc_html_e('This options work only for Template 1, Template 2 or Template 3', 'newsroom'); ?></p>
        </th>
        <td>
            <div style="display: inline;">
                <label style="margin-right:5px" for="shortcode"><?php esc_html_e('Custom Image Width(px)', 'newsroom'); ?></label>
                <input style="width:100px" type="text" name="term_meta[thumb_image_width]" id="term_meta[thumb_image_width]" size="3" value="<?php if (isset($term_meta['thumb_image_width']) && $term_meta['thumb_image_width'] != '') {
                    echo esc_attr($term_meta['thumb_image_width']);
                } ?>">
            </div>
            <div style="display: inline;">
                <label style="margin-right:5px" for="shortcode"><?php esc_html_e('Custom Image Height(px)', 'newsroom'); ?></label>
                <input style="width:100px" type="text" name="term_meta[thumb_image_height]" id="term_meta[thumb_image_height]" size="3" value="<?php if (isset($term_meta['thumb_image_height']) && $term_meta['thumb_image_height'] != '') {
                    echo esc_attr($term_meta['thumb_image_height']);
                } ?>">
            </div>
            <div style="display: inline;">
                <label style="margin-right:5px" for="shortcode"><?php esc_html_e('Excerpt Length', 'newsroom'); ?></label>
                <input style="width:100px" type="text" name="term_meta[excerpt_length]" id="term_meta[excerpt_length]" size="3" value="<?php if (isset($term_meta['excerpt_length']) && $term_meta['excerpt_length'] != '') {
                    echo esc_attr($term_meta['excerpt_length']);
                } ?>">
            </div>
        </td>
    </tr>
    <tr>
        <th scope="row" valign="top">
            <label for="shortcode"><?php esc_html_e('Number of posts per page', 'newsroom'); ?></label>
        </th>
        <td>
            <input style="width:100px" type="text" name="term_meta[number_of_posts]" id="term_meta[number_of_posts]" size="3" value="<?php if (isset($term_meta['number_of_posts']) && $term_meta['number_of_posts'] != '') {
                echo esc_attr($term_meta['number_of_posts']);
            } ?>">
        </td>
    </tr>
    <?php
}

function newsroom_elated_save_taxonomy_custom_fields($term_id) {
    if (isset($_POST['term_meta'])) {
        $t_id = $term_id;
        $term_meta = get_option("post_tax_term_$t_id");

        $cat_keys = array_keys($_POST['term_meta']);
        foreach ($cat_keys as $key) {
            if (isset($_POST['term_meta'][$key])) {
                $term_meta[$key] = $_POST['term_meta'][$key];
            }
        }
        update_option("post_tax_term_$t_id", $term_meta);
    }
}

add_action('category_edit_form_fields', 'newsroom_elated_taxonomy_custom_fields', 10, 2);
add_action('edited_term', 'newsroom_elated_save_taxonomy_custom_fields', 10, 2);

?>