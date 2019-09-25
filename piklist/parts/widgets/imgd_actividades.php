<?php
/*
Title: Listado de Actividades
Description: Muestra eun listado de las actividades usando random par el sidebar
*/

// Acá seleciono las Páginas que voy a mostrar como destacados en la Home
$args = array('post_type' => array('imgd_actividad'),
'post_status' => 'publish',
'posts_per_page' => $settings['imgd_actividades_widget_cant'],
'ignore_sticky_posts'=>true,
'orderby'   => 'rand'
);

$actividades = new WP_Query($args);

//var_dump($actividades);

$title = $settings['imgd_actividades_widget_title'];

?>
<?php echo $before_widget; ?>

<?php echo $before_title; ?>
<?php if (isset($title)) {
    echo $title;
}?>
<?php echo $after_title; ?>

<?php
// Array of stdClass objects.
if ($actividades->have_posts()) {
    //var_dump($actividad);
    while ($actividades->have_posts()) : $actividades->the_post(); ?>
<div class="ActividadWidget">
    <h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
    <?php
    if ($settings['imgd_actividades_widget_thumb']!=0) {
        $thumbnail_size="thumbnail";
        if (isset($settings['imgd_actividades_widget_thumb_format'])) {
            $thumbnail_size=$settings['imgd_actividades_widget_thumb_format'];
        } ?>
    <a href="<?php the_permalink() ?>">
        <?php
    the_post_thumbnail($thumbnail_size, array('class'=>'ActividadWidgetImagen')); ?>
    </a>
    <?php
    } ?>
</div>
<?php
    endwhile; ?>

<?php
} else {
        _e("No hay actividades cargadas por favor cargue alguna actividad", "imgd");
    }?>
<?php echo $after_widget;
