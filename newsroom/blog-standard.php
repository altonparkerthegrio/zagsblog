<?php
    /*
        Template Name: Blog: Standard
    */
?>
<?php get_header(); ?>
<?php newsroom_elated_get_title(); ?>
<?php get_template_part('slider'); ?>
<div class="eltd-container">
    <?php do_action('newsroom_elated_after_container_open'); ?>
    <div class="eltd-container-inner" >
        <?php newsroom_elated_get_blog('standard'); ?>
    </div>
    <?php do_action('newsroom_elated_before_container_close'); ?>
</div>
<?php get_footer(); ?>