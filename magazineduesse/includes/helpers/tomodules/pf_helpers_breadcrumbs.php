<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


/* BREADCRUMBS
==================== */
if ( !function_exists( '_pincuter_breadcrumbs' ) ) :
	function _pincuter_breadcrumbs() {
  
		$showOnHome  = 1; // 1 - show "breadcrumbs" on home page, 0 - hide
		$delimiter   = '<li class="divider"></li>'; // divider
		
		$showCurrent = 1; // 1 - show title current post/page, 0 - hide
		$before      = '<li class="active">'; 
		$after       = '</li>'; 

		global $post, $wp_query;
		
		$homeTitle = get_the_title( get_option('page_on_front', true) );
		$homeLink = home_url();
		
		$blogTitle = get_the_title( get_option('page_for_posts', true) );
		$blogLink = get_permalink( get_option('page_for_posts', true) );
		
		
		$out_breadcrums = '';
		
		if( !is_front_page() ){
			$out_breadcrums .= '<div class="breadcrumb-section">';
				
				$out_breadcrums .= '<div class="container">';
					$out_breadcrums .= '<div class="row">';
						$out_breadcrums .= '<div class="col-md-12">';
			
							$out_breadcrums .= '<ul class="breadcrumb breadcrumb__t"><li><a title="'.$homeTitle.'" href="' . $homeLink . '">' . $homeTitle . '</a></li>' . $delimiter;
					  
								if ( is_home() ) {
									$out_breadcrums .= $before . $blogTitle . $after;
								}
								
								elseif ( is_category() ) {
									$thisCat = get_category(get_query_var('cat'), false);				
									$out_breadcrums .= $before . single_cat_title('', false) . $after;
								}
								
								elseif ( is_tag() ) {
									$out_breadcrums .= $before . single_tag_title('', false) . $after;
								}
								
								elseif ( is_search() ) {
									$out_breadcrums .= $before . theme_locals("fearch_for") . ': "' . get_search_query() . '"' . $after;
								}
								
								elseif ( is_author() ) {
									global $author;
									$userdata = get_userdata($author);
									$out_breadcrums .= $before . apply_filters( 'pincuter_text_translate', 'Author: ', 'author_title_archive' ) . $userdata->display_name . $after;
								}
								
								elseif ( is_404() ) {
									$out_breadcrums .= $before . '404' . $after;
								}
								
								elseif ( is_day() ) {
									$out_breadcrums .= '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
									$out_breadcrums .= '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a></li> ' . $delimiter . ' ';
									$out_breadcrums .= $before . get_the_time('d') . $after;
								}
								
								elseif ( is_month() ) {
									$out_breadcrums .= '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
									$out_breadcrums .= $before . get_the_time('F') . $after;
								}
								
								elseif ( is_year() ) {
									$out_breadcrums .= $before . get_the_time('Y') . $after;
								}
								
								elseif ( is_single() && get_post_type() == 'post' && !is_attachment() ) {
									$taxonomy_terms = get_the_terms( $post->ID, 'category' );
									if( $taxonomy_terms && ! is_wp_error($taxonomy_terms) ) {
										$terms = wp_get_post_terms( $post->ID, 'category', array( 'orderby' => 'term_id' ) );
										foreach ( $terms as $term ) {
											$out_breadcrums .= '<li><a title="'.$term->name.'" href="' . esc_url( get_term_link($term->term_id, 'category') ) . '">'.$term->name.'</a></li>' . $delimiter;
										}
									}
									$out_breadcrums .= $before . get_the_title() . $after;
								}
								
								elseif ( is_attachment() ) {
									$parent = get_post($post->post_parent);
									$cat = get_the_category($parent->ID); $cat = $cat[0];
									$out_breadcrums .= get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
									$out_breadcrums .= '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li> ' . $delimiter . ' ';
									$out_breadcrums .= $before . get_the_title() . $after;
								}
								
								elseif ( is_page() && !$post->post_parent ) {
									$out_breadcrums .= $before . get_the_title() . $after;
								}
								
								elseif ( is_page() && $post->post_parent ) {
									$parent_id  = $post->post_parent;
									$breadcrumbs = array();
									while ($parent_id) {
										$page          = get_page($parent_id);
										$breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
										$parent_id     = $page->post_parent;
									}
									$breadcrumbs = array_reverse($breadcrumbs);
									for ($i = 0; $i < count($breadcrumbs); $i++) {
										$out_breadcrums .= $breadcrumbs[$i];
										if ($i != count($breadcrumbs)-1) $out_breadcrums .= ' ' . $delimiter . ' ';
									}
									if ($showCurrent == 1)
										$out_breadcrums .= ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
								}
								
							$out_breadcrums .= '</ul>';
			
						$out_breadcrums .= '</div>'; /* end. col-md-12 */
					$out_breadcrums .= '</div>'; /* end. row */
				$out_breadcrums .= '</div>'; /* end. container */
				
			$out_breadcrums .= '</div><!-- .breadcrumb-section -->'; /* end. breadcrumb-section */
		}
		
		return apply_filters('_pincuter_breadcrumbs_filter',$out_breadcrums);
	}
endif;