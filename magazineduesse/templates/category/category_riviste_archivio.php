<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
?>


<div id="riviste_latest" class="riviste_latest riviste_loop">
    <div class="row">
		
		<div class="col-md-12 col_title_section">
			<div class="section-title">
				<div class="section-title-flex">
					<h2 class="section-title__heading">Archivio</h2>
				</div>
			</div>
		</div>

		<div class="clear"></div>
		<div class="spacer space-1"></div>

        <?php 
		$riviste_archivio_args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
														
			'orderby' => 'date',
			'order' => 'DESC',
																
			'posts_per_page' => -1,

            'no_found_rows' => true, /* PERFORMANCE - USARE QUANDO NON OCCORRE PAGINAZIONE */
            'ignore_sticky_posts' => true,
                                                                        
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => $term_id,
                )
            )

		);
		$riviste_archivio_query = new WP_Query($riviste_archivio_args);								
		if ($riviste_archivio_query->have_posts()) :
			while ($riviste_archivio_query->have_posts()) : $riviste_archivio_query->the_post();
				$rivista_archivio_id = $riviste_archivio_query->post->ID;
				$rivista_archivio_title = get_the_title($rivista_archivio_id);
				$rivista_archivio_permalink = get_permalink($rivista_archivio_id);

                $rivista_archivio_attachment_id = get_post_thumbnail_id($rivista_archivio_id);

                /*
                $rivista_archivio_attachment_url = wp_get_attachment_image_src( get_post_thumbnail_id($rivista_archivio_id), 'full' );
                $rivista_archivio_image = $rivista_archivio_attachment_url[0];

                $rivista_archivio_image_caption_title = get_the_title($rivista_archivio_attachment_id);
                $rivista_archivio_image_caption_alt = get_post_meta( $rivista_archivio_attachment_id, '_wp_attachment_image_alt', true);

                if( !empty($rivista_archivio_image_caption_title)){
                    $rivista_archivio_image_tag_title = $rivista_archivio_image_caption_title;
                } else {
                    $rivista_archivio_image_tag_title = $rivista_archivio_title;
                }

                if( !empty($rivista_archivio_image_caption_alt)){
                    $rivista_archivio_image_tag_alt = $rivista_archivio_image_caption_alt;
                } else {
                    $rivista_archivio_image_tag_alt = $rivista_archivio_title;
                }
                                

                $rivista_archivio_image_getimagesize = getimagesize($rivista_archivio_image);
                */
                ?>
                <div class="col-md-3 rivista_item">
									
                    <div class="rivista_thumb">
                        <a href="<?php echo $rivista_archivio_permalink; ?>" title="<?php echo $rivista_archivio_title; ?>">
                            <figure class="rivista_image">
                                <?php 
                                /*
                                <img class="img-fluid" src="<?php echo $rivista_archivio_image; ?>" width="<?php echo $rivista_archivio_image_getimagesize[0]; ?>" height="<?php echo $rivista_archivio_image_getimagesize[1]; ?>" alt="<?php echo $rivista_archivio_image_tag_alt; ?>" />
                                */
                                echo wp_get_attachment_image( $rivista_archivio_attachment_id, 'pnctr_image_thumb_vertical', false, array( 'class' => 'img-fluid', 'loading' => 'lazy' ) );
                                ?>
                            </figure>
                        </a>
                    </div>
                    <div class="rivista_title post_title">
                        <h4 class="rivista_title__heading post_title__heading">
                            <a href="<?php echo $rivista_archivio_permalink; ?>" title="<?php echo $rivista_archivio_title; ?>">
                                <?php echo $rivista_archivio_title; ?>
                            </a>
                        </h4>
                    </div>

                </div>
                <?php 
            endwhile;
        endif;
        wp_reset_query();
        ?>

    </div>
</div>