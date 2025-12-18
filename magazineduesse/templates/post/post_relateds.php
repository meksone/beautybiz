<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
global $post;


$related_cats_array = array();
$related_post_cats = get_the_terms($post->ID, 'category');			
foreach ( $related_post_cats as $related_post_cat ) { 
	$related_cats_array[] = $related_post_cat->term_id; 
}
$suppress_filters = get_option('suppress_filters');// WPML filter
if ($related_post_cats && !is_wp_error($related_post_cats)) {
	$related_category_args = array(
		'post_status' => 'publish',
		'posts_per_page' => 6,
		'ignore_sticky_posts' => 1,
		'post__not_in' => array($post->ID),
		'post_type' => 'post',
		'suppress_filters' => $suppress_filters,
		'tax_query' => array(
			array(
				'taxonomy'     => 'category',
				'field'        => 'id',
				'terms'        => $related_cats_array
			),	
		),
	);
	/*query_posts($args);*/
	$related_category_query = new WP_Query($related_category_args);
	if ( $related_category_query->have_posts() ) :
		echo '<div class="clear"></div>';
        echo '<div class="spacer space-3"></div>';
        
        echo '<div class="related-posts">';
			
			/*echo '<h2 class="related-posts__heading">Articoli Correlati</h2>';*/
			
			echo '<div class="section-title">';
				echo '<div class="section-title-flex">';
					echo '<p class="section-title__heading">Articoli Correlati</p>';
					echo '<div class="hr hr-section-title"></div>';
				echo '</div>';
			echo '</div>';
			echo '<div class="clear"></div>';
			echo '<div class="spacer space-1"></div>';
						
			echo '<div class="related-posts-list row row-flex">';
					
				while( $related_category_query->have_posts() ) : $related_category_query->the_post();
					
					$related_category_id = $related_category_query->post->ID;
					$related_category_title = get_the_title($related_category_id);
					$related_category_content = $related_category_query->post->post_content;
					
					$relationship_id = $related_category_id;
					$relationship_title = $related_category_title;
					$relationship_content = $related_category_content;
					
					$categories_icon_id = $related_category_id;
					
					$related_category_post_classes = get_post_class( '', $related_category_id );
					
					echo '<div class="item related_post_item post_item col-md-4">';
						
						echo '<article class="' . esc_attr( implode( ' ', $related_category_post_classes ) ) . '">';
							echo '<div class="related_post_thumb post_thumb">';
							    include(get_stylesheet_directory() . '/templates/post/thumb/related_post_thumb.php');
							echo '</div>';
							
							echo '<div class="related_post_desc post_desc">';
								echo '<div class="related_post_title post_title">';
									echo '<p class="related_post_title__heading post_title__heading">';
										echo '<a href="'.esc_url(get_permalink($related_category_id)).'" title="'.esc_attr($related_category_title).'">';
											echo esc_attr($related_category_title);
										echo '</a>';
									echo '</p>';
								echo '</div>';
								echo '<div class="related_post_meta post_meta">';
									echo '<div class="related_post_meta__inner post_meta__inner">';
										/*
                                        echo '<div class="related_post_meta_author post_meta_author">';
											echo esc_html(get_the_author_meta('display_name'));
										echo '</div>';
                                        */
										echo '<div class="related_post_meta_date post_meta_date">';
											echo '<time datetime="'.esc_html(get_the_time('Y-m-d\TH:i:s', $related_category_id)).'">'.esc_html(get_the_date()).'</time>';
										echo '</div>';
									echo '</div>';
								echo '</div>';
							echo '</div>';
						echo '</article>';
							
					echo '</div>'; /*end. column */
					
				endwhile;
			
			echo '</div>'; /*end. row */
						
		echo '</div>'; /*end. related-posts */
	endif;
	wp_reset_postdata();
}