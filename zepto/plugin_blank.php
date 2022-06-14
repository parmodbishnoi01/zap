<?php

/**
 * Plugin Name: Swass like Dislike
 * Description: Swass Blog Like Dislike Plugin
 * Plugin URI: swass.gov.in
 * Author:Parmod Kumar
 * Author URI: swass.gov.in
 * Version: 1.0
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

defined( 'ABSPATH' ) or exit;

class Plugin_Class_Name {

private static $_instance = null;

public static function instance() {
 if ( ! isset( self::$_instance ) ) {
 self::$_instance = new self;
 }

return self::$_instance;
 }

private function __construct() {
 
 }

public static function do_activate( $network_wide ) {
 if ( ! current_user_can( 'activate_plugins' ) )
 return;

$plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
 check_admin_referer( "activate-plugin_{$plugin}" );
 }

public static function do_deactivate( $network_wide ) {
 if ( ! current_user_can( 'activate_plugins' ) )
 return;

$plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
 check_admin_referer( "deactivate-plugin_{$plugin}" );
 }

public static function do_uninstall( $network_wide ) {
 if ( ! current_user_can( 'activate_plugins' ) )
 return;

check_admin_referer( 'bulk-plugins' );

if ( __FILE__ != WP_UNINSTALL_PLUGIN )
 return;
 }
}

add_action( 'plugins_loaded', 'Plugin_Class_Name::instance' );
register_activation_hook( __FILE__, 'Plugin_Class_Name::do_activate' );
register_deactivation_hook( __FILE__, 'Plugin_Class_Name::do_deactivate' );
register_uninstall_hook( __FILE__, 'Plugin_Class_Name::do_uninstall' );