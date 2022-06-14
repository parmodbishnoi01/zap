<?php
defined('ABSPATH') || die("you cant access the page directly");

add_action('admin_menu', 'pwspk_process_form_setting');
function pwspk_process_form_setting(){
  register_setting('pwspk_option_group', 'pwspk_option_name');
  if(isset($_POST['action']) && current_user_can('manage_options')){
   // print_r($_POST);
    //exit();
update_option('pwspk_option_1', sanitize_text_field($_POST['pwspk_option_1']));
  }
}

function zepto_option_fun(){?>
<div class="wrap">
  <?php settings_errors();?>



<form id="ajax_form" action="options.php" method="post">
  <?php settings_fields('pwspk_option_group');?>
<lable for="">My Name: <input type="text" name="pwspk_option_1" value="<?php echo esc_html(get_option('pwspk_option_1'));?>"/></lable>

<?php submit_button('Save Change');?>
</form>


</div>
<div class="wrap2">
  
<?php include  MY_PLUGIN_PATH . 'api.php'; ?>
</div>
<?php }
function zepto_setting_fun(){

echo "Hello2";
}

register_activation_hook(__FILE__, function()
{
  add_option('pwspk_option_1', '');
});
register_deactivation_hook(__FILE__, function(){
  delete_option('pwspk_option_1');
});
