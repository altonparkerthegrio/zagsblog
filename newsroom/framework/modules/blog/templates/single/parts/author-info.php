<?php
	$author_info_box = esc_attr(newsroom_elated_options()->getOptionValue('blog_author_info'));
	$author_info_email = esc_attr(newsroom_elated_options()->getOptionValue('blog_author_info_email'));
	$author_id = esc_attr(get_the_author_meta('ID'));
?>
<?php if($author_info_box === 'yes' && get_the_author_meta('description') != "") { ?>
	<div class="eltd-author-description">
		<div class="eltd-author-description-inner">
			<div class="eltd-author-description-image">
				<a itemprop="url" href="<?php echo esc_url(get_author_posts_url($author_id)); ?>" title="<?php the_title_attribute(); ?>" target="_self">
					<?php echo newsroom_elated_kses_img(get_avatar(get_the_author_meta( 'ID' ), 145)); ?>
				</a>	
			</div>
			<div class="eltd-author-description-text-holder">
				<h6 class="eltd-author-name vcard author">
					<span><?php esc_html_e('Written by', 'newsroom'); ?></span>
					<a itemprop="url" href="<?php echo esc_url(get_author_posts_url($author_id)); ?>" title="<?php the_title_attribute(); ?>" target="_self">
						<?php
							if(get_the_author_meta('first_name') != "" || get_the_author_meta('last_name') != "") {
								echo esc_attr(get_the_author_meta('first_name')) . " " . esc_attr(get_the_author_meta('last_name'));
							} else {
								echo esc_attr(get_the_author_meta('display_name'));
							}
						?>
					</a>	
				</h6>
				<?php if($author_info_email === 'yes' && is_email(get_the_author_meta('email'))){ ?>
					<p class="eltd-author-email"><?php echo sanitize_email(get_the_author_meta('email')); ?></p>
				<?php } ?>
				<?php if(get_the_author_meta('description') != "") { ?>
					<div class="eltd-author-text">
						<p><?php echo esc_attr(get_the_author_meta('description')); ?></p>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>