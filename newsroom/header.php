<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php
    /**
     * @see newsroom_elated_header_meta() - hooked with 10
     * @see eltd_user_scalable - hooked with 10
     */
    ?>
	<?php do_action('newsroom_elated_header_meta'); ?>

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
<?php newsroom_elated_get_side_area(); ?>
<div class="eltd-wrapper">
    <div class="eltd-wrapper-inner">
        <?php 
        $id = newsroom_elated_get_page_id();
        if(newsroom_elated_get_meta_field_intersect('uncovering_footer', $id ) == 'yes') { ?>
            <div id="eltd-content-wrapper">
            <!-- needed for uncovering footer effect -->
        <?php } ?>

        <?php newsroom_elated_get_header(); ?>

        <?php if(newsroom_elated_options()->getOptionValue('show_back_button') == "yes") { ?>
            <a id='eltd-back-to-top'  href='#'>
                <span class="eltd-icon-stack eltd-front-side">
                     <span aria-hidden="true" class="eltd-icon-font-elegant arrow_carrot-2up "></span>
                </span>
                <span class="eltd-icon-stack eltd-back-side">
                     <span aria-hidden="true" class="eltd-icon-font-elegant arrow_carrot-2up "></span>
                </span>
            </a>
        <?php } ?>

        <div class="eltd-content" <?php newsroom_elated_content_elem_style_attr(); ?>>
            <div class="eltd-content-inner">