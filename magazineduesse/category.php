<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


$queried_object = get_queried_object();
$term_id = $queried_object->term_id;
$term_slug = $queried_object->slug;
$term_description = get_term_field( 'description', $queried_object );
get_header();
?>


<section id="breadcrumbs">
    <?php echo _pincuter_breadcrumbs(); ?>
</section>


<?php 
/* EVOLUTION ADS - MASTHEAD */
/*
//include(get_stylesheet_directory() . '/adv/adv_masthead.php');
include(get_stylesheet_directory() . '/adv_adplay/adv_masthead.php');
echo '<div class="clear"></div>';
echo '<div class="spacer space-2"></div>';
*/
/* end. EVOLUTION ADS - MASTHEAD */
?>


<section id="content_main">
	
	<div id="category_title" class="section-title">
		<div class="row">
			<div class="col-md-12">
                <!--
                <div class="section-title">
				    <h1 id="category_title__heading" class="section-title__heading playfair-semibold">
                        <?php //echo single_cat_title('', false); ?>
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
	<div class="spacer space-1"></div>

    <?php 
    $magazineduesse_category_template = get_term_meta($term_id, 'magazineduesse_category_template', true);
    if( $magazineduesse_category_template == 'standard' || $magazineduesse_category_template == null || $magazineduesse_category_template == ''){
        include(get_stylesheet_directory() . '/templates/category/category_template_standard.php');
    } else {
        include(get_stylesheet_directory() . '/templates/category/category_template_'.$magazineduesse_category_template.'.php');
    }
    ?>


</section>


<?php get_footer(); ?>