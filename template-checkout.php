<?php 

    /* 
       Template Name: Checkout
    */

?>

<?php
get_header() ;

?>
    <section class="breadcrumb-section set-bg" data-setbg="<?php echo get_template_directory_uri();?>/img/breadcrumb.jpg" style="background-image: url(&quot;img/breadcrumb.jpg&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2><?php the_title();?></h2>
                        <div class="breadcrumb__option">
                            <a href="<?php echo site_url();?>"><?php the_title();?></a>
                            <span><?php the_title();?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
            <div class="row">
                <div class="col-lg-12  py-5 check_hrar">
                    <?php echo do_shortcode('[woocommerce_checkout]');?>       
                 </div>
            </div>
        </div>




<?php get_footer(); ?>