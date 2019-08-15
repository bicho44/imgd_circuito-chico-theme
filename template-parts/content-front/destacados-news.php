<?php

//@TODO: Cambiar el destacados por el que pone las news en una sola línea


// Acá seleciono las Páginas que voy a mostrar como destacados en la Home
$args = array('post_type' => array('post', 'page','imgd_programa', 'portfolio_item', 'imgd_productos', 'imgd_casino_shows'),
'meta_key' => 'imgd_home',
'meta_value' => '1',
'post_status' => 'publish',
'posts_per_page' => $destanews_cant,
'ignore_sticky_posts'=>true
);

$loop = new WP_Query($args);

if ($loop->have_posts()) {?>
<section class="container imgd-destacados-news">
  <div class="row newsfeature">
      <?php
      $x = 0;
      $destacadosnewsID = array();  

// Exclude tablets.
if (!$isMobile->isMobile() && !$isMobile->isTablet() ) {  ?>
<?php 
while ($loop->have_posts()) : $loop->the_post();
      $destacadosnewsID[] = get_the_ID();
?>
  <?php
  if ($x==0) {
  ?>
  <!-- Columna Principal -->
  <div class="news-principal col-md-8">
    <article id="post-<?php the_ID(); ?>">
      <div class="thumbnail">
        <?php get_template_part('template-parts/content-archive', 'desta-news'); ?>
      </div><!-- End Thumbanil -->
    </article> 
  </div>
  <!-- End Columna Principal -->

  <!-- Columna Secundaria -->
  <div class="news-principal col-md-4">
      <?php
      } 
    if ($x>0) {
      ?>
        <article id="post-<?php the_ID(); ?>" <?php //post_class('col-md-2 col-sm-4 col-xs-6'); ?>>
          <div class="thumbnail">
            <?php get_template_part('template-parts/content-archive', 'desta-news-gral'); ?>
          </div>
        </article>
    <?php } ?> 
    
  <?php $x++; ?>
<?php endwhile; ?>

    </div> <!-- End Columna secundaria -->

<?php } else { ?>
<?php 
while ($loop->have_posts()) : $loop->the_post();
      $destacadosnewsID[] = get_the_ID();
?>
<div class="news-principal col-md-4">
    <article id="post-<?php the_ID(); ?>">
      <div class="thumbnail">
        <?php get_template_part('template-parts/content-archive', 'desta-news'); ?>
      </div><!-- End Thumbanil -->
    </article> 
  </div>

  <?php $x++; ?>
<?php endwhile; ?>
<?php } ?>
  </div> <!-- End row -->

</section>
<?php } ?>
<?php wp_reset_query();
//var_dump($destacadosID);
?>
