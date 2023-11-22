<?php
defined( 'ABSPATH' ) || exit;

/**
 * Enqueue child scripts
 */
if ( ! function_exists( 'vosio_child_enqueue_scripts' ) ) {
	function vosio_child_enqueue_scripts() {
		wp_enqueue_style( 'vosio-child-style', get_stylesheet_directory_uri() . '/style.css' );
	}
}
add_action( 'wp_enqueue_scripts', 'vosio_child_enqueue_scripts', 15 );
