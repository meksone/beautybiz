<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
?>

<div id="frontpage_latest" class="frontpage_latest frontpage_loop">
	<div class="row">
		
		<div class="col-md-12 col_title_section">
			<div class="section-title">
				<div class="section-title-flex">
					<h2 class="section-title__heading playfair-semibold">News</h2>
					<div class="hr hr-section-title"></div>
					<div class="cta cta_all cta_all_prossime_uscite">
						<a href="/notizie/" title="Leggi tutti gli ultimi articoli">
							Leggi tutti gli ultimi articoli
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="clear"></div>
		<div class="spacer space-1"></div>

        <?php 
		$suppress_filters = get_option('suppress_filters');
		$latest_args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
						
			'posts_per_page' => 10,
			'orderby' => 'date',
			'order' => 'DESC',
			'suppress_filters' => $suppress_filters,
						
			'no_found_rows' => true,
			'ignore_sticky_posts' => true,
						
			'post__not_in' => $do_not_duplicate,

			'tax_query' => array(
				array(
					'taxonomy' => 'category',
					/*
					'field'    => 'term_id',
					'terms'    => array( 121,118 ),
					*/
					'field'    => 'slug',
					'terms'    => array( 'beauty-business','b-bellezza-e-benessere-in-farmacia','rivista','editoriale','editoriale-beauty-business','editoriale-bellezza-e-benessere-in-farmacia','speciali','speciali-beauty-business','speciali-bellezza-e-benessere-in-farmacia' ),
					'operator' => 'NOT IN',
				),
			),
						
		);
						
		$latest_query = new WP_Query($latest_args);
																
		if ($latest_query->have_posts()) :	
			while ($latest_query->have_posts()) : $latest_query->the_post();
								
				$latest_id = $latest_query->post->ID;
				$do_not_duplicate[] = $latest_id;
								
				$latest_title = get_the_title($latest_id);
				$latest_content = $latest_query->post->post_content;
								
				$home_post_id = $latest_id;
				$home_post_title = $latest_title;
				$home_post_content = $latest_content;
                ?>
                <div class="col-md-6 col_item post_item">
                    <article <?php post_class(); ?>>
                        <div class="post_thumb" data-file-thumb-src="_home_thumb_news">
                            <?php 
							include(get_stylesheet_directory() . '/templates/home/home_thumb/_home_thumb.php');
							?>
                        </div>
                        <div class="post_desc">
							<div class="post_title">
								<h3 class="post_title__heading">
									<a href="<?php echo get_permalink($home_post_id); ?>" title="<?php echo $home_post_title; ?>">
										<?php echo $home_post_title; ?>
									</a>
								</h3>
							</div>

							<?php 
							$magazineduesse_riassunto_post_breve_contenuto = get_post_meta($latest_id, 'magazineduesse_riassunto_post_breve_contenuto', true);
							if( !empty($magazineduesse_riassunto_post_breve_contenuto) ){
								echo '<div class="post_excerpt">';
									echo '<p class="mb-05">'.$magazineduesse_riassunto_post_breve_contenuto.'</p>';
								echo '</div>';
							}
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

		<div class="col-md-12 col_title_section">
			<div id="section-all-permalink" class="section-all-permalink hiden-min-768">
				<div class="cta cta_all cta_all_speciali">
					<a href="/notizie/" title="Leggi tutti gli ultimi articoli">
						Leggi tutti gli ultimi articoli
					</a>
				</div>
			</div>
		</div>

    </div>
</div>