<?php if(newsroom_elated_options()->getOptionValue('blog_single_tags') == 'yes' && has_tag()){ ?>
	<div class="eltd-single-tags-holder">
		<h6 class="eltd-single-tags-title"><?php esc_html_e('POST TAGS:', 'newsroom'); ?></h6>
		<div class="eltd-tags">
			<?php the_tags('', '', ''); ?>
		</div>
	</div>
<?php } ?>