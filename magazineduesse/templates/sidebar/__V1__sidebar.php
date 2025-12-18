<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


echo '<div id="sidebar" class="sidebar">';

    echo '<aside id="adv-top" class="sidebar-adv-top widget d-flex justify-content-center">';
        echo '<a href="#">';
            echo '<figure>';
                echo '<img src="'.get_stylesheet_directory_uri().'/assets/images/banner-300x250.png" class="img-fluid" />';
            echo '</figure>';
        echo '</a>';
    echo '</aside>';

    //echo '<aside id="newsletter" class="sidebar-newsletter widget d-flex justify-content-center">';
    echo '<aside id="newsletter" class="sidebar-newsletter widget">';
        /*
        echo '<a href="#">';
            echo '<figure>';
                echo '<img src="'.get_stylesheet_directory_uri().'/assets/images/newsletter.jpg" class="img-fluid" />';
            echo '</figure>';
        echo '</a>';
        */
        
        echo '<script type="text/javascript" id="src-mltchnl" src="https://form-multichannel.emailsp.com/forms/5324/match/7a157925-cbee-46e2-88a7-ec6f6334ba54/121300"></script>';
        echo '<div id="frm-mltchnl"></div>';
        /*
        echo '<div class="clear"></div>';
        echo '<div class="spacer space-2"></div>';

        include(get_stylesheet_directory() . '/templates/sidebar/sidebar_newsletter.php');
        */
    echo '</aside>';

    echo '<aside id="editoriale" class="sidebar-editoriale widget d-flex justify-content-center">';
        echo '<a href="#">';
            echo '<figure>';
                echo '<img src="'.get_stylesheet_directory_uri().'/assets/images/editoriale.jpg" class="img-fluid" />';
            echo '</figure>';
        echo '</a>';
    echo '</aside>';

    /*
    echo '<aside id="rivista" class="sidebar-rivista widget d-flex justify-content-center">';
        echo '<a href="#">';
            echo '<figure>';
                echo '<img src="'.get_stylesheet_directory_uri().'/assets/images/rivista.jpg" class="img-fluid" />';
            echo '</figure>';
        echo '</a>';
    echo '</aside>';
    */
    echo '<aside id="rivista" class="sidebar-rivista widget d-flex justify-content-center">';
        echo '<a href="/rivista/" title="Rivista">';
            include(get_stylesheet_directory() . '/templates/category/category_rivista_cover_last_sidebar.php');
        echo '</a>';
    echo '</aside>';

    echo '<aside id="adv-bottom" class="sidebar-adv-bottom widget d-flex justify-content-center">';
        echo '<a href="#">';
            echo '<figure>';
                echo '<img src="'.get_stylesheet_directory_uri().'/assets/images/banner-300x600.png" class="img-fluid" />';
            echo '</figure>';
        echo '</a>';
    echo '</aside>';

echo '</div>';