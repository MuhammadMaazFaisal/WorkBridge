<?php

return array(
	'title'      => esc_html__( 'Archive Page Settings', 'vosio' ),
	'id'         => 'archive_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => 'archive_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Archive Source Type', 'vosio' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'vosio' ),
				'e' => esc_html__( 'Elementor', 'vosio' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'archive_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'vosio' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'=> -1,
			],
			'required' => [ 'archive_source_type', '=', 'e' ],
		),

		array(
			'id'       => 'archive_default_st',
			'type'     => 'section',
			'title'    => esc_html__( 'Archive Default', 'vosio' ),
			'indent'   => true,
			'required' => [ 'archive_source_type', '=', 'd' ],
		),
		array(
			'id'      => 'archive_page_banner',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Banner', 'vosio' ),
			'desc'    => esc_html__( 'Enable to show banner on blog', 'vosio' ),
			'default' => true,
		),
		array(
			'id'       => 'archive_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section Title', 'vosio' ),
			'desc'     => esc_html__( 'Enter the Title to show in banner section', 'vosio' ),
			'required' => array( 'archive_page_banner', '=', true ),
		),

		array(
			'id'       => 'archive_sidebar_layout',
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

			'default' => 'right',
		),

		array(
			'id'       => 'archive_page_sidebar',
			'type'     => 'select',
			'title'    => esc_html__( 'Sidebar', 'vosio' ),
			'desc'     => esc_html__( 'Select sidebar to show at blog listing page', 'vosio' ),
			'required' => array(
				array( 'archive_sidebar_layout', '=', array( 'left', 'right' ) ),
			),
			'options'  => vosio_get_sidebars(),
		),
		array(
			'id'       => 'archive_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'archive_source_type', '=', 'd' ],
		),
	),
);