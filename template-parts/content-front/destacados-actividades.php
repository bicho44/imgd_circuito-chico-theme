<?php

//@TODO: Cambiar el destacados por el que pone las news en una sola línea


// Acá seleciono las Páginas que voy a mostrar como destacados en la Home
$args = array('post_type' => array('imgd_actividad'),
'post_status' => 'publish',
'posts_per_page' => $actividad_cant,
'ignore_sticky_posts'=>true
);

$loop = new WP_Query($args);



if ($loop->have_posts()) {?>
<section class="section-actividades">
      <?php
        echo the_archive_title( "<h1>", "</h1>");
        echo the_archive_description( '<div class="archive-description">', '</div>' );
			?>
      <?php
      $x = 0;
      $destacadosnewsID = array();
?>


<div class="actividades">
<?php
    while ($loop->have_posts()) : $loop->the_post();

      $destacadosnewsID[] = get_the_ID();
?>
      <article id="post-<?php the_ID(); ?>" class="actividad">
          <?php
          get_template_part('template-parts/content-archive', 'desta-news'); ?>
      </article> <!-- End Actividad -->
  <?php $x++; ?>
  <?php endwhile; ?>

</div>
</section>
<?php } ?>

<?php wp_reset_query();
//var_dump($destacadosID);
?>
