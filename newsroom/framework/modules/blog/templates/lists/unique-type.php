<?php

$template_type = newsroom_elated_options()->getOptionValue('blog_list_type');


$params = array();

if ($template_type == "type1") {

    $template_type_layout = 'post-template-one';

    $template_classes = "eltd-pl-one-holder eltd-post-columns-2";

    $params['thumb_image_size'] = '';
    $params['thumb_image_width'] = '';
    $params['thumb_image_height'] = '';

    $params['display_post_type_icon'] = 'no';
    $params['post_type_icon_size'] = 'small';

    $params['display_category'] = 'yes';

    $params['title_tag'] = 'h4';
    $params['title_length'] = '';
    $params['title_style'] = '';

    $params['display_date'] = 'yes';
    $params['date_format'] = 'F d';

    $params['display_comments'] = 'no';
    $params['display_count'] = 'no';
    $params['display_like'] = 'no';
    $params['display_author'] = 'no';

    $params['display_excerpt'] = 'no';
    $params['excerpt_length'] = '20';

    $params['display_share'] = 'no';
    $params['display_read_more'] = 'no';

} else if ($template_type == "type2") {

    $template_type_layout = 'post-template-one';

    $template_classes = "eltd-pl-six-holder eltd-post-columns-3";

    $params['thumb_image_size'] = '';
    $params['thumb_image_width'] = '';
    $params['thumb_image_height'] = '';

    $params['display_post_type_icon'] = 'no';
    $params['post_type_icon_size'] = 'small';

    $params['display_category'] = 'yes';

    $params['title_tag'] = 'h4';
    $params['title_length'] = '';
    $params['title_style'] = '';

    $params['display_date'] = 'yes';
    $params['date_format'] = 'F d';

    $params['display_comments'] = 'no';
    $params['display_count'] = 'no';
    $params['display_like'] = 'no';
    $params['display_author'] = 'no';

    $params['display_excerpt'] = 'no';
    $params['excerpt_length'] = '20';

    $params['display_share'] = 'no';
    $params['display_read_more'] = 'no';

} else if ($template_type == "type3") {

    $template_type_layout = 'post-template-one';

    $template_classes = "eltd-pl-one-holder eltd-post-columns-1";

    $params['thumb_image_size'] = '';
    $params['thumb_image_width'] = '';
    $params['thumb_image_height'] = '';

    $params['display_post_type_icon'] = 'no';
    $params['post_type_icon_size'] = 'small';

    $params['display_category'] = 'yes';

    $params['title_tag'] = 'h4';
    $params['title_length'] = '';
    $params['title_style'] = '';

    $params['display_date'] = 'yes';
    $params['date_format'] = 'F d';

    $params['display_comments'] = 'no';
    $params['display_count'] = 'no';
    $params['display_like'] = 'no';
    $params['display_author'] = 'no';

    $params['display_excerpt'] = 'no';
    $params['excerpt_length'] = '20';

    $params['display_share'] = 'no';
    $params['display_read_more'] = 'no';

}

?>

    <div class="eltd-unique-type clearfix">
        <?php
        if ($blog_query->have_posts()) { ?>
            <div class="eltd-bnl-holder <?php echo esc_attr($template_classes); ?>">
                <div class="eltd-bnl-outer">
                    <div class="eltd-bnl-inner">
                        <?php
                        while ($blog_query->have_posts()) : $blog_query->the_post();
                            echo newsroom_elated_get_list_shortcode_module_template_part($template_type_layout, 'templates', '', $params);
                        endwhile;
                        ?>
                    </div>
                </div>
            </div>
            <?php
        } else {
            newsroom_elated_get_module_template_part('templates/parts/no-posts', 'blog');
        }
        ?>
    </div>
<?php
if (newsroom_elated_options()->getOptionValue('pagination') == 'yes') {
    newsroom_elated_pagination($blog_query->max_num_pages, $blog_page_range, $paged);
}
?>