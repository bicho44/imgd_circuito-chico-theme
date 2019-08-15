<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Turismo_InterOceánico
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('ultimas'); ?>>

	<header class="entry-header">
		<?php
			if (has_post_thumbnail()){
				the_post_thumbnail('stamp', array('class'=>'img-circle'));
			}
		 ?>
		<?php	the_title(sprintf('<h4><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h4>');?>
	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php
			shortentext(get_the_content(), 200); 
			//imgd_content( 15);
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
