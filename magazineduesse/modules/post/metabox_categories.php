<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


add_action( 'cmb2_admin_init', '_magazineduesse_metabox_categories' );
function _magazineduesse_metabox_categories() {
	
	$cmb_magazineduesse_categories = new_cmb2_box( array(
		'id'            => 'magazineduesse_metabox_categories',
		'title'         => __( 'Opzioni', CURRENT_DOMAIN ),
		'object_types'  => array( 'term' ), // Post type
        'taxonomies'       => array( 'category' ),
		//'show_on'	  	=> array( 'id' => array( 121 ) ),
	) );
	/*
	$cmb_magazineduesse_rivista->add_field( array(
		'name'          => __( 'Scheda TAB rivista', CURRENT_DOMAIN ),
		'id'            => 'magazineduesse_rivista_scheda_tab',
		//'type'          => 'textarea',
		'type'    => 'wysiwyg',
		'options' => array(),
	) );
	$cmb_magazineduesse_rivista->add_field( array(
		'name'          => __( 'Formato TAB rivista', CURRENT_DOMAIN ),
		'id'            => 'magazineduesse_rivista_formato_tab',
		//'type'          => 'textarea',
		'type'    => 'wysiwyg',
		'options' => array(),
	) );
	$cmb_magazineduesse_rivista->add_field( array(
		'name'          => __( 'Calendario TAB rivista', CURRENT_DOMAIN ),
		'id'            => 'magazineduesse_rivista_calendario_tab',
		//'type'          => 'textarea',
		'type'    => 'wysiwyg',
		'options' => array(),
	) );
	*/

	$cmb_magazineduesse_categories->add_field( array(
		'name'             => 'Template',
		'id'               => 'magazineduesse_category_template',
		'type'             => 'select',
		'show_option_none' => false,
		'default'          => 'custom',
		'options'          => array(
			'standard' => __( 'Standard', CURRENT_DOMAIN ),
			'rivista' => __( 'Rivista', CURRENT_DOMAIN ),
			'speciali' => __( 'Speciali', CURRENT_DOMAIN ),
		),
	) );

	$cmb_magazineduesse_categories->add_field( array(
		'name' => esc_html__( 'Mediakit Pdf', CURRENT_DOMAIN ),
		'id'   => 'magazineduesse_rivista_mediakit_pdf',
		'type' => 'file',
	) );

	$cmb_magazineduesse_categories->add_field( array(
		'name'          => __( 'Intro', CURRENT_DOMAIN ),
		'id'            => 'magazineduesse_category_intro',
		//'type'          => 'textarea',
		'type'    => 'wysiwyg',
		'options' => array(
			'media_buttons' => false,
		)
	) );


	/********** */


	$cmb_magazineduesse_categories->add_field( array(
		'name' => esc_html__( 'Abbonamento', CURRENT_DOMAIN ),
		'id'   => 'magazineduesse_category_abbonamento_section',
		'type' => 'title',
	) );
	$cmb_magazineduesse_categories->add_field( array(
		'name'    => esc_html__( 'Abilita/Disabilita BLOCCO ABBONAMENTO ', CURRENT_DOMAIN ),
		'id'      => 'magazineduesse_category_abbonamento_blocco_enable',
		'type'    => 'radio_image',
		'options' => array(
			'abilita' => esc_html__( 'abilita', CURRENT_DOMAIN ),
			'disabilita' => esc_html__( 'disabilita', CURRENT_DOMAIN ),
		),
		'default' => 'disabilita',
	) );
	$cmb_magazineduesse_categories->add_field( array(
		'name'       => __( 'Abbonamento URL', CURRENT_DOMAIN ),
		'id'         => 'magazineduesse_category_abbonamento_url',
		'type'       => 'textarea_small',
	) );
	$cmb_magazineduesse_categories->add_field( array(
		'name'       => __( 'Abbonamento LABEL', CURRENT_DOMAIN ),
		'id'         => 'magazineduesse_category_abbonamento_label',
		'type'       => 'textarea_small',
	) );
	/*
	$cmb_magazineduesse_categories->add_field( array(
		'name'   => __( 'Abbonamento Image', CURRENT_DOMAIN ),
		'id'      => 'magazineduesse_category_abbonamento_image',
		'type'    => 'file',
		'text'    => array(
			'add_upload_file_text' => 'Add Image' // Change upload button text. Default: "Add or Upload File"
		),		
		'preview_size' => 'medium', // Image size to use when previewing in the admin.
	) );
	*/


	/********** */


	$cmb_magazineduesse_categories->add_field( array(
		'name' => esc_html__( 'Apps', CURRENT_DOMAIN ),
		'id'   => 'magazineduesse_category_apps_section',
		'type' => 'title',
	) );
	$cmb_magazineduesse_categories->add_field( array(
		'name'    => esc_html__( 'Abilita/Disabilita BLOCCO APPS ', CURRENT_DOMAIN ),
		'id'      => 'magazineduesse_category_apps_blocco_enable',
		'type'    => 'radio_image',
		'options' => array(
			'abilita' => esc_html__( 'abilita', CURRENT_DOMAIN ),
			'disabilita' => esc_html__( 'disabilita', CURRENT_DOMAIN ),
		),
		'default' => 'disabilita',
	) );
	$cmb_magazineduesse_categories->add_field( array(
		'name'       => __( 'Apps Titolo Sezione', CURRENT_DOMAIN ),
		'id'         => 'magazineduesse_category_apps_titolo_sezione',
		'type'       => 'textarea_small',
	) );
	$cmb_magazineduesse_categories_apps_group_field = $cmb_magazineduesse_categories->add_field( array(
		'id'          => 'cmb_magazineduesse_categories_apps_group_field',
		'type'        => 'group',
		// 'repeatable'  => false, // use false if you want non-repeatable group
		'options'     => array(
			'group_title'   => __( 'App {#}', CURRENT_DOMAIN ), // since version 1.1.4, {#} gets replaced by row number
			'add_button'    => __( 'Aggiungi App', CURRENT_DOMAIN ),
			'remove_button' => __( 'Rimuovi App', CURRENT_DOMAIN ),
			'sortable'      => true, // beta
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );
	$cmb_magazineduesse_categories->add_group_field( 'cmb_magazineduesse_categories_apps_group_field', array(
		'name'    => esc_html__( 'Abilita/Disabilita App', CURRENT_DOMAIN ),
		'id'      => 'magazineduesse_category_app_group_enable',
		'type'    => 'radio_image',
		'options' => array(
			'abilita' => esc_html__( 'abilita', CURRENT_DOMAIN ),
			'disabilita' => esc_html__( 'disabilita', CURRENT_DOMAIN ),
		),
		'default' => 'disabilita',
	) );
	$cmb_magazineduesse_categories->add_group_field( 'cmb_magazineduesse_categories_apps_group_field', array(
		'name'       => __( 'App Title', CURRENT_DOMAIN ),
		'id'         => 'magazineduesse_category_app_group_title',
		'type'       => 'text',
	) );
	$cmb_magazineduesse_categories->add_group_field( 'cmb_magazineduesse_categories_apps_group_field', array(
		'name'       => __( 'App Url', CURRENT_DOMAIN ),
		'id'         => 'magazineduesse_category_app_group_url',
		'type'       => 'text',
	) );
	$cmb_magazineduesse_categories->add_group_field( 'cmb_magazineduesse_categories_apps_group_field', array(
		'name'   => __( 'App Immagine', CURRENT_DOMAIN ),
		'id'      => 'magazineduesse_category_app_group_image',
		'type'    => 'file',
		'text'    => array(
			'add_upload_file_text' => 'Add Image' // Change upload button text. Default: "Add or Upload File"
		),		
		'preview_size' => 'medium', // Image size to use when previewing in the admin.
	) );
}