<div class="eltd-image-with-hover-info-item">
    <?php foreach ($images as $image) { ?>
        <div class="eltd-inital-image">
            <?php if (is_array($image_size) && count($image_size)) : ?>
                <?php echo newsroom_elated_generate_thumbnail($image['image_id'], null, $image_size[0], $image_size[1]); ?>
            <?php else: ?>
                <?php echo wp_get_attachment_image($image['image_id'], $image_size); ?>
            <?php endif; ?>
        </div>
        <div class="eltd-hover-holder">
            <?php if (!empty($link)) : ?>
                <a class="eltd-image-with-hover-link" href="<?php echo esc_url($link) ?>" target="<?php echo esc_attr($target); ?>"></a>
            <?php endif; ?>
            <div class="eltd-hover-holder-inner">
                <div class="eltd-hover-content">
                    <div class="eltd-hover-content-inner">
                        <?php if ($title != '') { ?>
                            <h5 class="eltd-image-title"><?php echo esc_attr($title); ?></h5>
                        <?php } ?>
                        <?php if (!empty($add_text)) { ?>
                            <span class="eltd-image-description-add"><?php echo esc_attr($add_text); ?></span>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>