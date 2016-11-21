<div class="eltd-post-info-icon-holder eltd-<?php echo esc_attr($params['size']) ?>">
	<span class="eltd-post-info-icon-holder-table">
		<span class="eltd-post-info-icon-holder-cell">
            <?php
            if ($params['post_type'] == 'eltd-post-video') { ?>
                <a itemprop="image" href="<?php echo esc_url($video_link); ?>" data-rel="prettyPhoto">
                    <span class="eltd-post-info-icon <?php echo esc_attr($params['post_type']) ?>"></span>
                </a>
            <?php } else { ?>
                <span class="eltd-post-info-icon <?php echo esc_attr($params['post_type']) ?>"></span>
            <?php } ?>
		</span>
	</span>
</div>