 <?php
/*
 * Carrousel for the Home Page
 *
 * With this page we can use the differents carousels supported by a setting option
 */

// Acá seleciono las Páginas que voy a mostrar en la Home

//@TODO: Genera una opción para que muestre las custom post types y las agregue al array
$option_custom_post ='portfolio_project, product';

$args = array('post_type' => array( 'post', 'page', $option_custom_post),
    'meta_key' => 'imgd_slideshow',
    'meta_value' => '1',
    'post_status' => 'publish',
    'post_per_pag' => -1,
);
$loop = new WP_Query($args);

$noThumb = '';
$carrousel = '';

$indicator = "";

$thumbnail_name = img_get_size_thumbnail();
$params = imgd_parametros_thumbnail($thumbnail_name);

//@TODO: Generar una opción para elegir el tipo de Carousel el default es Bootstrap
$optioncarousel = 'bootstrap';
//echo '<h1>Carrousel</H1>';

if ($loop->have_posts()) {
  //get_template_part('template-parts/carrousel', $optioncarousel);
  include( locate_template( 'template-parts/carrousel-'.$optioncarousel.'.php' ) );
}
