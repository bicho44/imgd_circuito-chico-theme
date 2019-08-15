<?php
/*
* Tres columnas con espacio de menúes
*/

// Acá seleciono las Páginas que voy a mostrar como destacados en la Home
if (!isset($destacadosID)){
  $destacadosID = array();
}

/**
* Saco esto para que sólo se muestren las Noticias
* 'post_type' => array('post', 'page','imgd_programa'),
*/

$args = array(
  'ignore_sticky_posts'=>true,
  'post_status' => 'publish',
  'post__not_in' => $destacadosID,
  'posts_per_page' => 6
);
$loop = new WP_Query($args);
?>
<section class="tres-columnas">
  
  <div class="container">
    <div class="row">

      <?php include( locate_template('template-parts/menu/secundario.php')); ?>

      <div class="col-md-6 col-sm-6 col-xs-12">
        <?php if ($loop->have_posts()) {?>
          <h3><?php _e('Últimas Noticias', 'imgd'); ?></h3>
          <?php
          $x = 0;
          while ($loop->have_posts()) : $loop->the_post(); ?>
            <?php
            get_template_part( 'template-parts/content', 'novedades');
            $x++;
            ?>
        <?php endwhile;
      } ?>
    </div>

    <?php include( locate_template('template-parts/menu/terciario.php')); ?>

  </div>
</div>

</section>
<?php wp_reset_query(); ?>
