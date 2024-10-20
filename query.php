<?php 

    /* 
       Template Name: query
    */

get_header() ;

?>

    <div class="container">
        <div class="row">
            <div class="col-md-12 py-3">
                <?php 
                   
                    $args = array(
                        'post_type'      => 'post',
                        // 'posts_per_page' => 5,
                        // 'order'          => 'ASC',
                        // 'order'          => 'DSC',
                        // 'orderby'          => 'rand',
                        // 'meta_compare'  => '=',
                        // 'meta_value'    =>  '3',
                        // 'meta_key'      =>  'order'
                        // 'cat' => 34, 
                        // 'category_name' => 'Uncategorized'     
                        // 'cat' => array(
                        //     34,1
                        // ),
                        // 'meta_key' => 'size',
                        // 'meta_value' => 'xl',
                        // 'meta_compare' => '='
                        // ==== meta query ====
                        // 'meta_query' => array(
                        //     'relation' => 'OR'
                        //     array(
                        //         'key'   => 'price',
                        //         'value' => '160',
                        //         'compare' => '<'
                        //     )
                        // )

                        'text_query' => array(
                            'taxonomy' => 'category',
                            'field' => 'slug',
                            'terms' => 'blog-new',
                        )
                        
                    );

                    $query = new WP_Query($args);

                    while($query -> have_posts()){
                        $query -> the_post();
                ?>
                <h5><?php the_title() ;?></h5>
                <h6><?php echo get_field('price') ?></h6>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>

<?php
get_footer();
?>

