<?php

/**
 * Search 
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<form action="<?php bbp_search_url(); ?>" id="bbp-search-form" class="eltd-search-menu-holder" method="get">
    <div class="eltd-form-holder">
        <input type="hidden" name="action" value="bbp-search-request" />
        <div class="eltd-column-left">
            <input type="text" class="eltd-search-field" autocomplete="off" name="bbp_search" id="bbp_search" tabindex="<?php bbp_tab_index(); ?>"  value="<?php echo esc_attr( bbp_get_search_terms() ); ?>" />
        </div>
        <div class="eltd-column-right">
            <input tabindex="<?php bbp_tab_index(); ?>" class="button" type="submit" id="bbp_search_submit" value="" />
        </div>
    </div>

</form>