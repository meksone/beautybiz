<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}



add_filter( 'post_type_link', '_hotelpompei_permalinks_post_type_link', 1, 2 );
function _hotelpompei_permalinks_post_type_link( $post_link, $post ){
    if ( is_object( $post ) && $post->post_type == 'camere' ){
        $terms = wp_get_object_terms( $post->ID, 'categoria_camere' );
        if( $terms ){
            $categoria_camere_term_array = array();
			
			foreach ($terms as $categoria_camere_term) {
				array_push($categoria_camere_term_array, $categoria_camere_term->slug);
			}
			$categoria_camere_tax_url = join('/',$categoria_camere_term_array);
        
			$post_link = str_replace( '%categoria_camere%' , $categoria_camere_tax_url , $post_link );
			
		}
    }
    return $post_link;
}


//add_action( 'wp_loaded','_hotelpompei_flush_all_rules' );
function _hotelpompei_flush_all_rules(){
	global $wp_rewrite;
	$wp_rewrite->flush_rules();
}


/*
add_filter('request', 'rudr_change_term_request', 1, 1 );
function rudr_change_term_request($query){
 
	$tax_name = 'categoria_camere'; // specify you taxonomy name here, it can be also 'category' or 'post_tag'
	
	if( isset($query_vars['attachment']) ? $query_vars['attachment'] : null) :
	// Request for child terms differs, we should make an additional check
	/////if( $query['attachment'] ) :
		$include_children = true;
		/////$name = $query['attachment'];
		$name = $query_vars['attachment'];
	else:
		if( isset($query_vars['name']) ? $query_vars['name'] : null) {
		$include_children = false;
		/////$name = $query['name'];
		$name = $query_vars['name'];
		}
	endif;
 
 
	$term = get_term_by('slug', $name, $tax_name); // get the current term to make sure it exists
 
	if (isset($name) && $term && !is_wp_error($term)): // check it here
 
		if( $include_children ) {
			unset($query['attachment']);
			$parent = $term->parent;
			while( $parent ) {
				$parent_term = get_term( $parent, $tax_name);
				$name = $parent_term->slug . '/' . $name;
				$parent = $parent_term->parent;
			}
		} else {
			unset($query['name']);
		}
 
		switch( $tax_name ):
			case 'category':{
				$query['category_name'] = $name; // for categories
				break;
			}
			case 'post_tag':{
				$query['tag'] = $name; // for post tags
				break;
			}
			default:{
				$query[$tax_name] = $name; // for another taxonomies
				break;
			}
		endswitch;
 
	endif;
 
	return $query;
 
}
 
 
add_filter( 'term_link', 'rudr_term_permalink', 10, 3 );
function rudr_term_permalink( $url, $term, $taxonomy ){
 
	$taxonomy_name = 'categoria_camere'; // your taxonomy name here
	$taxonomy_slug = 'categoria_camere'; // the taxonomy slug can be different with the taxonomy name (like 'post_tag' and 'tag' )
 
	// exit the function if taxonomy slug is not in URL
	if ( strpos($url, $taxonomy_slug) === FALSE || $taxonomy != $taxonomy_name ) return $url;
 
	$url = str_replace('/' . $taxonomy_slug, '', $url);
 
	return $url;
}


add_action('template_redirect', 'rudr_old_term_redirect');
function rudr_old_term_redirect() {
 
	$taxonomy_name = 'categoria_camere';
	$taxonomy_slug = 'categoria_camere';
 
	// exit the redirect function if taxonomy slug is not in URL
	if( strpos( $_SERVER['REQUEST_URI'], $taxonomy_slug ) === FALSE)
		return;
 
	if( ( is_category() && $taxonomy_name=='category' ) || ( is_tag() && $taxonomy_name=='post_tag' ) || is_tax( $taxonomy_name ) ) :
 
        	wp_redirect( site_url( str_replace($taxonomy_slug, '', $_SERVER['REQUEST_URI']) ), 301 );
		exit();
 
	endif;
 
}
*/