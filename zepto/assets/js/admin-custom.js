jQuery(function($)
{
$('#ajax_form').on('submit', function(el){
	el.preventDefault();
	$.post(ajaxurl,{action: 'my_ajax_action', optionl: el.target.pwspk_option_1.value}, 
		function(val){
			alert(val);
})

	})
var data = {
	action: 'wp_front_ajax',
	value: ajax_object.num1,

}
$.post(ajax_object.ajaxurl, data, function(val) {
	alert(val);
})
})