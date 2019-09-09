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
<?php the_post_thumbnail( 'full-cropped', ['class' => 'actividad-imagen'] );?>
  <!-- <img src="/assets/images/actividades/single/combo-deluxe-2017.jpg" alt="" class="actividad-imagen" /> -->
	<?php the_title( '<h1 class="actividad-titulo">', '</h1>' ); ?>
</header>

<?php
		while ( have_posts() ) : the_post();
?>
<section class="actividad-single">
  <div class="actividad-descripcion">

	<?php the_content(); ?>
		<div class="actividad-galeria">
			<?php
		//$images_galeria = wp_get_attachment_image( , $size:string|array, $icon:boolean, $attr:string|array )

		$image_ids = get_post_meta(get_the_ID(), 'imgd_galeria');
	//	var_dump($image_ids);
// loop through images and display them
foreach ($image_ids as $image) {
// get values of image
	//echo '<pre>'.var_dump($image).'</pre>';

	$img = get_post($image);

	//echo '<pre>'.var_dump($img).'</pre>';
	//echo $img->ID. '<br />';
	echo wp_get_attachment_image( $img->ID, 'thumbnail');
  //$alttext = trim(strip_tags( get_post_meta($image, '_wp_attachment_image_alt', true) ));


}
		?>
		</div>

	</div>
	<?php $aspectos = get_post_meta(get_the_ID(),'imgd_aspectos_importantes_field', true);
		if($aspectos!=""){
	?>
	<div class="actividad-aspectos-importantes">
	<?php echo $aspectos; ?>
	</div>
		<?php } ?>
</section>
<?php $itinerario = get_post_meta(get_the_ID(),'imgd_itinerario_field', true);
		if($itinerario!=""){
	?>
<section class="actividad-col2">
  <div class="actividad-itinerario">
	<?php echo $itinerario; ?>
	</div>
</section>

<?php } ?>
<?php endwhile; ?>
<?php
get_footer();
