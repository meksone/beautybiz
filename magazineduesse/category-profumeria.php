<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


$queried_object = get_queried_object();
$term_id = $queried_object->term_id;
$term_slug = $queried_object->slug;
$term_description = get_term_field( 'description', $queried_object );
get_header();
?>


<section id="breadcrumbs">
    <?php echo _pincuter_breadcrumbs(); ?>
</section>


<?php 
/* EVOLUTION ADS - MASTHEAD */
/*
//include(get_stylesheet_directory() . '/adv/adv_masthead.php');
include(get_stylesheet_directory() . '/adv_adplay/adv_masthead.php');
echo '<div class="clear"></div>';
echo '<div class="spacer space-2"></div>';
*/
/* end. EVOLUTION ADS - MASTHEAD */
?>


<section id="content_main">
	
	<div id="category_title" class="section-title">
		<div class="row">
			<div class="col-md-12">
                <!--
                <div class="section-title">
				    <h1 id="category_title__heading" class="section-title__heading playfair-semibold">
                        <?php //echo single_cat_title('', false); ?>
                    </h1>
                </div>
                -->
                <div class="section-title-flex">
					<h1 id="category_title__heading" class="section-title__heading playfair-semibold">
                        <?php echo single_cat_title('', false); ?>
                    </h1>
					<div class="hr hr-section-title"></div>
                    <!--
					<div class="cta cta_all cta_all_prossime_uscite">
						<a href="/blog/" title="Leggi tutti gli ultimi articoli">
							Leggi tutti gli ultimi articoli
						</a>
					</div>
                    -->
				</div>

            </div>
        </div>
    </div>

    <div class="clear"></div>
	<div class="spacer space-1"></div>


    <div id="category_loop_wrap" class="category_loop__latest category_template_standard">
        <div class="row justify-content-between">
            <div class="col-md-8 col_content">

                <?php 
                $profumeria_child_terms = get_terms( array(
                    'taxonomy'   => 'category',
                    'hide_empty' => false,
                    'parent' => get_queried_object_id()
                ) );                
                $profumeria_child_terms_array = array();
                $profumeria_child_terms_array[] = get_query_var('cat');
                foreach( $profumeria_child_terms as $profumeria_child_term){
                    $profumeria_child_terms_array[] = $profumeria_child_term->term_id;
                }

                $suppress_filters = get_option('suppress_filters');
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;


                $latest_args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                                
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'paged' => $paged,
                                
                    'posts_per_page' => 10,
                                
                    'category__in' => $profumeria_child_terms_array,
                    /*
                    'category__in' => array(get_query_var('cat')),
                    'post__not_in' => $do_not_duplicate,
                    */   
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
                        

                        include(get_stylesheet_directory() . '/templates/category/category_template_standard_loop.php'); 
                        
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

            <div class="col-md-4 col_sidebar">
                <?php include(get_stylesheet_directory() . '/templates/sidebar/sidebar.php'); ?>
            </div>

        </div>
    </div>


    </section>


<?php get_footer(); ?>