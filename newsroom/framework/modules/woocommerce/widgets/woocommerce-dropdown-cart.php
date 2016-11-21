<?php
class NewsroomElatedWoocommerceDropdownCart extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'eltd_woocommerce_dropdown_cart', // Base ID
			esc_html__('Elated Woocommerce Dropdown Cart','newsroom'), // Name
			array( 'description' => esc_html__( 'Elated Woocommerce Dropdown Cart', 'newsroom' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		global $post;
		extract( $args );
		
		global $woocommerce; 
		global $newsroom_options;
		
		$cart_style = 'eltd-with-icon';
		
		?>
		<div class="eltd-shopping-cart-outer">
			<div class="eltd-shopping-cart-inner">
				<div class="eltd-shopping-cart-header">
					<a itemprop="url" class="eltd-header-cart" href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>">
						<span class="eltd-cart-label"><?php esc_html_e('Cart','newsroom') ?></span>
						<span class="eltd-cart-no">(<?php echo esc_html($woocommerce->cart->cart_contents_count); ?>)</span>
					</a>
					<div class="eltd-shopping-cart-dropdown">
						<?php
						$cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0;
						$list_class = array( 'eltd-cart-list', 'product_list_widget' );
						?>
						<ul>

							<?php if ( !$cart_is_empty ) : ?>

								<?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :

									$_product = $cart_item['data'];

									// Only display if allowed
									if ( ! $_product->exists() || $cart_item['quantity'] == 0 ) {
										continue;
									}

									// Get price
									$product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? $_product->get_price_excluding_tax() : $_product->get_price_including_tax();
									?>


									<li>
										<div class="eltd-item-image-holder">
											<a itemprop="url" href="<?php echo esc_url(get_permalink( $cart_item['product_id'] )); ?>">
												<?php echo wp_kses($_product->get_image(), array(
													'img' => array(
														'src' => true,
														'width' => true,
														'height' => true,
														'class' => true,
														'alt' => true,
														'title' => true,
														'id' => true
													)
												)); ?>
											</a>
										</div>
										<div class="eltd-item-info-holder">
											<div class="eltd-item-left">
												<a itemprop="url" href="<?php echo esc_url(get_permalink( $cart_item['product_id'])); ?>">
													<?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?>
												</a>
												<?php echo apply_filters( 'woocommerce_cart_item_price_html', wc_price( $product_price ), $cart_item, $cart_item_key ); ?>
											</div>
											<div class="eltd-item-right">
												<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s"><span class="icon_close"></span></a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), esc_html__('Remove this item', 'newsroom') ), $cart_item_key ); ?>

											</div>
										</div>
									</li>

								<?php endforeach; ?>

							<?php else : ?>

								<li class="eltd-empty-cart"><?php esc_html_e( 'No products in the cart.', 'newsroom' ); ?></li>

							<?php endif; ?>

						</ul>

                        <?php if ( !$cart_is_empty ) : ?>
                            <div class="eltd-cart-bottom">
                                <div class="eltd-subtotal-holder clearfix">
                                    <span class="eltd-total"><?php esc_html_e( 'Subtotal', 'newsroom' ); ?>:</span>
										<span class="eltd-total-amount">
											<?php echo wp_kses($woocommerce->cart->get_cart_subtotal(), array(
                                                'span' => array(
                                                    'class' => true,
                                                    'id' => true
                                                )
                                            )); ?>
										</span>
                                </div>
                                <div class="eltd-btns-holder clearfix">
                                    <a itemprop="url" href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" class="eltd-btn eltd-btn-solid eltd-btn-large view-cart"><?php esc_html_e( 'View Cart', 'newsroom' ); ?></a>
                                    <a itemprop="url" href="<?php echo esc_url( $woocommerce->cart->get_checkout_url() ); ?>" class="eltd-btn eltd-btn-solid eltd-btn-large checkout"><?php esc_html_e( 'Checkout', 'newsroom' ); ?></a>
                                </div>
                            </div>
                        <?php endif; ?>


						<?php if ( sizeof( $woocommerce->cart->get_cart() ) <= 0 ) : ?>

						<?php endif; ?>
						

						<?php if ( sizeof( $woocommerce->cart->get_cart() ) <= 0 ) : ?>

						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

}
add_action( 'widgets_init', create_function( '', 'register_widget( "NewsroomElatedWoocommerceDropdownCart" );' ) );
?>
<?php
add_filter('add_to_cart_fragments', 'newsroom_elated_woocommerce_header_add_to_cart_fragment');
function newsroom_elated_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();
	?>
	<div class="eltd-shopping-cart-header">
		<a itemprop="url" class="eltd-header-cart" href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>">
			<span class="eltd-cart-label"><?php esc_html_e('Cart','newsroom') ?></span>
			<span class="eltd-cart-no">(<?php echo esc_html($woocommerce->cart->cart_contents_count); ?>)</span>
		</a>		
		<div class="eltd-shopping-cart-dropdown">
			<?php
			$cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0;
			//$list_class = array( 'eltd-cart-list', 'product_list_widget' );
			?>
			<ul>

				<?php if ( !$cart_is_empty ) : ?>

					<?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :

						$_product = $cart_item['data'];

						// Only display if allowed
						if ( ! $_product->exists() || $cart_item['quantity'] == 0 ) {
							continue;
						}

						// Get price
						$product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? $_product->get_price_excluding_tax() : $_product->get_price_including_tax();
						?>

						<li>
							<div class="eltd-item-image-holder">
								<?php echo wp_kses($_product->get_image(), array(
									'img' => array(
										'src' => true,
										'width' => true,
										'height' => true,
										'class' => true,
										'alt' => true,
										'title' => true,
										'id' => true
									)
								)); ?>
							</div>
							<div class="eltd-item-info-holder">
								<div class="eltd-item-left">
									<a itemprop="url" href="<?php echo esc_url(get_permalink( $cart_item['product_id'] )); ?>">
										<?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?>
									</a>
									<?php echo apply_filters( 'woocommerce_cart_item_price_html', wc_price( $product_price ), $cart_item, $cart_item_key ); ?>
								</div>
								<div class="eltd-item-right">
									<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s"><span class="icon_close"></span></a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), esc_html__('Remove this item', 'newsroom') ), $cart_item_key ); ?>

								</div>
							</div>
						</li>

					<?php endforeach; ?>
						
				<?php else : ?>

					<li class="eltd-empty-cart"><?php esc_html_e( 'No products in the cart.', 'newsroom' ); ?></li>

				<?php endif; ?>

			</ul>

            <?php if ( !$cart_is_empty ) : ?>
                <div class="eltd-cart-bottom">
                    <div class="eltd-subtotal-holder clearfix">
                        <span class="eltd-total"><?php esc_html_e( 'Subtotal', 'newsroom' ); ?>:</span>
								<span class="eltd-total-amount">
									<?php echo wp_kses($woocommerce->cart->get_cart_subtotal(), array(
                                        'span' => array(
                                            'class' => true,
                                            'id' => true
                                        )
                                    )); ?>
								</span>
                    </div>
                    <div class="eltd-btns-holder clearfix">
                        <a itemprop="url" href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" class="eltd-btn eltd-btn-solid eltd-btn-large view-cart">
                            <?php esc_html_e( 'View Cart', 'newsroom' ); ?>
                        </a>
                        <a itemprop="url" href="<?php echo esc_url( $woocommerce->cart->get_checkout_url() ); ?>" class="eltd-btn eltd-btn-solid eltd-btn-large checkout">
                            <?php esc_html_e( 'Checkout', 'newsroom' ); ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>

			<?php if ( sizeof( $woocommerce->cart->get_cart() ) <= 0 ) : ?>

			<?php endif; ?>
			

			<?php if ( sizeof( $woocommerce->cart->get_cart() ) <= 0 ) : ?>

			<?php endif; ?>
		</div>
	</div>

	<?php
	$fragments['div.eltd-shopping-cart-header'] = ob_get_clean();
	return $fragments;
}
?>