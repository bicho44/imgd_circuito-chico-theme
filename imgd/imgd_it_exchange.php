<?php

add_filter( 'manage_edit-it_exchange_prod_columns', 'imgd_exchange_product_columns', 999 );
//add_filter( 'manage_edit-it_exchange_prod_sortable_columns', 'imgd_exchange_product_sortable_columns'  );
add_filter( 'manage_it_exchange_prod_posts_custom_column', 'imgd_exchange_prod_posts_custom_column_info');


/**
 * Adds the product type column to the View All products table
 *
 * @since 0.3.3
 * @param array $existing  exisiting columns array
 * @return array  modified columns array
 */
function imgd_exchange_product_columns( $columns ) {

    unset ($columns['it_exchange_product_inventory']);
    unset ($columns['it_exchange_product_purchases']);

    $columns['image']   = __( 'Imagen', 'it-l10n-ithemes-exchange' );

    $n_columns = array();
    $move = 'image'; // what to move
    $before = 'title'; // move before this

    foreach($columns as $key => $value) {
        if ($key==$before){
            $n_columns[$move] = $move;
        }
        $n_columns[$key] = $value;
    }
    return $n_columns;

}


/**
 * Makes the product_type column added above sortable
 *
 * @since 0.3.3
 * @param array $sortables  existing sortable columns
 * @return array  modified sortable columnns
 */
/*
function imgd_exchange_product_sortable_columns( $sortables ) {
    $sortables['it_exchange_product_price']         = 'it-exchange-product-price';
    $sortables['it_exchange_product_show_in_store'] = 'it-exchange-product-show-in-store';
    $sortables['it_exchange_product_inventory']     = 'it-exchange-product-inventory';

    //This will only show up if there are multiple product-type addons
    $sortables['it_exchange_product_type']     = 'it-exchange-product-type';

    return $sortables;
}
*/

/**
 * Agrego la Columna de la foto
 *
 * @since 0.3.3
 * @param string $column  column title
 * @param integer $post  post ID
 * @return void
 */

 function imgd_exchange_prod_posts_custom_column_info( $column ) {
    global $post;
    $product = it_exchange_get_product( $post );

    switch( $column ) {
        case 'image':
            $product_id = $product->ID;
            $product_images = it_exchange_get_product_feature( $product_id, 'product-images' );

            if ($product_images[0]!='') {
                $feature_image = array(
                    'thumb' => wp_get_attachment_thumb_url($product_images[0]),
                    'large' => wp_get_attachment_url($product_images[0])
                );

                if ($feature_image['thumb'] != '') {

                    // @TODO Agregar una opción en los settings para el tamaño del Thumbnail

                    echo "<img class='optional' width='80px' src='" . $feature_image['thumb'] . "' />";
                }
            }
            break;

    }
}


/**
 * @TODO Cambiar en el listado el Mostrar en el Listado, por un √
 */