<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


add_action('restrict_manage_posts', '_pincuter_admin_posts_filter_by_author');
function _pincuter_admin_posts_filter_by_author() {
	$params = array(
		'name' => 'author',
		'role__in' => array('author','editor','administrator'),
		'show_option_none' => __('Tutti gli autori')
	);
	if ( isset($_GET['user']) ) {
		$params['selected'] = $_GET['user'];
	}
	wp_dropdown_users( $params );
}