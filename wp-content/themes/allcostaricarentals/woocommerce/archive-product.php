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
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );


?>

<?php get_template_part( 'template-parts/page-header' ); ?>

    <section class="content">
        <div class="container mx-auto px-4 md:px-0">
			<header class="woocommerce-products-header">
				<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
					<h1 class="text-center text-4xl mb-8 font-titles font-light woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
				<?php endif; ?>

				<?php
				/**
				 * Hook: woocommerce_archive_description.
				 *
				 * @hooked woocommerce_taxonomy_archive_description - 10
				 * @hooked woocommerce_product_archive_description - 10
				 */
				do_action( 'woocommerce_archive_description' );
				?>
			</header>
			<div class="tours-items mt-4">
		<?php
			if ( woocommerce_product_loop() ) {

			

				if ( wc_get_loop_prop( 'total' ) ) {
					while ( have_posts() ) {
						the_post();

						/**
						 * Hook: woocommerce_shop_loop.
						 *
						 * @hooked WC_Structured_Data::generate_product_data() - 10
						 */
						
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
											<?php /*if (!has_term('Real Estate', 'product_cat')) :*/ ?>
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
											<?php /*endif;*/ ?>
										</div>

									</div>
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="absolute inset-0"></a>
								</div>
							</article>
							<?php
					}
				}

				

				/**
				 * Hook: woocommerce_after_shop_loop.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				//do_action( 'woocommerce_after_shop_loop' );
			} else {
				/**
				 * Hook: woocommerce_no_products_found.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action( 'woocommerce_no_products_found' );
			}?>
			</div>
		</div>
    </section>
<?php
get_footer( 'shop' );
