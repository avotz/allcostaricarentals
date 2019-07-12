<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package allcostaricarentals
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Francois+One" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class('font-sans'); ?>>
	<header class="sticky-header w-full fixed border-b border-yellow-darker z-40 left-0 top-0">
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
	</header>
	<div class="full-menu">
		<div class="btn-menu absolute text-white z-10 cursor-pointer">
			<i class="fas fa-times"></i>
		</div>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo absolute z-10">ALL COSTA RICA RENTALS <!--<img src="./img/allcostaricarentals-logo1.png">--></a>
		<ul class="bannerIcons z-10 list-reset absolute hidden md:flex">
			<li class="px-2 py-2 m-2"><a href="#" class="block text-white no-underline"><i class="fas fa-phone"></i> Call</a></li>
			<li class="px-2 py-2 m-2"><a href="#" class="block text-white no-underline"><i class="fas fa-search"></i> Search</a></li>
			<li class="px-2 py-2 m-2"><a href="#" class="block text-white no-underline"><i class="fas fa-envelope"></i> Cont</a></li>
		</ul>
		<div class="list">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'header',
					'menu_id'        => 'header-menu',
					'container' => 'nav',
					'container_class' => 'full-menu-nav p-8 md:p-0',
					'container_id' => '',
					'menu_class' => 'full-menu-ul list-reset uppercase text-lg md:text-2xl',
				) );
				?>
			<!-- <nav class="full-menu-nav p-8 md:p-0">
				<ul class="full-menu-ul list-reset uppercase text-lg md:text-2xl">
					<li class="mb-4"><a href="#" class="no-underline text-white">Home</a></li>
					<li class="mb-4"><a href="#" class="no-underline text-white">Properties</a></li>
					<li class="mb-4"><a href="#" class="no-underline text-white">About Us</a></li>
					<li class="mb-4"><a href="#" class="no-underline text-white">New</a></li>
					<li class="mb-4"><a href="#" class="no-underline text-white">Contact Us</a></li>
				</ul>
			</nav> -->
			
		</div>
		
	</div>


