<?php
/**
 * Header Bootstrap
 *
 * Menu Markup Bootstrap
 *
 * Creator: bicho44
 * Date: 06
 */
?>
<header class="header_nav">
      <h1 class="header__logo">
				<a href="<?php echo esc_url(home_url('/')); ?>"
						title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"
						rel="home">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png"
						alt="<?php esc_attr(bloginfo('name')); ?>" />
				</a>
      </h1>

      <input
        type="checkbox"
        name="switch-toggle"
        class="nav-toggle"
        id="switch"
      />

			<?php
			wp_nav_menu( array(
					'menu' => 'primary',
					'theme_location' => 'primary',
					'depth' => 2,
					'container' => 'nav',
					'container_class' => 'header__main-menu',
					/*'container_id' => 'bs-example-navbar-collapse-1',*/
					/*'menu_class' => 'nav navbar-nav',*/
					'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
					'walker' => new wp_bootstrap_navwalker()
				)
			);
			?>

      <nav class="header__idioma">
				<?php dynamic_sidebar( 'side-bar-top' ); ?>
      </nav>
      <label for="switch" class="nav-toggle-label"><span></span></label>
</header>
