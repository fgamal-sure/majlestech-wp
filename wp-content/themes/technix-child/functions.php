<?php
define( 'TECHNIX_THEME_CHILD_DIR', get_template_directory()."-child" );
define( 'TECHNIX_THEME_CHILD_INC', TECHNIX_THEME_CHILD_DIR . '/inc/' );


require TECHNIX_THEME_CHILD_INC . 'template-helper.php';

if ( !defined( 'WP_DEBUG' ) ) {
	die( 'Direct access forbidden.' );
}

add_action( 'wp_enqueue_scripts', 'technix_child_enqueue_styles', 99 );

function technix_child_enqueue_styles() {
   wp_enqueue_style( 'parent-style', get_stylesheet_directory_uri() . '/style.css' );
}