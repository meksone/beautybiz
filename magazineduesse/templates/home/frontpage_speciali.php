<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
?>


<section id="frontpage_speciali" class="frontpage_speciali frontpage_loop">
    <div class="row">
        <div class="col-md-12">

            <div class="section-title">
				<div class="section-title-flex">
					<h2 class="section-title__heading playfair-semibold">Speciali</h2>
					<div class="hr hr-section-title"></div>
					<div class="cta cta_all cta_all_speciali">
						<a href="/speciali/" title="Scopri tutti gli Speciali">
                            Scopri tutti gli Speciali
						</a>
					</div>
				</div>
			</div>
			
			<div class="clear"></div>
			<div class="spacer space-1"></div>

            <div class="frontpage_speciali_slick">
                <?php 
                $speciali_args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                                        
                    'orderby' => 'date',
                    'order' => 'DESC',
                                                
                    'posts_per_page' => 6,
                                            
                    'no_found_rows' => true,
                    'ignore_sticky_posts' => true,
                                                                
                    'tax_query' => array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'category',
                            'field' => 'slug',
                            'terms' => 'speciali'
                        ),
                        array(
                            'taxonomy' => 'evidenza_post',
                            'field' => 'slug',
                            'terms' => 'home-speciali'
                        ),
                    ),
                    'post__not_in'=>$do_not_duplicate,
                                            
                );
                $speciali_query = new WP_Query($speciali_args);
                if ($speciali_query->have_posts()) :	
                    while ($speciali_query->have_posts()) : $speciali_query->the_post();
                        $speciali_id = $speciali_query->post->ID;
                        $do_not_duplicate[] = $speciali_id;

                        $speciali_title = get_the_title($speciali_id);
                        $speciali_content = $speciali_query->post->post_content;

                        $home_post_id = $speciali_id;
                        $home_post_title = $speciali_title;
                        $home_post_content = $speciali_content;
                        ?>
                        <div class="col_item post_item">
                            <article <?php post_class(); ?>>
                                <div class="post_thumb" data-file-thumb-src="_home_thumb_speciali">
                                    <?php 
                                    include(get_stylesheet_directory() . '/templates/home/home_thumb/_home_thumb_speciali.php');
                                    ?>
                                </div>
                                <div class="post_desc">
                                    <div class="post_categories">
                                        <?php 
                                        $post_term_get = get_the_terms( $home_post_id, 'category')[0];
                                        $post_term_link = esc_url(get_term_link($post_term_get->slug, 'category'));
                                        $post_term_name = esc_html($post_term_get->name);
                                        ?>
                                        <p>
                                            <a a href="<?php echo $post_term_link; ?>" title="<?php echo $post_term_name; ?>">
                                                <?php echo $post_term_name; ?>
                                            </a>
                                        </p>
                                    </div>
                                    <div class="post_title">
                                        <h2 class="post_title__heading">
                                            <a href="<?php echo get_permalink($home_post_id); ?>" title="<?php echo $home_post_title; ?>">
                                                <?php echo $home_post_title; ?>
                                            </a>
                                        </h2>
                                    </div>
                                    <?php 
                                    /*
                                    <div class="post_meta">
                                        <div class="post_meta__inner">
                                            <div class="post_meta_date">
                                                <time datetime="<?php echo esc_html(get_the_time('Y-m-d\TH:i:s', $home_post_id)); ?>"><?php echo esc_html(get_the_date()); ?></time>
                                            </div>
                                        </div>
                                    </div>
                                    */
                                    ?>
                                </div>
                            </article>
                        </div>
                        <?php 
                    endwhile;
                endif;
                wp_reset_query();
                ?>
            </div>

            <div id="section-all-permalink" class="section-all-permalink hiden-min-768">
				<div class="cta cta_all cta_all_speciali">
					<a href="/speciali/" title="Scopri tutti gli Speciali">
                    Scopri tutti gli Speciali
					</a>
				</div>
			</div>

        </div>
    </div>
</section>