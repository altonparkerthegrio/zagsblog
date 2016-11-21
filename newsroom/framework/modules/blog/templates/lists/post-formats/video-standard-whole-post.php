<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="eltd-post-content <?php echo esc_attr($disable_bottom_padding) ?>">
        <div class="eltd-post-image-holder">
            <?php newsroom_elated_get_module_template_part('templates/parts/video', 'blog'); ?>
        </div>

        <?php newsroom_elated_post_info_category(array(
            'category' => $display_category)); ?>

        <?php newsroom_elated_get_module_template_part('templates/lists/parts/title', 'blog'); ?>

        <?php the_content(); ?>

        <?php if ($display_date == 'yes' || $display_author == 'yes' || $display_comments == 'yes' || $display_like == 'yes') { ?>
            <div class="eltd-post-info clearfix">
                <?php
                newsroom_elated_post_info_date(array(
                    'date' => $display_date
                ));
                newsroom_elated_post_info_author(array(
                    'author' => $display_author
                ));
                newsroom_elated_post_info_comments(array(
                    'comments' => $display_comments
                ));
                newsroom_elated_post_info_like(array(
                    'like' => $display_like
                ));
                ?>
            </div>
        <?php } ?>

        <?php newsroom_elated_excerpt($excerpt_length); ?>

        <?php if ($display_share == 'yes' || $display_read_more == 'yes') { ?>
            <div class="eltd-pt-more-section" >

                <?php if ($display_share == 'yes') { ?>
                    <div class="eltd-pt-more-section-left">
                        <?php newsroom_elated_post_info_share(array(
                            'share' => $display_share
                        )); ?>
                    </div>
                <?php } ?>

                <?php if ($display_read_more) { ?>
                    <div class="eltd-pt-more-section-right">
                        <?php newsroom_elated_read_more_button(); ?>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>


    </div>
    <?php do_action('newsroom_elated_before_blog_list_article_closed_tag'); ?>
</article>