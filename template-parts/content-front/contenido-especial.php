<?php

$opciones_imgd = get_option('opciones_imgd');

$slider = $opciones_imgd['imgd_slider'][0];
$slider_size = $opciones_imgd['imgd_slider_size'];

$destanews = $opciones_imgd['imgd_desta_news'];
$destanews_cant = $opciones_imgd['imgd_desta_news_cant'];

$imgd_actividades = $opciones_imgd['imgd_actividades'];
$imgd_actividades_cant = $opciones_imgd['imgd_actividades_cant'];

//echo '<pre>'.var_dump($opciones_imgd).'</pre>';

?>

<?php if ($slider!=0) {?>
	<?php include( locate_template( 'template-parts/carrousel.php' ) );?>
<?php } ?>

<?php if ($destanews!=0) {?>
	<?php include( locate_template( 'template-parts/content-front/destacados-news.php' ) ); ?>
<?php } ?>

<?php if ($imgd_actividades!=0) {?>
	<?php include( locate_template( 'template-parts/content-front/destacados-actividades.php' ) ); ?>
<?php } ?>