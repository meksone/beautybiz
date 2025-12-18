<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


/* TITLE
==================== */
if ( !function_exists('_pincuter_title') ) :
	function _pincuter_title() { 
	global $post;
		
		$out_title = '';
		
		$frontpage_id = get_option( 'page_on_front' );
		$blog_id = get_option( 'page_for_posts' );
		
		
			$col_archivi = '';
			//if ( get_post_type() == 'comunicatistampa' && is_single() ){
			if( is_singular( array('post','comunicatistampa','diconodinoi') ) ){
				$col_archivi = 'col-md-pull-3';
			}
		
		
		if( !is_front_page() ){
			$out_title .= '<div class="title-section">';
				
				$out_title .= '<div class="container">';
					$out_title .= '<div class="row">';
						
						
							//if ( get_post_type() == 'comunicatistampa' && is_single() ){
							if( is_singular('comunicatistampa') ){
								$out_title .= '<div class="col-md-3 col-md-push-9">';
									$out_title .= '<div class="archivio-anchor archivio-comunicati-anchor">';
										$out_title .= '<a href="/comunicati-stampa">';
											$out_title .= '<i class="fa fa-long-arrow-right" aria-hidden="true"></i>';
											$out_title .= 'Leggi tutti i<br> comunicati stampa';
										$out_title .= '</a>';
									$out_title .= '</div>';
								$out_title .= '</div>';
							}
							else if( is_singular('post') ){
								$out_title .= '<div class="col-md-3 col-md-push-9">';
									$out_title .= '<div class="archivio-anchor archivio-news-anchor">';
										$out_title .= '<a href="/news">';
											$out_title .= '<i class="fa fa-long-arrow-right" aria-hidden="true"></i>';
											$out_title .= 'Leggi tutte le news';
										$out_title .= '</a>';
									$out_title .= '</div>';
								$out_title .= '</div>';
							}
							else if( is_singular('diconodinoi') ){
								$out_title .= '<div class="col-md-3 col-md-push-9">';
									$out_title .= '<div class="archivio-anchor archivio-news-anchor">';
										$out_title .= '<a href="/dicono-di-noi">';
											$out_title .= '<i class="fa fa-long-arrow-right" aria-hidden="true"></i>';
											$out_title .= 'Torna all\'elenco completo';
										$out_title .= '</a>';
									$out_title .= '</div>';
								$out_title .= '</div>';
							}
						
						
						$out_title .= '<div class="col-md-8 col-md-offset-1 '.$col_archivi.'">';
				
							
								if ( get_post_type() == 'comunicatistampa' && is_single() ){
									$out_title .= '<div class="data-pubblicazione">';
										$out_title .= '<time datetime="'.esc_html(get_the_time('Y-m-d\TH:i:s', get_the_id())).'">'.esc_html(get_the_date( 'j F Y', get_the_ID() )).'</time>';
									$out_title .= '</div>';
								}
								if ( get_post_type() == 'diconodinoi' && is_single() ){
									$out_title .= '<div class="meta-data-autore">';
									
										$out_title .= '<span class="data-pubblicazione">';
											$out_title .= '<time datetime="'.esc_html(get_the_time('Y-m-d\TH:i:s', get_the_id())).'">'.esc_html(get_the_date( 'j F Y', get_the_ID() )).'</time>';
										$out_title .= '</span>';
										
										$out_title .= '<span class="divider"> / </span>';
										
										$out_title .= '<span class="autore">';
											$out_title .= get_post_meta(get_the_id(), 'comal_dicono_di_noi_autore', true);
										$out_title .= '</span>';
										
									$out_title .= '</div>';
								}
							
							
							$out_title .= '<h1 class="title-header">';
								
								if(is_home()){ 
									$out_title .= get_the_title($blog_id);	
								}
								
								elseif( is_404() ){
									$out_title .= 'Ciao, <br>la pagina che hai cercato <br>non esiste.';
								}
								
								else if ( is_category() ) {
										$out_title .= single_cat_title( '', false );
										//echo category_description();
								} 
								
								elseif ( is_search() ) {
									$out_title .= 'Hai cercato: '.get_search_query();
									
								} 
								
								elseif ( is_day() ) {
									$out_title .= 'daily_archives: <small>'.get_the_date().'</small>';
								} 
								
								elseif ( is_month() ) {
									$out_title .= 'monthly_archives: <small>'.get_the_date("F Y").'</small>';
								} 
								
								elseif ( is_year() ) {
									$out_title .= 'yearly_archives"): <small>'.get_the_date("Y").'</small>';
								} 
								
								elseif ( is_author() ) {
									global $author;
									$userdata = get_userdata($author);
									$out_title .= apply_filters( 'pincuter_text_translate', 'Author: ', 'author_title_archive' ); 
									$out_title .= $userdata->display_name;
								} 
								
								elseif ( is_tag() ) {
									$out_title .= single_tag_title( '', false );
								}
								
								
								elseif ( is_post_type_archive('comunicatistampa')  ){
									$out_title .= 'Comunicati stampa';
								}
								elseif ( get_post_type() == 'comunicatistampa' && is_single() ){
									$out_title .= get_the_title();
								}
								
								
								elseif ( is_post_type_archive('mediakit')  ){
									$out_title .= 'Media Kit';
								}
								
								
								elseif ( is_post_type_archive('impianti')  ){
									$out_title .= 'Gli impianti';
								}
								
								
								elseif ( is_post_type_archive('diconodinoi')  ){
									$out_title .= 'Dicono di noi';
								}
								
								
								else { 
									if (have_posts()) : while (have_posts()) : the_post();
										$pagetitle = get_post_custom_values("page-title");
										$pagedesc = get_post_custom_values("title-desc");
											if($pagetitle == ""){
												$out_title .= get_the_title();
											} else {
												$out_title .= $pagetitle[0];
											}
											if($pagedesc != ""){
												$out_title .= '<span class="title-desc">'.$pagedesc[0].'</span>';
											}
										endwhile; endif;
									wp_reset_query();
								}
							$out_title .= '</h1>';
				
				
						$out_title .= '</div>'; /* end. col-md-8 */
												
					$out_title .= '</div>'; /* end. row */
				$out_title .= '</div>'; /* end. container */
							
			$out_title .= '</div><!-- .title-section -->';
		
		}

		return apply_filters('_pincuter_title_filter',$out_title);
	}
endif;