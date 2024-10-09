<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class( '', $product ); ?>>
	<!-- product list Add -->
	<div class="product__discount__item">
	<div class="product__discount__item__pic set-bg" data-setbg="<?php echo get_template_directory_uri();?>/img/product/discount/pd-2.jpg" style="background-image: url(&quot;img/product/discount/pd-2.jpg&quot;);">
		<?php woocommerce_show_product_loop_sale_flash();?>
            <ul class="product__item__pic__hover">
                <li><?php echo do_shortcode('[yith_wcwl_add_to_wishlist]');?></li>
                <!-- <li><a href="#"><i class="fa fa-retweet"></i></a></li> -->
                <li><a href="<?php echo site_url();?>" class="compare button" data-product_id="<?php echo get_the_id();?>" rel="nofollow"><i class="fa fa-retweet"></i></a></li>
                <li><a href="<?php echo site_url();?>" aria-describedby="woocommerce_loop_add_to_cart_link_describedby_87" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo get_the_ID();?>" data-product_sku="woo-album" aria-label="Add to cart: “Album”" rel="nofollow" data-success_message="“Album” has been added to your cart"><i class="fa fa-shopping-cart"></i></a></li>
            </ul>
        </div>
        <div class="product__item__text">
			<span><?php $categ = $product->get_categories();
					echo $categ; 
				  ?>
			</span>
            <a href="<?php the_permalink();?>"><?php woocommerce_template_loop_product_title() ?></a>
            <?php woocommerce_template_loop_price(); ?>
        </div>
    </div>
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	//do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	//do_action( 'woocommerce_before_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	//do_action( 'woocommerce_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	//do_action( 'woocommerce_after_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	//do_action( 'woocommerce_after_shop_loop_item' );
	?>
</li>
