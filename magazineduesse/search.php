<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

get_header();

$blog = get_option( 'page_for_posts' );
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
echo '<div class="spacer space-2"></div>';7
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
                        <?php echo 'Hai cercato: '.get_search_query(); ?>
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
                /*
                $suppress_filters = get_option('suppress_filters');
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                $latest_args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                                
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'paged' => $paged,
                                
                    'posts_per_page' => 10,
                                       
                );
                $wp_query = new WP_Query($latest_args);
                */
                global $query_string;
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				$query_args = explode("&", $query_string);
				$search_query = array(
					'post_type' => 'post',
					'post_status' => 'publish',
							
					'orderby' => 'date',
					'order' => 'DESC',
					'paged' => $paged,
							
					'posts_per_page' => 10,
                    'search_columns' => array( 'post_content', 'post_name', 'post_title' ),
				);
				if( strlen($query_string) > 0 ) {
					foreach($query_args as $key => $string) {
						$query_split = explode("=", $string);
						$search_query[$query_split[0]] = urldecode($query_split[1]);
					} // foreach
				} //if
                            
                $wp_query = new WP_Query($search_query);
                                                                    
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

                        <div class="post_item mb-3">
                            <article <?php post_class(); ?>>
                                <div class="row">
                                    <div class="col-md-5 col_image">
                                        <div class="post_thumb" data-file-thumb-src="_category_thumb_news">
                                            <?php 
                                            include(get_stylesheet_directory() . '/templates/category/category_thumb/_category_thumb.php');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col_text">
                                        <div class="post_desc">
                                            <div class="post_title">
                                                <h3 class="post_title__heading">
                                                    <a href="<?php echo get_permalink($category_post_id); ?>" title="<?php echo $category_post_title; ?>">
                                                        <?php echo $category_post_title; ?>
                                                    </a>
                                                </h3>
                                            </div>
                                            <div class="post_meta mb-1">
                                                <div class="post_meta__inner">
                                                    <?php 
                                                    /*
                                                    <div class="post_meta_author">
                                                        <?php echo esc_html(get_the_author_meta('display_name')); ?>
                                                    </div>
                                                    <div class="post_meta_separator">|</div>
                                                    */
                                                    ?>
                                                    <div class="post_meta_date">
                                                        <time datetime="<?php echo esc_html(get_the_time('Y-m-d\TH:i:s', $category_post_id)); ?>"><?php echo esc_html(get_the_date()); ?></time>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post_excerpt">
                                                <p>
                                                    <?php 
                                                    /*
                                                    if (has_excerpt()) {
                                                        echo get_the_excerpt();
                                                    } else {
                                                        $echocontent = preg_replace( '/\[[^\]]+\]/', '', $latest_content );
                                                        $echocontent = apply_filters( '_pincuter_standard_post_content_list', wp_trim_words( $echocontent, 11 ) );
                                                        echo esc_html(strip_shortcodes($echocontent));
                                                    }
                                                    */

                                                    /*
                                                    $magazineduesse_riassunto_post_breve_contenuto = get_post_meta($latest_id, 'magazineduesse_riassunto_post_breve_contenuto', true);
                                                    if( !empty($magazineduesse_riassunto_post_breve_contenuto) ){
                                                        echo $magazineduesse_riassunto_post_breve_contenuto;
                                                    }
                                                    */
                                                    $jnews_cmb_post_subtitle = get_post_meta($latest_id, 'post_subtitle', true);
                                                    $magazineduesse_riassunto_post_breve_contenuto = get_post_meta($latest_id, 'magazineduesse_riassunto_post_breve_contenuto', true);
                                                    if( !empty($magazineduesse_riassunto_post_breve_contenuto) ){
                                                        $post_excerpt_output = $magazineduesse_riassunto_post_breve_contenuto;
                                                    } else if( !empty($jnews_cmb_post_subtitle)){
                                                        $post_excerpt_output = wp_trim_words( $jnews_cmb_post_subtitle, 20 );
                                                    }
                                                    if( !empty($magazineduesse_riassunto_post_lungo_contenuto) || !empty($jnews_cmb_post_subtitle)){
                                                        echo $post_excerpt_output;
                                                    }
							
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
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

            <div class="col-md-4 col_sidebar">
                <?php include(get_stylesheet_directory() . '/templates/sidebar/sidebar.php'); ?>
            </div>

        </div>
    </div>

</section>


<?php get_footer(); ?>