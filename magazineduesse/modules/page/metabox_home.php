<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


add_action( 'cmb2_admin_init', '_magazineduesse_metabox_frontpage' );
function _magazineduesse_metabox_frontpage() {
	
	$frontpage = get_option('page_on_front');
	
	$cmb_magazineduesse_frontpage = new_cmb2_box( array(
		'id'            => 'magazineduesse_metabox_frontpage_options',
		'title'         => __( 'Opzioni', CURRENT_DOMAIN ),
		'object_types'  => array( 'page' ), // Post type
		'show_on'	  	=> array( 'id' => array( $frontpage ) ),
	) );
	/*
	$cmb_magazineduesse_frontpage->add_field( array(
		'name'    => esc_html__( 'Primo Piano Abilita/Disabilita', CURRENT_DOMAIN ),
		'id'      => 'magazineduesse_frontpage_primo_piano_enable',
		'type'    => 'radio_image',
		'options' => array(
			'abilita' => esc_html__( 'abilita', CURRENT_DOMAIN ),
			'disabilita' => esc_html__( 'disabilita', CURRENT_DOMAIN ),
		),
		'default' => 'disabilita',
	) );
	*/
	$cmb_magazineduesse_frontpage->add_field( array(
		'name' => 'Evidenza Select',
		'id' => 'magazineduesse_frontpage_evidenza_select',
		'type' => 'select',
		'show_option_none' => false,
		'default' => 'evidenzauno',
		'options' => array(
			'evidenzauno' => __( 'Evidenza V.1', CURRENT_DOMAIN ),
			'evidenzadue' => __( 'Evidenza V.2', CURRENT_DOMAIN ),
			'evidenzatre' => __( 'Evidenza V.3', CURRENT_DOMAIN ),
			'evidenzaquattro' => __( 'Evidenza V.4', CURRENT_DOMAIN ),
		),
	) );
	$cmb_magazineduesse_frontpage->add_field( array(
		'name'    => esc_html__( 'Approfondimenti Abilita/Disabilita', CURRENT_DOMAIN ),
		'id'      => 'magazineduesse_frontpage_approfondimenti_enable',
		'type'    => 'radio_image',
		'options' => array(
			'abilita' => esc_html__( 'abilita', CURRENT_DOMAIN ),
			'disabilita' => esc_html__( 'disabilita', CURRENT_DOMAIN ),
		),
		'default' => 'disabilita',
	) );
	$cmb_magazineduesse_frontpage->add_field( array(
		'name' => 'Approfondimenti Select',
		'id' => 'magazineduesse_frontpage_approfondimenti_select',
		'type' => 'select',
		'show_option_none' => false,
		'default' => 'approfondimentiuno',
		'options' => array(
			'approfondimentiuno' => __( 'Approfondimenti V.1', CURRENT_DOMAIN ),
			'approfondimentidue' => __( 'Approfondimenti V.2', CURRENT_DOMAIN ),
			'approfondimentitre' => __( 'Approfondimenti V.3', CURRENT_DOMAIN ),
		),
	) );

	$cmb_magazineduesse_frontpage->add_field( array(
		'name'    => esc_html__( 'Speciali Abilita/Disabilita', CURRENT_DOMAIN ),
		'id'      => 'magazineduesse_frontpage_speciali_enable',
		'type'    => 'radio_image',
		'options' => array(
			'abilita' => esc_html__( 'abilita', CURRENT_DOMAIN ),
			'disabilita' => esc_html__( 'disabilita', CURRENT_DOMAIN ),
		),
		'default' => 'disabilita',
	) );
	
}