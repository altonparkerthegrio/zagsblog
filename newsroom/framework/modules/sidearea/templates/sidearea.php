<section class="eltd-side-menu right">
    <?php if ($show_side_area_title) {
        newsroom_elated_get_side_area_title();
    } ?>
    <div class="eltd-close-side-menu-holder">
        <div class="eltd-close-side-menu-holder-inner">
            <a href="#" target="_self" class="eltd-close-side-menu">
                <span aria-hidden="true" class="ion-android-close"></span>
            </a>
        </div>
    </div>
    <?php if (is_active_sidebar('sidearea')) {
        dynamic_sidebar('sidearea');
    } ?>
</section>