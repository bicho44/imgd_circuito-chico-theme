<?php

/**
 * Template part for displaying the destacados posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package IMGD portions
 */

?>

<?php
// Must be inside a loop.
if (has_post_thumbnail()) { ?>
    <!-- <a href="<?php //the_permalink();
                        ?>"> -->
    <?php  /* @todo Cambiar para que la imagen sea responsive */
        the_post_thumbnail('news-archive');
        ?>
    <!-- </a> -->
<?php } ?>

<h3>
    <a href="<?php the_permalink(); ?>" rel="bookmark">
        <?php the_title(); ?>
    </a>
</h3>

<div class="actividad-caption">
    <?php shortentext(get_the_content(), 100);  ?>
</div>
<?php $link_compra = get_post_meta(get_the_ID(), 'imgd_link_compra_field', true); ?>
<!-- <pre><?php //var_dump($link_compra);
            ?>
</pre> -->

<!-- Precio de la actividad -->
<?php
if ($price = imgd_get_the_price_by_season(get_the_ID())) {
    echo "<span class='pricetag pricetag--front'>$ " . $price . "</span>";
}
?>
<!-- Botones Consulta -->
<?php
get_template_part('template-parts/activities/botones', 'consulta'); ?>

<!-- Modal de la consulta  <?php the_title(); ?> -->
<?php
get_template_part('template-parts/activities/modal', 'consulta'); ?>
