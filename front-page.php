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
//Contenido que viene desde el plug-in
include( locate_template( 'template-parts/content-front/contenido-especial.php' ) ); ?>

<div class="grilla">
<?php
 while ( have_posts() ) : the_post();

 	the_content();
 endwhile; // End of the loop.
 ?>
</div>


<?php get_footer(); ?>
