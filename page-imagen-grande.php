<?php
/*
 * Template Name: Imagen Grande
 * Description: Página con la imagen ancha que cubre las dos columnas
 * 
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Hostería QuimeQuipan
 */

get_header(); ?>

	<div id="primary" class="content-area container">
<div class="row">
<?php
			while ( have_posts() ) : the_post();
			
				if (has_post_thumbnail()){
					the_post_thumbnail('header-cropped');
				}
				
			?>
		<main id="main" class="site-main col-md-8" role="main">
			<?php
				get_template_part( 'template-parts/content', 'page-img-grande' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>
		</main><!-- #main -->
		<?php get_sidebar(); ?>

		<?php endwhile; // End of the loop. ?>

		</div>
	</div><!-- #primary -->

<?php
get_footer();
