<?php
/**
* Template part para Mostrar las Actividades
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package IMGD porcitions
*/
?>

<div class="actividad-archive">
    <?php
    // Must be inside a loop.
    imgd_post_thumbnail();
    ?>
    <header class="caption">
      <?php
      //get_the_terms(get_the_ID());
      the_title(sprintf('<h3><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>');
      ?>
    </header><!-- .entry-header -->
    <div class="actividad-caption-text">
    <?php
      shortentext(get_the_content(), 100);
    ?>
    </div>

</div><!-- Actividad -->
