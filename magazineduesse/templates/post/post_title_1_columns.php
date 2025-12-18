<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
?>


                <div class="row row_inner row-flex align-items-end" data-columns="1-columns">
					<div class="col-md-12 col_title__inner">
						<div class="single_post_title">
							<h1 class="single_post_title__heading mb-1"><?php the_title(); ?></h1>
						</div>
						
						<?php 
						/*
						if( has_excerpt() ){
							?>
							<div class="post_excerpt mb-1">
								<p class="mb-0">
									<?php echo get_the_excerpt(); ?>
								</p>
							</div>
							<?php 
						}
						*/

						
					
						/*
						$magazineduesse_riassunto_post_lungo_contenuto = get_post_meta(get_the_id(), 'magazineduesse_riassunto_post_lungo_contenuto', true);
						$jnews_cmb_post_subtitle = get_post_meta(get_the_id(), 'post_subtitle', true);
						$jnews_single_post = get_post_meta(get_the_id(), 'jnews_single_post', true);
						$jnews_single_post_subtitle = $jnews_single_post['subtitle'];

						if( !empty($magazineduesse_riassunto_post_lungo_contenuto)){
							$post_excerpt_output = $magazineduesse_riassunto_post_lungo_contenuto;
						} 
						else if( !empty($jnews_cmb_post_subtitle)){
							$post_excerpt_output = $jnews_cmb_post_subtitle;
						}
						else if( !empty($jnews_single_post_subtitle)){
							$post_excerpt_output = $jnews_single_post_subtitle;
						}
						
						if( !empty($magazineduesse_riassunto_post_lungo_contenuto) || !empty($jnews_cmb_post_subtitle) || !empty($jnews_single_post_subtitle)){
							echo '<div class="post_excerpt mb-1">';
								echo $post_excerpt_output;
							echo '</div>';
						}
						*/

						$excerpt_default = get_the_excerpt();
						$magazineduesse_riassunto_post_lungo_contenuto = get_post_meta(get_the_id(), 'magazineduesse_riassunto_post_lungo_contenuto', true);

						if( !empty($magazineduesse_riassunto_post_lungo_contenuto)){
							$post_excerpt_output = $magazineduesse_riassunto_post_lungo_contenuto;
						} else if( has_excerpt( get_the_id() )){
							$post_excerpt_output = $excerpt_default;
						}

						if( !empty($magazineduesse_riassunto_post_lungo_contenuto) || has_excerpt( get_the_id()) ){
							echo '<div class="post_excerpt mb-1">';
								echo $post_excerpt_output;
							echo '</div>';
						}

						
						if( !has_term('articolo-speciali', 'evidenza_post') ){
							?>
							<div class="post_meta">
								<div class="post_meta__inner">
									<div class="post_meta_author">
										<?php echo esc_html(get_the_author_meta('display_name')); ?>
									</div>
									<div class="post_meta_separator">-</div>
									<div class="post_meta_date">
										<time datetime="<?php echo esc_html(get_the_time('Y-m-d\TH:i:s', get_the_id())); ?>"><?php echo esc_html(get_the_date()); ?></time>
									</div>
								</div>	
							</div>

                        	<div class="clear"></div>
                        	<div class="spacer space-1"></div>
                        	<?php
						}
						
						
						include(get_stylesheet_directory() . '/templates/post/post_sharing.php');
						?>
					</div>

					
					

				</div>