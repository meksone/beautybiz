<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


/**
 * SOLUTION 2
 * Modify search SQL enabling searching by post ID.
 *
 * @param string   $search Search SQL for WHERE clause.
 * @param WP_Query $wp_query   The current WP_Query object.
 */
add_filter( 'posts_search', '_pincuter_posts_search_post_id', 10, 2 );
function _pincuter_posts_search_post_id( $search, $wp_query ) {
    // Bail if we are not in the admin area
    if ( ! is_admin() ) {
        return $search;
    }

    // Bail if this is not the search query.
    if ( ! $wp_query->is_main_query() && ! $wp_query->is_search() ) {
        return $search;
    }   

    // Get the value that is being searched.
    $search_string = get_query_var( 's' );

    // Bail if the search string is not an integer.
    if ( ! filter_var( $search_string, FILTER_VALIDATE_INT ) ) {
        return $search;
    }

    // This appears to be a search using a post ID.
    // Return modified posts_search clause.
    return "AND wp_posts.ID = '" . intval( $search_string )  . "'";
}


/* search post by ID in wp-admin
 * ====================
 */
 
/**
 * SOLUTION 1
 * Allows posts to be searched by ID in the admin area.
 * 
 * @param WP_Query $query The WP_Query instance (passed by reference).
 */
/*
add_action( 'pre_get_posts','wpse_admin_search_include_ids' );
function wpse_admin_search_include_ids( $query ) {
    // Bail if we are not in the admin area
    if ( ! is_admin() ) {
        return;
    }

    // Bail if this is not the search query.
    if ( ! $query->is_main_query() && ! $query->is_search() ) {
        return;
    }   

    // Get the value that is being searched.
    $search_string = get_query_var( 's' );

    // Bail if the search string is not an integer.
    if ( ! filter_var( $search_string, FILTER_VALIDATE_INT ) ) {
        return;
    }

    // Set WP Query's p value to the searched post ID.
    $query->set( 'p', intval( $search_string ) );

    // Reset the search value to prevent standard search from being used.
    $query->set( 's', '' );
}
*/