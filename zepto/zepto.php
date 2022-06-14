<?php
/*
  Plugin Name: Nic
  Plugin URI: https://nic.gov.in/
  Description: This is used to add accessibility option to the website
  Version: 1.0
  Domain Path:Domain Path
  Text Domain: Text Domain 
  Author: Parmod
 */

 
defined('ABSPATH') || die("you cant access the page directly");
define( 'MY_PLUGIN_PATH' , plugin_dir_path( __FILE__ ));
define( 'MY_PLUGIN_URL' , plugin_dir_url( __FILE__ ));
define( 'MY_PLUGIN_FILE', __FILE__ );


include  MY_PLUGIN_PATH . 'inc/shortcode.php';
include  MY_PLUGIN_PATH . 'inc/menu.php';
include  MY_PLUGIN_PATH . 'inc/form.php';
include  MY_PLUGIN_PATH . 'inc/custom-post-type.php';
include  MY_PLUGIN_PATH . 'inc/metabox.php';
include  MY_PLUGIN_PATH . 'inc/ajax.php';
include  MY_PLUGIN_PATH . 'inc/db.php';

if(!class_exists('zapdev')):
class zapdev{
public function __construct(){
add_action('wp_enqueue_scripts', array($this,'parmod_plugin'));
add_action('admin_enqueue_scripts', array($this,'parmod_admin_plugin'));
  }

function parmod_plugin()
 {
  wp_enqueue_style( 'parmod_style', MY_PLUGIN_URL ."asset/style/style.css" );
  wp_enqueue_script( 'parmod_script', MY_PLUGIN_URL ."assets/js/admin-custom.js", array(), '1.0.0', false );
  wp_localize_script('parmod_script', 'wp_ajax_object', array('ajaxurl'=>admin_url
('admin-ajax.php'), 'num1'=>10)) ;
}

function parmod_admin_plugin()
{
   wp_enqueue_script('jquery');
  wp_enqueue_script( 'parmod_script', MY_PLUGIN_URL ."assets/js/admin-custom.js", array(), '1.0.0', false );
}
}
new zapdev;
endif;