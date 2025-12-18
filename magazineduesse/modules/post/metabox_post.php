<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


add_action( 'cmb2_admin_init', '_magazineduesse_metabox_post' );
function _magazineduesse_metabox_post() {
	
	$cmb_magazineduesse_post_noadv = new_cmb2_box( array(
		'id'            => 'magazineduesse_metabox_post_noadv',
		//'title'         => __( 'CMB2 sponsorizzato', CURRENT_DOMAIN ),
		'object_types'  => array( 'post' ), // Post type
		
		'remove_box_wrap' => true,
		'context' => 'after_title',
	) );
	$cmb_magazineduesse_post_noadv->add_field( array(
		'name' => esc_html__( 'Articolo NO-ADV', CURRENT_DOMAIN ),
		'desc' => 'Selezionare DISATTIVA se non si desidera ADV nell\'articolo . Dall\'articolo verranno escluse le pubblicità',
		'id'               => 'magazineduesse_articolo_noadv',
		'type'             => 'select',
		'show_option_none' => false,
		'default'          => 'attiva',
		'options'          => array(
			'attiva' => __( 'attiva', CURRENT_DOMAIN ),
			'disattiva'   => __( 'Disattiva', CURRENT_DOMAIN ),
		),
	) );

	/* ==================== */
	
	/*
	$cmb_magazineduesse_post_second_image = new_cmb2_box( array(
		'id'            => 'magazineduesse_second_image_metabox_post',
		'title'         => __( 'Immagine Evidenza verticale - Primo Piano Home', CURRENT_DOMAIN ),
		'object_types'     => array( 'post' ), // Tells CMB2 to use term_meta vs post_meta
		'context'      => 'side', //  'normal', 'advanced', or 'side'
		'priority'     => 'low',  //  'high', 'core', 'default' or 'low'
	) );
	$cmb_magazineduesse_post_second_image->add_field( array(
		'name' => esc_html__( 'Immagine', CURRENT_DOMAIN ),
		'id'   => 'second_featured_image',
		'type' => 'file',
		'text'    => array(
			'add_upload_file_text' => 'Aggiungi immagine' // Change upload button text. Default: "Add or Upload File"
		),
	) );
	*/
	
	/* ==================== */
	
	$cmb_magazineduesse_post_sponsorizzato = new_cmb2_box( array(
		'id'            => 'magazineduesse_sponsorizzato_metabox_post',
		'title'         => __( 'Articolo Sponsorizzato', CURRENT_DOMAIN ),
		'object_types'     => array( 'post' ), // Tells CMB2 to use term_meta vs post_meta
	) );
	
	$cmb_magazineduesse_post_sponsorizzato->add_field( array(
		'name'       => esc_html__( 'Label', CURRENT_DOMAIN ),
		'id'         => 'magazineduesse_sponsorizzato_post_label',
		'type'       => 'text',
	) );
	
	$cmb_magazineduesse_post_sponsorizzato->add_field( array(
		'name' => esc_html__( 'Logo', CURRENT_DOMAIN ),
		'id'   => 'magazineduesse_sponsorizzato_post_logo',
		'type' => 'file',
	) );
	
	
	/* ==================== */
	
	
	$cmb_magazineduesse_post_rivista = new_cmb2_box( array(
		'id'            => 'magazineduesse_rivista_metabox_post',
		'title'         => __( 'Articolo PDF', CURRENT_DOMAIN ),
		'object_types'     => array( 'post' ), // Tells CMB2 to use term_meta vs post_meta
	) );
	
	$cmb_magazineduesse_post_rivista->add_field( array(
		'name' => esc_html__( 'PDF Sfogliatore', CURRENT_DOMAIN ),
		'id'   => 'magazineduesse_rivista_post_pdf',
		'type' => 'file',
	) );
	$cmb_magazineduesse_post_rivista->add_field( array(
		'name' => esc_html__( 'PDF Download', CURRENT_DOMAIN ),
		'id'   => 'magazineduesse_rivista_post_pdf_download',
		'type' => 'file',
	) );
	$cmb_magazineduesse_post_rivista->add_field( array(
		'name' => esc_html__( 'PDF BUTTON LABEL (no articoli rivista)', CURRENT_DOMAIN ),
		'id'   => 'magazineduesse_rivista_post_pdf_button_label',
		'type' => 'textarea_small',
	) );
	
	
	/* ==================== */
	
	/*
	$cmb_magazineduesse_post_custom_permalink = new_cmb2_box( array(
		'id'            => 'magazineduesse_custom_permalink_metabox_post',
		'title'         => __( 'Permalink Personalizzato', CURRENT_DOMAIN ),
		'object_types'     => array( 'post' ), // Tells CMB2 to use term_meta vs post_meta
	) );
	
	$cmb_magazineduesse_post_custom_permalink->add_field( array(
		'name'       => esc_html__( 'Permalink Url', CURRENT_DOMAIN ),
		'id'         => 'magazineduesse_custom_permalink_post_url',
		'type'       => 'text',
	) );
    */

	/* ==================== */

	$cmb_magazineduesse_post_riassunto = new_cmb2_box( array(
		'id'            => 'magazineduesse_riassunto_metabox_post',
		'title'         => __( 'Articolo Riassunto', CURRENT_DOMAIN ),
		'object_types'     => array( 'post' ), // Tells CMB2 to use term_meta vs post_meta
	) );
	$cmb_magazineduesse_post_riassunto->add_field( array(
		'name'          => __( 'Articolo Riassunto Breve (per Frontpage)', CURRENT_DOMAIN ),
		'id'            => 'magazineduesse_riassunto_post_breve_contenuto',
		'type'          => 'textarea',
		/*
		'type'    => 'wysiwyg',
		'options' => array(
			'media_buttons' => false,
		)
		*/
	) );
	$cmb_magazineduesse_post_riassunto->add_field( array(
		'name'          => __( 'Articolo Riassunto Lungo (per Singolo Articolo)', CURRENT_DOMAIN ),
		'id'            => 'magazineduesse_riassunto_post_lungo_contenuto',
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

	/* ==================== */
			
	$cmb_magazineduesse_post_jnews = new_cmb2_box( array(
		'id'            => 'magazineduesse_jnews_metabox_post',
		'title'         => __( 'jnews', CURRENT_DOMAIN ),
		'object_types'     => array( 'post' ), // Tells CMB2 to use term_meta vs post_meta
	) );
	/*
	$cmb_magazineduesse_post_jnews->add_field( array(
		'name'          => __( 'jnews_single_post', CURRENT_DOMAIN ),
		'id'            => 'jnews_single_post',
		'type'          => 'textarea_code',
		'attributes'  => array(
			'readonly' => 'readonly',
			'disabled' => 'disabled',
		),
	) );
	*/
	$cmb_magazineduesse_post_jnews->add_field( array(
		'name'          => __( 'post_subtitle', CURRENT_DOMAIN ),
		'id'            => 'post_subtitle',
		'type'          => 'textarea',
		'attributes'  => array(
			'readonly' => 'readonly',
			'disabled' => 'disabled',
		),
	) );
	
}