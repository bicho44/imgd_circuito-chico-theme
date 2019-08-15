<?php
/**
* Template part for displaying page content in page.php.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package Turismo_InterOceánico
*/

$videolink = '';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php //the_post_thumbnail('full-cropped'); ?>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<?php
	$videolink = get_post_meta(get_the_ID(),'imgd_programa_video', true);
	//echo '<strong>Video Link:</strong> '. $videolink.'<br>';

	if($videolink !=''){
		global $wp_embed;
		?>
		<div class="video-programa">
		<?php
		echo $wp_embed->run_shortcode( '[embed]' . $videolink . '[/embed]' );
		//echo do_shortcode("[youtube $videolink]");
		?>
		</div>
		<?php
	}
	?>

	<div class="entry-content">
		<?php
		the_content();

		echo get_datos_video(get_the_ID());

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'turismointer' ),
			'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->

		<?php if ( get_edit_post_link() ) : ?>
			<footer class="entry-footer">
				<?php
				edit_post_link(
				sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'turismointer' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
		?>
	</footer><!-- .entry-footer -->
<?php endif; ?>
</article><!-- #post-## -->
