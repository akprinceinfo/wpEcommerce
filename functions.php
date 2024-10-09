<?php

function menu_setup(){
	load_theme_textdomain( 'tdEcom', get_template_part('/languages') );
	add_theme_support('title-tag');

	//function to add nav menu in Navigation Bar and Footer Bar:
	register_nav_menus(array(
		'main-menu' => __('Main Menu','tdEcom'),
	));

	add_theme_support( 'woocommerce' );

}
add_action( 'after_setup_theme','menu_setup');


	

/**
 *  scripts and styles. Link add
 */
function tdEcom_wpdocs_theme_name_scripts() {

    //  Google Font
	wp_enqueue_style ( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap', array(), '1.0.0', 'all' );
	//  Css Styles 
    wp_enqueue_style ( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.4.1', 'all' );
	wp_enqueue_style ( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0', 'all' );
	wp_enqueue_style ( 'elegant-icons', get_template_directory_uri() . '/css/elegant-icons.css', array(), '1.0.0', 'all' );
	wp_enqueue_style ( 'nice-select', get_template_directory_uri() . '/css/nice-select.css', array(), '1.0.0', 'all' );
	wp_enqueue_style ( 'jquery', get_template_directory_uri() . '/css/jquery-ui.min.css', array(), '1.12.1', 'all' );
	wp_enqueue_style ( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), '2.3.4', 'all' );
	wp_enqueue_style ( 'slicknav', get_template_directory_uri() . '/css/slicknav.min.css', array(), '1.0.10', 'all' );
	wp_enqueue_style ( 'style', get_template_directory_uri() . '/css/style.css', array(), '1.0.0', 'all' );

    // Js Plugins 
	wp_enqueue_script( 'jquery-main', get_template_directory_uri() . '/js/jquery-3.3.1.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'jquery-nice-select', get_template_directory_uri() . '/js/jquery.nice-select.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'jquery-slicknav', get_template_directory_uri() . '/js/jquery.slicknav.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'mixitup', get_template_directory_uri() . '/js/mixitup.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true );
    
    
}
add_action( 'wp_enqueue_scripts', 'tdEcom_wpdocs_theme_name_scripts' );



// Display the Woocommerce Discount Percentage on the Sale Badge for variable products and single products

add_filter( 'woocommerce_sale_flash', 'display_percentage_on_sale_badge', 20, 3 );
function display_percentage_on_sale_badge( $html, $post, $product ) {

  if( $product->is_type('variable')){
      $percentages = array();

      // This will get all the variation prices and loop throughout them
      $prices = $product->get_variation_prices();

      foreach( $prices['price'] as $key => $price ){
          // Only on sale variations
          if( $prices['regular_price'][$key] !== $price ){
              // Calculate and set in the array the percentage for each variation on sale
              $percentages[] = round( 100 - ( floatval($prices['sale_price'][$key]) / floatval($prices['regular_price'][$key]) * 100 ) );
          }
      }
      // Displays maximum discount value
      $percentage = max($percentages) . '%';

  } elseif( $product->is_type('grouped') ){
      $percentages = array();

     // This will get all the variation prices and loop throughout them
      $children_ids = $product->get_children();

      foreach( $children_ids as $child_id ){
          $child_product = wc_get_product($child_id);

          $regular_price = (float) $child_product->get_regular_price();
          $sale_price    = (float) $child_product->get_sale_price();

          if ( $sale_price != 0 || ! empty($sale_price) ) {
              // Calculate and set in the array the percentage for each child on sale
              $percentages[] = round(100 - ($sale_price / $regular_price * 100));
          }
      }
     // Displays maximum discount value
      $percentage = max($percentages) . '%';

  } else {
      $regular_price = (float) $product->get_regular_price();
      $sale_price    = (float) $product->get_sale_price();

      if ( $sale_price != 0 || ! empty($sale_price) ) {
          $percentage    = round(100 - ($sale_price / $regular_price * 100)) . '%';
      } else {
          return $html;
      }
  }
  return '<div class="product__discount__percent">' . esc_html__( '-', 'woocommerce' ) . ' '. $percentage . '</div>'; // If needed then change or remove "up to -" text
}




/**
 * Change number or products per row to 3
 */

 if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}
add_filter('loop_shop_columns', 'loop_columns', 999);

