<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


echo '<div id="OpenxSkin" class="openxskin">';
    if( is_front_page() ){
        ?>
        <!-- /20861521/BO_HP_Skin -->
        <div id='div-gpt-ad-1710149981178-0' style='min-width: 1920px; min-height: 1080px;'>
            <script>
                googletag.cmd.push(function() { googletag.display('div-gpt-ad-1710149981178-0'); });
            </script>
        </div>
        <?php 
    } else {
        ?>
        <!-- /20861521/BO_Ros_Skin -->
        <div id='div-gpt-ad-1710150180257-0' style='min-width: 1920px; min-height: 1080px;'>
            <script>
                googletag.cmd.push(function() { googletag.display('div-gpt-ad-1710150180257-0'); });
            </script>
        </div>
        <?php 
    }
echo '</div>';