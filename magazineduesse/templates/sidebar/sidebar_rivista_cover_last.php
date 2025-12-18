<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
?>


<div id="rivista_cover_last" class="rivista_cover">
	<?php 
	$rivista_category_object = get_category_by_slug('beauty-business'); 
	$rivista_category_id = $rivista_category_object->term_id;
	$rivista_category_name = $rivista_category_object->name;
	$rivista_category_link = get_category_link( $rivista_category_id );

	$rivista_last_args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
															
		'orderby' => 'date',
		'order' => 'DESC',
																	
		'posts_per_page' => 1,

        'no_found_rows' => true, /* PERFORMANCE - USARE QUANDO NON OCCORRE PAGINAZIONE */
	    'ignore_sticky_posts' => true,
																	
		'tax_query' => array(
			array(
				'taxonomy' => 'category',
				//'field' => 'term_id',
				//'terms' => $term_id,
				//'terms' => 121,
				'field' => 'slug',
				'terms' => array('beauty-business')
			)
		)
	);
	$rivista_last_query = new WP_Query($rivista_last_args);								
	if ($rivista_last_query->have_posts()) :
		while ($rivista_last_query->have_posts()) : $rivista_last_query->the_post();
			$rivista_last_id = $rivista_last_query->post->ID;
            $rivista_last_title = $rivista_last_query->post->post_title;
			$rivista_last_permalink = get_permalink($rivista_last_id);
			
			/*
            $rivista_last_attachment_id = get_post_thumbnail_id($rivista_last_id);
			$rivista_last_attachment_url = wp_get_attachment_image_src( get_post_thumbnail_id($rivista_last_id), 'full' );
			$rivista_last_image = $rivista_last_attachment_url[0];

            $rivista_last_image_caption_title = get_the_title($rivista_last_attachment_id);
			$rivista_last_image_caption_alt = get_post_meta( $rivista_last_attachment_id, '_wp_attachment_image_alt', true);

            if( !empty($rivista_last_image_caption_title)){
                $rivista_last_image_tag_title = $rivista_last_image_caption_title;
            } else {
                $rivista_last_image_tag_title = $rivista_last_title;
            }

            if( !empty($rivista_last_image_caption_alt)){
                $rivista_last_image_tag_alt = $rivista_last_image_caption_alt;
            } else {
                $rivista_last_image_tag_alt = $rivista_last_title;
            }

			$rivista_last_image_getimagesize = getimagesize($rivista_last_image);

			<img class="img-fluid" src="<?php echo $rivista_last_image; ?>" width="<?php echo $rivista_last_image_getimagesize[0]; ?>" height="<?php echo $rivista_last_image_getimagesize[1]; ?>" alt="<?php echo $rivista_last_image_tag_alt; ?>" />
			*/

			$rivista_last_attachment_id = get_post_thumbnail_id($rivista_last_id);
							

			
			?>
			<div class="rivista_thumb">
				<a href="<?php echo $rivista_category_link; ?>" title="<?php echo $rivista_category_name; ?>">
					<figure class="rivista_image">
						<?php 
						echo wp_get_attachment_image( $rivista_last_attachment_id, 'full', false, array( 'class' => 'img-fluid', 'loading' => 'lazy' ) );7
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