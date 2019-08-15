<?php
/**
* Template Name: Full Size Width Page
* Página todo a lo ancho sin sidebar
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package Filmarte
*/

get_header(); ?>
<?php
while ( have_posts() ) : the_post();
	the_content();
endwhile; // End of the loop.
?>

<?php
get_footer();
