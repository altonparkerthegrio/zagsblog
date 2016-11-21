<?php if ($related_posts && $related_posts->have_posts()) : ?>

<div class="eltd-related-posts-holder clearfix">
    <div class="eltd-title-holder">
        <h2><?php esc_html_e('Related posts', 'newsroom'); ?></h2>
    </div>

    <div class="eltd-post-columns-<?php echo esc_attr($related_posts_number) ?>">
        <div class="eltd-post-columns-inner">

            <?php while ($related_posts->have_posts()): $related_posts->the_post(); ?>

                <section class="eltd-post-item eltd-pt-one-item">
                    <div class="eltd-post-item-inner">

                        <?php if (has_post_thumbnail()) { ?>
                            <div class="eltd-pt-image-holder">
                                <a itemprop="url" class="eltd-pt-image-link" href="<?php echo esc_url(get_permalink()); ?>" target="_self">
                                    <?php
                                    if ($related_posts_image_size == '') {
                                        echo get_the_post_thumbnail(get_the_ID(), 'newsroom_elated_square');
                                    } elseif ($related_posts_image_size != '' && $related_posts_image_size != '') {
                                        echo newsroom_elated_generate_thumbnail(get_post_thumbnail_id(get_the_ID()), null, $related_posts_image_size, $related_posts_image_size);
                                    }
                                    ?>
                                </a>
                            </div><!-- .eltd-pt-image-holder -->
                        <?php } ?>

                        <?php
                        newsroom_elated_post_info_category(array(
                            'category' => 'yes'
                        )); ?>

                        <div class="eltd-pt-title">
                            <h6>
                                <a itemprop="url" class="eltd-pt-title-link" href="<?php echo esc_url(get_permalink()); ?>" target="_self"><?php echo newsroom_elated_get_title_substring(get_the_title(), $related_posts_title_size) ?></a>
                            </h6>
                        </div>

                        <div class="eltd-pt-meta-section clearfix">
                            <?php newsroom_elated_post_info_date(array(
                                'date' => 'yes',
                            )) ?>
                        </div><!-- .eltd-pt-meta-section -->

                    </div><!-- .eltd-post-item-inner -->
                </section><!-- .eltd-post-item -->

            <?php endwhile; ?>
        </div>
    </div><!-- .eltd-related-posts-inner -->
</div><!-- .eltd-related-posts-holder -->
<?php endif;
wp_reset_postdata();
?>
