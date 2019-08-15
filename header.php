<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Filmarte
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'filmarte' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="row">
			<div class="brand col-md-4">
				<a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand" 
					title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" 
					rel="home">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png"
					alt="<?php esc_attr(bloginfo('name')); ?>"
					height="100px">
				</a>
			</div>
			<div class="sidebar-top col-md-8">
				<?php dynamic_sidebar( 'sidebar-top' ); ?>
			</div>
		</div>
			<?php get_template_part('template-parts/menu','bootstrap-no-brand'); ?>
	</header><!-- #masthead -->
