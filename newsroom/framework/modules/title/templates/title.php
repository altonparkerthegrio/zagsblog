<?php do_action('newsroom_elated_before_page_title'); ?>

<!-- Zagsblog Leaderboard 1 -->
<style>
.zagsblog_leaderboard_1 { text-align:center;margin: 0 auto;margin-top:10px;margin-bottom: 10px; }

</style>

<!-- /78528705/ZAGSBLOG-Multisize-Mobile_320x50 -->
<div id='div-gpt-ad-1477973619953-15' class="zagsblog_leaderboard_1 hide-desk">
<script>

googletag.cmd.push(function() { googletag.display('div-gpt-ad-1477973619953-15');
	googletag.pubads().refresh([adtag15]);
});
</script>
</div>
<!-- /78528705/ZAGSBLOG-Multisize-728x90 -->
<div id='div-gpt-ad-1477973619953-7' class="zagsblog_leaderboard_1 hide-mob">
<script>

googletag.cmd.push(function() { googletag.display('div-gpt-ad-1477973619953-7');
	googletag.pubads().refresh([adtag7]);
 });
</script>
</div>
<?php if($show_title_area) { ?>
    <?php switch ($type) {
        case 'standard': ?>
            <div class="eltd-grid">
                <div class="eltd-title eltd-breadcrumbs-type <?php echo newsroom_elated_title_classes(); ?>" style="<?php echo esc_attr($title_height); echo esc_attr($title_background_color);echo esc_attr($title_background_image); ?>" data-height="<?php echo esc_attr(intval(preg_replace('/[^0-9]+/', '', $title_height), 10)); ?>" <?php echo esc_attr($title_background_image_width); ?>>
                    <div class="eltd-title-image"><?php if ($title_background_image_src != "") { ?><img itemprop="image" src="<?php echo esc_url($title_background_image_src); ?>" alt="&nbsp;" /> <?php } ?></div>
                    <div class="eltd-title-holder" <?php newsroom_elated_inline_style($title_holder_height); ?>>
                        <div class="eltd-container clearfix">
                            <div class="eltd-container-inner">
                                <div class="eltd-title-subtitle-holder" style="<?php echo esc_attr($title_subtitle_holder_padding); echo esc_attr($title_border_color); ?>">
                                    <div class="eltd-title-subtitle-holder-inner">
                                        <h1 class="eltd-title-text" <?php newsroom_elated_inline_style($title_color); ?>><span><?php newsroom_elated_title_text(); ?></span></h1>
                                        <?php if ($enable_breadcrumbs) { ?>
                                            <div class="eltd-breadcrumbs-holder"> <?php newsroom_elated_custom_breadcrumbs(); ?></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php break;
        case 'breadcrumb': ?>
            <div class="eltd-title eltd-breadcrumbs-type <?php echo newsroom_elated_title_classes(); ?>" style="<?php echo esc_attr($title_height); echo esc_attr($title_background_color); echo esc_attr($title_background_image); ?>" data-height="<?php echo esc_attr(intval(preg_replace('/[^0-9]+/', '', $title_height), 10)); ?>" <?php echo esc_attr($title_background_image_width); ?>>
                <div class="eltd-title-image"><?php if ($title_background_image_src != "") { ?><img src="<?php echo esc_url($title_background_image_src); ?>" alt="&nbsp;" /> <?php } ?></div>
                <div class="eltd-title-holder" <?php newsroom_elated_inline_style($title_holder_height); ?>>
                    <div class="eltd-breadcrumbs-holder"><div class="eltd-breadcrumbs-holder-inner"><?php newsroom_elated_custom_breadcrumbs(); ?></div>
                    </div>
                </div>
            </div>
        <?php break;
    } ?>
<?php } ?>
<?php do_action('newsroom_elated_after_page_title'); ?>