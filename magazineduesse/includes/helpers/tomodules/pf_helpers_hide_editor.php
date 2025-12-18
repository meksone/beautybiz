<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


add_action( 'admin_init', '_pincuter_hide_editor' );
function _pincuter_hide_editor() {
	
	global $pagenow;
    if( !( 'post.php' == $pagenow ) ) return;

    global $post;	
	// Get the Post ID.
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
	if( !isset( $post_id ) ) return;

	
	/*
	$pincuter_pgname = get_the_title($post_id);
	
	// Hide the editor on the page titled 'Home'
	if($pincuter_pgname == 'Home'){ 
		remove_post_type_support('page', 'editor');
		remove_post_type_support('page', 'thumbnail');
	}
	*/
	
	
	/*
	// Hide the editor on a page with a specific page template
	// Get the name of the Page Template file.
	$template_file = get_post_meta($post_id, '_wp_page_template', true);

	if($template_file == 'my-page-template.php'){ // the filename of the page template
		remove_post_type_support('page', 'editor');
	}*/
	
	
	/*
	$frontpage = get_option('page_on_front');
	if( $post_id == $frontpage ){
		remove_post_type_support('page', 'editor');
		remove_post_type_support('page', 'thumbnail');
	}
		
	
	// Pagina Documenti e Procedure (Governance)
	if( $post_id == 108 ){
		remove_post_type_support('page', 'editor');
		remove_post_type_support('page', 'thumbnail');
	}
	
	// Pagina Internal Dealing (Governance)
	if( $post_id == 111 ){
		remove_post_type_support('page', 'editor');
		remove_post_type_support('page', 'thumbnail');
	}
	
	// Pagina Organi Societari e di Controllo (Governance)
	if( $post_id == 333 ){
		remove_post_type_support('page', 'editor');
		remove_post_type_support('page', 'thumbnail');
	}
	
	// Pagina Informazioni per gli Azionisti (Investor Relations)
	if( $post_id == 133 ){
		remove_post_type_support('page', 'editor');
		remove_post_type_support('page', 'thumbnail');
	}
	
	// Pagina IPO (Investor Relations)
	if( $post_id == 162 ){
		remove_post_type_support('page', 'editor');
		remove_post_type_support('page', 'thumbnail');
	}
	
	// Pagina Contatti IR (Investor Relations)
	if( $post_id == 164 ){
		remove_post_type_support('page', 'editor');
		remove_post_type_support('page', 'thumbnail');
	}
	
	// Pagina Chi Siamo
	if( $post_id == 28 ){
		remove_post_type_support('page', 'editor');
		remove_post_type_support('page', 'thumbnail');
	}
	
	// Pagina Storia
	if( $post_id == 197 ){
		remove_post_type_support('page', 'editor');
		remove_post_type_support('page', 'thumbnail');
	}
	
	// Pagina Contatti Media
	if( $post_id == 207 ){
		remove_post_type_support('page', 'editor');
		remove_post_type_support('page', 'thumbnail');
	}
	
	// Pagina Struttura Aziendale
	if( $post_id == 210 ){
		remove_post_type_support('page', 'editor');
		remove_post_type_support('page', 'thumbnail');
	}
	
	// Pagina Sede e Stabilimento
	if( $post_id == 240 ){
		remove_post_type_support('page', 'editor');
		remove_post_type_support('page', 'thumbnail');
	}
	
	// Pagina impianti
	if( $post_id == 263 ){
		remove_post_type_support('page', 'editor');
		remove_post_type_support('page', 'thumbnail');
	}
	*/
	
}