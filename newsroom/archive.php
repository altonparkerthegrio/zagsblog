<?php
$blog_archive_pages_classes = newsroom_elated_blog_archive_pages_classes(newsroom_elated_get_default_blog_list());
?>
<?php get_header(); ?>
<?php newsroom_elated_get_title(); ?>
<div class="<?php echo esc_attr($blog_archive_pages_classes['holder']); ?>">
<?php do_action('newsroom_elated_after_container_open'); ?>
	<div class="<?php echo esc_attr($blog_archive_pages_classes['inner']); ?>">
		<?php newsroom_elated_get_blog(newsroom_elated_get_default_blog_list()); ?>
	</div>
<?php do_action('newsroom_elated_before_container_close'); ?>
</div>
<?php get_footer(); ?>