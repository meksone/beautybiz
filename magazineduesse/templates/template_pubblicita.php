<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


/* Template Name: Pubblicita */


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

    <div class="clear"></div>
	<div class="spacer space-1"></div>

    <section id="pubblicita_contatti" class="pubblicita_contatti">
        <div class="row">
            <div class="col-md-12">

                <div class="pubblicita_contatti_intro mb-1">
                    <p class="mb-0"><?php echo get_post_meta(get_the_id(), 'magazineduesse_pubblicita_contatti_intro_contenuto', true); ?></p>
                </div>

                <div class="pubblicita_contatti_wrap">
                    <?php 
                    $contatti_metas = get_post_meta( get_the_id(), 'cmb_magazineduesse_pubblicita_contatti_group_field', true );
                    foreach ( (array) $contatti_metas as $key => $contatti_meta ) {

                        $contatti_group_icona = $contatti_group_icona_id = $contatti_group_contenuto = '';

                        if ( isset( $contatti_meta['magazineduesse_pubblicita_contatti_group_icona'] ) && !empty( $contatti_meta['magazineduesse_pubblicita_contatti_group_icona'] ) ) {
                            $contatti_group_icona = $contatti_meta['magazineduesse_pubblicita_contatti_group_icona'];
                        }
                        if ( isset( $contatti_meta['magazineduesse_pubblicita_contatti_group_icona_id'] ) && !empty( $contatti_meta['magazineduesse_pubblicita_contatti_group_icona_id'] ) ) {
                            $contatti_group_icona_id = $contatti_meta['magazineduesse_pubblicita_contatti_group_icona_id'];
                        }

                        if ( isset( $contatti_meta['magazineduesse_pubblicita_contatti_group_contenuto'] ) && !empty( $contatti_meta['magazineduesse_pubblicita_contatti_group_contenuto'] ) ) {
                            $contatti_group_contenuto = $contatti_meta['magazineduesse_pubblicita_contatti_group_contenuto'];
                        }

                        $contatti_group_icona_tag_alt = get_post_meta( $contatti_group_icona_id, '_wp_attachment_image_alt', true);

                        echo '<div class="contatti_item mb-3">';
                            echo '<div class="item_icona">';
                                echo '<figure class="mb-0">';
                                    echo '<img src="'.$contatti_group_icona.'" alt="'.$contatti_group_icona_tag_alt.'" />';
                                echo '</figure>';
                            echo '</div>';
                            echo '<div class="item_content">';
                                echo '<p class="mb-0">';
                                    $contatti_group_contenuto_render = trim($contatti_group_contenuto);
                                    $contatti_group_contenuto_render = nl2br($contatti_group_contenuto_render);
                                    echo $contatti_group_contenuto_render;
                                echo '</p>';
                            echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>

            </div>
        </div>
    </section>

    <div class="clear"></div>
	<div class="spacer space-2"></div>

    <section id="pubblicita_download" class="pubblicita_download section_nopadding">
        <div class="pubblicita_block_title">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title-flex">
                        <h2 id="page_title__heading" class="section-title__heading playfair-semibold">
                            Download
                        </h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="clear"></div>
        <div class="spacer space-2"></div>

        <div class="pubblicita_block_loop">
            <div class="row">
                <div class="col-md-12">
                    <div class="pubblicita_download_wrap">
                        <?php 
                        $pubblicita_download_metas = get_post_meta( get_the_id(), 'cmb_magazineduesse_pubblicita_download_group_field', true );
        
                        foreach ( (array) $pubblicita_download_metas as $key => $pubblicita_download_meta ) {
                                
                            $pubblicita_download_group_enable = $pubblicita_download_group_title = $pubblicita_download_group_pdf = '';
                    
                            if ( isset( $pubblicita_download_meta['magazineduesse_pubblicita_download_group_enable'] ) && !empty( $pubblicita_download_meta['magazineduesse_pubblicita_download_group_enable'] ) ) {
                                $pubblicita_download_group_enable = $pubblicita_download_meta['magazineduesse_pubblicita_download_group_enable'];
                            }
                            if ( isset( $pubblicita_download_meta['magazineduesse_pubblicita_download_group_title'] ) && !empty( $pubblicita_download_meta['magazineduesse_pubblicita_download_group_title'] ) ) {
                                $pubblicita_download_group_title = $pubblicita_download_meta['magazineduesse_pubblicita_download_group_title'];
                            }
                            if ( isset( $pubblicita_download_meta['magazineduesse_pubblicita_download_group_pdf'] ) && !empty( $pubblicita_download_meta['magazineduesse_pubblicita_download_group_pdf'] ) ) {
                                $pubblicita_download_group_pdf = $pubblicita_download_meta['magazineduesse_pubblicita_download_group_pdf'];
                            }

                            if( $pubblicita_download_group_enable == 'abilita' ){
                                echo '<div class="pubblicita_download_item">';
                                    echo '<div class="pubblicita_download_group_item pubblicita_download_group_title">';
                                        echo '<p class="mb-0">'.$pubblicita_download_group_title.'</p>';
                                    echo '</div>';
                                    echo '<div class="pubblicita_download_group_item pubblicita_download_group_pdf">';
                                        echo '<p class="mb-0">';
                                            echo '<a href="'.$pubblicita_download_group_pdf.'" title="Download '.$pubblicita_download_group_title.'" target="_blank">';
                                                echo 'Download';
                                            echo '</a>';
                                        echo '</p>';
                                    echo '</div>';
                                echo '</div>';
                            }

                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

	<?php 
	endwhile;
 

get_footer();
?>