<?php 
add_action('admin_menu', 'zepto_menu');
function zepto_menu(){
  add_menu_page('Zepto Option', 'Zepto Option', 'manage_options', 'zepto-option', 'zepto_option_fun', $icon_url = '', $position = null);
  add_submenu_page('zepto-option', 'Zepto Setting', 'Zepto Setting', 'manage_options', 'zepto-setting', 'zepto_setting_fun');

}