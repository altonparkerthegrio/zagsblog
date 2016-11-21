<div class="eltd-bnl-navigation-holder">
    <div data-rel="<?php echo esc_attr($params['query_result']->max_num_pages) ?> " class="eltd-btn eltd-bnl-load-more eltd-load-more eltd-btn-solid">
        <?php echo get_next_posts_link( esc_html__('Show More', 'newsroom'), $params['query_result']->max_num_pages ) ?>
    </div>
    <div class="eltd-btn eltd-bnl-load-more-loading eltd-btn-solid">
        <a href="javascript: void(0)" class="">
            <?php echo esc_html__('LOADING...', 'newsroom') ?>
        </a>
    </div>
</div>