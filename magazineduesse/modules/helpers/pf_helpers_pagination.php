<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


/*################
###	Pagination ###
################*/
if ( !function_exists( '_pincuter_pagination' ) ) {
	function _pincuter_pagination( $pages = '', $range = 2 ) {
		//function pagination( $pages = '', $range = 1 )
		//$showitems = ($range * 2) + 1;
		$showitems = ($range * 2) + 1;

		global $wp_query;
		$paged = (int) $wp_query->query_vars['paged'];
		if( empty($paged) || $paged == 0 ) $paged = 1;

		if ( $pages == '' ) {
			$pages = $wp_query->max_num_pages;
			if( !$pages ) {
				$pages = 1;
			}
		}
		if ( 1 != $pages ) {
			echo '<div class="pagination pagination__posts">';
				echo '<div class="pagination-wrapper">';
					
					echo '<div class="pagination-list">';
						echo '<div class="pagination-list__inner">';

							if ( $paged > 1 && $showitems < $pages ) echo '<div class="pagination_item prev"><a href="'.get_pagenum_link($paged - 1).'"><i class="bi bi-arrow-left"></i></a></div>';

							for ( $i = 1; $i <= $pages; $i++ ) {
								/*
								if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
									echo ($paged == $i)? '<div class="active"><span>'.$i.'</span></div><div class="sm_hr"></div>':'<div class="inactive"><a href="'.get_pagenum_link($i).'">'.$i.'</a></div>';
								}
								*/
								
								/* LAST
								if (1 != $pages ) {
									echo ($paged == $i)? '<div class="active"><span>'.$i.'</span></div><div class="sm_hr"></div>':'<div class="inactive"><a href="'.get_pagenum_link($i).'">'.$i.'</a></div>';
								}
								*/
								
								if( 1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ) ) {
									echo ($paged == $i)? '<div class="pagination_item active"><span>'.$i.'</span></div>':'<div class="pagination_item inactive"><a href="'.get_pagenum_link($i).'">'.$i.'</a></div>';
								}
							}
							if ( $paged < $pages-2 && $paged+$range-2 < $pages && $showitems < $pages ){ 
								echo '<div class="inactive pagination_ranget"><span>...</span></div>';
								echo '<div class="pagination_item inactive"><a href="'.get_pagenum_link($pages).'">'.$pages.'</a></div>';
							}

							if ( $paged < $pages && $showitems < $pages ) echo '<div class="pagination_item next"><a href="'.get_pagenum_link($paged + 1).'"><i class="bi bi-arrow-right"></i></a></div>';
							
							
						echo '</div>';
					echo '</div>';
			
			
				echo '</div>';
			echo '</div>';
			
			echo '<div class="clear"></div>';
		}
	}
}