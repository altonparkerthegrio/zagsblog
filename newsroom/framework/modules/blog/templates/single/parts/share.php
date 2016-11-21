<?php if(newsroom_elated_options()->getOptionValue('blog_single_share') == 'yes' && newsroom_elated_options()->getOptionValue('enable_social_share') == 'yes' && newsroom_elated_options()->getOptionValue('enable_social_share_on_post') == 'yes'){ ?>
    <div class ="eltd-blog-single-share">
    <?php echo newsroom_elated_get_social_share_html(array('type'=> $type)); ?>
    </div>
<?php }