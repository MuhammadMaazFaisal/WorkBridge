<?php

return array(
	'title'      => esc_html__( 'Footer Setting', 'vosio' ),
	'id'         => 'footer_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'footer_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Footer Source Type', 'vosio' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'vosio' ),
				'e' => esc_html__( 'Elementor', 'vosio' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'footer_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'vosio' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'footer_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'footer_style_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Settings', 'vosio' ),
			'required' => array( 'footer_source_type', '=', 'd' ),
		),
		array(
		    'id'       => 'footer_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Footer Styles', 'vosio' ),
		    'subtitle' => esc_html__( 'Choose Footer Styles', 'vosio' ),
		    'options'  => array(

			    'footer_v1'  => array(
				    'alt' => esc_html__( 'Footer Style 1', 'vosio' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v1.png',
			    ),
			),
			'required' => array( 'footer_source_type', '=', 'd' ),
			'default' => 'footer_v1',
	    ),
		
		
		/***********************************************************************
								Footer Version 1 Start
		************************************************************************/
		array(
			'id'       => 'footer_v1_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style One Settings', 'vosio' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		//Logo Image
		array(
			'id'       => 'footer_logo_img_v1',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer Logo Image', 'vosio' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		//Address
		array(
			'id'      => 'footer_v1_address_title',
			'type'    => 'text',
			'title'   => __( 'Address Title', 'vosio' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
			'id'      => 'footer_v1_address',
			'type'    => 'textarea',
			'title'   => __( 'Address', 'vosio' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		//Contact Info
		array(
			'id'      => 'footer_v1_contact_title',
			'type'    => 'text',
			'title'   => __( 'Contact Title', 'vosio' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
			'id'      => 'footer_v1_phone_no',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'vosio' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
			'id'      => 'footer_v1_email_address',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'vosio' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		//Map Direction
		array(
			'id'      => 'footer_v1_direction',
			'type'    => 'text',
			'title'   => __( 'Map & Direction Button', 'vosio' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
			'id'      => 'footer_v1_direction_link',
			'type'    => 'text',
			'title'   => __( 'Map & Direction Button Link', 'vosio' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
				
		array(
			'id'       => 'footer_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'footer_source_type', '=', 'd' ],
		),
	),
);
