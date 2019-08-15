<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Turismo_InterOceánico
 */

get_header(); ?>

	<div id="primary" class="content-area container">
		<div class="row">


		<main id="main" class="site-main col-md-8" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content-page', 'imgd_chef' );

			endwhile; // End of the loop.
			?>
		</main><!-- #main -->
		<?php get_sidebar(); ?>
		</div>
	</div><!-- #primary -->

<?php
get_footer();
