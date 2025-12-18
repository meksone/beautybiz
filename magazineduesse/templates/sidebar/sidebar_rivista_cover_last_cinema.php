<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
?>


<div id="rivista_cover_last" class="rivista_cover">
	<?php 
	$rivista_category_cinema_object = get_category_by_slug('b-bellezza-e-benessere-in-farmacia'); 
	$rivista_category_cinema_id = $rivista_category_cinema_object->term_id;
	$rivista_category_cinema_name = $rivista_category_cinema_object->name;
	$rivista_category_cinema_link = get_category_link( $rivista_category_cinema_id );

	$rivista_last_cinema_args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
															
		'orderby' => 'date',
		'order' => 'DESC',
																	
		'posts_per_page' => 1,

        'no_found_rows' => true,
	    'ignore_sticky_posts' => true,
																	
		'tax_query' => array(
			array(
				'taxonomy' => 'category',
				'field' => 'slug',
				'terms' => array('b-bellezza-e-benessere-in-farmacia')
			)
		)
	);
	$rivista_last_cinema_query = new WP_Query($rivista_last_cinema_args);								
	if ($rivista_last_cinema_query->have_posts()) :
		while ($rivista_last_cinema_query->have_posts()) : $rivista_last_cinema_query->the_post();
			$rivista_last_cinema_id = $rivista_last_cinema_query->post->ID;
            $rivista_last_cinema_title = $rivista_last_cinema_query->post->post_title;
			$rivista_last_cinema_permalink = get_permalink($rivista_last_cinema_id);

			$rivista_last_cinema_attachment_id = get_post_thumbnail_id($rivista_last_cinema_id);
			
			/**
			 * <a href="<?php echo $rivista_last_cinema_permalink; ?>" title="<?php echo $rivista_last_cinema_title; ?>">
			 */
			?>
			<div class="rivista_thumb">
				<a href="<?php echo $rivista_category_cinema_link; ?>" title="<?php echo $rivista_category_cinema_name; ?>">
					<figure class="rivista_image">
						<?php 
						echo wp_get_attachment_image( $rivista_last_cinema_attachment_id, 'full', false, array( 'class' => 'img-fluid', 'loading' => 'lazy' ) );7
						?>
					</figure>
				</a>
			</div>
			<?php 
		endwhile;
	endif;
	wp_reset_query();
	?>
</div>