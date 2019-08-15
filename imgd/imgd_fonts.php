<?php
/* Google Fonts */
function wpb_add_google_fonts() {
	wp_enqueue_style( 'wpb-google-fonts', '//fonts.googleapis.com/css?family=Hind:300|Lato|Montserrat:400,700', false );
}

add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );