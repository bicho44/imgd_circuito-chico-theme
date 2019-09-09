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


    <div class="botones">
        <a href="#consulta-<?php the_ID(); ?>" class="btn btn--consulta"><?php _e('Consulta por esta actividad','imgd'); ?></a>
        <?php if($link_compra!=""){ ?>
            <a href="<?php echo $link_compra; ?>" class="btn btn--vermas"><?php echo get_post_meta(get_the_ID(), 'imgd_texto_link_compra_field', true);?></a>
        <?php }; ?>
    </div>

    <!-- Acá va el Modal de la consulta por <?php the_title();?> -->
    <section class="modal--show" id="consulta-<?php the_ID(); ?>" tabindex="-1"
        role="dialog" aria-labelledby="modal-label" aria-hidden="true">

    <div class="modal-inner">
            <header><h3 id="label-fade">Consulta por <?php the_title();?></h2></header>
        <div class="modal-content">
        <?php
        /**
         * @todo: hacer un setting para el shortcode
         * @todo: buscar una solución más elegante a tener que madar un do_shortcode
         * @todo: Buscar como mandar un mail mas personalizado de consulta por ejemplo el "subject" del mail y
         *        dentro del cuerpo del mismo algo más adaptado a lo que necesita una consulta
        */
        echo do_shortcode('[contact-form-7 id="124" title="consulta"]') ?>
        </div>
    </div>

    <a href="#!" class="modal-close" title="Close this modal" data-close="Close"
        data-dismiss="modal">×</a>
    </section>
