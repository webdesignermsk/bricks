<?php

/**
 * https://docs.woocommerce.com/document/woocommerce-theme-developer-handbook/
 * 
 */

if (! function_exists('brk_setup_woocommerce')) {

    function brk_setup_woocommerce() {

        // Declare WooCommerce support

        add_theme_support( 'woocommerce', array(
            // 'thumbnail_image_width' => 150,
            // 'single_image_width'    => 300,    
            // 'product_grid'          => array(
            //     'default_rows'    => 3,
            //     'min_rows'        => 2,
            //     'max_rows'        => 8,
            //     'default_columns' => 4,
            //     'min_columns'     => 2,
            //     'max_columns'     => 5,
            // ),
        ));  

        // Product gallery features

        // add_theme_support( 'wc-product-gallery-zoom' );
        // add_theme_support( 'wc-product-gallery-lightbox' );
        // add_theme_support( 'wc-product-gallery-slider' );
    
    }

}

add_action('after_setup_theme', 'brk_setup_woocommerce');