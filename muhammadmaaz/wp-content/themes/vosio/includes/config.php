<?php
/**
 * Theme config file.
 *
 * @package VOSIO
 * @author  Themewisdom
 * @version 1.0
 * changed
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}

$config = array();

$config['default']['vosio_main_header'][] 	= array( 'vosio_main_header_area', 99 );

$config['default']['vosio_main_footer'][] 	= array( 'vosio_main_footer_area', 99 );

$config['default']['vosio_sidebar'][] 	    = array( 'vosio_sidebar', 99 );

$config['default']['vosio_banner'][] 	    = array( 'vosio_banner', 99 );


return $config;
