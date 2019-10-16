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
	<?php the_post_thumbnail('full-cropped', ['class' => 'actividad-imagen']); ?>
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
				$id_images = "";
				// Imploto el array para hacer un CSV de los id de las imágenes
				$id_images = implode(', ', $image_ids);
				// Para Debug
				//echo $id_images."<br />";
				?>
			<?php
				if ($id_images != "") { ?>
				<div class="actividad-galeria">
					<?php	// Muestro la galería
							echo do_shortcode('[gallery ids="' . $id_images . '" size="thumb-archive"]');
							?>
				</div> <!--  end actividad galeria -->
			<?php } ?>

		</div><!-- End Actividad Descripcion -->

		<div class="sidebar-actividad">
			<!-- Precio de la actividad -->
			<?php
				if ($price = imgd_get_the_price_by_season(get_the_ID())) {
					echo "<span class='pricetag'>$ " . $price . "</span>";
				}
				?>
			<!-- Botones Consulta -->
			<?php
				get_template_part('template-parts/activities/botones', 'consulta'); ?>

			<!-- Modal de la consulta <?php the_title(); ?> -->
			<?php
				get_template_part('template-parts/activities/modal', 'consulta'); ?>


			<?php $aspectos = get_post_meta(get_the_ID(), 'imgd_aspectos_importantes_field', true);
				if ($aspectos != "") {
					?>
				<div class="actividad-aspectos-importantes">

					<h3>
						<?php _e('Aspectos a tener en Cuenta', 'imgd'); ?>
					</h3>
					<?php echo $aspectos; ?>
				</div>
			<?php
				} ?>
			<!-- Botones Consulta -->
			<?php
				get_template_part('template-parts/activities/botones', 'consulta'); ?>
		</div>
	</section>

	<?php $itinerario = get_post_meta(get_the_ID(), 'imgd_itinerario_field', true);
		if ($itinerario != "") {
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
