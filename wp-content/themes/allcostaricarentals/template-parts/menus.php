<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo pl-4 md:pl-0"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-icon-white.png" alt="All Costa Rica Rentals"></a>
			
			
				
	<?php
		wp_nav_menu( array(
			'theme_location' => 'header',
			'menu_id'        => 'header-menu',
			'container' => 'nav',
			'container_class' => 'full-menu-nav hidden md:block md:ml-4 p-8 md:p-0 w-full absolute bg-teal-500 md:w-1/2 md:static md:bg-transparent',
			'container_id' => '',
			'menu_class' => 'full-menu-ul list-reset uppercase text-lg md:text-sm',
		) );
	?>
		
		
		
	
	<ul class="bannerIcons z-10 list-reset absolute hidden md:flex text-2xl">
		<li class="px-2 py-2 m-2"><a href="https://wa.me/50687194024" target="_blank" class="block text-white no-underline"><i class="fab fa-whatsapp"></i> </a></li>
		<li class="px-2 py-2 m-2"><a href="<?php echo esc_url( home_url( '/cart' ) ); ?>" class="block text-white no-underline"><i class="fas fa-shopping-cart"></i></a></li>
		<li class="px-2 py-2 m-2"><a href="<?php echo esc_url( home_url( '/contact-us' ) ); ?>" class="block text-white no-underline"><i class="fas fa-envelope"></i></a></li>
		<li class="px-2 py-2 m-2"><a href="https://www.facebook.com/guanacastevacationrentals/" target="_blank" class="block text-white"><i class="fab fa-facebook"></i></a></li>
		<li class="px-2 py-2 m-2"><a href="https://www.instagram.com/guanacastevacation/" target="_blank" class="block text-white"><i class="fab fa-instagram"></i></a></li>
		
	</ul>
	
	<div class="btn-menu absolute md:hidden text-white z-10 cursor-pointer">
		<i class="fas fa-bars"></i> Menu
	</div>
			

