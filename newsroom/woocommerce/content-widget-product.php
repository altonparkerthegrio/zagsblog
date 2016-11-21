<?php
/**
 * The template for displaying product widget entries
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product; ?>

<li class="clearfix">
	<a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
		<?php echo wp_kses_post($product->get_image()); ?>
	</a>
	<div class="eltd-widget-product-holder">
		<span class="eltd-product-widget-cat">
			<?php echo wp_kses($product->get_categories(', '), array(
				'a' => array(
					'href' => true,
					'rel' => true,
					'class' => true,
					'title' => true,
					'id' => true
				)
			)); ?>
		</span>
		<h4 class="product-title"><?php echo esc_attr($product->get_title()); ?></h4>
		<?php if ( ! empty( $show_rating ) ) : ?>
			<?php echo wp_kses_post($product->get_rating_html()); ?>
		<?php endif; ?>
		<?php echo wp_kses_post($product->get_price_html()); ?>
	</div>
</li>
