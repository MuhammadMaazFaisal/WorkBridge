<?php
return array(
	'title'      => 'Vosio Project Setting',
	'id'         => 'vosio_meta_projects',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'project' ),
	'sections'   => array(
		array(
			'id'     => 'vosio_projects_meta_setting',
			'fields' => array(
				array(
					'id'    => 'sub_heading',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Sub Heading', 'vosio' ),
				),
				array(
					'id'    => 'main_heading',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Main Heading', 'vosio' ),
				),
				array(
					'id'    => 'features_list2',
					'type'  => 'textarea',
					'title' => esc_html__( 'Enter Feature List', 'vosio' ),
				),
				array(
					'id'       => 'gallery_imgs',
					'type'     => 'gallery',
					'url'      => true,
					'title'    => esc_html__('Slider Image', 'vosio'),
					'desc'     => esc_html__('Insert Portfolio Single Page Image URl', 'vosio'),
				),
			),
		),
	),
);