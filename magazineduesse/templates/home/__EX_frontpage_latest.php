<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
?>

<div id="frontpage_latest" class="frontpage_latest frontpage_loop">
	<div class="row">
        <?php 
		$suppress_filters = get_option('suppress_filters');
		$latest_args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
						
			'posts_per_page' => 8,
			'orderby' => 'date',
			'order' => 'DESC',
			'suppress_filters' => $suppress_filters,
						
			'no_found_rows' => true,
			'ignore_sticky_posts' => true,
						
			'post__not_in' => $do_not_duplicate,
						
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
								<h3 class="post_title__heading <?php echo $class_home_title; ?>">
									<a href="<?php echo get_permalink($home_post_id); ?>" title="<?php echo $home_post_title; ?>">
										<?php echo $home_post_title; ?>
									</a>
								</h3>
							</div>
							<div class="post_meta">
								<div class="post_meta__inner">
									<div class="post_meta_author">
										<?php echo esc_html(get_the_author_meta('display_name')); ?>
									</div>
									<div class="post_meta_separator">|</div>
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
</div>