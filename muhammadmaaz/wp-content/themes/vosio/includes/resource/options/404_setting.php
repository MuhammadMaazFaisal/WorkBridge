<?php

return array(
	'title'      => esc_html__( '404 Page Settings', 'vosio' ),
	'id'         => '404_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => '404_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( '404 Source Type', 'vosio' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'vosio' ),
				'e' => esc_html__( 'Elementor', 'vosio' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => '404_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'vosio' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
			],
			'required' => [ '404_source_type', '=', 'e' ],
		),
		array(
			'id'       => '404_default_st',
			'type'     => 'section',
			'title'    => esc_html__( '404 Default', 'vosio' ),
			'indent'   => true,
			'required' => [ '404_source_type', '=', 'd' ],
		),		
		array(
			'id'    => '404_page_sub_title',
			'type'  => 'text',
			'title' => esc_html__( '404 Page Sub Title', 'vosio' ),
			'desc'  => esc_html__( 'Enter 404 page Sub Title that you want to show.', 'vosio' ),
		),
		array(
			'id'    => '404_page_title',
			'type'  => 'text',
			'title' => esc_html__( '404 Page Title', 'vosio' ),
			'desc'  => esc_html__( 'Enter 404 page Title that you want to show.', 'vosio' ),
		),
		array(
			'id'    => '404_page_text',
			'type'  => 'textarea',
			'title' => esc_html__( '404 Page Description', 'vosio' ),
			'desc'  => esc_html__( 'Enter 404 page description that you want to show.', 'vosio' ),
		),		
		array(
			'id'    => 'back_home_btn',
			'type'  => 'switch',
			'title' => esc_html__( 'Show Button', 'vosio' ),
			'desc'  => esc_html__( 'Enable to show back to home button.', 'vosio' ),
			'default'  => true,
		),
		array(
			'id'       => 'back_home_btn_label',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Label', 'vosio' ),
			'desc'     => esc_html__( 'Enter back to home button label that you want to show.', 'vosio' ),
			'default'  => esc_html__( 'Back To Home', 'vosio' ),
			'required' => array( 'back_home_btn', '=', true ),
		),
		array(
			'id'     => '404_post_settings_end',
			'type'   => 'section',
			'indent' => false,
		),
	),
);