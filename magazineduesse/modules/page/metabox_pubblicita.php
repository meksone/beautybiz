<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


add_action( 'cmb2_admin_init', '_magazineduesse_metabox_pubblicita' );
function _magazineduesse_metabox_pubblicita() {

	$cmb_magazineduesse_pubblicita = new_cmb2_box( array(
		'id'            => 'magazineduesse_metabox_pubblicita_contatti',
		'title'         => __( 'Contatti', CURRENT_DOMAIN ),
		'object_types'  => array( 'page' ), // Post type
		'show_on'       => array( 'key' => 'page-template', 'value' => 'templates/template_pubblicita.php' ),
	) );
	$cmb_magazineduesse_pubblicita->add_field( array(
		'name'          => __( 'Intro Contatti', CURRENT_DOMAIN ),
		'id'            => 'magazineduesse_pubblicita_contatti_intro_contenuto',
		'type'          => 'textarea_small',
	) );
	$cmb_magazineduesse_pubblicita_contatti_group_field = $cmb_magazineduesse_pubblicita->add_field( array(
		'id'          => 'cmb_magazineduesse_pubblicita_contatti_group_field',
		'type'        => 'group',
		// 'repeatable'  => false, // use false if you want non-repeatable group
		'options'     => array(
			'group_title'   => __( 'Contatto {#}', CURRENT_DOMAIN ), // since version 1.1.4, {#} gets replaced by row number
			'add_button'    => __( 'Aggiungi Contatto', CURRENT_DOMAIN ),
			'remove_button' => __( 'Rimuovi Contatto', CURRENT_DOMAIN ),
			'sortable'      => true, // beta
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );
	$cmb_magazineduesse_pubblicita->add_group_field( 'cmb_magazineduesse_pubblicita_contatti_group_field', array(
		'name' => esc_html__( 'Icona', CURRENT_DOMAIN ),
		'id'   => 'magazineduesse_pubblicita_contatti_group_icona',
		'type' => 'file',
		'text'    => array(
			'add_upload_file_text' => 'Aggiungi Icona' // Change upload button text. Default: "Add or Upload File"
		),
	) );
	$cmb_magazineduesse_pubblicita->add_group_field( 'cmb_magazineduesse_pubblicita_contatti_group_field', array(
		'name'          => __( 'Contenuto', CURRENT_DOMAIN ),
		'id'            => 'magazineduesse_pubblicita_contatti_group_contenuto',
		'type'          => 'textarea',
	) );

	/********** */
	
	$cmb_magazineduesse_pubblicita = new_cmb2_box( array(
		'id'            => 'magazineduesse_metabox_pubblicita_download',
		'title'         => __( 'Download', CURRENT_DOMAIN ),
		'object_types'  => array( 'page' ), // Post type
		'show_on'       => array( 'key' => 'page-template', 'value' => 'templates/template_pubblicita.php' ),
	) );
    $cmb_magazineduesse_pubblicita_download_group_field = $cmb_magazineduesse_pubblicita->add_field( array(
		'id'          => 'cmb_magazineduesse_pubblicita_download_group_field',
		'type'        => 'group',
		// 'repeatable'  => false, // use false if you want non-repeatable group
		'options'     => array(
			'group_title'   => __( 'Download {#}', CURRENT_DOMAIN ), // since version 1.1.4, {#} gets replaced by row number
			'add_button'    => __( 'Aggiungi Download', CURRENT_DOMAIN ),
			'remove_button' => __( 'Rimuovi Download', CURRENT_DOMAIN ),
			'sortable'      => true, // beta
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );
	$cmb_magazineduesse_pubblicita->add_group_field( 'cmb_magazineduesse_pubblicita_download_group_field', array(
		'name'    => esc_html__( 'Abilita/Disabilita Faq', CURRENT_DOMAIN ),
		'id'      => 'magazineduesse_pubblicita_download_group_enable',
		'type'    => 'radio_image',
		'options' => array(
			'abilita' => esc_html__( 'abilita', CURRENT_DOMAIN ),
			'disabilita' => esc_html__( 'disabilita', CURRENT_DOMAIN ),
		),
		'default' => 'abilita',
	) );
	$cmb_magazineduesse_pubblicita->add_group_field( 'cmb_magazineduesse_pubblicita_download_group_field', array(
		'name'          => __( 'Titolo', CURRENT_DOMAIN ),
		'id'            => 'magazineduesse_pubblicita_download_group_title',
		'type'          => 'text',
	) );
    $cmb_magazineduesse_pubblicita->add_group_field( 'cmb_magazineduesse_pubblicita_download_group_field', array(
		'name' => esc_html__( 'PDF', CURRENT_DOMAIN ),
		'id'   => 'magazineduesse_pubblicita_download_group_pdf',
		'type' => 'file',
		'text'    => array(
			'add_upload_file_text' => 'Aggiungi PDF' // Change upload button text. Default: "Add or Upload File"
		),
	) );
	

}