<?php
$slider_shortcode = get_post_meta(newsroom_elated_get_page_id(), "eltd_page_slider_meta", true);
$slider_shortcode = apply_filters('newsroom_elated_slider_shortcode', $slider_shortcode);
if (!empty($slider_shortcode)) { ?>
	<div class="eltd-slider">
		<div class="eltd-slider-inner">
			<?php echo do_shortcode(wp_kses_post($slider_shortcode)); // XSS OK ?>
		</div>
	</div>
<?php } ?>