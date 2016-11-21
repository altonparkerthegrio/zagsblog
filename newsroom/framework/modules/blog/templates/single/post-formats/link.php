<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="eltd-post-content">
        <div class="eltd-post-text">
            <div class="eltd-post-text-inner clearfix">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
    <?php do_action('newsroom_elated_before_blog_article_closed_tag'); ?>
</article>