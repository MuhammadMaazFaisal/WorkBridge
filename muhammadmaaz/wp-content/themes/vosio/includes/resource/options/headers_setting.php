<?php
return array(
	'title'      => esc_html__( 'Header Setting', 'vosio' ),
	'id'         => 'headers_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'header_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Header Source Type', 'vosio' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'vosio' ),
				'e' => esc_html__( 'Elementor', 'vosio' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'header_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'vosio' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'header_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'header_style_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Settings', 'vosio' ),
			'required' => array( 'header_source_type', '=', 'd' ),
		),

		//Header Settings
		array(
		    'id'       => 'header_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Header Styles', 'vosio' ),
		    'subtitle' => esc_html__( 'Choose Header Styles', 'vosio' ),
		    'options'  => array(

			    'header_v1'  => array(
				    'alt' => esc_html__( 'Header Style 1', 'vosio' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v1.png',
			    ),
			    'header_v2'  => array(
				    'alt' => esc_html__( 'Header Style 2', 'vosio' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v2.png',
			    ),
			),
			'required' => array( 'header_source_type', '=', 'd' ),
			'default' => 'header_v1',
	    ),

		/***********************************************************************
								Header Version 1 Start
		************************************************************************/
		array(
			'id'       => 'header_v1_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style One Settings', 'vosio' ),
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
		),
		//Social Media Icons
		array(
            'id' => 'show_social_share_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Order Social Icons', 'vosio'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		array(
            'id'    => 'header_social_share_v1',
            'type'  => 'social_media',
            'title' => esc_html__( 'Social Media', 'vosio' ),
            'required' => array( 'show_social_share_v1', '=', true ),
        ),
		//Top Header Info
		array(
            'id' => 'show_copy_rights_text',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Header Copy Right', 'vosio'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		array(
			'id'      => 'copy_rights_text_v1',
			'type'    => 'text',
			'title'   => __( 'Copy Right Text', 'vosio' ),
			'required' => array( 'show_copy_rights_text', '=', true ),
		),
		
		/***********************************************************************
								Header Version 2 Start
		************************************************************************/
		array(
			'id'       => 'header_v2_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Two Settings', 'vosio' ),
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
		),
		//Social Media Icons
		array(
            'id' => 'show_social_share_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Order Social Icons', 'vosio'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		array(
            'id'    => 'header_social_share_v2',
            'type'  => 'social_media',
            'title' => esc_html__( 'Social Media', 'vosio' ),
            'required' => array( 'show_social_share_v2', '=', true ),
        ),
		//Top Header Info
		array(
            'id' => 'show_copy_rights_text2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Header Copy Right', 'vosio'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		array(
			'id'      => 'copy_rights_text_v2',
			'type'    => 'text',
			'title'   => __( 'Copy Right Text', 'vosio' ),
			'required' => array( 'show_copy_rights_text2', '=', true ),
		),
        		
		array(
			'id'       => 'header_style_section_end',
			'type'     => 'section',
			'indent'      => false,
			'required' => [ 'header_source_type', '=', 'd' ],
		),
	),
);
