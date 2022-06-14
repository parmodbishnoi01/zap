<?php 
function cptui_register_my_cpts_parmods() {

	/**
	 * Post Type: parmods.
	 */

	$labels = [
		"name" => __( "parmods", "custom-post-type-ui" ),
		"singular_name" => __( "parmod", "custom-post-type-ui" ),
		"menu_name" => __( "Parmod", "custom-post-type-ui" ),
		"all_items" => __( "All Parmod", "custom-post-type-ui" ),
		"add_new" => __( "Add Parmod", "custom-post-type-ui" ),
		"add_new_item" => __( "Add New PArmod", "custom-post-type-ui" ),
		"edit_item" => __( "Edit PArmod", "custom-post-type-ui" ),
		"new_item" => __( "Edit PArmod", "custom-post-type-ui" ),
		"view_item" => __( "View Parmodq", "custom-post-type-ui" ),
		"view_items" => __( "View Parmods", "custom-post-type-ui" ),
		"search_items" => __( "Search Parmod", "custom-post-type-ui" ),
		"not_found" => __( "Mo parmod Found", "custom-post-type-ui" ),
		"not_found_in_trash" => __( "No parmod found in Trash", "custom-post-type-ui" ),
		"parent" => __( "Parent Parmod", "custom-post-type-ui" ),
		"featured_image" => __( "Feture image parmod", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Parmod list naivagtion", "custom-post-type-ui" ),
		"name_admin_bar" => __( "Parmod", "custom-post-type-ui" ),
		"item_published" => __( "Parmod Published", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Parmod", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "parmods", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "post", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "revisions" ],
		"show_in_graphql" => false,
	];

	register_post_type( "parmods", $args );
}

add_action( 'init', 'cptui_register_my_cpts_parmods' );
function cptui_register_my_taxes() {

	/**
	 * Taxonomy: parmod_types.
	 */

	$labels = [
		"name" => __( "parmod_types", "custom-post-type-ui" ),
		"singular_name" => __( "parmod_type", "custom-post-type-ui" ),
		"menu_name" => __( "add Parmod", "custom-post-type-ui" ),
		"all_items" => __( "All Parmod", "custom-post-type-ui" ),
		"edit_item" => __( "Edit PArmod", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => __( "parmod_types", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'parmod_types', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "parmod_types",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "parmod_types", [ "parmods" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );
