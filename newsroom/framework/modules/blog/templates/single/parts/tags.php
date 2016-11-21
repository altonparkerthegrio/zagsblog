<?php if(newsroom_elated_options()->getOptionValue('blog_single_tags') == 'yes' ||
    (newsroom_elated_options()->getOptionValue('blog_single_share') == 'yes'
        && newsroom_elated_options()->getOptionValue('enable_social_share') == 'yes'
        && newsroom_elated_options()->getOptionValue('enable_social_share_on_post') == 'yes')){ ?>
<div class="eltd-single-tags-share-holder">
<?php } ?>

<?php if(newsroom_elated_options()->getOptionValue('blog_single_tags') == 'yes' && has_tag()){ ?>
    <div class="eltd-single-tags-holder">
        <h4 class="eltd-single-tags-title"><?php esc_html_e('Tags', 'newsroom'); ?></h4>
        <div class="eltd-tags">
            <?php the_tags('', '', ''); ?>
        </div>
    </div>
<?php } ?>

<?php if(newsroom_elated_options()->getOptionValue('blog_single_share') == 'yes' && newsroom_elated_options()->getOptionValue('enable_social_share') == 'yes' && newsroom_elated_options()->getOptionValue('enable_social_share_on_post') == 'yes'){ ?>
    <div class="eltd-single-share-holder">
    <h4 class="eltd-single-share"><?php esc_html_e('Share', 'newsroom'); ?></h4>
	<?php newsroom_elated_get_module_template_part('templates/single/parts/share', 'blog', '', array('type' => 'list')); ?>
	</div>
<?php } ?>

<?php if(newsroom_elated_options()->getOptionValue('blog_single_tags') == 'yes' || newsroom_elated_options()->getOptionValue('blog_single_share') == 'yes'){ ?>
</div>
<?php } ?>