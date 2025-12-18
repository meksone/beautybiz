<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


echo '<div id="sidebar" class="sidebar">';


    echo '<div id="openx_sidebar_250" class="openx_sidebar mb-1">';
        echo "
        <!-- /20861521/BB_ROS_300x250_Box -->
        <div id='div-gpt-ad-1736854945260-0' style='min-width: 300px; min-height: 250px;'>
            <script>
            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1736854945260-0'); });
            </script>
        </div>
        ";
    echo '</div>';
    
    echo '<div id="gmp-topright" class="gmp"></div>';

    //echo '<aside id="newsletter" class="sidebar-newsletter widget d-flex justify-content-center">';
    echo '<aside id="newsletter" class="sidebar-newsletter widget">';
        /*
        echo '<a href="https://a2a3x0.emailsp.com/frontend/forms/Subscription.aspx?idList=6&idForm=10&guid=C76C4B0B-3F74-449A-8C84-FD936E358199" target="_blank" title="Iscriviti alla Newsletter">';
        */
        echo '<a href="'._pincuter_theme_option('theme_options_newsletter_url').'" target="_blank" title="Iscriviti alla Newsletter">';
            echo '<figure>';
                /*
                echo '<img src="'.get_stylesheet_directory_uri().'/assets/images/newsletter.png" alt="Newsletter" class="img-fluid" style="display:block;margin:0 auto;" />';
                */
                $theme_options_newsletter_image = _pincuter_theme_option('theme_options_newsletter_image');
                $theme_options_newsletter_image_id = _pincuter_theme_option('theme_options_newsletter_image_id');
                echo wp_get_attachment_image( $theme_options_newsletter_image_id, 'full', false, array( 'class' => 'img-fluid', 'loading' => 'lazy' ) );
            echo '</figure>';
        echo '</a>';
    echo '</aside>';


    /*
    echo '<aside id="adv-top" class="sidebar-adv-top widget d-flex justify-content-center">';
        echo '<a href="#">';
            echo '<figure>';
                echo '<img src="'.get_stylesheet_directory_uri().'/assets/images/banner-300x250.png" class="img-fluid" />';
            echo '</figure>';
        echo '</a>';
    echo '</aside>';
    */
    /* ADV - SIDEBAR_TOP */
    echo '<aside id="adv-top" class="sidebar-adv-top widget d-flex justify-content-center mb-1">';
        //include(get_stylesheet_directory() . '/adv/adv_sidebar_top.php');
        include(get_stylesheet_directory() . '/adv_adplay/adv_sidebar_top.php');
    echo '</aside>';

    
    echo '<aside id="editoriale" class="sidebar-editoriale widget mb-1">';
        include(get_stylesheet_directory() . '/templates/sidebar/sidebar_editoriale.php'); 
    echo '</aside>';
    
    echo '<div id="gmp-middleright" class="gmp"></div>';


    include(get_stylesheet_directory() . '/templates/sidebar/sidebar_editoriale_b.php'); 

    /*
    echo '<aside id="abbonamento" class="sidebar-abbonamento widget mb-1">';
        echo '<a href="'._pincuter_theme_option('theme_options_abbonamento_url').'" target="_blank" title="Abbonati alla Rivista">';
            echo '<figure>';
                //echo '<img src="'.get_stylesheet_directory_uri().'/assets/images/abbonamento.png" alt="Abbonamento" class="img-fluid" style="display:block;margin:0 auto;" />';
                $theme_options_abbonamento_image = _pincuter_theme_option('theme_options_abbonamento_image');
                $theme_options_abbonamento_image_id = _pincuter_theme_option('theme_options_abbonamento_image_id');
                echo wp_get_attachment_image( $theme_options_abbonamento_image_id, 'full', false, array( 'class' => 'img-fluid', 'loading' => 'lazy' ) );
            echo '</figure>';
        echo '</a>';
    echo '</aside>';
    */

    
    echo '<aside id="rivista" class="sidebar-rivista widget d-flex justify-content-center">';
        include(get_stylesheet_directory() . '/templates/sidebar/sidebar_rivista_cover_last.php');
    echo '</aside>';


    echo '<aside id="rivista" class="sidebar-rivista widget d-flex justify-content-center">';
        include(get_stylesheet_directory() . '/templates/sidebar/sidebar_rivista_cover_last_cinema.php');
    echo '</aside>';


    /*
    echo '<aside id="adv-bottom" class="sidebar-adv-bottom widget d-flex justify-content-center">';
        echo '<a href="#">';
            echo '<figure>';
                echo '<img src="'.get_stylesheet_directory_uri().'/assets/images/banner-300x250.png" class="img-fluid" />';
            echo '</figure>';
        echo '</a>';
    echo '</aside>';
    */
    /* ADV - SIDEBAR_TOP */
    echo '<aside id="adv-bottom" class="sidebar-adv-bottom widget d-flex justify-content-center">';
        //include(get_stylesheet_directory() . '/adv/adv_sidebar_bottom.php');
        include(get_stylesheet_directory() . '/adv_adplay/adv_sidebar_bottom.php');
    echo '</aside>';
    echo '<div id="gmp-bottomright" class="gmp"></div>
 ';

echo '</div>';