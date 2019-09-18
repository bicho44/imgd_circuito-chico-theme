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

<?php
$back_image="";

    while (have_posts()) : the_post();

    if (has_post_thumbnail()) {
        $back_image=get_the_post_thumbnail_url(null, 'full-cropped');
        $back_image = 'style="background-image: url(\"'.$back_image.'\");';
    }

    ?>

<div class="hero-page" <?php echo $back_image;?> >
    <h1><?php the_title();?>
    </h1>
</div>

<div class="page-area">

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php
            the_content();

            echo wpdocs_custom_taxonomies_terms_links();


            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'turismointer'),
                'after'  => '</div>',
            ));
        ?>

        <?php
        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;

        ?>
    </article>

    <?php endwhile; // End of the loop?>

    <?php get_sidebar(); ?>

</div><!-- .entry-content -->

<?php
get_footer();
