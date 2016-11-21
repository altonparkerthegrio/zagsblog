<?php

$current_layout_selector = '.eltd-post-item.eltd-pt-three-item';
$layout_custom_class = (isset($layout_custom_class)) ? $layout_custom_class : '';
$layout_responsive_style = (isset($layout_responsive_style)) ? $layout_responsive_style : '';

?>

<section class="eltd-post-item eltd-pt-three-item">

    <?php newsroom_elated_layout_background_pattern(array(
        'background_pattern' => $display_background_pattern
    )) ?>

    <div class="<?php echo esc_attr($layout_custom_class); ?> eltd-post-item-inner clearfix" <?php newsroom_elated_inline_style($layout_style); ?>>

        <?php if (count($layout_responsive_style) > 0) { ?>
            <style type="text/css" data-type=eltd-layout-custom-bottom-padding" scoped>
                <?php if(!empty($layout_responsive_style['layout_bottom_padding_1280_1600'])){ ?>
                @media only screen and (min-width: 1280px) and (max-width: 1600px) {
                <?php echo esc_attr($current_layout_selector).' .'.esc_attr($layout_custom_class); ?> {
                    padding-bottom: <?php echo esc_attr($layout_responsive_style['layout_bottom_padding_1280_1600']); ?> !important;
                }
                }

                <?php } ?>
                <?php if(!empty($layout_responsive_style['layout_bottom_padding_1024_1280'])){ ?>
                @media only screen and (min-width: 1024px) and (max-width: 1280px) {
                <?php echo esc_attr($current_layout_selector).' .'.esc_attr($layout_custom_class); ?> {
                    padding-bottom: <?php echo esc_attr($layout_responsive_style['layout_bottom_padding_1024_1280']); ?> !important;
                }
                }

                <?php } ?>
                <?php if(!empty($layout_responsive_style['layout_bottom_padding_768_1024'])){ ?>
                @media only screen and (min-width: 768px) and (max-width: 1024px) {
                <?php echo esc_attr($current_layout_selector).' .'.esc_attr($layout_custom_class); ?> {
                    padding-bottom: <?php echo esc_attr($layout_responsive_style['layout_bottom_padding_768_1024']); ?> !important;
                }
                }

                <?php } ?>
                <?php if(!empty($layout_responsive_style['layout_bottom_padding_600_768'])){ ?>
                @media only screen and (min-width: 600px) and (max-width: 768px) {
                <?php echo esc_attr($current_layout_selector).' .'.esc_attr($layout_custom_class); ?> {
                    padding-bottom: <?php echo esc_attr($layout_responsive_style['layout_bottom_padding_600_768']); ?> !important;
                }
                }

                <?php } ?>
                <?php if(!empty($layout_responsive_style['layout_bottom_padding_480_600'])){ ?>
                @media only screen and (min-width: 480px) and (max-width: 600px) {
                <?php echo esc_attr($current_layout_selector).' .'.esc_attr($layout_custom_class); ?> {
                    padding-bottom: <?php echo esc_attr($layout_responsive_style['layout_bottom_padding_480_600']); ?> !important;
                }
                }

                <?php } ?>
                <?php if(!empty($layout_responsive_style['layout_bottom_padding_480'])){ ?>
                @media only screen and (max-width: 480px) {
                <?php echo esc_attr($current_layout_selector).' .'.esc_attr($layout_custom_class); ?> {
                    padding-bottom: <?php echo esc_attr($layout_responsive_style['layout_bottom_padding_480']); ?> !important;
                }
                }

                <?php } ?>
            </style>
        <?php } ?>

        <?php if (has_post_thumbnail() && $display_featured_image == 'yes') { ?>
            <div class="eltd-pt-image-holder">
                <a itemprop="url" class="eltd-pt-image-link" href="<?php echo esc_url(get_permalink()); ?>" target="_self">
                    <?php
                    if ($thumb_image_size != 'custom_size') {
                        echo get_the_post_thumbnail(get_the_ID(), $thumb_image_size);
                    } elseif ($thumb_image_width != '' && $thumb_image_height != '') {
                        echo newsroom_elated_generate_thumbnail(get_post_thumbnail_id(get_the_ID()), null, $thumb_image_width, $thumb_image_height);
                    }
                    ?>
                </a>
                <?php
                if ($display_post_type_icon == 'yes') {
                    newsroom_elated_post_info_type(array(
                        'icon' => 'yes',
                        'size' => $post_type_icon_size,
                    ));
                }
                ?>
            </div><!-- .eltd-pt-image-holder -->
        <?php } ?>

        <div class="eltd-pt-content-holder">

            <?php
            newsroom_elated_post_info_category(array(
                'category' => $display_category
            )); ?>

            <h2 class="eltd-pt-title" <?php newsroom_elated_inline_style($title_style); ?>>
                <a itemprop="url" class="eltd-pt-title-link" href="<?php echo esc_url(get_permalink()); ?>" target="_self"><?php echo newsroom_elated_get_title_substring(get_the_title(), $title_length) ?></a>
            </h2>

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

            <div class="eltd-pt-more-section">
                <?php
                if ($display_share == 'yes') {
                    newsroom_elated_post_info_share(array(
                        'share' => $display_share
                    ));
                }
                ?>
            </div><!-- .eltd-pt-more-section -->

        </div><!-- .eltd-pt-content-holder -->

    </div><!-- .eltd-post-item-inner -->
</section><!-- .eltd-post-item -->