<?php
/**
 * Template part for displaying the destacados posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package IMGD portions
 */

?>
<?php
// Must be inside a loop.
if (has_post_thumbnail()) {?>
    <a href="<?php the_permalink(); ?>">
        <?php  /* @todo Cambiar para que la imagen sea responsive */
        the_post_thumbnail('news-featured', array('class'=>'align-center img-responsive'));
        ?>
    </a>
<?php } ?>

<header class="destacados-caption">
    <h3 class="align-center">
        <a href="<?php the_permalink(); ?>" rel="bookmark">
        <?php shortentext(get_the_title(), 65);?>
        </a>
    </h3>
    <div class="destacados-caption-texto">
        <?php shortentext(get_the_content(), 200);  ?>
    </div>
</header><!-- .entry-header -->