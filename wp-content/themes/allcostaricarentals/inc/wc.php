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

//quitamos los tabs
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);


function woocommerce_template_product_description() {
    wc_get_template( 'single-product/tabs/description.php' );
}
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_product_description', 70 );

//quitamos el titulo description del tab description
add_filter(
    'woocommerce_product_description_heading',
    'allcostaricarentals_product_description_heading'
);

function allcostaricarentals_product_description_heading()
{
    return '';
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

// remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
// remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

// add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
// add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

// function my_theme_wrapper_start() {
//     echo '<section class="content">';
// }

// function my_theme_wrapper_end() {
//     echo '</section>';
// }
