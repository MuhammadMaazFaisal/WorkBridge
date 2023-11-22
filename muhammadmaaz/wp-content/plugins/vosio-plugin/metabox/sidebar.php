<?php

return array(
	'id'     => 'vosio_sidebar_settings',
	'title'  => esc_html__( "Vosio Sidebar Settings", "konia" ),
	'fields' => array(
		array(
			'id'      => 'sidebar_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Sidebar Source Type', 'vosio' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'vosio' ),
				'e' => esc_html__( 'Elementor', 'vosio' ),
			),
			'default'=> '',
		),
		array(
			'id'       => 'sidebar_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'viral-buzz' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'=> -1,
			],
			'required' => [ 'sidebar_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'sidebar_sidebar_layout',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Layout', 'vosio' ),
			'subtitle' => esc_html__( 'Select main content and sidebar alignment.', 'vosio' ),
			'options'  => array(
				'left'  => array(
					'alt' => esc_html__( '2 Column Left', 'vosio' ),
					'img' => get_template_directory_uri() . '/assets/images/redux/2cl.png',
				),
				'full'  => array(
					'alt' => esc_html__( '1 Column', 'vosio' ),
					'img' => get_template_directory_uri() . '/assets/images/redux/1col.png',
				),
				'right' => array(
					'alt' => esc_html__( '2 Column Right', 'vosio' ),
					'img' => get_template_directory_uri() . '/assets/images/redux/2cr.png',
				),
			),
			'required' => [ 'sidebar_source_type', '=', 'd' ],
		),

		array(
			'id'       => 'sidebar_page_sidebar',
			'type'     => 'select',
			'title'    => esc_html__( 'Sidebar', 'vosio' ),
			'required' => array(
				array( 'sidebar_sidebar_layout', '=', array( 'left', 'right' ) ),
			),
			'options'  => vosios_get_sidebars(),
			'required' => [ 'sidebar_source_type', '=', 'd' ],
		),
	),
);