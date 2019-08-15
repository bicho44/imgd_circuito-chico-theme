<?php
/**
 * Turismo InterOceánico functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Turismo_InterOceánico
 */

if ( ! function_exists( 'turismointer_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function turismointer_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Turismo InterOceánico, use a find and replace
	 * to change 'turismointer' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'turismointer', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	/**
	* Tratando de resolver el tema de los menues
	*
	* http://wordpress.stackexchange.com/questions/44736/programmatically-add-a-navigation-menu-and-menu-items
	* This theme uses wp_nav_menu() in one location.
	*/
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'imgd' ),
	) );
	
	/*
		$menuname = 'primary';
		$bpmenulocation = 'Primary';
		// Does the menu exist already?
		$menu_exists = wp_get_nav_menu_object( $menuname );
		if( !$menu_exists){
			$menu_id = wp_create_nav_menu($menuname);
			// Set up default BuddyPress links and add them to the menu.
			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' =>  __('Home'),
				'menu-item-classes' => 'home',
				'menu-item-url' => home_url( '/' ), 
				'menu-item-status' => 'publish'));
		}
	*/

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support( 'post-formats', array( 'link', 'video' ) );

	// Set up the WordPress core custom background feature.
	/*add_theme_support( 'custom-background', apply_filters( 'turismointer_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );*/
}
endif;
add_action( 'after_setup_theme', 'turismointer_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function turismointer_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'turismointer_content_width', 970 );
}
add_action( 'after_setup_theme', 'turismointer_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function turismointer_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Front Page Sidebar', 'imgd' ),
		'id'            => 'front-page-sidebar',
		'description'   => esc_html__( 'Area para un Aviso Publicitario o un Banner central', 'imgd' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front Page Sidebar Linea columnas', 'imgd' ),
		'id'            => 'front-page-sidebar-1',
		'description'   => esc_html__( 'Area de Widgets para la línea de 3 columnas', 'imgd' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front Page Sidebar 2 Linea columnas', 'imgd' ),
		'id'            => 'front-page-sidebar-2',
		'description'   => esc_html__( 'Area de Widgets para la línea de 3 columnas', 'imgd' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Paginas', 'imgd' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Columna General para las páginas y noticias.', 'imgd' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer SideBar 1', 'imgd' ),
		'id'            => 'footer-1-sidebar',
		'description'   => esc_html__( 'Primer espacio de Footer.', 'imgd' ),
		'before_widget' => '<section id="%1$s" class="widget col-md-4 %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer SideBar 2', 'imgd' ),
		'id'            => 'footer-2-sidebar',
		'description'   => esc_html__( 'Segundo espacio de Footer.', 'imgd' ),
		'before_widget' => '<section id="%1$s" class="widget col-md-4 %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer SideBar 3', 'imgd' ),
		'id'            => 'footer-3-sidebar',
		'description'   => esc_html__( 'Segundo espacio de Footer.', 'imgd' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'turismointer_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function turismointer_scripts() {
	wp_enqueue_style( 'turismointer-style', get_stylesheet_uri() );

	wp_enqueue_script( 'turismointer-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'turismointer-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'turismointer_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
//require get_template_directory() . '/inc/customizer.php';

/**
 * IMGD additions.
 */
require get_template_directory() . '/imgd/imgd_funciones.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// Change url that is linked from logo

//add_action( 'awebooking/before_main_content', 'awebooking_output_content_wrapper', 10 );
//add_action( 'awebooking/after_main_content', 'awebooking_output_content_wrapper_end', 10 );

add_filter( 'awebooking/before_main_content', 'imgd_awebooking_output_content_wrapper' );
function imgd_awebooking_output_content_wrapper() {
  echo '<div id="primary" class="content-area container"><!-- container -->';
}

add_filter( 'awebooking/after_main_content', 'imgd_awebooking_output_content_wrapper_end' );
function imgd_awebooking_output_content_wrapper_end() {
  echo '</div><!-- end container-->';
}

 //add_action( 'awebooking/sidebar', 'awebooking_get_sidebar', 10 );
/*
function awebooking_get_sidebar() {
	awebooking_get_template( 'global/sidebar.php' );
}*/

/*add_filter( 'awebooking/after_main_content', 'imgd_awebooking_sidebar' );
function imgd_awebooking_sidebar() {
	get_sidebar();
}*/