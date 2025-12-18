<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


get_header();

 
while ( have_posts() ) : the_post();
	?>
	<section id="breadcrumbs">
    	<?php echo _pincuter_breadcrumbs(); ?>
	</section>

	<section id="page-title">
        <div class="section-title">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title-flex">
                        <h1 id="page_title__heading" class="section-title__heading playfair-semibold">
                            <?php echo get_the_title(); ?>
                        </h1>
                        <div class="hr hr-section-title"></div>
                    </div>
                </div>
            </div>
        </div>
	</section>

	<div class="clear"></div>
	<div class="spacer space-2"></div>

	<?php 
    if( has_post_thumbnail()){
        /*
        $page_featured_attachment = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ), 'full' );
        $page_featured_image_url = $page_featured_attachment[0];
        $page_featured_image_id = get_post_thumbnail_id( get_the_id() );
        $page_featured_image_alt = get_post_meta( $page_featured_image_id, '_wp_attachment_image_alt', true);

        echo '<div class="page-thumb">';
            echo '<figure class="mb-0">';
                echo '<img src="'.$page_featured_image_url.'" alt="'.$page_featured_image_alt.'" />';
            echo '</figure>';
        echo '</div>';
        */

        $page_featured_image_id = get_post_thumbnail_id( get_the_id() );
        echo '<div class="page-thumb">';
            echo '<figure class="mb-0">';
                echo wp_get_attachment_image( $page_featured_image_id, 'full', false, array( 'class' => 'img-fluid', 'fetchpriority' => 'high' ) );
            echo '</figure>';
        echo '</div>';

        echo '<div class="clear"></div>';
	    echo '<div class="spacer space-1"></div>';
    }
    ?>

	<section id="page-content">
        <div class="row">
            <div class="col-md-12">
				<?php the_content(); ?>
			</div>
		</div>
	</section>
	<?php 
	endwhile;
 

get_footer();
?>