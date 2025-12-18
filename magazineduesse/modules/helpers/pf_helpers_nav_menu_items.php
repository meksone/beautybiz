<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


add_filter('wp_nav_menu_items', '_pincuter_wp_nav_menu_items_footer', 20, 2);
function _pincuter_wp_nav_menu_items_footer($items, $args){
    if( $args->menu == 'footer-1' ){
        $items .= '<li id="menu-item-privacy-adplay" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-privacy-adplay">';
            $items .= '<a href="#" onclick="if(window.__lxG__consent__!==undefined&amp;&amp;window.__lxG__consent__.getState()!==null){window.__lxG__consent__.showConsent()} else {alert(\'This function only for users from European Economic Area (EEA)\')}; return false">Privacy Policy</a>';
        $items .= '</li>';
    }
    return $items;
}
