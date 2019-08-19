<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package allcostaricarentals
 */

?>

<footer class="footer text-white text-sm relative">
		<div class="waves1" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/waves1.png')"> <img src="<?php echo get_template_directory_uri(); ?>/img/waves1.png" alt=""></div>
		<!-- <div class="waves2" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/waves2.png')"> <img src="<?php echo get_template_directory_uri(); ?>/img/waves2.png" alt=""></div> -->
		<div class="container mx-auto pt-16 pb-8 relative ">
			<div class="footer-columns flex flex-wrap">
				<div class="footer-column w-full md:flex-1 text-center md:text-left leading-loose mb-8">
					<a href="#" class="footer-logo w-32 inline-block">ALL COSTA RICA RENTALS</a>
					<p>Terms & conditions</p>
					<p>Private Policy</p>
					<p>&copy; 2019 All Costa Rica Rentals. All rights reserved.</p>
					<p><span>Avotz Webworks</span></p>
					
				</div>
				<div class="footer-column w-full md:flex-1 text-center mb-8">
					<nav class="footer-menu">
						<ul class="footer-menu-ul list-reset uppercase">
							<li class="mb-4"><a href="#" class="no-underline text-white">Apartaments</a></li>
							<li class="mb-4"><a href="#" class="no-underline text-white">Houses</a></li>
							<li class="mb-4"><a href="#" class="no-underline text-white">Lots</a></li>
							<li class="mb-4"><a href="#" class="no-underline text-white">Condo</a></li>
							<li class="mb-4"><a href="#" class="no-underline text-white">Offices</a></li>
							
						</ul>
					</nav>
				</div>
				<div class="footer-column w-full md:flex-1 text-center mb-8">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'footer',
						'menu_id'        => 'footer-menu',
						'container' => 'nav',
						'container_class' => 'footer-menu',
						'container_id' => '',
						'menu_class' => 'footer-menu-ul list-reset uppercase',
					) );
					?>
					<!-- <nav class="footer-menu">
						<ul class="footer-menu-ul list-reset uppercase">
							<li class="mb-4"><a href="#" class="no-underline text-white">Home</a></li>
							<li class="mb-4"><a href="#" class="no-underline text-white">About Us</a></li>
							<li class="mb-4"><a href="#" class="no-underline text-white">Our Properties</a></li>
							<li class="mb-4"><a href="#" class="no-underline text-white">News</a></li>
							<li class="mb-4"><a href="#" class="no-underline text-white">Contact Us</a></li>
						</ul>
					</nav> -->
				</div>
				<div class="footer-column w-full md:flex-1 text-center md:text-right mb-8">
					<h5 class="mb-6 text-lg">Follow Us</h5>
					<ul class="footer-social list-reset flex justify-center md:justify-end text-2xl">
						<li class="px-2 py-2 m-2"><a href="#" class="block text-white"><i class="fab fa-facebook"></i></a></li>
						<li class="px-2 py-2 m-2"><a href="#" class="block text-white"><i class="fab fa-instagram"></i></a></li>
						<li class="px-2 py-2 m-2 mr-0 pr-0"><a href="#" class="block text-white"><i class="fab fa-twitter"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
		
	</footer>

	<a href="#transfer-popup" class="btn-transfer transfer-popup-link">Transfers</a>
	<div id="transfer-popup" class="transfer-popup white-popup mfp-hide mfp-with-anim">
		<?php rewind_posts(); ?>
		<?php query_posts('post_type=page&page_id=487'); ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php /*the_title('<h2 class="map-title">', '</h2>'); */?>
				<div class="transfer-container">
					<?php the_content(); ?>
				</div>



			<?php endwhile; ?>
			<!-- post navigation -->

		<?php endif; ?>
              
        
    </div>

<?php wp_footer(); ?>

</body>
</html>
