<section class="eltd-post-item eltd-pt-six-item">
    <div class="eltd-post-item-inner">

        <?php
        newsroom_elated_post_info_category(array(
            'category' => $display_category
        )); ?>

        <<?php echo esc_html($title_tag); ?> class="eltd-pt-title">
        <?php echo newsroom_elated_get_title_substring(get_the_title(), $title_length) ?>
    </<?php echo esc_html($title_tag) ?>>

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

    </div><!-- .eltd-post-item-inner -->
</section><!-- .eltd-post-item -->