<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


add_action( 'cmb2_admin_init', '_magazineduesse_metabox_contatti' );
function _magazineduesse_metabox_contatti() {
	
	$cmb_magazineduesse_contatti = new_cmb2_box( array(
		'id'            => 'magazineduesse_metabox_contatti_download',
		'title'         => __( 'Opzioni', CURRENT_DOMAIN ),
		'object_types'  => array( 'page' ), // Post type
		'show_on'       => array( 'key' => 'page-template', 'value' => 'templates/template_contatti.php' ),
	) );
	/*
    $cmb_magazineduesse_contatti->add_field( array(
		'name'          => __( 'Mappa Iframe', CURRENT_DOMAIN ),
		'id'            => 'magazineduesse_contatti_map_iframe',
		'type'          => 'textarea_code',
	) );
	*/
    $cmb_magazineduesse_contatti->add_field( array(
		'name'       => esc_html__( 'Titoletto Intro Form', CURRENT_DOMAIN ),
		'id'         => 'magazineduesse_contatti_intro_form_titoletto',
		'type'       => 'textarea_small',
	) );
    $cmb_magazineduesse_contatti->add_field( array(
		'name'          => __( 'Contenuto Intro Form', CURRENT_DOMAIN ),
		'id'            => 'magazineduesse_contatti_intro_form_contenuto',
		//'type'          => 'textarea',
		'type'    => 'wysiwyg',
		
		'options' => array(
			'media_buttons' => false,
		)

	) );
	/* rendering 
	$post_meta = get_post_meta(get_the_id(), 'field', true);
	echo apply_filters('pincuter_meta_content',$post_meta);
	*/

}