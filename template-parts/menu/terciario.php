<?php
/**
* The sidebar containing the main widget area.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package Turismo_InterOceánico
*/
if ( is_active_sidebar( 'front-page-sidebar-2' )  ) : ?>
  <aside id="terciary" class="widget-area col-md-3" role="complementary">
    <?php dynamic_sidebar( 'front-page-sidebar-2' ); ?>
  </aside><!-- #secondary -->
<?php endif; ?>
