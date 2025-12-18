<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


$magazineduesse_category_apps_blocco_enable = get_term_meta($term_id, 'magazineduesse_category_apps_blocco_enable', true);
$magazineduesse_category_apps_titolo_sezione = get_term_meta($term_id, 'magazineduesse_category_apps_titolo_sezione', true);
if( $magazineduesse_category_apps_blocco_enable == 'abilita' ){

    echo '<div id="store-apps" class="category_apps">';
        echo '<div class="row">';
            echo '<div class="col-md-12 col-xs-12">';
                echo '<div class="app-section-title">';
                    echo '<div class="app-section-title-flex">';
                        echo '<p class="app-section-title__heading">'.$magazineduesse_category_apps_titolo_sezione.'</p>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';	
                    
        echo '<div class="clear"></div>';
        echo '<div class="spacer space-1"></div>';
                        
        echo '<div class="row">';
            echo '<div class="col-md-12 col-xs-12">';
                echo '<div class="apps_loop">';
            $apps_metas = get_term_meta($term_id, 'cmb_magazineduesse_categories_apps_group_field', true);
            foreach ( (array) $apps_metas as $key => $app_meta ) {

                $app_enable = $app_title = $app_url = $app_image = $app_image_id = '';
                            
                if ( isset( $app_meta['magazineduesse_category_app_group_enable'] ) && !empty( $app_meta['magazineduesse_category_app_group_enable'] ) ) {
                    $app_enable = $app_meta['magazineduesse_category_app_group_enable'];
                }
                if ( isset( $app_meta['magazineduesse_category_app_group_title'] ) && !empty( $app_meta['magazineduesse_category_app_group_title'] ) ) {
                    $app_title = $app_meta['magazineduesse_category_app_group_title'];
                }
                if ( isset( $app_meta['magazineduesse_category_app_group_url'] ) && !empty( $app_meta['magazineduesse_category_app_group_url'] ) ) {
                    $app_url = $app_meta['magazineduesse_category_app_group_url'];
                }
                if ( isset( $app_meta['magazineduesse_category_app_group_image'] ) && !empty( $app_meta['magazineduesse_category_app_group_image'] ) ) {
                    $app_image = $app_meta['magazineduesse_category_app_group_image'];
                }
                if ( isset( $app_meta['magazineduesse_category_app_group_image_id'] ) && !empty( $app_meta['magazineduesse_category_app_group_image_id'] ) ) {
                    $app_image_id = $app_meta['magazineduesse_category_app_group_image_id'];
                }

                            
                $app_image_tag_alt = '';
                            
                $app_image_caption_tag = get_post_meta( $app_image_id, '_wp_attachment_image_alt', true);
                if( !empty($app_image_caption_tag) ){
                    $app_image_tag_alt = $app_image_caption_tag;
                } else {
                    $app_image_tag_alt = $app_title;
                }

                $app_image_getimagesize = getimagesize($app_image);

                if( $app_enable == 'abilita'){
                    //echo '<div class="col-md-3 col-xm-6 col-12 col_item">';
                    echo '<div class="app_item col_item">';
                        echo '<a target="_blank" href="'.$app_url.'" title="'.$app_title.'">';
                            echo '<img width="'.$app_image_getimagesize[0].'" height="'.$app_image_getimagesize[1].'" class="img-fluid" src="'.$app_image.'" alt="'.$app_image_tag_alt.'" />';
                        echo '</a>';
                    echo '</div>';
                }
            }
            echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</div>';


    echo '<div class="clear"></div>';
	echo '<div class="spacer space-2"></div>';

}