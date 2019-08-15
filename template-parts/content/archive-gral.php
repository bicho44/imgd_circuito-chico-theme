<?php
/**
* Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Turismo_InterOceánico
 */

?>
<article id="post-<?php the_ID();
?>" <?php post_class();
?>>
	<header class="entry-header">
	<?php
      /* @todo Cambiar para que la imagen sea responsive */
      the_post_thumbnail('thumb-archive');
    ?>
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
endif;

?>

<?php	//if ( 'post' === get_post_type() ) : ?>
	<!--<div class="entry-meta">
		<?php //turismointer_posted_on();
?>
	</div><!-- .entry-meta 
	<?php
	//endif;
?>
-->
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
			the_excerpt();
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php turismointer_entry_footer();
?>
	</footer><!-- .entry-footer -->
<?php	if ( 'post' === get_post_type() ) : ?>
	<div class="entry-meta">
		<?php turismointer_posted_on();
?>
	</div><!-- .entry-meta -->
	<?php
	endif;
?>
</article><!-- #post-## -->
