<?php
/*
Template Name: WooCommerce
*/
?>
<?php

$id = get_option('woocommerce_shop_page_id');
$shop = get_post($id);
$sidebar = newsroom_elated_sidebar_layout();

if (get_post_meta($id, 'eltd_page_background_color_meta', true) != '') {
    $background_color = 'background-color: ' . esc_attr(get_post_meta($id, 'eltd_page_background_color_meta', true));
} else {
    $background_color = '';
}

$content_style = '';
if (get_post_meta($id, 'eltd_page_content_top_padding', true) != '') {
    if (get_post_meta($id, 'eltd_page_content_top_padding_mobile', true) == 'yes') {
        $content_style = 'padding-top:' . esc_attr(get_post_meta($id, 'eltd_page_content_top_padding', true)) . 'px !important';
    } else {
        $content_style = 'padding-top:' . esc_attr(get_post_meta($id, 'eltd_page_content_top_padding', true)) . 'px';
    }
}

if (get_query_var('paged')) {
    $paged = get_query_var('paged');
} elseif (get_query_var('page')) {
    $paged = get_query_var('page');
} else {
    $paged = 1;
}

get_header();
newsroom_elated_get_title();
if (!is_singular('product')) { ?>
    <div class="eltd-container" <?php newsroom_elated_inline_style($background_color); ?>>
        <div class="eltd-container-inner clearfix" <?php newsroom_elated_inline_style($content_style); ?>>
            <?php get_template_part('slider'); ?>
        </div>
    </div>
<?php }
?>

    <div class="eltd-container" <?php newsroom_elated_inline_style($background_color); ?>>
        <div class="eltd-container-inner clearfix" <?php newsroom_elated_inline_style($content_style); ?>>
            <?php
            //Woocommerce content
            if (!is_singular('product')) {

                switch ($sidebar) {
                    case 'sidebar-33-right': ?>
                        <div class="eltd-two-columns-66-33 eltd-content-has-sidebar eltd-woocommerce-with-sidebar clearfix">
                            <div class="eltd-column1">
                                <div class="eltd-column-inner">
                                    <?php newsroom_elated_woocommerce_content(); ?>
                                </div>
                            </div>
                            <div class="eltd-column2">
                                <?php get_sidebar(); ?>
                            </div>
                        </div>
                        <?php
                        break;
                    case 'sidebar-25-right': ?>
                        <div class="eltd-two-columns-75-25 eltd-content-has-sidebar eltd-woocommerce-with-sidebar clearfix">
                            <div class="eltd-column1 eltd-content-left-from-sidebar">
                                <div class="eltd-column-inner">
                                    <?php newsroom_elated_woocommerce_content(); ?>
                                </div>
                            </div>
                            <div class="eltd-column2">
                                <?php get_sidebar(); ?>
                            </div>
                        </div>
                        <?php
                        break;
                    case 'sidebar-33-left': ?>
                        <div class="eltd-two-columns-33-66 eltd-content-has-sidebar eltd-woocommerce-with-sidebar clearfix">
                            <div class="eltd-column1">
                                <?php get_sidebar(); ?>
                            </div>
                            <div class="eltd-column2">
                                <div class="eltd-column-inner">
                                    <?php newsroom_elated_woocommerce_content(); ?>
                                </div>
                            </div>
                        </div>
                        <?php
                        break;
                    case 'sidebar-25-left': ?>
                        <div class="eltd-two-columns-25-75 eltd-content-has-sidebar eltd-woocommerce-with-sidebar clearfix">
                            <div class="eltd-column1">
                                <?php get_sidebar(); ?>
                            </div>
                            <div class="eltd-column2 eltd-content-right-from-sidebar">
                                <div class="eltd-column-inner">
                                    <?php newsroom_elated_woocommerce_content(); ?>
                                </div>
                            </div>
                        </div>
                        <?php
                        break;
                    default:
                        newsroom_elated_woocommerce_content();
                }

            } else {
                newsroom_elated_woocommerce_content();
            } ?>

        </div>
    </div>

<?php newsroom_elated_woocommerce_related_products(); ?>

<?php get_footer(); ?>