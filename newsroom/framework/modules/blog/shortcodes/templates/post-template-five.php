<section class="eltd-post-item eltd-pt-five-item" style="background-image:url(<?php echo esc_url(the_post_thumbnail_url(get_the_ID(), 'full')); ?>);">
    <div class="eltd-grid">
        <div class="eltd-post-item-inner">

            <?php if ($display_post_type_icon == 'yes') {
                newsroom_elated_post_info_type(array(
                    'icon' => 'yes',
                    'size' => $post_type_icon_size,
                ));
            }
            ?>

            <?php
            newsroom_elated_post_info_category(array(
                'category' => $display_category
            )); ?>

            <h3 class="eltd-pt-title" <?php newsroom_elated_inline_style($title_style); ?>>
                <a itemprop="url" class="eltd-pt-title-link" href="<?php echo esc_url(get_permalink()); ?>" target="_self"><?php echo newsroom_elated_get_title_substring(get_the_title(), $title_length) ?></a>
            </h3>

            <?php if ($display_date == 'yes' || $display_author == 'yes' || $display_comments == 'yes' || $display_count == 'yes' || $display_like == 'yes') { ?>
                <div class="eltd-pt-meta-section clearfix">
                    <?php newsroom_elated_post_info_author(array(
                        'author' => $display_author
                    )) ?>
                    <?php newsroom_elated_post_info_date(array(
                        'date' => $display_date,
                        'date_format' => $date_format
                    )) ?>
                    <?php newsroom_elated_post_info_comments(array(
                        'comments' => $display_comments
                    )) ?>
                    <?php newsroom_elated_post_info_count(array(
                        'count' => $display_count
                    )); ?>
                    <?php newsroom_elated_post_info_like(array(
                        'like' => $display_like
                    )); ?>
                </div><!-- .eltd-pt-meta-section -->
            <?php } ?>

            <?php if ($display_excerpt == 'yes') { ?>
                <div itemprop="description" class="eltd-pt-excerpt">
                    <?php newsroom_elated_excerpt($excerpt_length); ?>
                </div>
            <?php } ?>

            <?php if ($display_share == 'yes' || $display_read_more == 'yes') { ?>
                <div class="eltd-pt-more-section">
                    <div class="eltd-pt-more-section-left">
                        <?php
                        if ($display_share == 'yes') {
                            newsroom_elated_post_info_share(array(
                                'share' => $display_share
                            ));
                        }
                        ?>
                    </div>
                    <div class="eltd-pt-more-section-right">
                        <?php if ($display_read_more == 'yes') {
                            newsroom_elated_read_more_button('', 'eltd-read-more');
                        } ?>
                    </div>
                </div><!-- .eltd-pt-more-section -->
            <?php } ?>

        </div><!-- .eltd-post-item-inner -->
    </div>
</section><!-- .eltd-post-item -->