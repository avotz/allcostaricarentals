<div class="tours-items">

    <?php
       
        if( $categorySelected ){
            $args = array(
                'post_type' => 'product',
                //'order' => 'ASC',
                'orderby' => array('menu_order' => 'ASC', 'title' => 'ASC'),
                'posts_per_page' => 8,
                'paged' => 1,
                
                'tax_query' => array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'product_cat',
                        'field'    => 'slug',
                        'terms'    => 'properties',
                    ),
                    array(
                        'taxonomy' => 'product_cat',
                        'field'    => 'slug',
                        'terms'    => $categorySelected,
                    ),

                )

            );
        } else {

            $args = array(
                'post_type' => 'product',
                //'order' => 'ASC',
                'orderby' => array('menu_order' => 'ASC', 'title' => 'ASC'),
                'posts_per_page' => 8,
                'paged' => 1,
                'tax_query' => array(
                   
                    array(
                        'taxonomy' => 'product_cat',
                        'field'    => 'slug',
                        'terms'    => 'properties',
                    )
                    

                )
               


            );
        }
    
    $items = new WP_Query($args);
    // Pagination fix
    $temp_query = $wp_query;
    $wp_query   = NULL;
    $wp_query   = $items;

    if ($items->have_posts()) {
        while ($items->have_posts()) {
            $items->the_post();

            ?>
            

            <article class="tours-item">
                <div class="entry-content grid-item">
                    <figure class="entry-thumbnail">
                        <a href="<?php the_permalink(); ?>" class="block">
                            <div class="more-detail">More Details</div>
                            <?php if (has_post_thumbnail()) :

                                $id = get_post_thumbnail_id($post->ID);
                                $thumb_url = wp_get_attachment_image_src($id, 'large', true);
                                ?>



                            <?php endif; ?>
                            <img src="<?php echo $thumb_url[0] ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
                        </a>
                    </figure>

                    <div class="entry-excerpt">
                        <div class="entry-header">
                            <div class="tour-title">


                                <h4>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                                </h4>
                            </div>
                            <div class="rating">
                                <?php if (function_exists("kk_star_ratings")) : echo kk_star_ratings($pid);
                                endif; ?>
                            </div>
                            <div class="price">
                                <span class="from">From</span><span>
                                    <?php

                                    $currency = get_woocommerce_currency_symbol();

                                    $product = new WC_Product($post->ID);
                                    /*echo $product->get_price_html();
                        
                        woocommerce_template_loop_price(); */
                                    echo $currency;

                                    if (get_post_meta(get_the_ID(), '_wc_display_cost', true))
                                        echo get_post_meta(get_the_ID(), '_wc_display_cost', true);
                                    else
                                        echo get_post_meta(get_the_ID(), '_wc_booking_cost', true)

                                        ?>
                                </span>
                            </div>
                        </div>

                    </div>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="absolute inset-0"></a>
                </div>
            </article>



        <?php


    }
}

?>
</div>
<?php the_posts_pagination(array('mid_size' => 2));
wp_reset_postdata(); ?>