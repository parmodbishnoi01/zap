<?php 
add_action('wp_ajax_my_ajax_action', 'pwspak_ajax_action');
add_action('wp_front_ajax_wp_ajax_my_ajax_action', 'wp_front_ajax_pwspak_ajax_action');
add_action('wp_front_ajax_nopriv_ajax_my_ajax_action', 'wp_front_ajax_pwspak_ajax_action');
function pwspak_ajax_action()
{
	if(isset($_POST['action']) && isset($_POST['optionsl'])){
		update_option('pwspk_option_1', sanitize_text_field($_POST['optionsl']));
		
	}
	else
	{
		echo "enter updatng field";
	}
	}
function wp_front_ajax_pwspak_ajax_action(){

	if(isset($_POST['action']) && isset($_POST['value'])){
	echo absint($_POST['value']) + 10;
	}
	else
	{
		echo "error getting field";
	}
	wp_die();
}

/* create a form */
<form action="http://end-point-url-to/process-ajax-request.php" method="post">
    <input type="text" name="first_name" value="John">
    <input type="text" name="last_name" value="Cena">
    <input type="submit" value="Submit">
</form>

/*php code*/
<?php
$first_name = isset( $_POST['first_name'] ) ? $_POST['first_name'] : 'N/A';
$last_name = isset( $_POST['last_name'] ) ? $_POST['last_name'] : 'N/A';
?>
<p>Hello. Your first name is <?php echo $first_name; ?>.</p>
<p>And your last name is <?php echo $last_name; ?>.</p>
<?php
die(); // required. To let AJAX know to end the request.

/*ajax code*/


jQuery(document).ready(function($) {
 
    $.ajax({
        type: "POST", // use $_POST method to submit data
        url: 'http://end-point-url-to/process-ajax-request.php', // where to submit the 
        data: {
            first_name : 'John', // PHP: $_POST['first_name']
            last_name  : 'Cena', // PHP: $_POST['last_name']
        },
        success:function(data) {
            console.log(data); // the HTML result of that URL after submit the data
        },
        error: function(errorThrown){
            console.log(errorThrown); // error
        }
    });  
