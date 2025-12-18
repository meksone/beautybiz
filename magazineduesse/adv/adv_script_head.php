<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


if( is_front_page()){
    ?>
    <script async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js"></script>
	<script>
		window.googletag = window.googletag || {cmd: []};
		googletag.cmd.push(function() {
			googletag.defineSlot('/20861521/BO_Masthead_970*250', [[970, 250], [728, 90]], 'div-gpt-ad-1710149740524-0').addService(googletag.pubads());
            googletag.defineSlot('/20861521/BO_HP_Box_300*250', [[300, 250], [300, 600]], 'div-gpt-ad-1710149909588-0').addService(googletag.pubads());
            googletag.defineSlot('/20861521/BO_HP_Skin', [[1, 1], [1920, 1200], [1920, 1080]], 'div-gpt-ad-1710149981178-0').addService(googletag.pubads());
            googletag.defineSlot('/20861521/BO_HP_Box_300*250_B', [[300, 250], [300, 600]], 'div-gpt-ad-1710150065063-0').addService(googletag.pubads());

			googletag.pubads().enableSingleRequest();
			googletag.pubads().collapseEmptyDivs();

            googletag.pubads().addEventListener('slotRenderEnded', function(event) {
				console.log('Slot has been rendered:');
				setSkin();
			});

			googletag.enableServices();
		});
	</script>
    <?php
} else {
    ?>
    <script async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js"></script>
	<script>
		window.googletag = window.googletag || {cmd: []};
		googletag.cmd.push(function() {
            googletag.defineSlot('/20861521/BO_Ros_Masthead_970*250', [[728, 90], [970, 250]], 'div-gpt-ad-1710150231920-0').addService(googletag.pubads());
            googletag.defineSlot('/20861521/BO_Ros_Box_300*250', [[300, 600], [300, 250]], 'div-gpt-ad-1710150269413-0').addService(googletag.pubads());
            googletag.defineSlot('/20861521/BO_Ros_Skin', [[1920, 1080], [1, 1], [1920, 1200]], 'div-gpt-ad-1710150180257-0').addService(googletag.pubads());
            googletag.defineSlot('/20861521/BO_Ros_Halfpage_300*600', [[300, 250], [300, 600]], 'div-gpt-ad-1710150339462-0').addService(googletag.pubads());

			googletag.pubads().enableSingleRequest();
			googletag.pubads().collapseEmptyDivs();

            googletag.pubads().addEventListener('slotRenderEnded', function(event) {
				console.log('Slot has been rendered:');
				setSkin();
			});

			googletag.enableServices();
		});
	</script>
    <?php
}