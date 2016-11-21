<?php if(newsroom_elated_options()->getOptionValue('blog_single_navigation') == 'yes'){ ?>
	<?php $navigation_blog_through_category = newsroom_elated_options()->getOptionValue('blog_navigation_through_same_category') ?>
	<div class="eltd-blog-single-navigation">
		<?php if(get_previous_post() != ""){
			if($navigation_blog_through_category == 'yes'){
				if(get_previous_post(true) != ""){
					$prev_post = get_previous_post(true);
					$prev_post_title = '';
					if($prev_post->post_title != '') {
						$prev_post_title = $prev_post->post_title;
					}
				}
			} else {
				if(get_previous_post() != ""){
					$prev_post = get_previous_post();
					$prev_post_title = '';
					if($prev_post->post_title != '') {
						$prev_post_title = $prev_post->post_title;
					}
				}
			}
			$prev_html = '<div class="eltd-blog-single-navigation-arrow"><span class="ion-android-arrow-back"></span></div><h5>'.esc_html($prev_post_title).'</h5>';
			?>
			<div class="eltd-blog-single-prev">
				<?php
				if($navigation_blog_through_category == 'yes'){
					previous_post_link('%link', $prev_html, true,'','category');

				} else {
					previous_post_link('%link',$prev_html);
				}
				?>
			</div>
		<?php } ?>
		<?php if(get_next_post() != ""){
			if($navigation_blog_through_category == 'yes'){
				if(get_next_post(true) != ""){
					$next_post = get_next_post(true);
					$next_post_title = '';
					if($next_post->post_title != '') {
						$next_post_title = $next_post->post_title;
					}
				}
			} else {
				if(get_next_post() != ""){
					$next_post = get_next_post();
					$next_post_title = '';
					if($next_post->post_title != '') {
						$next_post_title = $next_post->post_title;
					}
				}
			}
			$next_html = '<h5>'.esc_html($next_post_title).'</h5><div class="eltd-blog-single-navigation-arrow"><span class="ion-android-arrow-forward"></span></div>';
			?>
			<div class="eltd-blog-single-next">
				<?php
				if($navigation_blog_through_category == 'yes'){
					next_post_link('%link', $next_html, true,'','category');
				} else {
					next_post_link('%link',$next_html);
				}
				?>
			</div>
		<?php } ?>
	</div>
<?php } ?>