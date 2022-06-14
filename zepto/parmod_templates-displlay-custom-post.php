<?php 
/**
*template name: Template for project
*/
get_header();?>


<div class="container">
<div class="row">
<div id="result" class="col-md-10 offest_md-1">
<h1>tempalte for parmod custom post type</h1>

<?php 
//display taxonomies
$args = array(
'hide_empty' => false,
'taxonomy' => 'parmod_types',
 );
$taxonomies = get_terms($args);
if(!empty($taxonomies)):
 echo "<a href='javascript:;' data-slug='all' class='btn btn-sucess filter'>All Project</a>";
	foreach($taxonomies as $tax) { 
	 echo "<a href='javascript:;' data-slug='{$tax->slug}' class='btn btn-primary filter'>{$tax->name}</a>";
}
endif;

//display cusotm post type post
$args = array(
'post_type' => 'parmods',
'post_per_page' => -1,
'post_status' => 'publish',
 );

$query = new WP_Query($args);
 if ($query->have_posts() ) : while($query->have_posts()  ) : $query->the_post(); ?>
    <h1><?php the_title(); ?></h1>
    <a href="<?php the_permalink(); ?>">
    <?php the_post_thumbnail( 'full' ); ?>
    </a>
    <p><?php the_excerpt(); ?></p>
<?php endwhile; endif; ?>

</div>
</div>
</div>
<?php get_footer();?>