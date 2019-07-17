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
 * Template Name: Page Home
 * @package allcostaricarentals
 */

get_header();
?>

<section class="homePage relative w-full h-screen">
		<!-- <a href="#" class="logo absolute z-10 text-center">ALL COSTA RICA RENTALS<span class="text-base block font-normal">Condos, houses and villas in Costa Rica </span></a> -->
		<div class="btn-menu absolute text-white z-10 cursor-pointer">
			<i class="fas fa-bars"></i> Menu
		</div>
		<ul class="bannerIcons z-10 list-reset absolute flex ">
			<li class="px-2 py-2 m-2"><a href="#" class="block text-white no-underline"><i class="fas fa-phone"></i> Call</a></li>
			<li class="px-2 py-2 m-2"><a href="#" class="block text-white no-underline"><i class="fas fa-search"></i> Search</a></li>
			<li class="px-2 py-2 m-2"><a href="#" class="block text-white no-underline"><i class="fas fa-envelope"></i> Cont</a></li>
		</ul>
		<div class="banner relative z-0">
			<div class="banner-slider">
				<div class="banner-slide w-full h-screen" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/pattern.png'), url('<?php echo get_template_directory_uri(); ?>/img/bg1.jpg')"></div>
				<div class="banner-slide w-full h-screen" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/pattern.png'), url('<?php echo get_template_directory_uri(); ?>/img/bg2.jpg')"></div>
			</div> 
		</div>
		<div class="call-to-action z-10 absolute justify-center hidden md:flex">
			<div class="col md:w-10/12">
				<a href="#" class="logo  z-10 text-center font-titles">ALL COSTA RICA RENTALS<span
						class="text-base block font-normal font-lato">Condos, houses and villas in Costa Rica </span>
				</a>
				<?php get_template_part( 'template-parts/search-properties' ); ?>
			</div>
		</div>
		
    </section>
    <section class="content">
		
		<div class="welcome text-center mt-8 mb-8 container mx-auto">
				<h2 class="text-4xl mb-8 font-titles font-light" data-aos="fade-in" data-aos-duration="3000">Condos and Houses </h2>
				<!-- <h3 data-aos="fade-in" data-aos-duration="3000" data-aos-delay="100" class="text-2xl mt-8">Condos and Houses </h3> -->
                
                <?php /*get_template_part( 'template-parts/featured-properties' );*/ 
                     $categorySelected = 'houses';
                    include( locate_template( 'template-parts/featured-properties.php', false, false ) ); 
                ?>

				<h2 class="text-4xl mb-8 font-titles font-light" data-aos="fade-in" data-aos-duration="3000">Villas </h2>
				<!-- <h3 data-aos="fade-in" data-aos-duration="3000" data-aos-delay="100" class="text-2xl mt-8">Condos and Houses </h3> -->
                <?php /*get_template_part( 'template-parts/featured-properties' );*/ 
                     $categorySelected = '';
                    include( locate_template( 'template-parts/featured-properties.php', false, false ) ); 
                ?>
			
        </div>
        <div class="experiences text-white relative">
            <h2 class="text-4xl mt-4 mb-2 font-titles font-light text-center" data-aos="fade-in" data-aos-duration="3000">Experiences </h2>
			<div class="items-center">
				<div class="slider-experiences">
					<div class="experiences-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/image-four-intense.jpg')">
					</div>
					<div class="experiences-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/atv-tour-1.jpg')">
					</div>
					<div class="experiences-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/horseback-r-1-1920x1080.jpg')">
					</div>
					<div class="experiences-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/Akaka-6.jpg')">
					</div>
		
				</div>
				<div class="items absolute bottom-0 w-full">
					<div class="slider-experiences-nav ">
						<div class="experiences-nav-slide">
							<a class="post px-4 py-2 block absolute" href="#">
								<h3 class="text-white"><span>Lorem ipsum dolor, sit amet consectetur adipisicing</span></h3>
								<span class="absolute icon"><i class="fas fa-plus"></i></span>
								<p style="display: block;"></p>
								<span class="details absolute uppercase">Lorem ipsum dolor</span>
							</a>
						</div>
						<div class="experiences-nav-slide">
							<a class="post px-4 py-2 block absolute" href="#">
								<h3 class="text-white"><span>Lorem ipsum dolor, sit amet consectetur adipisicing</span></h3><span
									class="absolute icon"><i class="fas fa-plus"></i></span>
								<p style="display: block;"></p>
								<span class="details absolute uppercase">Lorem ipsum dolor</span>
							</a>
						</div>
						<div class="experiences-nav-slide">
							<a class="post px-4 py-2 block absolute" href="#">
								<h3 class="text-white"><span>Lorem ipsum dolor, sit amet consectetur adipisicing</span></h3><span
									class="absolute icon"><i class="fas fa-plus"></i></span>
								<p style="display: block;"></p>
								<span class="details absolute uppercase">Lorem ipsum dolor</span>
							</a>
						</div>
						<div class="experiences-nav-slide">
							<a class="post px-4 py-2 block absolute" href="#">
								<h3 class="text-white"><span>Lorem ipsum dolor, sit amet consectetur adipisicing</span></h3><span
									class="absolute icon"><i class="fas fa-plus"></i></span>
								<p style="display: block;"></p>
								<span class="details absolute uppercase">Lorem ipsum dolor</span>
							</a>
						</div>
		
					</div>
		
				</div>
		
			</div>
		</div>

		<div class="events py-16">
			<div class="container mx-auto ">
		
				<h2 class="text-4xl mb-8 font-sans events-h2 relative pt-4 uppercase">News </h2>
				<div class="flex flex-wrap">
				<?php	
						$args = array(
						'post_type' => 'post',
						//'order' => 'ASC',
						'orderby' => array('menu_order' => 'ASC', 'title' => 'ASC'),
						'posts_per_page' => 3,
						'paged' => 1
					
					);
      

					$items = new WP_Query($args);
					// Pagination fix
					$temp_query = $wp_query;
					$wp_query   = NULL;
					$wp_query   = $items;

						if ($items->have_posts()) {
							while ($items->have_posts()) {
								$items->the_post();

								?>
								
								<article class="event w-full md:w-1/2 lg:w-1/3 px-5">
									<div class="event-container h-full flex flex-col">
										<a href="<?php the_permalink(); ?>" class="flex-auto">
											<div class="event-img">
											<?php if (has_post_thumbnail()) :

											$id = get_post_thumbnail_id($post->ID);
											$thumb_url = wp_get_attachment_image_src($id, 'news-thumb', true);
											?>



											<?php endif; ?>
											<img src="<?php echo $thumb_url[0] ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
											</div>
										</a>
										<div class="event-content p-5">
											<h3 class="text-2xl leading-none mb-4 uppercase font-titles "><?php the_title(); ?></h2>
												<div class="leading-normal mb-4"><?php the_excerpt(); ?></div>
												<div>
													<a href="<?php the_permalink(); ?>"
														class="inline-block px-4 py-3 uppercase bg-transparent font-bold  border-2 border-solid border-black text-black hover:bg-black hover:text-white">Learn
														More</a>
												</div>
										</div>
									</div>
								</article>
							

							<?php


						}
					}
					?>
					
					
		
				</div>
		
			</div>
		
        </div>
    </section>

<?php
//get_sidebar();
get_footer();
