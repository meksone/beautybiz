<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


if( is_single() ){
    $pagetype = 'free article';
} else if( is_category() || is_home() ){
    $pagetype = 'category';
} else if( is_front_page() ){
    $pagetype = 'homepage';
}

if( is_front_page() ){
    $sectiontype = 'HOMEPAGE';
} else {
    $sectiontype = 'ROS';
}
?>

<script>
window._gmp = window._gmp || {};
window._gmp.pageType = '<?php echo $pagetype; ?>';
window._gmp.section = '<?php echo $sectiontype; ?>';
</script>
