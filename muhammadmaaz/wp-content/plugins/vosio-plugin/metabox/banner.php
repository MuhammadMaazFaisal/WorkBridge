<?php

return array(
	'id'     => 'vosio_banner_settings',
	'title'  => esc_html__( "Vosio Banner Settings", "konia" ),
	'fields' => array(
		array(
			'id'      => 'banner_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Banner Source Type', 'vosio' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'vosio' ),
				'e' => esc_html__( 'Elementor', 'vosio' ),
			),
			'default' => '',
		),
		array(
			'id'       => 'banner_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'viral-buzz' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'=> -1,
			],
			'required' => [ 'banner_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'banner_page_banner',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Banner', 'vosio' ),
			'default'  => false,
			'required' => [ 'banner_source_type', '=', 'd' ],
		),
		array(
			'id'       => 'banner_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section Title', 'vosio' ),
			'desc'     => esc_html__( 'Enter the title to show in banner section', 'vosio' ),
			'required' => array( 'banner_page_banner', '=', true ),
		),
	),
);