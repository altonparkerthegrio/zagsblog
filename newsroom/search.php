<?php $sidebar = newsroom_elated_sidebar_layout(); ?>
<?php get_header(); ?>
<?php 
$blog_page_range = newsroom_elated_get_blog_page_range();
$max_number_of_pages = newsroom_elated_get_max_number_of_pages();
$custom_thumb_image_width = 151;
$custom_thumb_image_height = 118;

if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }

$enable_search_page_sidebar = true;
if(newsroom_elated_options()->getOptionValue('enable_search_page_sidebar') === "no"){
	$enable_search_page_sidebar = false;
}
?>
<?php newsroom_elated_get_title(); ?>
	<div class="eltd-container">
		<?php do_action('newsroom_elated_after_container_open'); ?>
		<div class="eltd-container-inner clearfix">
			<div class="eltd-container">
				<?php do_action('newsroom_elated_after_container_open'); ?>
				<div class="eltd-container-inner">
					<?php if($enable_search_page_sidebar) { ?>
					<div class="eltd-two-columns-66-33 eltd-content-has-sidebar clearfix">
						<div class="eltd-column1 eltd-content-left-from-sidebar">
							<div class="eltd-column-inner">
                                <div class="eltd-boxed-section">
                                    <div class="eltd-section-title-holder">
                                        <h2 class="eltd-search-results-holder eltd-st-title"><span><?php echo get_search_query() . esc_html__(' Search Results', 'newsroom') ?></span></h2>
                                        <form action="<?php echo esc_url(home_url('/')); ?>" class="eltd-search-page-form" method="get">
                                            <div class="eltd-form-holder">
                                                <div class="eltd-column-left">
                                                    <input type="text"  name="s" class="eltd-search-field" autocomplete="off" />
                                                </div>
                                                <div class="eltd-column-right">
                                                    <button class="eltd-search-submit" type="submit" value="Search"><span class="ion-ios-search"></span></button>
                                                </div>
                                            </div>
                                            
                                        </form>
                                    </div>
                                    <div class="eltd-boxed-section-subtitle">
                                        <span class="eltd-search-label"><?php esc_html_e("If you're not happy with the results, please do another search", 'newsroom'); ?></span>
                                    </div>
                                    <div class="eltd-boxed-section-inner">
					<?php } ?>
                                        <div class="eltd-search-page-holder">
                                            <?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>

                                            <article class="eltd-post-item eltd-pt-two-item">
                                                <div class="eltd-post-item-inner">

                                                    <?php if (has_post_thumbnail()) { ?>
                                                        <div class="eltd-pt-image-holder">
                                                            <div class="eltd-pt-image-holder-inner">
                                                                <a itemprop="url" class="eltd-pt-image-link" href="<?php echo esc_url(get_permalink()); ?>" target="_self" style="width:<?php echo newsroom_elated_filter_px($custom_thumb_image_width)?>px">
                                                                    <?php echo newsroom_elated_generate_thumbnail(get_post_thumbnail_id(get_the_ID()), null, $custom_thumb_image_width, $custom_thumb_image_height); ?>
                                                                </a>
                                                            </div><!-- .eltd-pt-image-holder-inner -->
                                                        </div><!-- .eltd-pt-image-holder -->
                                                    <?php } ?>


                                                    <div class="eltd-pt-content-holder">
                                                        <?php
                                                        newsroom_elated_post_info_category(array(
                                                            'category' => 'yes'
                                                        )); ?>

                                                        <h5 class="eltd-pt-title">
                                                            <a itemprop="url" class="eltd-pt-title-link" href="<?php echo esc_url(get_permalink()); ?>" target="_self">
                                                                <?php echo newsroom_elated_get_title_substring(get_the_title(), 60) ?>
                                                            </a>
                                                        </h5>

                                                        <?php
                                                        $my_excerpt = get_the_excerpt();

                                                        if ($my_excerpt != '') {

                                                            if ($my_excerpt != '') {
                                                                $my_excerpt = rtrim(substr($my_excerpt, 0, 150));
                                                            }
                                                            ?>
                                                        <div itemprop="description" class="eltd-pt-excerpt">
                                                            <p itemprop="description" class="eltd-post-excerpt"><?php echo esc_html($my_excerpt); ?>...</p>
                                                        </div>
                                                        <?php }
                                                        ?>

                                                        <div class="eltd-pt-meta-section clearfix">
                                                            <?php newsroom_elated_post_info_date(array(
                                                                'date' => 'yes',
                                                                'date_format' => 'F d'
                                                            )) ?>
                                                        </div><!-- .eltd-pt-meta-section -->

                                                    </div><!-- .eltd-pt-contnet-holder -->

                                                </div><!-- .eltd-post-item-inner -->
                                            </article><!-- .eltd-post-item -->

                                            <?php endwhile; ?>
                                            <?php
                                                if(newsroom_elated_options()->getOptionValue('pagination') == 'yes') {
                                                    newsroom_elated_pagination($max_number_of_pages, $blog_page_range, $paged);
                                                }
                                            ?>
                                            <?php else: ?>
                                            <div class="entry">
                                                <p><?php esc_html_e('No posts were found.', 'newsroom'); ?></p>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <?php do_action('newsroom_elated_page_after_content'); ?>
                            <?php if($enable_search_page_sidebar) { ?>
                                    </div>
                                </div>
                            </div>
						</div>
						<div class="eltd-column2">
							<?php get_sidebar(); ?>
						</div>
					</div>
					<?php } ?>
				<?php do_action('newsroom_elated_before_container_close'); ?>
				</div>
			</div>
		</div>
		<?php do_action('newsroom_elated_before_container_close'); ?>
	</div>
<?php get_footer(); ?>