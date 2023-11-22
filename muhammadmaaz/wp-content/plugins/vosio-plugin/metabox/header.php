<?php

return array(
	'id'     => 'vosio_header_settings',
	'title'  => esc_html__( "Vosio Header Settings", "konia" ),
	'fields' => array(
		array(
			'id'      => 'header_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Header Source Type', 'vosio' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'vosio' ),
				'e' => esc_html__( 'Elementor', 'vosio' ),
			),
			'default'=> '',
		),
		array(
			'id'       => 'header_new_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'vosio-plugin' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page' => -1,
				'orderby'  => 'title',
				'order'     => 'DESC'
			],
			'required' => [ 'header_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'header_style_settings',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Choose Header Styles', 'vosio' ),
			'options'  => array(
				'header_v1' => array(
					'alt' => 'Header Style 1',
					'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v1.png',
				),
				'header_v2' => array(
					'alt' => 'Header Style 2',
					'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v2.png',
				),
			),
			'required' => array( array( 'header_source_type', 'equals', 'd' ) ),
		),
	),
);