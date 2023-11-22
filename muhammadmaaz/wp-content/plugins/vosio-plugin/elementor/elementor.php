<?php

namespace VOSIOPLUGIN\Element;


class Elementor {
	static $widgets = array(
		//Home Page One
		'banner_v1',
		
		//Home Page Two
		'banner_v2',
		'our_services',
		'plans_section',
		'our_team',
		'what_we_offer',
		
		//Home Page Three
		'our_projects',
		
		//Home Page Four
		'our_project_v2',
		
		//Home Page Five
		'banner_v3',
		
		//Home Page Six
		'banner_v4',
		
		//Home Page Seven
		'our_project_v3',
		
		//Home Page Eight
		'our_project_v4',
		
		//Home Page Nine
		'our_project_v5',
		
		//Home Page Ten
		'our_project_v6',
		
		//Home Page Eleven
		'our_project_v7',
		
		//Home Page Twelve
		'our_project_v8',
		
		//Home Page Thirteen
		'our_project_v9',
		
		//Inner Pages
		'masonary_project',
		'latest_news',
		'contact_us',
		
	);

	static function init() {
		add_action( 'elementor/init', array( __CLASS__, 'loader' ) );
		add_action( 'elementor/elements/categories_registered', array( __CLASS__, 'register_cats' ) );
	}

	static function loader() {

		foreach ( self::$widgets as $widget ) {

			$file = VOSIOPLUGIN_PLUGIN_PATH . '/elementor/' . $widget . '.php';
			if ( file_exists( $file ) ) {
				require_once $file;
			}

			add_action( 'elementor/widgets/widgets_registered', array( __CLASS__, 'register' ) );
		}
	}

	static function register( $elemntor ) {
		foreach ( self::$widgets as $widget ) {
			$class = '\\VOSIOPLUGIN\\Element\\' . ucwords( $widget );

			if ( class_exists( $class ) ) {
				$elemntor->register_widget_type( new $class );
			}
		}
	}

	static function register_cats( $elements_manager ) {

		$elements_manager->add_category(
			'vosio',
			[
				'title' => esc_html__( 'Vosio', 'vosio' ),
				'icon'  => 'fa fa-plug',
			]
		);
		$elements_manager->add_category(
			'templatepath',
			[
				'title' => esc_html__( 'Template Path', 'vosio' ),
				'icon'  => 'fa fa-plug',
			]
		);

	}
}

Elementor::init();