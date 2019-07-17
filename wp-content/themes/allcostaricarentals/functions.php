<?php
require_once 'mix.php';
/**
 * allcostaricarentals functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package allcostaricarentals
 */

if ( ! function_exists( 'allcostaricarentals_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function allcostaricarentals_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on allcostaricarentals, use a find and replace
		 * to change 'allcostaricarentals' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'allcostaricarentals', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size('property-thumb', 640, 480, true);
		add_image_size('item-banner', 1920, 1080, true);
		add_image_size('news-thumb', 760, 507, true);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'header' => esc_html__( 'Header', 'allcostaricarentals' ),
			'footer' => esc_html__( 'Footer', 'allcostaricarentals' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'allcostaricarentals_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'allcostaricarentals_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function allcostaricarentals_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'allcostaricarentals_content_width', 640 );
}
add_action( 'after_setup_theme', 'allcostaricarentals_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function allcostaricarentals_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'allcostaricarentals' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'allcostaricarentals' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title font-titles">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'allcostaricarentals_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function allcostaricarentals_scripts() {
	//wp_enqueue_style( 'allcostaricarentals-style', get_stylesheet_uri() );
	wp_enqueue_script('allcostaricarentals-fas', get_template_directory_uri() . '/fonts/js/solid.min.js', array(), '20180804', true);
	wp_enqueue_script('allcostaricarentals-fab', get_template_directory_uri() . '/fonts/js/brands.min.js', array(), '20180804', true);
	wp_enqueue_script('allcostaricarentals-fa', get_template_directory_uri() . '/fonts/js/fontawesome.min.js', array(), '20180804', true);
	wp_enqueue_style( 'allcostaricarentals-style', mix( 'style.css') );
	wp_enqueue_script('allcostaricarentals-bundle', mix( '/js/app.js' ), array(), false, true);


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'allcostaricarentals_scripts' );


function add_specific_menu_location_atts( $atts, $item, $args ) {
    // check if the item is in the primary menu
    // if( $args->theme_location == 'primary' ) {
      // add the desired attributes:
      $atts['class'] = 'no-underline text-white px-4'; // anchor
   // }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_specific_menu_location_atts', 10, 3 );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Implement the Woocommerce.
 */
require get_template_directory() . '/inc/wc.php';


/**
 * Implement the CPT.
 */
 require get_template_directory() . '/inc/cpt.php';

