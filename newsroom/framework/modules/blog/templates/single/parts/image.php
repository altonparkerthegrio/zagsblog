<?php

$display_custom_feature_image_width = '';
if(newsroom_elated_options()->getOptionValue('blog_single_feature_image_max_width') !== ''){
	$display_custom_feature_image_width = intval(newsroom_elated_options()->getOptionValue('blog_single_feature_image_max_width'));
}
?>
<?php if ( has_post_thumbnail() ) { ?>
	<div class="eltd-post-image">
		<?php if($display_custom_feature_image_width !== '') {
			the_post_thumbnail(array($display_custom_feature_image_width, 0));
		} else {
			the_post_thumbnail('newsroom_elated_post_feature_image');
		} ?>
	</div>
<?php } ?>