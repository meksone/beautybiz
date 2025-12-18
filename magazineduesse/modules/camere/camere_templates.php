<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


add_filter( 'archive_template', '_hotelpompei_camere_archive_template', 10 ,2 );
function _hotelpompei_camere_archive_template($archive_template) {
    global $post;

    if ( is_post_type_archive ( 'camere' ) ) {
		$archive_template = locate_template( 'templates/camere/_archive_camere.php' );
    }
    return $archive_template;
    wp_reset_postdata();
}



/*########## --- SEPARATOR --- ##########*/



add_filter( 'taxonomy_template', '_hotelpompei_camere_taxonomy_template', 10 ,2 );
function _hotelpompei_camere_taxonomy_template($taxonomy_template) {
    global $post;

	if ( is_tax('categoria_camere') ) {
		$taxonomy_template = locate_template( 'templates/camere/_category_camere.php' );
    }
    return $taxonomy_template;
    wp_reset_postdata();
}



add_filter( 'taxonomy_template', '_pincuter_mirum_yprodotti_taxonomy_template', 10 ,2 );
function _pincuter_mirum_yprodotti_taxonomy_template($taxonomy_template) {
    global $post;

	if ( is_tax('yprodotti_category') ) {
      $yprodotti_category_term = get_term( get_queried_object_id() );
      if( $yprodotti_category_term->slug == 'accessori'){
		    $taxonomy_template = locate_template( 'templates/prodotti/_category_accessori_prodotti.php' );
      } else {
        $taxonomy_template = wp_safe_redirect( get_post_type_archive_link( 'yprodotti' ) );
      }
  }
  return $taxonomy_template;
  wp_reset_postdata();
}



/*########## --- SEPARATOR --- ##########*/



add_filter( 'single_template', '_hotelpompei_camere_single_template', 10 ,2 );
function _hotelpompei_camere_single_template($single_template) {
    global $post;

    if ( $post->post_type == 'camere' && is_single() ) {
		$single_template = locate_template( 'templates/camere/_single_camere.php' );
    }
    return $single_template;
    wp_reset_postdata();
}




add_filter( 'template_include', '_commodore_woocommerce_archive_template', 99 );
function _commodore_woocommerce_archive_template( $template ) {

    if ( is_woocommerce() && is_archive() ) {
        $new_template = get_stylesheet_directory() . '/pages/template_shop.php';
        if ( !empty( $new_template ) ) {
            return $new_template;
        }
    }

    return $template;
}