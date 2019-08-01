<?php

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
    //add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}

//quitamos el sidebar de woocomerce
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

//quitamos el related products
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

//quitamos los tabs y los metemos dentro de summary
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 4 );

//para meter description dentro de summary
// function woocommerce_template_product_description() {
//     wc_get_template( 'single-product/tabs/description.php' );
// }
// add_action( 'woocommerce_single_product_summary', 'woocommerce_template_product_description', 70 );

// se quita todo el contenido de summary por que lo metemos dentro de un tab
add_action('woocommerce_single_product_summary', 'customizing_single_product_summary_hooks', 2  );
function customizing_single_product_summary_hooks(){
    remove_action('woocommerce_single_product_summary','woocommerce_template_single_title', 5  );
    remove_action('woocommerce_single_product_summary','woocommerce_template_single_rating', 10 );
    remove_action('woocommerce_single_product_summary','woocommerce_template_single_price',10  );
    remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt',20  );
    remove_action('woocommerce_single_product_summary','woocommerce_template_single_add_to_cart',30 );
    remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta',40 );
    remove_action('woocommerce_single_product_summary','woocommerce_template_single_sharing' ,50);
    remove_action('woocommerce_single_product_summary','WC_Structured_Data::generate_product_data()',60 );
}
//quitamos el titulo description del tab description
add_filter(
    'woocommerce_product_description_heading',
    'allcostaricarentals_product_description_heading'
);

function allcostaricarentals_product_description_heading()
{
    return '';
}

function allcostaricarentals_redirect_checkout_add_cart($url)
{
    $url = get_permalink(get_option('woocommerce_checkout_page_id'));
    return $url;
}

add_filter('woocommerce_add_to_cart_redirect', 'allcostaricarentals_redirect_checkout_add_cart');

add_filter('woocommerce_product_tabs', 'woo_book_tab');
function woo_book_tab($tabs)
{
  
  // Adds the new tab
   
    $nameTab = function_exists('pll__') ? pll__('Book Now') : 'Book Now';
    
    
    $tabs['book'] = array(
        'title' => $nameTab,
        'priority' => 5,
        'callback' => 'woo_book_tab_content'
    );

    return $tabs;

}
function woo_book_tab_content()
{
    echo '<div class="flex flex-wrap justify-between">';
    woocommerce_template_single_title();
    woocommerce_template_single_price();
    echo '</div>';
    woocommerce_template_single_excerpt();
    woocommerce_template_single_add_to_cart();
   


}

add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields($fields)
{
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_company']);

    //$fields['order']['order_comments']['placeholder'] = 'e.g. child seats';
    $fields['order']['order_comments']['label'] = 'Important Notes';


    return $fields;
}

//custom wrapper woocommerce

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
    echo '<section class="content"><div class="container mx-auto px-4 md:px-0">';
}

function my_theme_wrapper_end() {
    echo '</div></section>';
}
