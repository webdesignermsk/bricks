<?php

/**
 * Custom global functions.
 * These functions are meant to be accessed from multiple locations.
 * 
 */

// --- Social networks ---

// Used in Social Icons and Social Share buttons
// https://github.com/bradvin/social-share-urls


function brk_socialnetworks() {
    
    global $post;

    $post_url      = get_the_permalink($post->ID);
    $post_title    = rawurlencode(get_the_title($post->ID).' - '.get_bloginfo('name'));
    $post_thumb    = get_the_post_thumbnail_url($post->ID);
    
    $brk_socialnetworks = array(
        'facebook' => array(
            'social-name'   => 'Facebook',
            'icon-style'    => 'fab',
            'icon-name'     => 'fa-facebook-f',
            'has-share'     => true,
            'share-url'     => 'https://www.facebook.com/sharer/sharer.php?u='.$post_url,
        ),
        'twitter' => array(
            'social-name'   => 'Twitter',
            'icon-style'    => 'fab',
            'icon-name'     => 'fa-twitter',
            'has-share'     => true,
            'share-url'     => 'https://twitter.com/intent/tweet?url='.$post_url.'&text='.$post_title,
        ),
        'linkedin' => array(
            'social-name'   => 'LinkedIn',
            'icon-style'    => 'fab',
            'icon-name'     => 'fa-linkedin-in',
            'has-share'     => true,
            'share-url'     => 'https://www.linkedin.com/shareArticle?mini=true&url='.$post_url.'&title='.$post_title,
        ),
        'instagram' => array(
            'social-name'   => 'Instagram',
            'icon-style'    => 'fab',
            'icon-name'     => 'fa-instagram',
            'has-share'     => false,
        ),
        'pinterest' => array(
            'social-name'   => 'Pinterest',
            'icon-style'    => 'fab',
            'icon-name'     => 'fa-pinterest-p',
            'has-share'     => true,
            'share-url'     => 'https://pinterest.com/pin/create/button/?url='.$post_url.'&description='.$post_title.'&media='.$post_thumb,
        ),
        'youtube' => array(
            'social-name'   => 'YouTube',
            'icon-style'    => 'fab',
            'icon-name'     => 'fa-youtube',
            'has-share'     => false,
        ),
        'tripadvisor' => array(
            'social-name'   => 'TripAdvisor',
            'icon-style'    => 'fab',
            'icon-name'     => 'fa-tripadvisor',
            'has-share'     => false,
        ),
        'pocket' => array(
            'social-name'   => 'Pocket',
            'icon-style'    => 'fab',
            'icon-name'     => 'fa-get-pocket',
            'has-share'     => true,
            'share-url'     => 'https://getpocket.com/edit?url='.$post_url,
        ),
        'whatsapp' => array(
            'social-name'   => 'WhatsApp',
            'icon-style'    => 'fab',
            'icon-name'     => 'fa-whatsapp',
            'has-share'     => true,
            'share-url'     => 'https://api.whatsapp.com/send?text='.$post_title.'%20'.$post_url,
        ),
        'telegram' => array(
            'social-name'   => 'Telegram',
            'icon-style'    => 'fab',
            'icon-name'     => 'fa-telegram-plane',
            'has-share'     => true,
            'share-url'     => 'https://t.me/share/url?url='.$post_url.'&text='.$post_title,
        ),
        'github' => array(
            'social-name'   => 'GitHub',
            'icon-style'    => 'fab',
            'icon-name'     => 'fa-github',
            'has-profile'   => false,
            'has-share'     => false,
        ),
        'mail' => array(
            'social-name'   => 'E-Mail',
            'icon-style'    => 'fas',
            'icon-name'     => 'fa-envelope',
            'has-profile'   => false,
            'has-share'     => true,
            'share-url'     => 'mailto:?subject='.$post_title.'&body='.$post_url,
        ),
    );
    return $brk_socialnetworks;
}

// --- Thumbnail alt ---

// Echoes the "alt" value of a post thumbnail as inserted in the media gallery

function brk_thumb_alt() {

    $brk_thumb_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
    echo $brk_thumb_alt;

}

// --- Enable SVG support ---

function brk_svg_upload( $mimes ) {
    $mimes['svg']  = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';

    return $mimes;
}
add_filter( 'upload_mimes', 'brk_svg_upload' );

function brk_svg_mimetype( $data = null, $file = null, $filename = null, $mimes = null ) {
    $ext = isset( $data['ext'] ) ? $data['ext'] : '';
    if ( strlen( $ext ) < 1 ) {
        $exploded = explode( '.', $filename );
        $ext      = strtolower( end( $exploded ) );
    }
    if ( $ext === 'svg' ) {
        $data['type'] = 'image/svg+xml';
        $data['ext']  = 'svg';
    } elseif ( $ext === 'svgz' ) {
        $data['type'] = 'image/svg+xml';
        $data['ext']  = 'svgz';
    }

    return $data;
}
add_filter( 'wp_check_filetype_and_ext', 'brk_svg_mimetype', 10, 4 );


// --- Excerpt lenght ---

// function brk_excerpt_length( $length ) {
//     return 40;
// }
// add_filter( 'excerpt_length', 'brk_excerpt_length', 999 );