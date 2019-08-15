 <?php
/*
 * Carrousel for the Home Page
 *
 * With this page we can use the differents carousels supported by a setting option
 */
$option_custom_post = "";
// Acá seleciono las Páginas que voy a mostrar en la Home
$option_custom_post = $opciones_imgd['imgd_slider_post'];
//$option_custom_post ='portfolio_project, product';
//echo '<strong>Custom Post: </strong>'.$option_custom_post.'<br>';
//echo piklist::pre($option_custom_post);

if(empty($option_custom_post)){
  $option_custom_post = array('post, page');
  //echo piklist::pre($option_custom_post);
}
//echo piklist::pre($option_custom_post);
$args = array('post_type' => $option_custom_post,
    'meta_key' => 'imgd_slideshow',
    'meta_value' => '1',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'ignore_sticky_posts'=>true
);
$loop = new WP_Query($args);

//@TODO: Generar una opción para elegir el tipo de Carousel el default es Bootstrap
$optioncarousel = 'bootstrap';
//echo '<h1>Carrousel</H1>';

//echo piklist::pre($loop);

if ($loop->have_posts()) {
?>
<div class="container">
<?php
  //get_template_part('template-parts/carrousel', $optioncarousel);
  include( locate_template( 'template-parts/carrousel/carrousel-'.$optioncarousel.'.php' ) );  
?>
</div>
<?php } 