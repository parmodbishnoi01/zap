<?php 
function create_posttype() {
  
    register_post_type( 'movies',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Movies' ),
                'singular_name' => __( 'Movie' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'movies'),
            'show_in_rest' => true,
  
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );


// Creating a Deals Custom Post Type
defined('ABSPATH') || die("you cant access the page directly");
if(!class_exists('Pk_dev')):
class Pk_dev{
  public function __construct(){
  add_filter('template_include', array($this,'pwspk_news_tempaltes'));
	add_action( 'init', array($this,'deals_custom_post_type'));
  add_action( 'init', array($this,'deals_custom_taxonomy'));
	}

public function deals_custom_post_type() {
	$labels = array(
		'name'                => __( 'Deals' ),
		'singular_name'       => __( 'Deal'),
		'menu_name'           => __( 'Deals'),
		'parent_item_colon'   => __( 'Parent Deal'),
		'all_items'           => __( 'All Deals'),
		'view_item'           => __( 'View Deal'),
		'add_new_item'        => __( 'Add New Deal'),
		'add_new'             => __( 'Add New'),
		'edit_item'           => __( 'Edit Deal'),
		'update_item'         => __( 'Update Deal'),
		'search_items'        => __( 'Search Deal'),
		'not_found'           => __( 'Not Found'),
		'not_found_in_trash'  => __( 'Not found in Trash')
	);
	$args = array(
		'label'               => __( 'deals'),
		'description'         => __( 'Best Zapto Deals'),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields'),
		'public'              => true,
		'hierarchical'        => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'has_archive'         => true,
		'can_export'          => true,
		'exclude_from_search' => false,
	     'yarpp_support'       => true,
		'taxonomies' 	      => array('post_tag'),
		'publicly_queryable'  => true,
		'capability_type'     => 'post'
);
	register_post_type( 'deals', $args );
}

 
//create a custom taxonomy name it "type" for your posts
 public function deals_custom_taxonomy() {
 
  $labels = array(
    'name' => _x( 'Types', 'taxonomy general name' ),
    'singular_name' => _x( 'Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Types' ),
    'all_items' => __( 'All Types' ),
    'parent_item' => __( 'Parent Type' ),
    'parent_item_colon' => __( 'Parent Type:' ),
    'edit_item' => __( 'Edit Type' ), 
    'update_item' => __( 'Update Type' ),
    'add_new_item' => __( 'Add New Type' ),
    'new_item_name' => __( 'New Type Name' ),
    'menu_name' => __( 'Types' ),
  ); 	
 
  register_taxonomy('types',array('deals'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'type' ),
  ));
}
//end of taxonomy code

 public function pwspk_news_tempaltes($template){
	global $post;

	if(is_single() && $post->post_type == 'zapto'){
		 $template = MY_PLUGIN_PATH.'templates/tem-zapto.php';

		//print_r($template);
		//exit;
	}
	return $template;
	}

}
new Pk_dev; 
endif;

