<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * Template Name: Page properties
 * @package allcostaricarentals
 */

$categorySelected = get_query_var('product_cat');
$locationSelected = get_query_var('location');
$q = get_query_var('q');

get_header(); ?>
<section class="pageHeader relative w-full h-20 bg-teal-500">
		<!-- <a href="#" class="logo absolute z-10 text-center">ALL COSTA RICA RENTALS<span class="text-base block font-normal">Condos, houses and villas in Costa Rica </span></a> -->
		<div class="btn-menu absolute text-white z-10 cursor-pointer">
			<i class="fas fa-bars"></i> Menu
		</div>
		<div class="container mx-auto">
			 <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo absolute z-10">ALL COSTA RICA RENTALS <!--<img src="./img/logo-icon-white.png">--></a> 
		</div>
		<ul class="bannerIcons z-10 list-reset absolute hidden md:flex ">
			<li class="px-2 py-2 m-2"><a href="#" class="block text-white no-underline"><i class="fas fa-phone"></i> Call</a></li>
			<li class="px-2 py-2 m-2"><a href="#" class="block text-white no-underline"><i class="fas fa-search"></i> Search</a></li>
			<li class="px-2 py-2 m-2"><a href="#" class="block text-white no-underline"><i class="fas fa-envelope"></i> Cont</a></li>
		</ul>
		
		
		
    </section>
<section class="content">
    <div class="welcome text-center mt-8 mb-8 container mx-auto">
		<?php
		while (have_posts()) : the_post();

			get_template_part('template-parts/content', 'page');

			// If comments are open or we have at least one comment, load up the comment template.
			if (comments_open() || get_comments_number()) :
				comments_template();
			endif;

		endwhile; // End of the loop.
        ?>
        <?php get_template_part( 'template-parts/search-properties' ); ?>
	
		<div class="tours-items mt-4">


					<?php

					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

					if ($categorySelected && $locationSelected) {
						$args = array(
							'post_type' => 'product',
							//'order' => 'ASC',
							'orderby' => array('menu_order' => 'ASC', 'title' => 'ASC'),
							'posts_per_page' => 12,
							'paged' => $paged,
							's' => $q,
							'tax_query' => array(
								'relation' => 'AND',

								array(
									'taxonomy' => 'product_cat',
									'field'    => 'slug',
									'terms'    => $categorySelected,
								),
								array(
									'taxonomy' => 'location',
									'field'    => 'slug',
									'terms'    => $locationSelected,

								),
							)

						);
					} elseif ($categorySelected) {
						$args = array(
							'post_type' => 'product',
							//'order' => 'ASC',
							'orderby' => array('menu_order' => 'ASC', 'title' => 'ASC'),
							'posts_per_page' => 12,
							'paged' => $paged,
							's' => $q,
							'tax_query' => array(

								array(
									'taxonomy' => 'product_cat',
									'field'    => 'slug',
									'terms'    => $categorySelected,
								),

							)

						);
					} elseif ($locationSelected) {
						$args = array(
							'post_type' => 'product',
							//'order' => 'ASC',
							'orderby' => array('menu_order' => 'ASC', 'title' => 'ASC'),
							'posts_per_page' => 12,
							'paged' => $paged,
							's' => $q,
							'tax_query' => array(

								array(
									'taxonomy' => 'location',
									'field'    => 'slug',
									'terms'    => $locationSelected,
								),

							)

						);
					} else {
						$args = array(
							'post_type' => 'product',
							//'order' => 'ASC',
							'orderby' => array('menu_order' => 'ASC', 'title' => 'ASC'),
							'posts_per_page' => 12,
							'paged' => $paged,
							's' => $q


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
										<a href="<?php the_permalink(); ?>">
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
								</div>
							</article>



						<?php


					}
				}

				?>
				</div>
				<?php the_posts_pagination(array('mid_size' => 2));
				wp_reset_postdata(); ?>
		</div>
</section>


<?php
/*get_sidebar();*/
get_footer();
