<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
?>


    <div id="category_loop_wrap" class="category_loop__latest category_template_speciali">
        <div class="row">


                <?php 
                $suppress_filters = get_option('suppress_filters');
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                $latest_args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                                
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'paged' => $paged,
                                
                    'posts_per_page' => 10,
                                
                    'category__in' => array(get_query_var('cat')),
                    'post__not_in' => $do_not_duplicate,
                                
                );
                            
                $wp_query = new WP_Query($latest_args);
                                                                    
                if ($wp_query->have_posts()) :	
                    while ($wp_query->have_posts()) : $wp_query->the_post();
                                    
                        $latest_id = $wp_query->post->ID;
                        $do_not_duplicate[] = $latest_id;
                                    
                        $latest_title = get_the_title($latest_id);
                        $latest_content = $wp_query->post->post_content;
                                    
                        $category_post_id = $latest_id;
                        $category_post_title = $latest_title;
                        $category_post_content = $latest_content;
                        ?>

                        <div class="col-md-3 post_item mb-3">
                            <article <?php post_class(); ?>>
                                
                                <div class="post_thumb mb-1" data-file-thumb-src="_category_thumb_speciali">
                                    <?php 
                                    include(get_stylesheet_directory() . '/templates/category/category_thumb/_category_thumb_speciali.php');
                                    ?>
                                </div>
                                    
                                    
                                        <div class="post_desc">
                                            <div class="post_title">
                                                <h3 class="post_title__heading">
                                                    <a href="<?php echo get_permalink($category_post_id); ?>" title="<?php echo $category_post_title; ?>">
                                                        <?php echo $category_post_title; ?>
                                                    </a>
                                                </h3>
                                            </div>
                                            
                                            <?php 
                                            /*
                                            <div class="post_meta mb-1">
                                                <div class="post_meta__inner">
                                                    <div class="post_meta_date">
                                                        <time datetime="<?php echo esc_html(get_the_time('Y-m-d\TH:i:s', $category_post_id)); ?>"><?php echo esc_html(get_the_date()); ?></time>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post_excerpt">
                                                <p>
                                                    <?php 
                                                    $magazineduesse_riassunto_post_breve_contenuto = get_post_meta($latest_id, 'magazineduesse_riassunto_post_breve_contenuto', true);
                                                    if( !empty($magazineduesse_riassunto_post_breve_contenuto) ){
                                                        echo $magazineduesse_riassunto_post_breve_contenuto;
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                            */
                                            ?>
                                            
                                        </div>
                                    
                                
                            </article>
                        </div>
                        <?php 
                    endwhile;

                    /* Posts navigation */
					echo '<div class="col_pagination mb-3">';
					    if ( function_exists('_pincuter_pagination') ) :
							_pincuter_pagination( $wp_query->max_num_pages );
						else :
							if ( $wp_query->max_num_pages > 1 ) : ?>
								<ul class="pager">
									<li class="previous">
										<?php next_posts_link() ?>
									</li><!--.older-->
									<li class="next">
										<?php previous_posts_link() ?>
									</li><!--.newer-->
								</ul><!--.oldernewer-->
								<?php 
							endif;
						endif;
					echo '</div>';
					/* end. Posts navigation */
                
                endif;
                wp_reset_postdata();
                ?>

        </div>
    </div>