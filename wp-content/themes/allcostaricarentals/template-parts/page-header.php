<section class="pageHeader relative w-full h-70 bg-teal-500 mb-4">
	<div class="flex items-center container mx-auto h-70">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">ALL COSTA RICA RENTALS</a>
			
			
				
			<?php
				wp_nav_menu( array(
					'theme_location' => 'header',
					'menu_id'        => 'header-menu',
					'container' => 'nav',
					'container_class' => 'full-menu-nav ml-4 p-8 md:p-0 w-1/2',
					'container_id' => '',
					'menu_class' => 'full-menu-ul list-reset uppercase text-lg md:text-sm',
				) );
			?>
				
				
				
			
			<ul class="bannerIcons z-10 list-reset absolute hidden md:flex ">
				<li class="px-2 py-2 m-2"><a href="#" class="block text-white no-underline"><i class="fas fa-phone"></i> Call</a></li>
				<!-- <li class="px-2 py-2 m-2"><a href="#" class="block text-white no-underline"><i class="fas fa-search"></i> Search</a></li> -->
				<li class="px-2 py-2 m-2"><a href="<?php echo esc_url( home_url( '/contact-us' ) ); ?>" class="block text-white no-underline"><i class="fas fa-envelope"></i> Contact</a></li>
			</ul>

		</div>
		
		
		
    </section>