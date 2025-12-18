<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


$cmb_reserved_terms_users->add_field( array(
    'name'          => esc_html__( 'Utenti', CURRENT_DOMAIN  ),
    'id'            => 'reserved_term_user_query',
    'type' => 'user_search_text',
    //'roles' => array( 'administrator', 'author', 'editor' )
) );