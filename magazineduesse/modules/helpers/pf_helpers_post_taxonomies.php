<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


add_action( 'init', '_pincuter_post_taxonomies', 1);
function _pincuter_post_taxonomies() {
    
	register_taxonomy(
		'evidenza_post',
		'post',
		array(
			'hierarchical'  => true,
			'label'         => 'Evidenza',
			'singular_name' => 'Evidenza',
			'rewrite'       => true,
			'query_var'     => true,
			'show_admin_column' => true
		)
	);
	
	register_taxonomy(
		'sponsor_post',
		'post',
		array(
			'hierarchical'  => true,
			'label'         => 'Sponsorizzato',
			'singular_name' => 'Sponsorizzato',
			'rewrite'       => true,
			'query_var'     => true,
			'show_admin_column' => true
		)
	);

	/*
	register_taxonomy(
		'rivista_post',
		'post',
		array(
			'hierarchical'  => true,
			'label'         => 'Rivista',
			'singular_name' => 'Rivista',
			'rewrite'       => true,
			'query_var'     => true,
			'show_admin_column' => true
		)
	);
	*/
	
}


add_action( 'restrict_manage_posts', '_pincuter_posts_taxonomy_filter' );
function _pincuter_posts_taxonomy_filter() {
	global $typenow; // this variable stores the current custom post type
	##if( $typenow == 'post' ){ // choose one or more post types to apply taxonomy filter for them if( in_array( $typenow  array('post','games') )
	if( $typenow == 'post' ){
		##$taxonomy_names = array('platform', 'device');
		//$taxonomy_names = array('evidenza_post', 'sponsor_post', 'editoriali_post', 'rivista_post');
		$taxonomy_names = array('evidenza_post', 'sponsor_post');
		foreach ($taxonomy_names as $single_taxonomy) {
			$current_taxonomy = isset( $_GET[$single_taxonomy] ) ? $_GET[$single_taxonomy] : '';
			$taxonomy_object = get_taxonomy( $single_taxonomy );
			$taxonomy_name = strtolower( $taxonomy_object->labels->name );
			$taxonomy_terms = get_terms( $single_taxonomy );
			if(count($taxonomy_terms) > 0) {
				echo "<select name='$single_taxonomy' id='$single_taxonomy' class='postform'>";
				echo "<option value=''>All $taxonomy_name</option>";
				foreach ($taxonomy_terms as $single_term) {
					echo '<option value='. $single_term->slug, $current_taxonomy == $single_term->slug ? ' selected="selected"' : '','>' . $single_term->name .' (' . $single_term->count .')</option>'; 
				}
				echo "</select>";
			}
		}
	}
}



add_filter( 'taxonomy_template', '_pincuter_custom_taxonomy_template', 10 ,2 );
function _pincuter_custom_taxonomy_template($taxonomy_template) {
    global $post;

	if ( is_tax('evidenza_post') || is_tax('sponsor_post') ) {
        $taxonomy_template = wp_safe_redirect( home_url() );
  }
  return $taxonomy_template;
  wp_reset_postdata();
}
