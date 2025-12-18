<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


add_action( 'admin_init', '_pincuter_print_media_templates_admin_init', 20 );
function _pincuter_print_media_templates_admin_init(){
	add_action( 'print_media_templates', '_pincuter_additional_gallery_settings' );
}
function _pincuter_additional_gallery_settings() {
  ?>

    <script type="text/html" id="tmpl-bm-custom-gallery-setting">
        <label class="setting">
		<span>Style</span>
        <select data-setting="stylerbm">
            <option value="griglia">Griglia</option>
            <option value="slider">Slider</option>
        </select>
		</label>
    </script>

    <script type="text/javascript">
        jQuery( document ).ready( function() {
            _.extend( wp.media.gallery.defaults, {
                stylerbm: 'griglia'
            } );

            wp.media.view.Settings.Gallery = wp.media.view.Settings.Gallery.extend( {
                template: function( view ) {
                    return wp.media.template( 'gallery-settings' )( view )
                        + wp.media.template( 'bm-custom-gallery-setting' )( view );
                }
            } );
        } );
    </script>

  <?php
}