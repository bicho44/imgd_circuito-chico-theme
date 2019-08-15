<?php
/**
* The template for the Front Page
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package Filmarte
*/

get_header(); 

$opciones_imgd = get_option('opciones_imgd');

$slider = $opciones_imgd['imgd_slider'][0];
$slider_size = $opciones_imgd['imgd_slider_size'];

$destanews = $opciones_imgd['imgd_desta_news'];
$destanews_cant = $opciones_imgd['imgd_desta_news_cant'];

//echo '<pre>'.var_dump($opciones_imgd).'</pre>';

?>

<?php if ($slider!=0) {?>
	<?php include( locate_template( 'template-parts/carrousel.php' ) );?>
<?php } ?>

<?php if ($destanews!=0) {?>
	<?php include( locate_template( 'template-parts/content-front/destacados-news.php' ) ); ?>
<?php } ?>

<?php
 while ( have_posts() ) : the_post();
 	the_content();
 endwhile; // End of the loop.
 ?>

<?php get_footer(); ?>