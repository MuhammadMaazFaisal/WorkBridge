<?php
if ( ! function_exists( "vosio_add_metaboxes" ) ) {
	function vosio_add_metaboxes( $metaboxes ) {
		$directories_array = array(
			'page.php',
			'projects.php',
			'team.php',
			'dimension.php',
		);
		foreach ( $directories_array as $dir ) {
			$metaboxes[] = require_once( VOSIOPLUGIN_PLUGIN_PATH . '/metabox/' . $dir );
		}

		return $metaboxes;
	}

	add_action( "redux/metaboxes/vosio_options/boxes", "vosio_add_metaboxes" );
}

