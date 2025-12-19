<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes();?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes();?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes();?>> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" <?php language_attributes();?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes();?>> <!--<![endif]-->
<head> 
	<?php /*_pincuter_header_wp_title();*/ ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0" />
	<link rel="profile" href="//gmpg.org/xfn/11" />


<!-- Google Tag Manager -->
<script>/*
(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-W963WSJJ');
*/
</script>
<!-- End Google Tag Manager -->


	
	<?php 
	/*
	if( file_exists(get_stylesheet_directory().'/assets/favicon/_favicon.php') ){
		include( locate_template( 'assets/favicon/_favicon.php' ) );
	} else {
		echo '<link rel="icon" href="'.get_stylesheet_directory_uri().'/favicon.ico" type="image/x-icon" />';
	}
	*/
	?>
	
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />
	
	<?php
		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();
	?>


	<?php 
	/*
	include_once(get_stylesheet_directory() . '/adv/adv_script_skin.php');
	include_once(get_stylesheet_directory() . '/adv/adv_script_head.php');
	*/
    
	include_once(get_stylesheet_directory() . '/adv_interna/adv_head.php');

	?>


	


	<?php 
	include(get_stylesheet_directory() . '/adv_adplay/cmp.php');
	include(get_stylesheet_directory() . '/adv_adplay/target_macroarea_pagetype.php');
	?>

</head>

<body <?php body_id(); ?> <?php body_class(); ?>>

	

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W963WSJJ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


	<?php 
	/*
	include(get_stylesheet_directory() . '/adv/adv_skin.php');
	*/
	?>


        
    <!-- Page Wrap -->
    <main id="main-holder" class="main-holder">
		<div class="content_holder clearfix">
			<div class="container">
				<?php get_template_part("templates/header/header_template"); ?>
		
		
		