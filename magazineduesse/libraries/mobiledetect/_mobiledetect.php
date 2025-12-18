<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


require_once( get_stylesheet_directory() . '/libraries/mobiledetect/mobiledetect.php' );
$detect = new Mobile_Detect;

/*
if (!$detect->isMobile() && !$detect->isTablet()) { // DESKTOP
if ($detect->isMobile() || $detect->isTablet()) { // MOBILE O TABLET
if ($detect->isMobile() // MOBILE
if ($detect->isTablet() // TABLET


add_filter( 'body_class', '_pincuter_body_classes_mobile_detect' );
function _pincuter_body_classes_mobile_detect( $classes ) {
	require_once( get_stylesheet_directory() . '/libraries/mobiledetect/mobiledetect.php' );
	$detect = new Mobile_Detect;

	if( $detect->isMobile() ) {
		$classes[] = 'detect-mobile';
	}
	if( $detect->isTablet() ) {
		$classes[] = 'detect-tablet';
	}
	if( !$detect->isMobile() && !$detect->isTablet( )) {
		$classes[] = 'detect-desktop';
	}
	return $classes;
}
*/
?>