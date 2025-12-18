<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


add_action('upload_mimes', '_pincuter_add_file_types_to_uploads');
function _pincuter_add_file_types_to_uploads($file_types){
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$new_filetypes['svgz'] = 'image/svg+xml';
	$new_filetypes['webp'] = 'image/webp';
	
	$file_types = array_merge($file_types, $new_filetypes );
	
	return $file_types;
}