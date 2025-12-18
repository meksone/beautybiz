<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


add_filter( 'body_class', '_pincuter_project_category_parent_id_class' );
function _pincuter_project_category_parent_id_class( $classes ) {
	if ( is_category() ) {
        //$classes[] = 'mycategory';

        $queried_object = get_queried_object();
        $term_id = $queried_object->term_id;
        $t_details=get_category($term_id);
        if(!empty($t_details->parent)){
            $cat_parent_name = get_cat_name($t_details->parent); 
            $classes[] = 'category-child'; 
            $classes[] = 'category-parent-'.sanitize_title($cat_parent_name);
        }
	}		
	return $classes;
}


/* add category nicenames in body class */
add_filter( 'body_class', '_pincuter_project_in_category_id_class' );
function _pincuter_project_in_category_id_class( $classes ) {
	// Only proceed if we're on a single post page
	if ( !is_single() )
		return $classes;
	
    // Get the categories that are assigned to this post
	$post_categories = get_the_category();
 
	// Loop over each category in the $categories array
	foreach( $post_categories as $current_category ) {
		// Add the current category's slug to the $body_classes array
		/////$classes[] = 'in-category-'.$current_category->slug; 
        $current_category_id = $current_category->term_id;
        $t_details=get_category($current_category_id);
        if(!empty($t_details->parent)){
            $cat_parent_name = get_cat_name($t_details->parent);
            $classes[] = 'in-category-parent-'.sanitize_title($cat_parent_name);
        }
	}
	// Finally, return the $body_classes array
	return $classes;
}


add_filter( 'body_class', '_pincuter_project_category_riviste_id_class' );
function _pincuter_project_category_riviste_id_class($classes){
    if ( is_category() ) {
        $queried_object = get_queried_object();
        $term_id = $queried_object->term_id;
        $term_slug = $queried_object->slug;
        if( $term_slug == 'beauty-business'){
            $classes[] = 'category-profumeria';
        }
        if( $term_slug == 'b-bellezza-e-benessere-in-farmacia'){
            $classes[] = 'category-farmacia';
        }
    }
    if( is_single()){
        $post_categories = get_the_category();
        foreach( $post_categories as $current_category ) {
            $current_category_id = $current_category->term_id;
            $current_category_slug = $current_category->slug;
            if( $current_category_slug == 'beauty-business' ){
                $classes[] = 'in-category-profumeria';
            }
            if( $current_category_slug == 'b-bellezza-e-benessere-in-farmacia' ){
                $classes[] = 'in-category-farmacia';
            }
        }
    }
    return $classes;
}