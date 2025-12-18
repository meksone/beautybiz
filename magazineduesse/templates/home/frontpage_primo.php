<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
?>


<section id="frontpage_primo_piano" class="frontpage_primo_piano frontpage_loop">
    <div class="row">
        <?php 
        $primo_args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
								
			'orderby' => 'date',
			'order' => 'DESC',
										
			'posts_per_page' => 4,
									
			'no_found_rows' => true,
			'ignore_sticky_posts' => true,
														
			'tax_query' => array(
				array(
					'taxonomy' => 'evidenza_post',
					'field' => 'slug',
					'terms' => 'home-primo'
				),
			),
			'post__not_in'=>$do_not_duplicate,
									
		);
		$primo_query = new WP_Query($primo_args);
		if ($primo_query->have_posts()) :	
			while ($primo_query->have_posts()) : $primo_query->the_post();
				$primo_id = $primo_query->post->ID;
				$do_not_duplicate[] = $primo_id;

                $primo_title = get_the_title($primo_id);
				$primo_content = $primo_query->post->post_content;

                $home_post_id = $primo_id;
				$home_post_title = $primo_title;
				$home_post_content = $primo_content;
                ?>
                <div class="col-md-3 col_item post_item">
                    <article <?php post_class(); ?>>
                        <div class="post_thumb" data-file-thumb-src="_home_thumb_primo">
                            <?php 
							include(get_stylesheet_directory() . '/templates/home/home_thumb/_home_thumb.php');
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
							$magazineduesse_riassunto_post_breve_contenuto = get_post_meta($primo_id, 'magazineduesse_riassunto_post_breve_contenuto', true);
							if( !empty($magazineduesse_riassunto_post_breve_contenuto) ){
								echo '<div class="post_excerpt text-center">';
									echo '<p class="mb-05">'.$magazineduesse_riassunto_post_breve_contenuto.'</p>';
								echo '</div>';
							}
							*/
							?>

							<div class="post_meta">
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
										<time datetime="<?php echo esc_html(get_the_time('Y-m-d\TH:i:s', $home_post_id)); ?>"><?php echo esc_html(get_the_date()); ?></time>
									</div>
								</div>
							</div>
						</div>
                    </article>
                </div>
                <?php 
            endwhile;
        endif;
        wp_reset_query();
        ?>
    </div>
</section>