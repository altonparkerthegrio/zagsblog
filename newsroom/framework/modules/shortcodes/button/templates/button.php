<button type="submit" <?php newsroom_elated_inline_style($button_styles); ?> <?php newsroom_elated_class_attribute($button_classes); ?> <?php echo newsroom_elated_get_inline_attrs($button_data); ?> <?php echo newsroom_elated_get_inline_attrs($button_custom_attrs); ?>>
    <span class="eltd-btn-text"><?php echo esc_html($text); ?></span>
    <?php echo newsroom_elated_icon_collections()->renderIcon($icon, $icon_pack, array(
    	'icon_attributes' => array(
    		'class' => 'eltd-btn-icon-element'
		)
    )); ?>
</button>