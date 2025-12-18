<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
?>

    <div id="category_rivista_infos" class="category_infos">
        <div class="row">
            <div class="col-md-12">
                <?php 
                /*include(get_stylesheet_directory() . '/templates/category/category_rivista_infos.php');*/
                include(get_stylesheet_directory() . '/templates/partial_infos.php');
                ?>
            </div>
        </div>
    </div>

    <!--
    <div class="clear"></div>
	<div class="spacer space-1"></div>
    -->


    <?php 
    $magazineduesse_category_intro = get_term_meta($term_id, 'magazineduesse_category_intro', true);
    if( !empty($magazineduesse_category_intro)){
        echo '<div id="category_rivista_intro" class="category_intro">';
            echo '<div class="row">';
                echo '<div class="col-md-12">';
                    echo apply_filters('pincuter_meta_content',$magazineduesse_category_intro);
                echo '</div>';
            echo '</div>';
        echo '</div>';

        echo '<div class="clear"></div>';
	    echo '<div class="spacer space-1"></div>';
    }
    ?>


    <div id="category_rivista_tabs" class="category_tabs">
        <div class="row">
            <div class="col-md-12">
                <?php 
                include(get_stylesheet_directory() . '/templates/category/category_rivista_cover_last.php');
                ?>
            </div>
        </div>
    </div>

    <div class="clear"></div>
	<div class="spacer space-2"></div>

    <?php 
	$magazineduesse_rivista_mediakit_pdf = get_term_meta($term_id, 'magazineduesse_rivista_mediakit_pdf', true);
    /*$magazineduesse_rivista_mediakit_pdf = _pincuter_theme_option('theme_options_rivista_mediakit_pdf');*/
	if( !empty($magazineduesse_rivista_mediakit_pdf) ){
		?>
        <div id="category_rivista_mediakit" class="category_mediakit">
		    <div class="row">
				<div class="col-md-12">
                    <div class="section-title">
                        <h2 class="section-title__heading">Mediakit</h2>
                    </div>
					<div class="mediakit-pdf mediakit_pdf_ita mb-1">
						<?php 
						echo do_shortcode('[dflip source="'.$magazineduesse_rivista_mediakit_pdf.'" ][/dflip]');
						?>
                    </div>
                    <div class="mediakit-pdf-permalink">
                        <?php
                        echo '<a href="'.$magazineduesse_rivista_mediakit_pdf.'" target="_blank" title="Scarica il Mediakit" download="Mediakit">';
						    echo 'Scarica il Mediakit';
					    echo '</a>';
                        ?>
					</div>
				</div>
			</div>
        </div>
					
		<div class="clear"></div>
		<div class="spacer space-2"></div>
		<?php 
	} 
    ?>


    <?php 
    include(get_stylesheet_directory() . '/templates/category/category_riviste_apps.php');
    ?>



    <div id="category_archivio_riviste" class="category_archivio">
        <?php 
        include(get_stylesheet_directory() . '/templates/category/category_riviste_archivio.php');
        ?>
    </div>