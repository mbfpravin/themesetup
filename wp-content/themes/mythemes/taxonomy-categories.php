<?php 
get_header();
$curTerm = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));  /*To get current cat Name*/
$displayTitle = get_term_meta($curTerm->term_id, 'title', true);
$curr_term_id = get_queried_object()->term_id;
$post_term=get_queried_object();

/*This code is to list Taxonomy cat*/
$catArgs=array(
    'numberposts' => -1,
	'orderby' => 'date',
	'post_status'    => 'publish',
	'order' => 'DESC',
	'post__not_in' => array($post->ID), /*This code is used not to show same posts in taxonomy*/
	'tax_query' => array(
		array(
		'taxonomy' => 'categories_name', /*To give cat_name for particular taxonomy*/
		'field' => 'term_id',    /*we can pass arugments like slug,term_id,name for categories*/
		'terms' => $curTerm->term_id
		 )
	),
	'post_type' => array( 'post_type_name'), /*Give your custom posttype name*/
 
);
$catTotCount=get_posts($catArgs);
get_footer();

?>