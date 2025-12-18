<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
global $current_user, $do_not_duplicate;
$frontpage = get_option('page_on_front');

get_header();
?>


<?php 
/* PRIMISSIMO PIANO */
include(get_stylesheet_directory() . '/templates/home/frontpage_primissimo.php');
echo '<div class="clear"></div>';
echo '<div class="spacer space-1"></div>';


/* PRIMO PIANO */
$magazineduesse_frontpage_primo_piano_enable = get_post_meta($frontpage, 'magazineduesse_frontpage_primo_piano_enable', true);
if( $magazineduesse_frontpage_primo_piano_enable == 'abilita' ){
    include(get_stylesheet_directory() . '/templates/home/frontpage_primo.php');
    echo '<div class="clear"></div>';
    echo '<div class="spacer space-1"></div>';
}


/* EVOLUTION ADS - MASTHEAD */
include(get_stylesheet_directory() . '/adv/adv_masthead.php');
echo '<div class="clear"></div>';
echo '<div class="spacer space-3"></div>';
/* end. EVOLUTION ADS - MASTHEAD */


/* APPROFONDIMENTI */
$magazineduesse_frontpage_approfondimenti_enable = get_post_meta($frontpage, 'magazineduesse_frontpage_approfondimenti_enable', true);
if( $magazineduesse_frontpage_approfondimenti_enable == 'abilita' ){
    include(get_stylesheet_directory() . '/templates/home/frontpage_approfondimenti_v2.php');
    echo '<div class="clear"></div>';
    echo '<div class="spacer space-3"></div>';
}


/* SPECIALI */
/*
$magazineduesse_frontpage_speciali_enable = get_post_meta($frontpage, 'magazineduesse_frontpage_speciali_enable', true);
if( $magazineduesse_frontpage_speciali_enable == 'abilita' ){
    include(get_stylesheet_directory() . '/templates/home/frontpage_speciali.php');
    echo '<div class="clear"></div>';
    echo '<div class="spacer space-3"></div>';
}
*/
?>


<?php 
/*
<!--
<section id="frontpage_news" class="frontpage_news news_loop">
    
    <div class="block-title">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <div class="section-title-flex">
                        <h2 class="section-title__heading">News</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="block-content">
        <div class="row row_content justify-content-between">
            <div class="col-md-8 col_loop">
                <?php 
                //include(get_stylesheet_directory() . '/templates/home/frontpage_latest.php');
                ?>
            </div>
            <div class="col-md-4 col_sidebar">
                <?php 
                //include(get_stylesheet_directory() . '/templates/sidebar/sidebar.php');
                ?>
            </div>
        </div>
    </div>

</section>
-->
*/
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