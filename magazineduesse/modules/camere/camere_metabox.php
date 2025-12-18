<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


add_action( 'cmb2_admin_init', '_hotelpompei_metabox_camere' );
function _hotelpompei_metabox_camere() {
	
	$cmb_hotelpompei_camere = new_cmb2_box( array(
		'id'            => 'hotelpompei_metabox_camere',
		'title'         => __( 'Opzioni', CURRENT_DOMAIN ),
		'object_types'     => array( 'camere' ), // Tells CMB2 to use term_meta vs post_meta
	) );
	
	$cmb_hotelpompei_camere->add_field( array(
		'name' => esc_html__( 'Head Immagine', CURRENT_DOMAIN ),
		'id'   => 'hotelpompei_camere_head_immagine',
		'type' => 'file',
	) );
	
	$cmb_hotelpompei_camere->add_field( array(
		'name' => esc_html__( 'Head Immagine Mobile / Anteprima Archivio', CURRENT_DOMAIN ),
		'id'   => 'hotelpompei_camere_head_immagine_mobile',
		'type' => 'file',
	) );
	
	$cmb_hotelpompei_camere->add_field( array(
		'name' => __( 'Immagini Camere', CURRENT_DOMAIN ),
		'id'   => 'hotelpompei_camere_immagini',
		'type' => 'file_list',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
		// 'query_args' => array( 'type' => 'image' ), // Only images attachment
		// Optional, override default text strings
		'text' => array(
			'add_upload_files_text' => 'Aggiungi Immagine', // default: "Add or Upload Files"
			'remove_image_text' => 'Rimuovi Immagine', // default: "Remove Image"
			//'file_text' => 'Replacement', // default: "File:"
			//'file_download_text' => 'Replacement', // default: "Download"
			//'remove_text' => 'Replacement', // default: "Remove"
		),
	) );
	
	$cmb_hotelpompei_camere->add_field( array(
		'name'       => esc_html__( 'Numero persone', CURRENT_DOMAIN ),
		'id'         => 'hotelpompei_camere_persone',
		'type'       => 'text',
	) );
	
	/*
	$cmb->add_field( array(
		'name' => esc_html__( 'Numero Letti Matrimoniali', CURRENT_DOMAIN ),
		'id'   => 'hotelpompei_camere_letto_matrimoniale',
		//'type' => 'checkbox',
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Letto Singolo', CURRENT_DOMAIN ),
		'id'   => 'hotelpompei_camere_letto_singolo',
		//'type' => 'checkbox',
	) );
	*/
	
	$cmb_hotelpompei_camere->add_field( array(
		'name'          => __( 'Numero Letti Matrimoniali', CURRENT_DOMAIN ),
		'id'            => 'hotelpompei_camere_letto_matrimoniale',
		'type'          => 'text',
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
		),
		'sanitization_cb' => 'absint',
        'escape_cb'       => 'absint',
	) );
	
	$cmb_hotelpompei_camere->add_field( array(
		'name'          => __( 'Numero Letti Singoli', CURRENT_DOMAIN ),
		'id'            => 'hotelpompei_camere_letto_singolo',
		'type'          => 'text',
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
		),
		'sanitization_cb' => 'absint',
        'escape_cb'       => 'absint',
	) );
	
	$cmb_hotelpompei_camere->add_field( array(
		'name'    => __( 'Servizi Camere', CURRENT_DOMAIN ),
		'id'      => 'hotelpompei_camere_servizi',
		'type'    => 'multicheck',
		'options'          => array(
			__( 'Bagno Privato', CURRENT_DOMAIN ) => __( 'Bagno Privato', CURRENT_DOMAIN ),
			__( 'Minibar', CURRENT_DOMAIN ) => __( 'Minibar', CURRENT_DOMAIN ),
			__( 'Aria Condizionata e Riscaldamento (regolabili)', CURRENT_DOMAIN ) => __( 'Aria Condizionata e Riscaldamento (regolabili)', CURRENT_DOMAIN ),
			__( 'Linea Cortesia e Biancheria da Bagno', CURRENT_DOMAIN ) => __( 'Linea Cortesia e Biancheria da Bagno', CURRENT_DOMAIN ),
			__( 'Internet (WI-FI)', CURRENT_DOMAIN ) => __( 'Internet (WI-FI)', CURRENT_DOMAIN ),
			__( 'Asciugacapelli', CURRENT_DOMAIN ) => __( 'Asciugacapelli', CURRENT_DOMAIN ),
			__( 'Scrivania da Lavoro', CURRENT_DOMAIN ) => __( 'Scrivania da Lavoro', CURRENT_DOMAIN ),
			__( 'Doccia', CURRENT_DOMAIN ) => __( 'Doccia', CURRENT_DOMAIN ),
			__( 'TV LCD', CURRENT_DOMAIN ) => __( 'TV LCD', CURRENT_DOMAIN ),
			__( 'Animali Domestici Non Ammessi', CURRENT_DOMAIN ) => __( 'Animali Domestici Non Ammessi', CURRENT_DOMAIN ),
			__( 'Animali Domestici Ammessi', CURRENT_DOMAIN ) => __( 'Animali Domestici Ammessi', CURRENT_DOMAIN ),
		),
	) );
	
}




add_action( 'cmb2_admin_init', '_hotelpompei_metabox_camere_taxonomies' );
function _hotelpompei_metabox_camere_taxonomies() {
	
	$cmb_hotelpompei_camere_taxonomies = new_cmb2_box( array(
		'id'            => 'hotelpompei_metabox_camere_taxonomies',
		'title'         => __( 'Opzioni', CURRENT_DOMAIN ),
		'object_types'     => array( 'term' ), // Tells CMB2 to use term_meta vs post_meta
		'taxonomies'       => array( 'categoria_camere' ),
	) );
	
	$cmb_hotelpompei_camere_taxonomies->add_field( array(
		'name' => esc_html__( 'Head Immagine', CURRENT_DOMAIN ),
		'id'   => 'hotelpompei_camere_taxonomies_head_immagine',
		'type' => 'file',
	) );
	
	$cmb_hotelpompei_camere_taxonomies->add_field( array(
		'name' => esc_html__( 'Head Immagine Mobile', CURRENT_DOMAIN ),
		'id'   => 'hotelpompei_camere_taxonomies_head_immagine_mobile',
		'type' => 'file',
	) );
	
	$cmb_hotelpompei_camere_taxonomies->add_field( array(
		'name'       => esc_html__( 'Titoletto', CURRENT_DOMAIN ),
		'id'         => 'hotelpompei_camere_taxonomies_titoletto',
		'type'       => 'textarea_small',
	) );
	
	$cmb_hotelpompei_camere_taxonomies->add_field( array(
		'name'          => __( 'Descrizione', CURRENT_DOMAIN ),
		'id'            => 'hotelpompei_camere_taxonomies_descrizione',
		//'type'          => 'textarea',
		'type'    => 'wysiwyg',
		'options' => array(),
	) );
	
}