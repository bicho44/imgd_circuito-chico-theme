<?php
/*
* Carrousel Bootstrap Format
*/

// <!-- start loop SlideShow -->
//echo '<h2>Bootstrap</h2>';
?>

<div id="carrousel-bootstrap" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <?php if ( have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>
    
    <li data-target="#carrousel-bootstrap" data-slide-to="<?php echo $loop->current_post; ?>" class="<?php if( $loop->current_post == 0 ):?>active<?php endif; ?>"></li>
    
    <?php endwhile; endif; ?>
  </ol>

  <?php rewind_posts(); ?>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">

    <?php if ( have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>

    <div class="item <?php if( $loop->current_post == 0 ):?>active<?php endif; ?>">

      <?php
        $thumbnail_id = get_post_thumbnail_id(); 
        $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, $slider_size , true );
        $thumbnail_meta = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true);                
      ?>
      <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php echo $thumbnail_meta; ?>"></a>
      <div class="carousel-caption hidden-sm hidden-xs">
        <h2><?php the_title(); ?></h2>
      </div>
    </div>
    
    <?php endwhile; endif; ?>

  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carrousel-bootstrap" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carrousel-bootstrap" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>