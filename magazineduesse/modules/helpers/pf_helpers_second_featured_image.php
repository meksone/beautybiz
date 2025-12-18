<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


add_action( 'cmb2_admin_init', '_magazineduesse_metabox_multiple_featured_image' );
function _magazineduesse_metabox_multiple_featured_image() {
	
	$cmb_magazineduesse_multiple_featured_image = new_cmb2_box( array(
		'id'            => 'magazineduesse_metabox_multiple_featured_image',
		'title'         => __( 'Images Options', CURRENT_DOMAIN ),
		'object_types'  => array( 'post' ), // Post type
		'context'      => 'side', //  'normal', 'advanced', or 'side'
		'priority'     => 'default',  //  'high', 'core', 'default' or 'low'
	) );
    $cmb_magazineduesse_multiple_featured_image->add_field( array(
		'name' => esc_html__( 'Archive Featured Immagine (Min-Width 1100px)', CURRENT_DOMAIN ),
		'id'   => 'em_second_featured_image',
		'type' => 'file',
		'text'    => array(
			'add_upload_file_text' => 'Aggiungi immagine', // Change upload button text. Default: "Add or Upload File"
            'remove_image_text' => 'Rimuovi immagine',
		),
	) );
}