<?php

namespace VOSIOPLUGIN\Inc;


use VOSIOPLUGIN\Inc\Abstracts\Taxonomy;


class Taxonomies extends Taxonomy {


	public static function init() {

		$labels = array(
			'name'              => _x( 'Project Category', 'wpvosio' ),
			'singular_name'     => _x( 'Project Category', 'wpvosio' ),
			'search_items'      => __( 'Search Category', 'wpvosio' ),
			'all_items'         => __( 'All Categories', 'wpvosio' ),
			'parent_item'       => __( 'Parent Category', 'wpvosio' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpvosio' ),
			'edit_item'         => __( 'Edit Category', 'wpvosio' ),
			'update_item'       => __( 'Update Category', 'wpvosio' ),
			'add_new_item'      => __( 'Add New Category', 'wpvosio' ),
			'new_item_name'     => __( 'New Category Name', 'wpvosio' ),
			'menu_name'         => __( 'Project Category', 'wpvosio' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'project_cat' ),
		);

		register_taxonomy( 'project_cat', 'project', $args );
		
		
		//Team Taxonomy Start
		$labels = array(
			'name'              => _x( 'Team Category', 'wpvosio' ),
			'singular_name'     => _x( 'Team Category', 'wpvosio' ),
			'search_items'      => __( 'Search Category', 'wpvosio' ),
			'all_items'         => __( 'All Categories', 'wpvosio' ),
			'parent_item'       => __( 'Parent Category', 'wpvosio' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpvosio' ),
			'edit_item'         => __( 'Edit Category', 'wpvosio' ),
			'update_item'       => __( 'Update Category', 'wpvosio' ),
			'add_new_item'      => __( 'Add New Category', 'wpvosio' ),
			'new_item_name'     => __( 'New Category Name', 'wpvosio' ),
			'menu_name'         => __( 'Team Category', 'wpvosio' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'team_cat' ),
		);


		register_taxonomy( 'team_cat', 'team', $args );
		
		
	}
	
}
