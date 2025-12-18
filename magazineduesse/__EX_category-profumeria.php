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
//include(get_stylesheet_directory() . '/adv/adv_masthead.php');
include(get_stylesheet_directory() . '/adv_adplay/adv_masthead.php');
echo '<div class="clear"></div>';
echo '<div class="spacer space-2"></div>';
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
                echo '<h1>Profumeria template custom</h1>';
                echo '<h1>get_query_var_cat: '.get_query_var('cat').'</h1>';
                echo '<h1>term_id: '.$term_id.'</h1>';
                
                echo '<pre>';
                    print_r(get_queried_object());
                echo '</pre>';

                

                /*
                //echo '<h1>Terms: '.$terms.'</h1>';
                $page_id = get_queried_object_id();
                echo 'page_id: '.$page_id.'<br>';
                $category = get_the_category( $page_id );
                $catid = ( ! empty( $category ) ) ? $category[0]->cat_ID : 0;

                if ( $catid ) {
                    // Get all parent IDs.
                    $parents = get_ancestors( $catid, 'category', 'taxonomy' );

                    $top_level_cat = ( count( $parents ) > 1 ) ?
                        $parents[ count( $parents ) - 2 ] : // use the second parent category ID, or
                        array_pop( $parents );              // otherwise, we'll use the first one

                    $terms = wp_list_categories( array(
                        'title_li'   => '',
                        'echo'       => false,
                        'taxonomy'   => 'category',
                        'show_count' => 1,
                        'child_of'   => $top_level_cat,
                        'style'      => 'list',
                        'hide_empty' => 0, // include empty categories
                        'depth'      => 3, // and up to 3 levels depth
                    ) );
                }
                
                echo '<pre>';
                $anchestors = get_ancestors( $term_id, 'category', 'taxonomy' );
                print_r($anchestors);
                echo '</pre>';
                */

                /*
                $terms = wp_list_categories( array(
                    'title_li'   => '',
                    'echo'       => false,
                    'taxonomy'   => 'category',
                    'show_count' => 1,
                    'child_of'   => $term_id,
                    'style'      => 'list',
                    'hide_empty' => 0, // include empty categories
                    'depth'      => 3, // and up to 3 levels depth
                ) );
                echo $terms;
                */

                echo 'get_queried_object_id(): '.get_queried_object_id().'<br>';
                $profumeria_child_terms = get_terms( array(
                    'taxonomy'   => 'category',
                    'hide_empty' => false,
                    'parent' => get_queried_object_id()
                ) );
                echo '<pre>';
                    print_r($profumeria_child_terms);
                echo '</pre>';
                
                $profumeria_child_terms_array = array();
                $profumeria_child_terms_array[] = get_query_var('cat');
                foreach( $profumeria_child_terms as $profumeria_child_term){
                    $profumeria_child_terms_array[] = $profumeria_child_term->term_id;
                }

                echo '<pre>';
                    print_r($profumeria_child_terms_array);
                echo '</pre>';



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