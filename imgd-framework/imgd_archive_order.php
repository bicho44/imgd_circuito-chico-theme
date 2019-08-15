<?php
/*
 * Generar el ordenamiento del archivo de una CPT
 *
 * Source https://gist.github.com/Shelob9/8833452
 *
 * @TODO generar un setting para activar o desactivar esta opción
 *
 */

// WP_Query arguments
$args = array (
    'name'                   => 'imgd_casino_shows',
    'order'                  => 'ASC',
    'orderby'                => 'none',
    'meta_query'             => array(
        array(
            'key'       => 'imgd_casino_show_date',
            'compare'   => '>=',
            'type'      => 'DATE',
        ),
    ),
);

function slug_order_archive_by_field( $query ) {
    //Only do if is main query fo a specific cpt's archive.

    if ( $query->is_main_query() &&  is_post_type_archive( 'imgd_casino_shows' ) ) {
        //Set the name of the field we are ordering by
        $query->set( 'meta_key', 'imgd_casino_show_date' );

        $query->set( 'meta_value', date('d M, yy'));

        $query->set( 'meta_compare', '>=' );

        //$query->set( 'meta_type', 'DATE' );

        //change order to DESC IF you want to go in reverse order
        $query->set( 'order', 'ASC' );
        //uncomment next line IF you want to sort by an integer instead of alphabetically
        $query->set( 'orderby', 'none' );
    }
}
add_action( 'pre_get_posts', 'slug_order_archive_by_field' );
