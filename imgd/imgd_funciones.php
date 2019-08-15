<?php
/* @var opciones_imgd */
$opciones_imgd = get_option('opciones_imgd');

/**
 * Jquery enqueue
 * @package: IMGD Framework
 */
// jQuery from Google's CDN, fallback to local if not available
add_action('wp_enqueue_scripts', 'load_external_jQuery');

// Deregister jQuery that is included with WordPress
function load_external_jQuery() {
	wp_deregister_script( 'jquery' );

// Check to make sure Google's library is available
	$link = 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js';
	$try_url = @fopen($link,'r');
	if( $try_url !== false ) {
		// If it's available, get it registered
		wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', false, null, true);
	} else {
		// Register the local file if CDN fails
		wp_register_script('jquery', get_template_directory_uri().'/assets/js/vendor/jquery.min.js', __FILE__, false, '2.2.4', true);
	}
	// Get it enqueued
	wp_enqueue_script('jquery');
}



/**
 * Enqueue scripts and styles.
 */
function imgdigital_scripts() {

	//Modernizer
	wp_register_script('img_modern', get_template_directory_uri() . '/assets/js/vendor/modernizr-2.6.2.min.js', false, null, false);

    // Scripts from Bootstrap
    wp_enqueue_script( 'scripts-ck', get_template_directory_uri() . '/assets/js/script-ck.js', array( 'jquery' ), null, true );

	wp_enqueue_script('img_modern');

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

	wp_enqueue_style( 'imgdigital-style', get_template_directory_uri()."/assets/css/style.css");

}
add_action( 'wp_enqueue_scripts', 'imgdigital_scripts', 20 );


/** Definir el largo de los excerpt */
define('POST_EXCERPT_LENGTH', 55);

/** Enable to load jQuery from the Google CDN */
//add_theme_support('jquery-cdn');

/**
* Agregar el Back to Top
*/
//echo '<pre>Opcion to top:'. var_dump($opciones_imgd['imgd_goto_top'][0]).'</pre>';
function back_to_top() {
    $imageid = $opciones_imgd['imgd_image_to_top'][0];
    //echo '<pre>'.var_dump ($imageid).'</pre>';

    if ($imageid==null) {
        $contenido = "Back to Top ˆ";
    } else {
    $image_attach =  get_attached_file($imageid);
    echo 'IMAGE ATTACH'. var_dump($image_attach);
        $contenido = '<img src="'.get_stylesheet_directory_uri().'/assets/images/enbiga-con-plato-totop.png">';
    }
    echo '<a id="totop" href="#">'.$contenido.'</a>';
}

/* Check if back to top está activado */
if ($opciones_imgd['imgd_goto_top'][0]!=0){
    add_action( 'wp_footer', 'back_to_top' );
}
/**
 * Agrego el estilo del editor de texto en el Administrador
 */
function imgd_theme_add_editor_styles() {
    add_editor_style( get_template_directory_uri().'/assets/css/admin-editor.css' );
}
add_action( 'admin_init', 'imgd_theme_add_editor_styles' );

function imgd_theme_add_font_editor_styles() {
    $font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Hind:300|Lato|Montserrat:400,700');//fonts.googleapis.com/css?family=Open:400,700,900'' );
    add_editor_style( $font_url );

    /*$font_url2 = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Open+Sans:400,300,600' );
    add_editor_style( $font_url2 );*/
}
add_action( 'after_setup_theme', 'imgd_theme_add_font_editor_styles' );


// Include and instantiate the class.
require_once get_template_directory() . '/imgd/mobile/Mobile_Detect.php';
$isMobile = new Mobile_Detect;

function if_mobile_get_me_this_class($class='', $echo='false'){
    global $isMobile;
    if ($isMobile->isMobile()){
        if ($echo){
            echo $class;
        } else {
            return $class;
        }
    }
}

/**
 * Otros elementos para este tema
 *
 * @package: IMGD Framework
 */
require get_template_directory() . '/imgd/imgd_fonts.php';
require get_template_directory() . '/imgd/imgd_images_sizes.php';
require get_template_directory() . '/imgd/imgd_gallery.php';
require get_template_directory() . '/imgd/imgd_nav.php';
require get_template_directory() . '/imgd/imgd_child_pages.php';
require get_template_directory() . '/imgd/imgd_comment_bootstrap.php';
require get_template_directory() . '/imgd/imgd_link_navigation.php';
//require get_template_directory() . '/inc/meta-box/meta-box.php';// MetaBox functions
//require get_template_directory() . '/imgd/imgd_widgets.php';
//require get_template_directory() . '/imgd/imgd_pagination.php';
//require get_template_directory() . '/inc/imgd/imgd_it_exchange.php';
//require get_template_directory() . '/imgd/imgd_archive_order.php';
require get_template_directory() . '/imgd/imgd_settings.php';
//require get_template_directory() . '/inc/imgd/imgd_onepage_settings.php'; // Estas opciones estaban pensadas para el theme de onepagescroll

require get_template_directory() . '/imgd/imgd_shortcode.php';
require get_template_directory() . '/imgd/imgd_jetpack_mods.php';




/**
 * Remueve todo lo que esté en el título de los Archivos
 *
 * Simply remove anything that looks like an archive
 * title prefix ("Archive:", "Foo:", "Bar:").
 *
 * @package: IMGD Framework
 */
add_filter('get_the_archive_title', function ($title) {
    return preg_replace('/^\w+: /', '', $title);
});

/*
 * Remueve la palabra categoria
 *
 * @package:
 */
add_filter( 'get_the_archive_title', function ( $title ) {

    if( is_category() ) {

        $title = single_cat_title( '', false );

    }

    return $title;

});

/*
 * Registro del Menú Social
 */
function imgd_register_menus() {
    register_nav_menu( 'social', __( 'Social', 'imgdigital' ) );
    register_nav_menu( 'secondary', __( 'Secundario', 'imgdigital' ) );
}
add_action( 'init', 'imgd_register_menus' );


/**
 * Agregar el Estilo al admim
 */
function imgd_admin_style() {
    wp_enqueue_style('admin_styles' , get_template_directory_uri().'/assets/css/admin.css');
}
//add_action('admin_head', 'imgd_admin_style');


/*
 * IMGD Credits
 * Muestra los créditos de IMGDigital
 *
 */
function imgd_credits($inicio='',$p = true) {
    $fecha = "";
    If ($inicio != ''){
        $fecha = $inicio. " - ";
    }
    $copy = 'Copyright '.$fecha.date('Y').' - <a href="http://imgdigital.com.ar/">Federico Reinoso</a>';
    if($p){
        echo $copy;
    } else {
        return $copy;
    }
}
add_action('imgdigital_credits', 'imgd_credits');


/**
 * IMGD Custom Post
 *
 * @param $atts array
 * @return string
 *
 * @TODO: Describir la funcion de imgd_custompost()
 */
function imgd_custompost($atts){
    extract( shortcode_atts( array(
        'post_type' => 'portfolio_item',
        'template' => 'thumbnails',
        'limit' => '10',
        'orderby' => 'date',
    ), $atts ) );

    // Creating custom query to fetch the project type custom post.
    $loop = new WP_Query(array('post_type' => $post_type, 'posts_per_page' => $limit, 'orderby' => $orderby));

    if ($loop->have_posts()) {

        $output = '<div class="row">';
        while ($loop->have_posts()) {
            $loop->the_post();


            $output .= '<div class="type-post hentry col-sm-6 col-md-3">';
            $output .= '    <div class="thumbnail">';
            if (has_post_thumbnail(get_the_ID())) {

                $atts = array(
                    'alt'	=> trim(strip_tags( get_the_title() )),
                    'title'	=> trim(strip_tags( get_the_excerpt() )),
                );

            $output .= '       <a href="'.get_permalink().'" title="'.get_the_title().'">';
            $output .=            get_the_post_thumbnail(get_the_ID(),'thumb-archive', $atts);
            $output .= '       </a>';

            } elseif($post_type == "it_exchange_prod") { ?>
                    <p>ID: <?php
                echo get_the_ID();?></p>
                <p>
                <?php
                $data = it_exchange_get_product(get_the_ID());
                //$data_image = $data->hasimage();
                //it_exchange( 'product', 'has-images' )
                echo 'Has Featured: '. $data->has->featured-image;
                ?>
                <br>
                <?php echo 'Featured Image: '.$data->featured-image; ?>
                </p>
                <code><?php var_dump($data->featured-image); ?></code>

            <?php } else {
                $output .= '       <a href="'.get_permalink().'" >';
                $output .=            '<img src="http://lorempixel.com/gray/253/132/abstract/No Thumbnail" alt="No thumbnail">';
                $output .= '       </a>';
            }

            $output .= '       <div class="caption">';
            $output .= '           <h3 class="entry-title">';
            $output .= '              <a href="'.get_permalink().'">'.get_the_title().'</a>';
            $output .= '           </h3>';
            $output .= '           <div class="entry-content">'.get_the_excerpt().'</div>';
            $output .= '       </div><!-- end caption -->';
            $output .= '     </div><!-- end Thumbnail -->';
            $output .= '</div><!-- end col -->';
        }
        $output .= '</div><!-- end row -->';
    } else {
        $output = '<h2>No hay datos para '. $post_type.'</h2>';
    }
    return $output;
}
add_shortcode('imgdpost','imgd_custompost');


/**
 * Thumbnail Extra
 *
 * Description: Devuelve el
 * @param $postID
 * @return string
 */
function thumbnail_extra($postID) {

    $thumb = "http://lorempixel.com/gray/253/132/abstract/0/No Thumbnail";

    if (!$postID) {
        $postID = get_the_ID();
    }

    $files = get_children('post_parent='.$postID.'&post_type=attachment&post_mime_type=image');
      if($files) :
        $keys = array_reverse(array_keys($files));
        $j=0;
        $num = $keys[$j];
        $image = wp_get_attachment_image($num, 'thumbnail', false);
        $imagepieces = explode('"', $image);
        $imagepath = $imagepieces[1];
        $thumb = wp_get_attachment_thumb_url($num);
      endif;

    return $thumb;
}

function shortentext($text, $chars_limit = 18) {
	echo get_shortentext($text, $chars_limit);
}

/**
* Limitar la cantidad de caracteres en el título
*
* @link: http://www.wpbeginner.com/wp-themes/how-to-truncate-wordpress-post-titles-with-php/
*
*/
function get_shortentext($text, $chars_limit = 18) { // Function name ShortenText
  if (!$chars_limit) $chars_limit = 18; // Character length

  $chars_text = strlen($text);
  $text = $text." ";

  $text = trim(strip_tags( $text ));
  $text = preg_replace('`\[[^\]]*\]`', '', $text);

  $text = substr($text,0,$chars_limit);

  $text = substr($text,0,strrpos($text,' '));

  if ($chars_text > $chars_limit)
     { $text = $text."..."; } // Ellipsis
     return $text;
}

/**
 * IMGD Content
 *
 * @param int $limit Limite de palabras
 * @return string $content El contenido reducido de acuendo al límite de palabras
 */
function get_imgd_content($limit=35,$content="") {

    global $post;

    if($content==''){
        $content = get_the_content();
        $content = preg_replace('/<img[^>]+./','', $content);
        $content = explode(' ', $content, $limit);
    } else {
        $content = preg_replace('/<img[^>]+./','', $content);
        $content = explode(' ', $content, $limit);
    }

    if (count($content) >= $limit) {
        array_pop($content);
        $content = implode(" ", $content) . '...';
    } else {
        $content = implode(" ", $content);
    }

//    $content = preg_replace('/\[.+\]/', '', $content);
    $content = apply_filters('the_content', $content);
    $content = preg_replace('/\[.+\]/', '', $content);
    $content = str_replace(']]>', ']]&gt;', $content);

    return $content;
}

function imgd_content($limit=35,$content=""){
	echo get_imgd_content($limit,$content);
}

/**
 * IMG Excerpt
 * Limita la cantidad de palabras en el excerpt de acuerdo a una cantidad dada.
 *
 * @param int $limit Límite de palabras
 * @return string El contenido del excerpt limitado por el límite
 */
function imgd_excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . '...';
    } else {
        $excerpt = implode(" ", $excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
    return $excerpt;
}

/**
 * Parametros para el BFI Thumb
 *
 * Devuelve los parámetros para croppear las imagenes
 *
 * @param $thumbnail_name
 * @return array con los parametros
 */
function imgd_parametros_thumbnail($thumbnail_name=""){
    // Determinar el tamaño de la imagen del Carrousel
     if ($thumbnail_name=="full-cropped"){
         $params = array(
             'width'    =>  1300,
             'height'   =>  500,
             'crop'     =>  true
         );
     } elseif ($thumbnail_name=="tablet") {
         $params = array(
             'width'    =>  722,
             'height'   =>  280,
             'crop'     =>  true
         );
     } elseif ($thumbnail_name=="phones") {
         $params = array(
             'width'    =>  349,
             'height'   =>  140,
             'crop'     =>  true
         );
     }

    return $params;
}

/**
 * IMGD Thumbnail
 *
 * @param $postID
 * @param string $size
 * @param string $alttext
 * @return string HTML de la imagen
 */
function imgd_thumbnail($postID, $size='full-cropped', $alttext=""){

    /* Obtengo el URL de la imagen principal */
    $post_thumbnail_id = get_post_thumbnail_id($postID);

    /* Array con los datos de la imagen */
    $html = wp_get_attachment_image_src($post_thumbnail_id, $size);

    /* obtengo los parámetros para el resize */
    $params = imgd_parametros_thumbnail($size);

    /* HTML a devolver */
    $imagen = '<img src="' . bfi_thumb( $html[0], $params ) . '" alt="' . $alttext . '">';

    return $imagen;
}

/**
 * CC Mime Types
 * Habilitar la Posibilidad que Wordpress lea y acepte SVG's
 *
 * @param $mimes
 * @return mixed
 */
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/**
 * Get taxonomies terms links.
 *
 * @see get_object_taxonomies()
 * @link: https://developer.wordpress.org/reference/functions/get_the_terms/
 */
function wpdocs_custom_taxonomies_terms_links($classul="list-inline", $heading="h4", $display="list", $nolink="false") {
    global $post;
    // Get post by post ID.
    $post = get_post( $post->ID );

    // Get post type by post.
    $post_type = $post->post_type;

    // Get post type taxonomies.
    $taxonomies = get_object_taxonomies( $post_type, 'objects' );

    $out = array();

    foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){

        // Get the terms related to post.
        $terms = get_the_terms( $post->ID, $taxonomy_slug );

        if ( ! empty( $terms ) ) {
            $out[] = "<".$heading.">" . $taxonomy->label . "</".$heading.">\n<ul class='".$classul."'>";
            foreach ( $terms as $term ) {
                $out[] = sprintf( '<li><a href="%1$s">%2$s</a></li>',
                    esc_url( get_term_link( $term->slug, $taxonomy_slug ) ),
                    esc_html( $term->name )
                );
            }
            $out[] = "\n</ul>\n";
        }
    }
    return implode( '', $out );
}

if (!function_exists('imgd_paises')){

/**
* IMGD Paises
* Devuelve un array con los países
*
**/
    function imgd_paises(){
        $paises = array
        (
        93 => "Afghanistan",
        355 => "Albania",
        213 => "Algeria",
        1 => "American Samoa",
        376 => "Andorra",
        244 => "Angola",
        1 => "Anguilla",
        1 => "Antigua and Barbuda",
        54 => "Argentina",
        374 => "Armenia",
        297 => "Aruba",
        247 => "Ascension",
        61 => "Australia",
        43 => "Austria",
        994 => "Azerbaijan",
        1 => "Bahamas",
        973 => "Bahrain",
        880 => "Bangladesh",
        1 => "Barbados",
        375 => "Belarus",
        32 => "Belgium",
        501 => "Belize",
        229 => "Benin",
        1 => "Bermuda",
        975 => "Bhutan",
        591 => "Bolivia",
        387 => "Bosnia and Herzegovina",
        267 => "Botswana",
        55 => "Brazil",
        1 => "British Virgin Islands",
        673 => "Brunei",
        359 => "Bulgaria",
        226 => "Burkina Faso",
        257 => "Burundi",
        855 => "Cambodia",
        237 => "Cameroon",
        1 => "Canada",
        238 => "Cape Verde",
        1 => "Cayman Islands",
        236 => "Central African Republic",
        235 => "Chad",
        56 => "Chile",
        86 => "China",
        57 => "Colombia",
        269 => "Comoros",
        242 => "Congo",
        682 => "Cook Islands",
        506 => "Costa Rica",
        385 => "Croatia",
        53 => "Cuba",
        357 => "Cyprus",
        420 => "Czech Republic",
        243 => "Democratic Republic of Congo",
        45 => "Denmark",
        246 => "Diego Garcia",
        253 => "Djibouti",
        1 => "Dominica",
        1 => "Dominican Republic",
        670 => "East Timor",
        593 => "Ecuador",
        20 => "Egypt",
        503 => "El Salvador",
        240 => "Equatorial Guinea",
        291 => "Eritrea",
        372 => "Estonia",
        251 => "Ethiopia",
        500 => "Falkland (Malvinas) Islands",
        298 => "Faroe Islands",
        679 => "Fiji",
        358 => "Finland",
        33 => "France",
        594 => "French Guiana",
        689 => "French Polynesia",
        241 => "Gabon",
        220 => "Gambia",
        995 => "Georgia",
        49 => "Germany",
        233 => "Ghana",
        350 => "Gibraltar",
        30 => "Greece",
        299 => "Greenland",
        1 => "Grenada",
        590 => "Guadeloupe",
        1 => "Guam",
        502 => "Guatemala",
        224 => "Guinea",
        245 => "Guinea-Bissau",
        592 => "Guyana",
        509 => "Haiti",
        504 => "Honduras",
        852 => "Hong Kong",
        36 => "Hungary",
        354 => "Iceland",
        91 => "India",
        62 => "Indonesia",
        870  => "Inmarsat Satellite",
        98 => "Iran",
        964 => "Iraq",
        353 => "Ireland",
        972 => "Israel",
        39 => "Italy",
        225 => "Ivory Coast",
        1 => "Jamaica",
        81 => "Japan",
        962 => "Jordan",
        7 => "Kazakhstan",
        254 => "Kenya",
        686 => "Kiribati",
        965 => "Kuwait",
        996 => "Kyrgyzstan",
        856 => "Laos",
        371 => "Latvia",
        961 => "Lebanon",
        266 => "Lesotho",
        231 => "Liberia",
        218 => "Libya",
        423 => "Liechtenstein",
        370 => "Lithuania",
        352 => "Luxembourg",
        853 => "Macau",
        389 => "Macedonia",
        261 => "Madagascar",
        265 => "Malawi",
        60 => "Malaysia",
        960 => "Maldives",
        223 => "Mali",
        356 => "Malta",
        692 => "Marshall Islands",
        596 => "Martinique",
        222 => "Mauritania",
        230 => "Mauritius",
        262 => "Mayotte",
        52 => "Mexico",
        691 => "Micronesia",
        373 => "Moldova",
        377 => "Monaco",
        976 => "Mongolia",
        382 => "Montenegro",
        1 => "Montserrat",
        212 => "Morocco",
        258 => "Mozambique",
        95 => "Myanmar",
        264 => "Namibia",
        674 => "Nauru",
        977 => "Nepal",
        31 => "Netherlands",
        599 => "Netherlands Antilles",
        687 => "New Caledonia",
        64 => "New Zealand",
        505 => "Nicaragua",
        227 => "Niger",
        234 => "Nigeria",
        683 => "Niue Island",
        850 => "North Korea",
        1 => "Northern Marianas",
        47 => "Norway",
        968 => "Oman",
        92 => "Pakistan",
        680 => "Palau",
        507 => "Panama",
        675 => "Papua New Guinea",
        595 => "Paraguay",
        51 => "Peru",
        63 => "Philippines",
        48 => "Poland",
        351 => "Portugal",
        1 => "Puerto Rico",
        974 => "Qatar",
        262 => "Reunion",
        40 => "Romania",
        7 => "Russian Federation",
        250 => "Rwanda",
        290 => "Saint Helena",
        1 => "Saint Kitts and Nevis",
        1 => "Saint Lucia",
        508 => "Saint Pierre and Miquelon",
        1 => "Saint Vincent and the Grenadines",
        685 => "Samoa",
        378 => "San Marino",
        239 => "Sao Tome and Principe",
        966 => "Saudi Arabia",
        221 => "Senegal",
        381 => "Serbia",
        248 => "Seychelles",
        232 => "Sierra Leone",
        65 => "Singapore",
        421 => "Slovakia",
        386 => "Slovenia",
        677 => "Solomon Islands",
        252 => "Somalia",
        27 => "South Africa",
        82 => "South Korea",
        34 => "Spain",
        94 => "Sri Lanka",
        249 => "Sudan",
        597 => "Suriname",
        268 => "Swaziland",
        46 => "Sweden",
        41 => "Switzerland",
        963 => "Syria",
        886 => "Taiwan",
        992 => "Tajikistan",
        255 => "Tanzania",
        66 => "Thailand",
        228 => "Togo",
        690 => "Tokelau",
        1 => "Trinidad and Tobago",
        216 => "Tunisia",
        90 => "Turkey",
        993 => "Turkmenistan",
        1 => "Turks and Caicos Islands",
        688 => "Tuvalu",
        256 => "Uganda",
        380 => "Ukraine",
        971 => "United Arab Emirates",
        44 => "United Kingdom",
        1 => "United States of America",
        1 => "U.S. Virgin Islands",
        598 => "Uruguay",
        998 => "Uzbekistan",
        678 => "Vanuatu",
        379 => "Vatican City",
        58 => "Venezuela",
        84 => "Vietnam",
        681 => "Wallis and Futuna",
        967 => "Yemen",
        260 => "Zambia",
        263 => "Zimbabwe"
        );
    return $paises;
    }
}

/*function to add async to all scripts*/
function js_async_attr($tag){

# Add async to all remaining scripts
return str_replace( ' src', ' async="async" src', $tag );
}
//add_filter( 'script_loader_tag', 'js_async_attr', 10 );