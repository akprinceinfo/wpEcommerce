<?php 

    /* 
       Template Name: Cart
    */

?>

<?php
get_header() ;

?>


<?php
echo do_shortcode('[woocommerce_cart]');

get_footer();