<?php

$params = '';

if ($archive_type == 'category') {
    $posts_in_archive = $posts_in_category;
    $params .= ' category_id="' . $category_id . '"';
} elseif ($archive_type == 'author') {
    $posts_in_archive = '';
    $params .= ' author_id="' . $author_id . '"';
} elseif ($archive_type == 'tag') {
    $posts_in_archive = '';
    $params .= ' tag_slug="' . $tag_slug . '"';
}

if ($thumb_image_width != '' && $thumb_image_height != '') {
    $params .= ' thumb_image_size="custom_size"';
    $params .= ' thumb_image_width="' . $thumb_image_width . '"';
    $params .= ' thumb_image_height="' . $thumb_image_height . '"';
}

if ($excerpt_length != '') {
    $params .= ' excerpt_length="' . $excerpt_length . '"';
}

if (isset($title) && $title != '') {
    $params .= ' title="' . $title . '"';
}

if (isset($display_category) && $display_category != '') {
    $params .= ' display_category="' . $display_category . '"';
}


if ($template_type == "type_standard") {

    $params_first = '';
    $params_second = '';
    $params_third = '';
    $sidebar_params = '';

    $column_number = 1;
    $number_of_posts = 1;

    /* options for first element */

    $params_first .= ' category_id="' . $category_id . '"';

    $params_first .= ' number_of_posts="' . $number_of_posts . '"';

    $params_first .= ' title_tag="h4"';

    $params_second .= ' title_length="40"';

    $params_first .= ' thumb_image_size="custom_size"';

    $thumb_image_width = 591;
    $params_first .= ' thumb_image_width="' . $thumb_image_width . '"';

    $thumb_image_height = 376;
    $params_first .= ' thumb_image_height="' . $thumb_image_height . '"';

    /* options for second element */

    $params_second .= ' category_id="' . $category_id . '"';

    $params_second .= ' number_of_posts="' . $number_of_posts . '"';

    $params_second .= ' title_tag="h5"';

    $params_second .= ' title_length="45"';

    $params_second .= ' offset="1"';

    $thumb_image_width = 215;
    $params_second .= ' custom_thumb_image_width="' . $thumb_image_width . '"';

    $thumb_image_height = 180;
    $params_second .= ' custom_thumb_image_height="' . $thumb_image_height . '"';


    /* options for third element */

    $params_third .= ' category_id="' . $category_id . '"';

    $params_third .= ' number_of_posts="' . $number_of_posts . '"';

    $params_third .= ' title_tag="h2"';

    $params_third .= ' offset="2"';

    $params_third .= ' title_font_size="28px"';

    $params_third .= ' title_width="100"';

    $params_third .= ' padding_bottom="83"';


    /* options for bottom elements */

    $number_of_posts = '4';
    $params .= ' number_of_posts="' . $number_of_posts . '"';

    $column_number = 2;
    $params .= ' column_number="' . $column_number . '"';

    $params .= ' title_tag="h4"';

    $display_pagination = 'yes';
    $params .= ' display_pagination="' . $display_pagination . '"';

    $params .= ' pagination_type="' . $pagination_type . '"';

    $params .= ' offset="2"';

    /* options for sidebar */

    $number_of_posts = '4';
    $sidebar_params .= ' number_of_posts="' . $number_of_posts . '"';

    $column_number = 1;
    $sidebar_params .= ' column_number="' . $column_number . '"';

    $sidebar_params .= ' title_tag="h6"';

    $sidebar_params .= ' display_excerpt="no"';

    $sidebar_params .= ' sort="popular"';

    $sidebar_params .= ' thumb_image_size="custom_size"';

    $thumb_image_width = 80;
    $sidebar_params .= ' thumb_image_width="' . $thumb_image_width . '"';

    $thumb_image_height = 80;
    $sidebar_params .= ' thumb_image_height="' . $thumb_image_height . '"';

} elseif ($template_type == "type1") {

    if ($posts_in_archive > 8 || $posts_in_archive == '') {
        $per_page = $posts_per_page !== 0 ? $posts_per_page : 8;
        $number_of_posts = $per_page;
        $params .= ' number_of_posts="' . $number_of_posts . '"';
    } else {
        $number_of_posts = $posts_in_archive;
        $params .= ' number_of_posts="' . $number_of_posts . '"';
    }

    $params .= ' title_length="40"';

    $column_number = 2;
    $params .= ' column_number="' . $column_number . '"';

    $display_pagination = 'yes';
    $params .= ' display_pagination="' . $display_pagination . '"';

    $params .= ' pagination_type="' . $pagination_type . '"';

    $extra_class_name = 'unique-category-template-one';
    $params .= ' extra_class_name="' . $extra_class_name . '"';

} else if ($template_type == "type2") {

    if ($posts_in_archive > 9 || $posts_in_archive == '') {
        $per_page = $posts_per_page !== 0 ? $posts_per_page : 9;
        $number_of_posts = $per_page;
        $params .= ' number_of_posts="' . $number_of_posts . '"';
    } else {
        $number_of_posts = $posts_in_archive;
        $params .= ' number_of_posts="' . $number_of_posts . '"';
    }

    $params .= ' title_length="40"';

    $column_number = 3;
    $params .= ' column_number="' . $column_number . '"';

    $display_pagination = 'yes';
    $params .= ' display_pagination="' . $display_pagination . '"';

    $params .= ' pagination_type="' . $pagination_type . '"';

    $extra_class_name = 'unique-category-template-two';
    $params .= ' extra_class_name="' . $extra_class_name . '"';

} else if ($template_type == "type3") {

    if ($posts_in_archive > 4 || $posts_in_archive == '') {
        $per_page = $posts_per_page !== 0 ? $posts_per_page : 4;
        $number_of_posts = $per_page;
        $params .= ' number_of_posts="' . $number_of_posts . '"';
    } else {
        $number_of_posts = $posts_in_archive;
        $params .= ' number_of_posts="' . $number_of_posts . '"';
    }

    $column_number = 1;
    $params .= ' column_number="' . $column_number . '"';

    $display_excerpt = 'yes';
    $params .= ' display_excerpt="' . $display_excerpt . '"';

    $display_pagination = 'yes';
    $params .= ' display_pagination="' . $display_pagination . '"';

    $params .= ' pagination_type="' . $pagination_type . '"';

    $extra_class_name = 'unique-category-template-three';
    $params .= ' extra_class_name="' . $extra_class_name . '"';

}

if ($template_type == 'type_standard') { ?>
    <div class="eltd-unique-category-layout clearfix eltd-unique-template-standard">
        <div class="eltd-two-columns-7-5">
            <div class="eltd-two-columns-inner">
                <div class="eltd-column">
                    <div class="eltd-column-inner">
                        <?php echo do_shortcode("[eltd_post_layout_one $params_first]"); // XSS OK ?>
                    </div>
                </div>
                <div class="eltd-column">
                    <div class="eltd-column-inner">
                        <?php echo do_shortcode("[eltd_post_layout_two $params_second]"); // XSS OK ?>
                        <?php echo do_shortcode("[eltd_post_layout_three $params_third]"); // XSS OK ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="eltd-two-columns-1-2">
            <div class="eltd-two-columns-inner">
                <div class="eltd-column">
                    <div class="eltd-column-inner">
                        <?php echo do_shortcode("[eltd_post_layout_one $params]"); // XSS OK ?>
                    </div>
                </div>
                <div class="eltd-column">
                    <?php get_sidebar() ?>
                </div>
            </div>
        </div>
    </div>


<?php } else { ?>

    <div class="eltd-unique-category-layout clearfix">
        <?php
        switch ($template_type) {
            case 'type1':
                echo do_shortcode("[eltd_post_layout_one $params]"); // XSS OK
                break;
            case 'type2':
                echo do_shortcode("[eltd_post_layout_one $params]"); // XSS OK
                break;
            case 'type3':
                echo do_shortcode("[eltd_post_layout_one $params]"); // XSS OK
                break;
            default :
                break;
        }
        ?>
    </div>

<?php }