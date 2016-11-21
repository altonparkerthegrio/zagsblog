<?php get_header(); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<?php newsroom_elated_get_title(); ?>
<?php get_template_part('slider'); ?>
	<div class="eltd-container">
		<?php do_action('newsroom_elated_after_container_open'); ?>
		<div class="eltd-container-inner">
			<?php newsroom_elated_get_blog_single(); ?>
		</div>
		<?php do_action('newsroom_elated_before_container_close'); ?>
	</div>
    <div class="eltd-container eltd-related-post-container">
        <div class="eltd-container-inner">
            <?php newsroom_elated_get_single_related_posts(); ?>
        </div>
    </div>
<?php endwhile; ?>
<?php endif; ?>
<!--<div id="infinity-river-single">
</div>-->
<?php get_footer(); ?>