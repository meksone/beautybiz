<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


$queried_object = get_queried_object();
$term_id = $queried_object->term_id;
$term_description = get_term_field( 'description', $queried_object );
get_header();
?>


<section id="breadcrumbs">
    <?php echo _pincuter_breadcrumbs(); ?>
</section>


<?php 
/* EVOLUTION ADS - MASTHEAD */
include(get_stylesheet_directory() . '/adv/adv_masthead.php');
echo '<div class="clear"></div>';
echo '<div class="spacer space-2"></div>';
/* end. EVOLUTION ADS - MASTHEAD */
?>


<section id="content_main">
	
    <div id="category_title" class="section-title">
		<div class="row">
			<div class="col-md-12">
                <!--
                <div class="section-title">
				    <h1 id="category_title__heading" class="section-title__heading">
                        <?php echo single_cat_title('', false); ?>
                    </h1>
                </div>
                -->
                <div class="section-title-flex">
					<h1 id="category_title__heading" class="section-title__heading playfair-semibold">
                        <?php echo single_cat_title('', false); ?>
                    </h1>
					<div class="hr hr-section-title"></div>
                    <!--
					<div class="cta cta_all cta_all_prossime_uscite">
						<a href="/blog/" title="Leggi tutti gli ultimi articoli">
							Leggi tutti gli ultimi articoli
						</a>
					</div>
                    -->
				</div>
            </div>
        </div>
    </div>

    <div class="clear"></div>
	<div class="spacer space-2"></div>

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

    <div class="clear"></div>
	<div class="spacer space-1"></div>

    <div id="category_rivista_tabs" class="category_tabs">
        <div class="row">
            <?php 
            /*
            <div class="col-md-4 col_image col_cover">
                <?php 
                include(get_stylesheet_directory() . '/templates/category/category_rivista_cover_last.php');
                ?>
            </div>
            <div class="col-md-8 col_tabs">
                <?php 
                include(get_stylesheet_directory() . '/templates/category/category_rivista_tabs.php');
                ?>
            </div>
            */
            ?>

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
	/*$magazineduesse_rivista_mediakit_pdf = get_term_meta($term_id, 'magazineduesse_rivista_mediakit_pdf', true);*/
    $magazineduesse_rivista_mediakit_pdf = _pincuter_theme_option('theme_options_rivista_mediakit_pdf');
	if( !empty($magazineduesse_rivista_mediakit_pdf) ){
		?>
        <div id="category_rivista_mediakit" class="category_mediakit">
		    <div class="row">
				<div class="col-md-12">
                    <div class="section-title">
                        <h2 class="section-title__heading">Mediakit</h2>
                    </div>
					<div class="mediakit-pdf mediakit_pdf_ita">
						<?php 
						echo do_shortcode('[dflip source="'.$magazineduesse_rivista_mediakit_pdf.'" ][/dflip]');
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

    <div id="category_archivio_riviste" class="category_archivio">
        <?php 
        include(get_stylesheet_directory() . '/templates/category/category_riviste_archivio.php');
        ?>
    </div>

</section>




<?php get_footer(); ?>