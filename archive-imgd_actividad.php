<?php
/**
 * The template para mostrar los Programas
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Turismo_InterOceánico
 */

get_header(); ?>

<div id="actividades-listado">
	<?php
        if (have_posts()) : ?>

	<header class="page-header">
		<?php
                    the_archive_title('<h1 class="page-title">', '</h1>');
                    the_archive_description('<div class="archive-description">', '</div>');
                ?>
	</header><!-- .page-header -->

	<div class="actividades-listado">
		<?php
            /* Start the Loop */
            while (have_posts()) : the_post();
                /*
                 * Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part('template-parts/content/archive', 'imgd_actividad');

            endwhile;
            ?>
	</div>
</div>

<?php
if (function_exists("wp_bs_pagination")) {
                //wp_bs_pagination($the_query->max_num_pages);
                wp_bs_pagination();
            } else {
                the_posts_navigation();
            } else :

            get_template_part('template-parts/content', 'none');

        endif; ?>

<?php
        //get_sidebar();
        ?>

<?php
get_footer();
