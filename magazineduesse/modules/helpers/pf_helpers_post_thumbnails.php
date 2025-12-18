<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


add_action( 'after_setup_theme', '_pincuter_support_post_thubnails' );
function _pincuter_support_post_thubnails() {
	
	/*Add support for Post Thumbnails.*/
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 200, 150, true ); /* Normal post thumbnails */
	
	add_image_size( 'pnctr_image_thumb_primissimo', 770, 430, true );
	/*add_image_size( 'pnctr_image_thumb_vertical', 770, 1370, true );*/
	add_image_size( 'pnctr_image_thumb_vertical', 750, 1000, true );
	add_image_size( 'pnctr_image_thumb_vertical_special', 700, 900, true );
	add_image_size( 'pnctr_image_gallery_inside_article', 750, 500, true );
		
}