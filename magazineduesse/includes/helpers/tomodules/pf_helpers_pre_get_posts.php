<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


/***
if(!function_exists('_pincuter_custom_post_type_archive_query_vars')):
	add_action( 'pre_get_posts', '_pincuter_custom_post_type_archive_query_vars' );
	function _pincuter_custom_post_type_archive_query_vars( $query ) {
		global $pincuter_theme_opt;
							
		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}

							
		if ( !is_admin() && $query->is_main_query()) {
			if ( is_post_type_archive() ) {
				$query->set( 'paged', $paged );
				$query->set( 'orderby', 'date' );
				$query->set( 'order', 'DESC' );
			}
		}
		return $query;
	}
endif;
*/


add_action( 'pre_get_posts', '_comal_pre_get_posts' );
function _comal_pre_get_posts($query) {
    if ( is_admin() || ! $query->is_main_query() ) return;
	
	/*
	if ( is_home() ) {
		$query->set( 'posts_per_page', 6 );
		return $query;
	}
	
	if ( is_category() ) {
		$query->set( 'posts_per_page', 10 );
		return $query;
	}
	
	if ( is_post_type_archive('comunicatistampa') ) {
		$query->set( 'posts_per_page', 7 );
		return $query;
	}
	
	if ( is_post_type_archive('mediakit') ) {
		$query->set( 'posts_per_page', 7 );
		return $query;
	}
	
	if ( is_post_type_archive('diconodinoi') ) {
		$query->set( 'posts_per_page', 6 );
		//$query->set( 'posts_per_page', 3 );
		return $query;
	}
	*/
	
}



/*
 * AVOID DUPLICATE POSTS
 */
/*
add_filter('post_link', 'track_displayed_posts');
add_action('pre_get_posts','remove_already_displayed_posts');
 
$displayed_posts = [];
 
function track_displayed_posts($url) {
	global $displayed_posts;
	$displayed_posts[] = get_the_ID();
	return $url; // don't mess with the url
}
 
function remove_already_displayed_posts($query) {
	global $displayed_posts;
	$query->set('post__not_in', $displayed_posts);
}
*/