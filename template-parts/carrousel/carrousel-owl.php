 <?php
/*
 * Carrousel Owl
 *
 */

// <!-- start loop SlideShow -->
//echo '<h2>OWL</h2>';

$active = 0;
while ($loop->have_posts()) : $loop->the_post();

    // Verifico que la noticia tenga imágen
    if (imgd_has_slideshow_thumbnail()) {

        $class = "item";

        $carrousel .= '<div class="' . $class . '">';

        /* Obtengo el URL de la imagen principal */
        $post_thumbnail_id = imgd_get_slideshow_thumbnail_id(get_the_ID());
        $html = wp_get_attachment_image_src($post_thumbnail_id, $slider_size );

        $carrousel .='<a href="' . get_permalink() . '">';
        $carrousel .= '<img src="' . $html[0] . '" alt="' . get_the_title() . '">';
        $carrousel .= '</a>';

        /*$carrousel .='<div class="carousel-caption">';

        $carrousel .='<h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
        $carrousel .= '<p class="hidden-xs hidden-sm">' . imgd_content(33) . '</p>';
        $carrousel .='</div>'<!-- end CAPTION-->;*/

        $carrousel .='</div><!-- end item -->';

    }

endwhile;
// Reset the post data
wp_reset_postdata();

//<!-- end loop SlideShow -->
// var_dump($noThumb);    ?>

<?php if ($carrousel != '') { ?>
    <!-- Carrousel -->
        <div id="SlideShow" class="owl-carousel">
                <?php echo $carrousel; ?>
        </div>
    <!-- end Carrousel -->
<?php
} //End Check Carrousel
//echo '<h1>'.$nothumb.'</h1>';
