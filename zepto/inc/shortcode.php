<?php 
defined('ABSPATH') || die("you cant access the page directly");
//shortcode like [test] and [test message="abc"]
add_action('init', 'par_init');

function par_init(){
  add_shortcode('tests','parmod_new');
}
function parmod_new($atts)
{
 $atts= shortcode_atts(array( 
  'message' => 'hello world',
), $atts, 'tests');

 return $atts['message'];
}

add_filter('the_content','insert_content_below');

function insert_content_below ($content)
{
if(is_single() && in_the_loop() && is_main_query())
{

return $content. "<h2>Parmod</h2>"; 
}

return $content;
}

// shortcode for [test]sss[/test]content
add_action('init', 'parmod_init');

function parmod_init(){
  add_shortcode('zap','pk_new');
  add_shortcode('deals','pkm_new');
}
function pk_new($atts, $content='')
{
 $atts= shortcode_atts(array( 
  'message' => 'hello world',
), $atts, 'zap');
 
 return $content;
}

function pkm_new($atts, $content='')
{
 $atts= shortcode_atts(array( 
  'message' => 'hello world',
  //'post_per_page'=> -1,
), $atts, 'deals');

 $args = array(
  'post_type' => 'deals',
  'post_status'=> 'publish',
  'post_per_page' =>$atts['post_per_page'],
 );
$query = new WP_Query($args);

if ( $query->have_posts() ) :
    while ( $query->have_posts() ) : 
      $query->the_post();
    $content = "<p>" .get_the_title()."</p>" . "<p>" .get_the_content()."</p>";
  
    endwhile;
    if($atts['post_per_page'] !== -1){
      $content.= get_next_post_link();
       $content.= get_previous_post_link();
    }
    wp_reset_query();
else :
    _e( 'Sorry, no posts were found.', 'textdomain' );
endif;
return $content;
}

// shortcode 
add_action('init', 'myOwnHook');
function myOwnHook(){

    add_shortcode('myshortcode','parmodshort');
}
function parmodshort($atts)

{
//print_r($atts);
   return sprintf("<h2>%s</h2><h2>%s</h2>", $atts['message'], $atts['title'] );
}

// shortcode  way 2
add_action('init', 'myOwnHook');
function myOwnHook(){

    add_shortcode('myshortcode','parmodshort');
}
function parmodshort($atts)

{
$atts  = shortcode_atts([
'title' => 'default title',
'message' => 'default message'
], $atts, 'parmodshort');
   return sprintf("<h2>%s</h2><h2>%s</h2>", $atts['message'], $atts['title'] );
}