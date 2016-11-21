<?php do_action('newsroom_elated_before_site_logo');?>

<div class="eltd-logo-wrapper">
    <a href="<?php echo esc_url(home_url('/')); ?>" <?php newsroom_elated_inline_style($logo_styles); ?>>
        <img class="eltd-normal-logo" src="<?php echo esc_url($logo_image); ?>" alt="<?php esc_html_e('logo','newsroom'); ?>"/>
        <?php if(!empty($logo_image_dark)){ ?><img class="eltd-dark-logo" src="<?php echo esc_url($logo_image_dark); ?>" alt="<?php esc_html_e('dark logo','newsroom'); ?>"/><?php } ?>
        <?php if(!empty($logo_image_light)){ ?><img class="eltd-light-logo" src="<?php echo esc_url($logo_image_light); ?>" alt="<?php esc_html_e('light logo','newsroom'); ?>"/><?php } ?>
        <?php if(!empty($logo_image_transparent)){ ?><img class="eltd-transparent-logo" src="<?php echo esc_url($logo_image_transparent); ?>" alt="<?php esc_html_e('transparent logo','newsroom'); ?>"/><?php } ?>
    </a>
</div>

<?php do_action('newsroom_elated_after_site_logo'); ?>