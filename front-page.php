<?php get_header(); ?>

<main id="content-wrap">

    <section id="sect-slider">

        <?php
        
        $args = array(
            'post_type' => 'post',
            'posts_per_page'    => 3,
        );
            
        get_template_part( 'templates/sections/slider', '', $args );
        
        ?>

    </section> <!-- #sect-slider -->

    <section id="sect-services" class="container py-5">

        <?php
        
        $args = array(
            'post_type' => 'post',
            'posts_per_page'    => 3,
        );
              
        get_template_part( 'templates/sections/services', '', $args );
        
        ?>

    </section> <!-- #sect-services -->

    <section id="sect-cta">

        <?php
        
        $args = array(
            'post_type' => 'post',
            'posts_per_page'    => 1,
        );
        
        get_template_part( 'templates/sections/cta', '', $args );
        
        ?>

    </section> <!-- #sect-news -->
 
    <section id="sect-news" class="container py-5">

        <?php
        
        $args = array(
            'post_type' => 'post',
            'posts_per_page'    => 3,
        );
        
        get_template_part( 'templates/sections/news', '', $args );
        
        ?>

    </section> <!-- #sect-news -->
 
</main> <!-- #content-wrap -->

<?php get_footer();