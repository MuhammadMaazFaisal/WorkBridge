<?php
return array(
	'title'      => esc_html__( 'Logo Setting', 'vosio' ),
	'id'         => 'logo_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'       => 'image_favicon',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Favicon', 'vosio' ),
			'subtitle' => esc_html__( 'Insert site favicon image', 'vosio' ),
			'default'  => array( 'url' => get_template_directory_uri() . '/assets/images/favicon.png' ),
		),
		
		//Home One Logo
		array(
            'id' => 'normal_logo_show',
            'type' => 'switch',
            'title' => esc_html__('Enable BG Color Logo', 'vosio'),
            'default' => true,
        ),
		array(
			'id'       => 'light_color_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Light Color Logo Image', 'vosio' ),
			'subtitle' => esc_html__( 'Insert site Light Color logo image', 'vosio' ),
			'required' => array( 'normal_logo_show', '=', true ),
		),
		array(
			'id'       => 'light_color_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Light Color Logo Dimentions', 'vosio' ),
			'subtitle' => esc_html__( 'Select Light Color Logo Dimentions', 'vosio' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'normal_logo_show', '=', true ),
		),
				
		array(
			'id'       => 'logo_settings_section_end',
			'type'     => 'section',
			'indent'      => false,
		),
	),
);
