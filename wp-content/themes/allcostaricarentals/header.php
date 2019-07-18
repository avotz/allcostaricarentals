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

<body <?php body_class('font-sans'); ?> >
	<header class="sticky-header w-full fixed border-b border-yellow-darker z-40 left-0">
		<div class="flex items-center container mx-auto h-70">
			<?php get_template_part( 'template-parts/menus' ); ?>

		</div>
		
	</header>
	


