<?php 
defined('ABSPATH') || die("you cant access the page directly");
register_activation_hook(MY_PLUGIN_FILE, function()
{
global $wpdb;
	
	$table_name = $wpdb->prefix . 'liveshoutbox';
	$charset_collate = $wpdb->get_charset_collate();
	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		post_id int(11) NOT NULL,
		likenew int(11) NOT NULL,
		dislike int(11) NOT NULL,
		time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
}
);
register_activation_hook(MY_PLUGIN_FILE, function()
{
        global $wpdb;
		$table_name = $wpdb->prefix . 'liveshoutbox';
	    $charset_collate = $wpdb->get_charset_collate();
	    $data = array(
	    	'id'=>2,
	    	'post_id'=>2,
	    	'time'=>current_time('mysql', 1),
	    	'likenew'=>1,
	    	'dislike'=>0,
	    );
	    $wpdb->insert($table_name, $data);
	
}
);
register_deactivation_hook(MY_PLUGIN_FILE, function(){
   global $wpdb;
   $table_name = $wpdb->prefix . 'liveshoutbox';
   $charset_collate = $wpdb->get_charset_collate();
   $wpdb->query( "DROP TABLE IF EXISTS $table_name" );
   $sql = " TRUNCATE TABLE $table_name";
} ); 

