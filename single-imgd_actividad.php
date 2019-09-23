<?php
/**
 * Template para la actividad
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Circuito_Chico_Adventure
 */

get_header(); ?>

<header class="actividad-header">
	<?php the_title('<h1 class="actividad-titulo">', '</h1>'); ?>
	<?php the_post_thumbnail('full-cropped', ['class' => 'actividad-imagen']);?>
	<!-- <img src="/assets/images/actividades/single/combo-deluxe-2017.jpg" alt="" class="actividad-imagen" /> -->

</header>

<?php
        while (have_posts()) : the_post();
?>
<section class="actividad-single">
	<div class="actividad-descripcion">

		<?php the_content(); ?>

		<?php
            $image_ids = get_post_meta(get_the_ID(), 'imgd_galeria');
            $id_images="";
    // Imploto el array para hacer un CSV de los id de las imágenes
            $id_images= implode(', ', $image_ids);
            // Para Debug
            //echo $id_images."<br />";
        ?>
		<?php
        if ($id_images!="") {?>
		<div class="actividad-galeria">
			<?php	// Muestro la galería
            echo do_shortcode('[gallery ids="'.$id_images.'" size="thumb-archive"]');
            ?>
		</div> <!--  end actividad galeria -->
		<?php } ?>

	</div><!-- End Actividad Descripcion -->
	<?php $aspectos = get_post_meta(get_the_ID(), 'imgd_aspectos_importantes_field', true);
        if ($aspectos!="") {
            ?>
	<div class="actividad-aspectos-importantes">
		<?php echo $aspectos; ?>
	</div>
	<?php
        } ?>
</section>
<?php $itinerario = get_post_meta(get_the_ID(), 'imgd_itinerario_field', true);
        if ($itinerario!="") {
            ?>
<section class="actividad-col2">
	<div class="actividad-itinerario">
		<h3><?php _e('Recorrido Recomendado', 'imgd'); ?>
		</h3>
		<?php echo $itinerario; ?>
	</div>
</section>

<?php
        } ?>
<?php endwhile; ?>
<?php
get_footer();
