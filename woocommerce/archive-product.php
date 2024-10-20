<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

 defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>
	<!-- header breadcrumb section  -->
	<section class="breadcrumb-section set-bg" data-setbg="<?php echo get_template_directory_uri();?>/img/breadcrumb.jpg" style="background-image: url(&quot;img/breadcrumb.jpg&quot;);">
		<!-- <section class="breadcrumb-section set-bg bg-color" style="background-image: url('<?php #bloginfo('template_url'); ?>/img/breadcrumb.jpg');"> -->
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="breadcrumb__text">
						<h2><?php woocommerce_page_title();?></h2>
						<div class="breadcrumb__option">
							<a href="<?php echo site_url();?>">Home</a>
							<span><?php woocommerce_page_title();?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section class="shop-page mt-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-5">
					<?php 
						/**
						 * Hook: woocommerce_sidebar.
						 *
						 * @hooked woocommerce_get_sidebar - 10
						 */
						// sidebar add 
						do_action( 'woocommerce_sidebar' );
					?>
				</div>
				<div class="col-lg-8 col-md-9">
					<!-- ====grid=== -->
					<div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Sale Off</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                <?php 
									$args = array(
										'post_type' => 'product',
										'posts_par_page' =>'0',
										'mata_query'	=> array(
											array(
												'key'	=> '_sale_price',
											)
										)
									);

									$query = new WP_Query($args);
									while($query->have_posts()){
										$query->the_post();
									?>
										<div class="col-lg-4 list">
											<?php wc_get_template_part( 'content', 'product' ); ?>
                                		</div>
									<?php
										}
									?>
                            </div>
                        </div>
                    </div>
					<!-- ======= -->
					<?php
						
						if ( woocommerce_product_loop() ) {

							/**
							 * Hook: woocommerce_before_shop_loop.
							 *
							 * @hooked woocommerce_output_all_notices - 10
							 * @hooked woocommerce_result_count - 20
							 * @hooked woocommerce_catalog_ordering - 30
							 */
							do_action( 'woocommerce_before_shop_loop' );

							woocommerce_product_loop_start();

							if ( wc_get_loop_prop( 'total' ) ) {
								while ( have_posts() ) {
									the_post();

									/**
									 * Hook: woocommerce_shop_loop.
									 */
									do_action( 'woocommerce_shop_loop' );

									wc_get_template_part( 'content', 'product' );
								}
							}

							woocommerce_product_loop_end();

							/**
							 * Hook: woocommerce_after_shop_loop.
							 *
							 * @hooked woocommerce_pagination - 10
							 */
							do_action( 'woocommerce_after_shop_loop' );
						} else {
							/**
							 * Hook: woocommerce_no_products_found.
							 *
							 * @hooked wc_no_products_found - 10
							 */
							do_action( 'woocommerce_no_products_found' );
						}
					?>
				</div>
			</div>
		</div>
	</section>

<?php



get_footer( 'shop' );
