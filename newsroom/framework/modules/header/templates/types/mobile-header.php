<?php do_action('newsroom_elated_before_mobile_header'); ?>

<header class="eltd-mobile-header">
    <div class="eltd-mobile-header-inner">
        <?php do_action( 'newsroom_elated_after_mobile_header_html_open' ) ?>
        <div class="eltd-mobile-header-holder">
            <div class="eltd-vertical-align-containers">
                <?php if($show_logo) : ?>
                    <div class="eltd-position-left">
                        <div class="eltd-position-left-inner">
                            <?php newsroom_elated_get_mobile_logo(); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="eltd-position-right">
                    <div class="eltd-position-right-inner">
                        <?php if(is_active_sidebar('eltd-right-from-mobile-logo')) {
                            dynamic_sidebar('eltd-right-from-mobile-logo');
                        } ?>
                        <?php if($show_navigation_opener) : ?>
                            <div class="eltd-mobile-menu-opener">
                                <a href="javascript:void(0)">
                                    <span class="eltd-mobile-opener-icon-holder">
                                        <span class="eltd-icon-ion-icon ion-navicon"></span>
                                        <span class="eltd-icon-ion-icon ion-android-close"></span>
                                    </span>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div> <!-- close .eltd-vertical-align-containers -->
        </div>
        <?php newsroom_elated_get_mobile_nav(); ?>
    </div>

</header> <!-- close .eltd-mobile-header -->

<?php do_action('newsroom_elated_after_mobile_header'); ?>