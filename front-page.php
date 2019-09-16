<?php
/**
* The template for the Front Page
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package Filmarte
*/

get_header();

 while (have_posts()) : the_post();

 if (has_post_thumbnail()) {
     $back_image=get_the_post_thumbnail_url(null, 'full-cropped');
 } ?>


<div class="hero"
	style="background-image: url('<?php echo $back_image;?>');">
	<h1><?php the_title();?>
	</h1>
	<h2><?php bloginfo('description'); ?>
	</h2>
</div>
<?php
//Contenido que viene desde el plug-in
include(locate_template('template-parts/content-front/contenido-especial.php')); ?>

<div class="contenedor">
	<?php
    the_content();
 ?>
</div>
<?php endwhile; // End of the loop.

 get_footer();
