<?php
$audio_link = get_post_meta(get_the_ID(), "eltd_post_audio_link_meta", true);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="eltd-post-content">
        <?php if ($audio_link !== ''){ ?>
            <div class="eltd-post-image-area">
                <?php newsroom_elated_get_module_template_part('templates/parts/audio', 'blog'); ?>
            </div>
        <?php } ?>
        <div class="eltd-post-text">
            <div class="eltd-post-text-inner clearfix">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
    <?php do_action('newsroom_elated_before_blog_article_closed_tag'); ?>
</article>

