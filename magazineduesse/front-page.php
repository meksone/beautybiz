<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
global $current_user, $do_not_duplicate;
$frontpage = get_option('page_on_front');

get_header();
?>


<?php 
$magazineduesse_frontpage_evidenza_select = get_post_meta($frontpage, 'magazineduesse_frontpage_evidenza_select', true);
if( $magazineduesse_frontpage_evidenza_select == 'evidenzauno'){
    include(get_stylesheet_directory() . '/templates/home/frontpage_evidenza_v1.php');
}
else if( $magazineduesse_frontpage_evidenza_select == 'evidenzadue'){
    include(get_stylesheet_directory() . '/templates/home/frontpage_evidenza_v2.php');
}
else if( $magazineduesse_frontpage_evidenza_select == 'evidenzatre'){
    include(get_stylesheet_directory() . '/templates/home/frontpage_evidenza_v3.php');
}
else if( $magazineduesse_frontpage_evidenza_select == 'evidenzaquattro'){
    include(get_stylesheet_directory() . '/templates/home/frontpage_evidenza_v4.php');
    echo '<div class="clear"></div>';
    echo '<div class="spacer space-3"></div>';
}


/* EVOLUTION ADS - MASTHEAD */
/*
echo '<div class="clear"></div>';
echo '<div class="spacer space-2"></div>';
//include(get_stylesheet_directory() . '/adv/adv_masthead.php');
include(get_stylesheet_directory() . '/adv_adplay/adv_masthead.php');
echo '<div class="clear"></div>';
echo '<div class="spacer space-3"></div>';
*/
/* end. EVOLUTION ADS - MASTHEAD */



/* APPROFONDIMENTI */
$magazineduesse_frontpage_approfondimenti_enable = get_post_meta($frontpage, 'magazineduesse_frontpage_approfondimenti_enable', true);
$magazineduesse_frontpage_approfondimenti_select = get_post_meta($frontpage, 'magazineduesse_frontpage_approfondimenti_select', true);
if( $magazineduesse_frontpage_approfondimenti_enable == 'abilita' ){
    
    if( $magazineduesse_frontpage_approfondimenti_select == 'approfondimentiuno'){
        include(get_stylesheet_directory() . '/templates/home/frontpage_approfondimenti_v1.php');
    }
    else if( $magazineduesse_frontpage_approfondimenti_select == 'approfondimentidue'){
        include(get_stylesheet_directory() . '/templates/home/frontpage_approfondimenti_v2.php');
    }
    else if( $magazineduesse_frontpage_approfondimenti_select == 'approfondimentitre'){
        include(get_stylesheet_directory() . '/templates/home/frontpage_approfondimenti_v3.php');
    }
    
    echo '<div class="clear"></div>';
    echo '<div class="spacer space-3"></div>';
}
?>


<section id="content_main">
    <div class="row row_content justify-content-between">
        <div class="col-md-8 col_content">
            <?php 
            include(get_stylesheet_directory() . '/templates/home/frontpage_latest.php');
            ?>
        </div>
        <div class="col-md-4 col_sidebar">
            <?php 
            include(get_stylesheet_directory() . '/templates/sidebar/sidebar.php');
            ?>
        </div>
    </div>
</section>


<?php 
/* SPECIALI */
$magazineduesse_frontpage_speciali_enable = get_post_meta($frontpage, 'magazineduesse_frontpage_speciali_enable', true);
if( $magazineduesse_frontpage_speciali_enable == 'abilita' ){
    echo '<div class="clear"></div>';
    echo '<div class="spacer space-3"></div>';
    include(get_stylesheet_directory() . '/templates/home/frontpage_speciali.php');
    echo '<div class="clear"></div>';
    echo '<div class="spacer space-3"></div>';
}
?>


<?php get_footer(); ?>