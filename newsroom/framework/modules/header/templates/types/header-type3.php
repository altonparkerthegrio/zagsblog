<?php do_action('newsroom_elated_before_page_header'); ?>

<header class="eltd-page-header">
    <div class="eltd-logo-area">
        <?php if($header_in_grid) : ?>
        <div class="eltd-grid">
        <?php endif; ?>
            <div class="eltd-vertical-align-containers">
                <div class="eltd-position-left">
                    <div class="eltd-position-left-inner">
                        <?php if(!$hide_logo && $logo_position == 'left') {
                            newsroom_elated_get_logo();
                        } ?>
                        <?php if(is_active_sidebar('eltd-left-from-logo') && $logo_position == 'center') : ?>
                            <?php dynamic_sidebar('eltd-left-from-logo'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="eltd-position-center">
                    <div class="eltd-position-center-inner">
                        <?php if(!$hide_logo && $logo_position == 'center') {
                            newsroom_elated_get_logo();
                        } ?>
                    </div>
                </div>
                <div class="eltd-position-right">
                    <div class="eltd-position-right-inner">
                        <?php if(is_active_sidebar('eltd-right-from-logo')) : ?>
                            <?php dynamic_sidebar('eltd-right-from-logo'); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php if($header_in_grid) : ?>
        </div>
        <?php endif; ?>
    </div>
    <div class="eltd-menu-area">
        <?php if($header_in_grid) : ?>
        <div class="eltd-grid">
        <?php endif; ?>
            <div class="eltd-vertical-align-containers">
                <div class="eltd-position-left">
                    <div class="eltd-position-left-inner">
                        <?php if(is_active_sidebar('eltd-left-from-main-menu')) : ?>
                            <?php dynamic_sidebar('eltd-left-from-main-menu'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="eltd-position-center">
                    <div class="eltd-position-center-inner">
                        <?php newsroom_elated_get_main_menu(); ?>
                    </div>
                </div>
                <div class="eltd-position-right">
                    <div class="eltd-position-right-inner">
                        <?php if(is_active_sidebar('eltd-right-from-main-menu')) : ?>
                            <?php dynamic_sidebar('eltd-right-from-main-menu'); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php if($header_in_grid) : ?>
        </div>
        <?php endif; ?>
    </div>
    <?php if($show_sticky) {
        newsroom_elated_get_sticky_header('centered');
    } ?>
</header>

<?php do_action('newsroom_elated_after_page_header'); ?>