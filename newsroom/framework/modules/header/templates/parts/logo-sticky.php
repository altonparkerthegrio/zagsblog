<?php do_action('newsroom_elated_before_site_logo'); ?>

<div class="eltd-logo-wrapper">
    <a href="<?php echo esc_url(home_url('/')); ?>" <?php newsroom_elated_inline_style($logo_styles); ?>>
        <img src="<?php echo esc_url($logo_image); ?>" alt="<?php esc_html_e('logo','newsroom' ); ?>"/>
    </a>
</div>

<?php do_action('newsroom_elated_after_site_logo'); ?>