<?php
/**
 * Section Table shortcode template
 */
?>
<div class="eltd-section-title-holder clearfix <?php echo esc_attr($holder_classes) ?>">
    <?php if($title !== '') { ?>
        <?php echo '<'.esc_html($title_tag) ?> class="eltd-st-title">
        <?php echo esc_attr($title); ?>
        <?php echo '</'.esc_html($title_tag) ?>>
    <?php } ?>
</div>