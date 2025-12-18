<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


//global $sitepress_settings, $sitepress, $pincuter_theme_opt;
//$languages = $sitepress->get_ls_languages();

	$items = '';
	
	$items .= '<ul class="languages">';
		$items .= '<li class="menu-item menu-item-depth-0 menu-item-language menu-item-language-current">';			
			$items .= '<a href="#" onclick="return false">';
				$items .= 'IT';
			$items .= '</a>';
			//unset($languages[$sitepress->get_current_language()]);
		$items .= '</li>';
		
		/*
		if(!empty($languages)){
			foreach($languages as $code => $lang){
				$items .= '
				<li class="menu-item menu-item-depth-1 menu-item-language">
				<a href="' . $lang['url'] . '">
				' . $lang['native_name'] . '
				</a>
				</li>';
			}
		}
		*/
		
		$items .= '<li class="menu-item menu-item-depth-1 menu-item-language">';			
			$items .= '<a href="#">';
				$items .= 'EN';
			$items .= '</a>';
		$items .= '</li>';
		

		
	$items .= '</ul>';
	
	echo $items;