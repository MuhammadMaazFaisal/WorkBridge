<?php
return array(
	'title'      => 'Vosio Team Setting',
	'id'         => 'vosio_meta_team',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'team' ),
	'sections'   => array(
		array(
			'id'     => 'vosio_team_meta_setting',
			'fields' => array(
				array(
					'id'    => 'designation',
					'type'  => 'text',
					'title' => esc_html__( 'Designation', 'vosio' ),
				),
				array(
					'id'    => 'team_email',
					'type'  => 'text',
					'title' => esc_html__( 'Email Address', 'vosio' ),
				),
				array(
					'id'    => 'social_profile',
					'type'  => 'social_media',
					'title' => esc_html__( 'Social Profiles', 'vosio' ),
				),
			),
		),
	),
);