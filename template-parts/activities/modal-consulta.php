<section class="modal--show" id="consulta-<?php the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true">

  <div class="modal-inner">
    <header>
      <h3 id="label-fade">Consulta por <?php the_title(); ?>
      </h3>
    </header>
    <div class="modal-content">
      <?php
      /**
       * @todo: hacer un setting para el shortcode
       * @todo: buscar una solución más elegante a tener que madar un do_shortcode
       * @todo: Buscar como mandar un mail mas personalizado de consulta por ejemplo el "subject" del mail y
       *        dentro del cuerpo del mismo algo más adaptado a lo que necesita una consulta
       */
      echo do_shortcode('[contact-form-7 id="100" title="consulta"]') ?>
    </div>
  </div>

  <a href="#!" class="modal-close" title="Close this modal" data-close="Close" data-dismiss="modal">×</a>
</section>
