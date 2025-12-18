<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


/* Template Name: Contatti */


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

    <section id="contact_infos">
        <div class="row">
            <div class="col-md-12">
                <div class="contact_infos_wrap">
                    
                    <div class="contact_info_item contact_info_location d-flex flex-column align-items-center">
                        <?php 
                        /*<i class="bi bi-pin-map-fill"></i>*/
                        echo '<figure>';
                            echo '<img src="'.get_stylesheet_directory_uri().'/assets/images/icone/dovesiamo.jpg" alt="Dove siamo" />';
                        echo '</figure>';
                        ?>
                        <p class="contact_info_label text-center">
                            <strong>DOVE SIAMO</strong>
                            <br>
                            <br>
                            <?php echo _pincuter_theme_option('theme_options_azienda_dove_siamo'); ?>
                        </p>
                        <!--<p class="contact_info_value"><?php //echo _pincuter_theme_option('theme_options_azienda_dove_siamo'); ?></p>-->
                    </div>


                    <div class="contact_info_item contact_info_phone d-flex flex-column align-items-center">
                        <?php 
                        /*<i class="bi bi-telephone-fill"></i>*/
                        echo '<figure>';
                            echo '<img src="'.get_stylesheet_directory_uri().'/assets/images/icone/telefono.jpg" alt="Contattaci" />';
                        echo '</figure>';
                        ?>
                        <p class="contact_info_label text-center">
                            <strong>TELEFONO</strong>
                            <br>
                            <br>
                            <?php echo _pincuter_theme_option('theme_options_azienda_telefono'); ?>
                        </p>
                        <!--<p class="contact_info_value"><?php //echo _pincuter_theme_option('theme_options_azienda_telefono'); ?></p>-->
                    </div>

                    
                    <?php 
                    $azienda_mails_metas = _pincuter_theme_option('cmb_pincuter_theme_options_azienda_mails_group_field');
        
                    foreach ( (array) $azienda_mails_metas as $key => $azienda_mail_meta ) {
                            
                        $azienda_mail_label = $azienda_mail_class = '';
                        //$azienda_mail_address = '';
                        
                        if ( isset( $azienda_mail_meta['theme_options_azienda_mails_group_class'] ) && !empty( $azienda_mail_meta['theme_options_azienda_mails_group_class'] ) ) {
                            $azienda_mail_class = $azienda_mail_meta['theme_options_azienda_mails_group_class'];
                        }

                        if ( isset( $azienda_mail_meta['theme_options_azienda_mails_group_label'] ) && !empty( $azienda_mail_meta['theme_options_azienda_mails_group_label'] ) ) {
                            $azienda_mail_label = $azienda_mail_meta['theme_options_azienda_mails_group_label'];
                        }
                        /*
                        if ( isset( $azienda_mail_meta['theme_options_azienda_mails_group_address'] ) && !empty( $azienda_mail_meta['theme_options_azienda_mails_group_address'] ) ) {
                            $azienda_mail_address = $azienda_mail_meta['theme_options_azienda_mails_group_address'];
                        }
                        */

                        echo '<div class="contact_info_item contact_info_mail d-flex flex-column align-items-center">';
                            
                            /*
                            if( $azienda_mail_class == 'redazione' ){
                                echo '<i class="bi bi-vector-pen"></i>';
                            } 
                            else if( $azienda_mail_class == 'abbonamenti' ){
                                echo '<i class="bi bi-globe-americas"></i>';
                            }
                            else {
                                echo '<i class="bi bi-envelope-fill"></i>';
                            }
                            */

                            if( $azienda_mail_class == 'redazione' ){
                                echo '<figure>';
                                    echo '<img src="'.get_stylesheet_directory_uri().'/assets/images/icone/redazione.jpg" alt="Redazione" />';
                                echo '</figure>';
                            } else if( $azienda_mail_class == 'abbonamenti' ){
                                echo '<figure>';
                                    echo '<img src="'.get_stylesheet_directory_uri().'/assets/images/icone/abbonamenti.jpg" alt="Abbonamenti" />';
                                echo '</figure>';
                            } else {
                                echo '<figure>';
                                    echo '<img src="'.get_stylesheet_directory_uri().'/assets/images/icone/commerciale.jpg" alt="Commerciale" />';
                                echo '</figure>';
                            }
                            
                            

                            echo '<p class="contact_info_label text-center">';
                                $azienda_mail_label_render = trim($azienda_mail_label);
                                $azienda_mail_label_render = nl2br($azienda_mail_label_render);
                                echo $azienda_mail_label_render;
                            echo '</p>';
                            /*
                            echo '<p class="contact_info_value">';
                                echo '<a href="mailto:'.$azienda_mail_address.'" title="'.$azienda_mail_label.'">';
                                    echo $azienda_mail_address;
                                echo '</a>';
                            echo '</p>';
                            */
                        echo '</div>';

                    }
                    ?>

                    

                </div>
            </div>
        </div>
    </section>

    <div class="clear"></div>
	<div class="spacer space-lg-3 space-0"></div>

    <section id="contact_map">
        <div class="row align-items-stretch">
            <div class="col-md-6 col-map">
				<div class="map_iframe_wrap h-100">
                    <?php 
                    /**
                     * get_post_meta(get_the_id(), 'magazineduesse_contatti_map_iframe', true); 
                     */
                    echo _pincuter_theme_option('theme_options_azienda_map_iframe');
                    ?>
                </div>
			</div>
            <div class="col-md-6 col-form">
				<div class="form_wrap">
                    <h3 class="form_heading"><?php echo get_post_meta(get_the_id(), 'magazineduesse_contatti_intro_form_titoletto', true); ?></h3>
                    <?php 
                    $magazineduesse_contatti_intro_form_contenuto = get_post_meta(get_the_id(), 'magazineduesse_contatti_intro_form_contenuto', true);
                    if( !empty($magazineduesse_contatti_intro_form_contenuto)){
                        echo apply_filters('pincuter_meta_content',$magazineduesse_contatti_intro_form_contenuto);
                    }
                    
                    echo '<div class="clear"></div>';
                    echo '<div class="spacer space-1"></div>';
                    
                    echo do_shortcode('[contact-form-7 id="7c440db" title="Contatti"]'); 
                    ?>
                </div>
			</div>
		</div>
	</section>


    <div class="clear"></div>
	<div class="spacer space-2"></div>


    <?php 
	endwhile;
 

get_footer();
?>