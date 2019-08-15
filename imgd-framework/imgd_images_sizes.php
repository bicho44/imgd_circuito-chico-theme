<?php
/**
 * Definición de Custom image Sizes
 * Used for large feature (header) images.
 * $resolutions   = array(1200, 979, 767, 480);
 *
 * @User: bicho44
 * @Date: 26/08/13
 *
 * @TODO Revisar como entregar la imagen en el tamaño correcto.
 * @package: IMGD Framework
 */

//1162x581.

add_image_size('full-cropped', 1150, 480, true);

add_image_size('header-cropped', 1150, 300, true, array( 'center', 'top' ) );

add_image_size('show-cropped', 340, 340, true);
add_image_size('show-archive', 750, 200, true);

add_image_size('news-featured', 750, 420, true);
add_image_size('news-archive', 360, 200, true);

/*add_image_size('tablet-v', 780, 400, true);
add_image_size('phones', 480, 250, true);
*/

add_image_size('thumb-archive', 300, 150, true);
add_image_size('stamp', 65, 65, true);

//add_image_size('lead-image', 780, 260, true);


/**
 * Get Size thumbnail
 *
 * @return string el nombre de la clase CSS
 */
function img_get_size_thumbnail()
{
    $thumbnail_name = 'full-cropped';

    /* Check to see if a valid cookie exists */
    if (isset($_COOKIE['resolution'])) {
        $cookie_value = intval($_COOKIE['resolution']);
    } else {
        $cookie_value = 1200;
    }

    if ($cookie_value >= 981) {
        $thumbnail_name = 'full-cropped';
    } elseif ($cookie_value >= 781 && $cookie_value <= 980) {
        $thumbnail_name = 'tablet-h';
    } elseif ($cookie_value >= 481 && $cookie_value <= 780) {
        $thumbnail_name = 'tablet-v';
    } elseif ($cookie_value <= 480) {
        $thumbnail_name = 'phones';
    }

    return $thumbnail_name;
}

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function imgd_content_image_sizes_attr( $sizes, $size ) {
    $width = $size[0];
    840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';
    if ( 'page' === get_post_type() ) {
        840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
    } else {
        840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
        600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
    }
    return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'imgd_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function imgd_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
    if ( 'post-thumbnail' === $size ) {
        is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
        ! is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
    }
    return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'imgd_post_thumbnail_sizes_attr', 10 , 3 );



if(!function_exists('imgd_has_slideshow_thumbnail')) {
    /**
     * Verifica que haya imagen en el SlideShow
     *
     * @param null $post
     * @return bool
     */
    function imgd_has_slideshow_thumbnail($post = null)
    {
        return (bool)imgd_get_slideshow_thumbnail_id($post);
    }
}

if(!function_exists('imgd_get_slideshow_thumbnail_id')) {
	/**
	 * Retrieve SlideShow Image thumbnail ID.
	 *
	 * @since 2.9.0
	 * @since 4.4.0 `$post` can be a post ID or WP_Post object.
	 *
	 * @param int|WP_Post $post Optional. Post ID or WP_Post object. Default is global `$post`.
	 * @return string|int Post thumbnail ID or empty string.
	 */

	function imgd_get_slideshow_thumbnail_id($post = null)
	{
		$post = get_post($post);
		if (!$post) {
			return '';
		}
		return get_post_meta($post->ID, 'imgd_image_slideshow', true);
	}
}

if (!function_exists('get_intermediate_image_names')){
/**
* Get the list of images Sizes in a array
*
* @global $_wp_additional_image_sizes
 * @uses   get_intermediate_image_sizes()
 * @return array $sizes Data for all currently-registered image sizes.
 */
 function get_intermediate_image_names() {
	global $_wp_additional_image_sizes;

    $sizes = array();

    foreach ( get_intermediate_image_sizes() as $_size ) {
		$sizes[ $_size] = $_size;
		}
    return $sizes;
 }


/**
 * Get size information for all currently-registered image sizes.
 *
 * @global $_wp_additional_image_sizes
 * @uses   get_intermediate_image_sizes()
 * @return array $sizes Data for all currently-registered image sizes.
 */
function get_image_sizes() {
	global $_wp_additional_image_sizes;

	$sizes = array();

	foreach ( get_intermediate_image_sizes() as $_size ) {
		if ( in_array( $_size, array('thumbnail', 'medium', 'medium_large', 'large') ) ) {
			$sizes[ $_size ]['width']  = get_option( "{$_size}_size_w" );
			$sizes[ $_size ]['height'] = get_option( "{$_size}_size_h" );
			$sizes[ $_size ]['crop']   = (bool) get_option( "{$_size}_crop" );
		} elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
			$sizes[ $_size ] = array(
				'width'  => $_wp_additional_image_sizes[ $_size ]['width'],
				'height' => $_wp_additional_image_sizes[ $_size ]['height'],
				'crop'   => $_wp_additional_image_sizes[ $_size ]['crop'],
			);
		}
	}

	return $sizes;
}



/**
 * Get size information for a specific image size.
 *
 * @uses   get_image_sizes()
 * @param  string $size The image size for which to retrieve data.
 * @return bool|array $size Size data about an image size or false if the size doesn't exist.
 */
function get_image_size( $size ) {
	$sizes = get_image_sizes();

	if ( isset( $sizes[ $size ] ) ) {
		return $sizes[ $size ];
	}

	return false;
}

/**
 * Get the width of a specific image size.
 *
 * @uses   get_image_size()
 * @param  string $size The image size for which to retrieve data.
 * @return bool|string $size Width of an image size or false if the size doesn't exist.
 */
function get_image_width( $size ) {
	if ( ! $size = get_image_size( $size ) ) {
		return false;
	}

	if ( isset( $size['width'] ) ) {
		return $size['width'];
	}

	return false;
}

/**
 * Get the height of a specific image size.
 *
 * @uses   get_image_size()
 * @param  string $size The image size for which to retrieve data.
 * @return bool|string $size Height of an image size or false if the size doesn't exist.
 */
function get_image_height( $size ) {
	if ( ! $size = get_image_size( $size ) ) {
		return false;
	}

	if ( isset( $size['height'] ) ) {
		return $size['height'];
	}

	return false;
}

}