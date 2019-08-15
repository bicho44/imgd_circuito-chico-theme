<?php
/**
* The sidebar containing the main widget area.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package Turismo_InterOceánico
*/
?>
<?php if ( is_active_sidebar( 'front-page-sidebar-1' ) ) : ?>
<aside id="secondary" class="widget-area col-md-3 col-sm-6 col-xs-12" role="complementary">
    <?php dynamic_sidebar( 'front-page-sidebar-1' ); ?>
</aside><!-- #secondary -->
<?php endif; ?>