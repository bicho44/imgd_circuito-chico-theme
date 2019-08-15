<?php

/**
* Eliminar el Publizite del fondo del contenido para luego cambiarlo de lugar
* y poder ponerlo en donde quiera
*
* @link: https:*jetpack.com/2013/06/10/moving-sharing-icons/
*
* Agregar este código en el template que se vaya a utilizar
*
* if ( function_exists( 'sharing_display' ) ) {
*     sharing_display( '', true );
* }
*
* if ( class_exists( 'Jetpack_Likes' ) ) {
*     $custom_likes = new Jetpack_Likes;
*     echo $custom_likes->post_likes( '' );
* }
*
*/
function jptweak_remove_share() {
    remove_filter( 'the_content', 'sharing_display',19 );
    remove_filter( 'the_excerpt', 'sharing_display',19 );
    if ( class_exists( 'Jetpack_Likes' ) ) {
        remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
    }
}

add_action( 'loop_start', 'jptweak_remove_share' );

/**
* Sacar el "Related Post" de debajo del contenido
*
* @link: https:*jetpack.com/support/related-posts/customize-related-posts/
*
* Luego usar este código para ponerlo donde quiera
* <?php
* if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
*     echo do_shortcode( '[jetpack-related-posts]' );
* }
* ?>
*/
function jetpackme_remove_rp() {
    if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
        $jprp = Jetpack_RelatedPosts::init();
        $callback = array( $jprp, 'filter_add_target_to_dom' );
        remove_filter( 'the_content', $callback, 40 );
    }
}
add_filter( 'wp', 'jetpackme_remove_rp', 20 );


/**
* Add theme support for Responsive Videos.
*/
function jetpackme_responsive_videos_setup() {
    add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'jetpackme_responsive_videos_setup' );