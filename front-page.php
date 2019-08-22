<?php
/**
* The template for the Front Page
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package Filmarte
*/

get_header(); 
?>

<?php
 while ( have_posts() ) : the_post();
 	the_content();
 endwhile; // End of the loop.
 ?>

<?php 
//Contenido que viene desde el plug-in
include( locate_template( 'template-parts/content-front/contenido-especial.php' ) ); ?>

<?php get_footer(); ?>