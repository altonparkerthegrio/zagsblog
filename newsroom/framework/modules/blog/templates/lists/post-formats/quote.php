<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="eltd-post-content <?php echo esc_attr($disable_bottom_padding) ?>">
		<div class="eltd-post-text">
			<div class="eltd-post-text-inner clearfix">

                <?php if($display_date == 'yes' || $display_author == 'yes' || $display_category == 'yes' || $display_comments == 'yes' || $display_like == 'yes'){ ?>
                    <div class="eltd-post-info clearfix">
                        <?php
                        newsroom_elated_post_info_category(array(
                            'category' => $display_category
                        ));
                        newsroom_elated_post_info_date(array(
                            'date' => $display_date
                        ));
                        newsroom_elated_post_info_author(array(
                            'author' => $display_author
                        ));
                        newsroom_elated_post_info_like(array(
                            'like' => $display_like
                        ));
                        newsroom_elated_post_info_comments(array(
                            'comments' => $display_comments
                        ));
                        ?>
                    </div>
                <?php } ?>

				<div class="eltd-post-title">
					<h2 class="eltd-quote-text"><?php the_title(); ?></h2>
                    <?php if(get_post_meta(get_the_ID(), "eltd_post_quote_author_meta", true) !== '') { ?>
					    <span class="eltd-quote-author">-<?php echo esc_html(get_post_meta(get_the_ID(), "eltd_post_quote_author_meta", true)); ?></span>
                    <?php } ?>
				</div>

				<a itemprop="url" class="eltd-post-quote-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
			</div>
		</div>

        <?php if ($display_share == 'yes' || $display_read_more == 'yes') { ?>
            <div class="eltd-pt-more-section" >

                <?php if ($display_share == 'yes') { ?>
                    <div class="eltd-pt-more-section-left">
                        <?php newsroom_elated_post_info_share(array(
                            'share' => $display_share
                        )); ?>
                    </div>
                <?php } ?>

                <?php if ($display_read_more) { ?>
                    <div class="eltd-pt-more-section-right">
                        <?php newsroom_elated_read_more_button(); ?>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
        
	</div>
	<?php do_action('newsroom_elated_before_blog_list_article_closed_tag'); ?>
</article>