<div class="botones">
  <a href="#consulta-<?php the_ID(); ?>" class="btn btn--consulta"><?php _e('Consulta por esta actividad', 'imgd'); ?></a>
  <?php if ($link_compra != "") { ?>
    <a href="<?php echo $link_compra; ?>" class="btn btn--vermas"><?php echo get_post_meta(get_the_ID(), 'imgd_texto_link_compra_field', true); ?></a>
  <?php }; ?>
</div>
