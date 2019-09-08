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
if (has_post_thumbnail()) {?>
    <!-- <a href="<?php //the_permalink(); ?>"> -->
        <?php  /* @todo Cambiar para que la imagen sea responsive */
        the_post_thumbnail('news-archive');
        ?>
    <!-- </a> -->
<?php } ?>

    <h3>
        <a href="<?php the_permalink(); ?>" rel="bookmark">
        <?php the_title();?>
        </a>
    </h3>

    <div class="actividad-caption">
        <?php shortentext(get_the_content(), 100);  ?>
    </div>
<?php $link_compra = get_post_meta(get_the_ID(), 'imgd_link_compra_field', true); ?>
    <!-- <pre><?php //var_dump($link_compra);?></pre> -->

    <?php if($link_compra!=""){ ?>
    <div class="botones">
        <a href="<?php the_permalink(); ?>" class="btn btn--consulta"><?php _e('Consulta por esta actividad','imgd'); ?></a>
        <a href="<?php echo $link_compra; ?>" class="btn btn--vermas"><?php echo get_post_meta(get_the_ID(), 'imgd_texto_link_compra_field', true);?></a>
    </div>
<?php } ?>
