<div class="eltd-footer-heading-holder">
	<div class="eltd-footer-heading-inner <?php echo esc_attr($footer_heading_classes) ?>">
		<?php if($footer_in_grid) { ?>

		<div class="eltd-container">
			<div class="eltd-container-inner">

		<?php } ?>

                <div class="eltd-column-inner">
                    <?php if(is_active_sidebar('footer_heading')) {
                        dynamic_sidebar( 'footer_heading' );
                    } ?>
                </div>

		<?php if($footer_in_grid) { ?>
			</div>
		</div>
	<?php } ?>
	</div>
</div>
