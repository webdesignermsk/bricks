<?php

/**
 * https://developer.wordpress.org/reference/functions/add_theme_support/
 * 
 */

if (! function_exists('sb_setup_theme')) {

    function sb_setup_theme() {

        // Enable featured images
        add_theme_support('post-thumbnails');
   
        // Enable theme logo
        add_theme_support('custom-logo', array(
            'height'      => 100,
            'width'       => 400,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => array('site-title', 'site-description'),
        ));
        
        // Enable RSS feeds
        add_theme_support('automatic-feed-links');

        // Enable HTML5 markup
        add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
        
        // Enable title meta tag to <head>
        add_theme_support('title-tag');

        // Enable Widgets refresh from Customizer
        add_theme_support('customize-selective-refresh-widgets');

        // Define custom image sizes
        require_once get_template_directory() . '/functions/imagesizes.php';

        // Set max content width (embedded)
        if (! isset($content_width)) { $content_width = 1400;}

        // Load translations 
        load_theme_textdomain( 'bricks', get_template_directory().'/languages' );

    }

}

add_action('after_setup_theme', 'sb_setup_theme');