<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
?>

<script type='text/javascript'>
	function setSkin(){
		var frameSponsor = jQuery('#OpenxSkin iframe').first();
		var imgSponsor = frameSponsor.contents().find('#google_image_div img');
		console.log(imgSponsor);
		console.log(imgSponsor.length);
		if (imgSponsor.length == 1){
			var imgSponsorSrc = imgSponsor.attr("src");
			var linkSponsor = frameSponsor.contents().find('#google_image_div a').attr("href");
			console.log(linkSponsor);
			jQuery('#main-holder').css('background-image', 'url(' + imgSponsorSrc + ')');
			jQuery('#main-holder').css('padding-top', '130px');
			jQuery('#main-holder').css('cursor', 'pointer');
			jQuery("#main-holder").on("click",function(event){
				if(event.target.id=="main-holder"){
					window.open(linkSponsor, "_blank");
				}
			});
		}
	}
</script>
