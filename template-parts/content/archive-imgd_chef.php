<?php
/**
* Template part para Mostrar los Programas
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package IMGD porcitions
*/

?>

<div class="col-sm-6 col-md-4">
  <div class="thumbnail">
    <?php
    // Must be inside a loop.
    if (has_post_thumbnail()) {?>

      <a href="<?php the_permalink(); ?> ">
        <?php
          /* @todo Cambiar para que la imagen sea responsive */
          the_post_thumbnail('thumb-archive');
        ?>
      </a>
      <?php }
      //echo var_dump($notitle);

      ?>
      <header class="destacados-caption caption">
        <?php
        
        the_title(sprintf('<h3><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>');
        
        get_the_terms(get_the_ID());
        ?>
      </header><!-- .entry-header -->

    </div><!-- Thumbnail -->
</div><!-- Col -->
