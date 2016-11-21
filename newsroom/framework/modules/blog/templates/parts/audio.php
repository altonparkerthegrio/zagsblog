<?php $audio_type = get_post_meta(get_the_ID(), "eltd_audio_type_meta", true);
if ($audio_type == 'social_networks') {
    $audiolink = get_post_meta(get_the_ID(), "eltd_post_audio_link_meta", true);
    $embed = wp_oembed_get($audiolink);
    print $embed;
} else if ($audio_type == 'self') { ?>


    <?php if (has_post_thumbnail()) { ?>
        <div class="eltd-post-image">
            <a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php the_post_thumbnail('newsroom_elated_post_feature_image'); ?>
            </a>
        </div>
    <?php } ?>


    <div class="eltd-blog-audio-holder">
        <audio class="eltd-blog-audio" src="<?php echo esc_url(get_post_meta(get_the_ID(), "eltd_post_audio_mp3_link_meta", true)) ?>" controls="controls">
            <?php esc_html_e("Your browser don't support audio player", 'newsroom'); ?>
        </audio>
    </div>
<?php } ?>
