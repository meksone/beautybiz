<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
?>


<div id="rivista_infos" class="rivista_infos_wrap">

    <div class="rivista_info_base_wrap">
        <div class="row">
            <div class="col-md-12">

                <div class="rivista_info_base_loop">
                    <div class="rivista_info_base_item">
                        <p class="info_base__heading info_base_anno_nascita">Anno di Nascita</p>
                        <p class="info_base_detail mb-0"><?php echo _pincuter_theme_option('theme_options_rivista_anno_nascita'); ?></p>
                    </div>
                    <div class="rivista_info_base_item">
                        <p class="info_base__heading info_base_direttore">Direttore</p>
                        <p class="info_base_detail mb-0"><?php echo _pincuter_theme_option('theme_options_rivista_direttore'); ?></p>
                    </div>
                    <div class="rivista_info_base_item">
                        <p class="info_base__heading info_base_periodicita">Periodicità</p>
                        <p class="info_base_detail mb-0"><?php echo _pincuter_theme_option('theme_options_rivista_periodicita'); ?></p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="clear"></div>
    <div class="spacer space-1"></div>

    <div class="rivista_info_group_wrap">
        <div class="row">
            <div class="col-md-12">
                
            <div class="rivista_info_group_loop">
                    <?php 
                    $rivista_group_info_metas = _pincuter_theme_option('cmb_pincuter_theme_options_rivista_group_field');
                    foreach ( (array) $rivista_group_info_metas as $key => $rivista_group_info_meta ) {
			
                        $rivista_group_info_title = '';
                        $rivista_group_info_value = '';
                        $rivista_group_info_additional = '';

                        if ( isset( $rivista_group_info_meta['theme_options_rivista_group_info_title'] ) && !empty( $rivista_group_info_meta['theme_options_rivista_group_info_title'] ) ) {
                            $rivista_group_info_title = $rivista_group_info_meta['theme_options_rivista_group_info_title'];
                        }
                        if ( isset( $rivista_group_info_meta['theme_options_rivista_group_info_value'] ) && !empty( $rivista_group_info_meta['theme_options_rivista_group_info_value'] ) ) {
                            $rivista_group_info_value = $rivista_group_info_meta['theme_options_rivista_group_info_value'];
                        }
                        if ( isset( $rivista_group_info_meta['theme_options_rivista_group_info_additional'] ) && !empty( $rivista_group_info_meta['theme_options_rivista_group_info_additional'] ) ) {
                            $rivista_group_info_additional = $rivista_group_info_meta['theme_options_rivista_group_info_additional'];
                        }

                        echo '<div class="rivista_info_group_item">';
                            echo '<p class="rivista_info_group_title">'.$rivista_group_info_title.'</p>';
                            echo '<p class="rivista_info_group_value">'.$rivista_group_info_value.'</p>';
                            echo '<p class="rivista_info_group_additional">'.$rivista_group_info_additional.'</p>';
                        echo '</div>';
                    
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>

</div>