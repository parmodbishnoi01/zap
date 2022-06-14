wp-config.php

Disallow all update 

<?php 
define(‘DISALLOW_FILE_EDIT’, true);
 
define( 'WP_DEBUG', true ); -- display error 
define( 'WP_DEBUG_LOG', true ); --- display error save in dblog.php
define( 'WP_DEBUG_DISPLAY', false );-- displauy error on page 

remove wordpress verison
remove_action('wp_head', 'wp_generator');

function wpbeginner_remove_version() {
return '';
}
add_filter('the_generator', 'wpbeginner_remove_version');

