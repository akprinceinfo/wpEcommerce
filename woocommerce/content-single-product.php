<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */

?>
	<section class="breadcrumb-section set-bg" data-setbg="<?php echo get_template_directory_uri();?>/img/breadcrumb.jpg" style="background-image: url(&quot;img/breadcrumb.jpg&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2><?php the_title() ;?></h2>
                        <div class="breadcrumb__option">
                            <a href="<?php echo site_url();?>">Home</a>
                            <a href="<?php echo site_url();?>"><?php the_title() ;?></a>
                            <span><?php echo $product->get_categories();?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

	<!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            
                <?php 
                    do_action( 'woocommerce_before_single_product' );

                    if ( post_password_required() ) {
                        echo get_the_password_form(); // WPCS: XSS ok.
                        return;
                    }
                ?>
            
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                        <?php woocommerce_show_product_loop_sale_flash();?>
                            <?php woocommerce_show_product_images() ;?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
						<?php woocommerce_template_single_title();?>
                        <div class="product__details__rating">
							<?php woocommerce_template_single_rating();?>
                        </div>
                        <div class="product__details__price"><?php woocommerce_template_single_price();?></div>
                        <?php woocommerce_template_single_excerpt();?>
                        <!-- button add  -->
                        <?php woocommerce_template_single_add_to_cart() ;?>
                        <ul>
                            <li><b>Availability</b> <span>In Stock</span></li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            <li><b>Weight</b> <span>0.5 kg</span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->
	

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	 

	
	</div>

	<?php
    /**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */

	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
