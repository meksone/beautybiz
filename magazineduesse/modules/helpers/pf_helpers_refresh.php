<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


add_action('wp_head', '_magazineduesse_head_autorefreshpage');
function _magazineduesse_head_autorefreshpage(){
	global $current_user;
	$username = $current_user->user_login;
	if($username != 'salvatori.f'){
		?>
		<script type='text/javascript'>
			function autoRefreshPage(){
				window.location = window.location.href;
			}
		</script>
		<?php 
		if( is_single() && !has_tag('longform') ){
			?>
			<script type='text/javascript'>
				setInterval('autoRefreshPage()', 120000);
			</script>
			<?php 
		}
        else {
			?>
			<script type='text/javascript'>
				setInterval('autoRefreshPage()', 120000);
			</script>
			<?php
		}
		
	} /* if($username != 'fabiosalvatori'){ */
}