<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


/* Template Name: Dynamic Css */


get_header();
?>


<?php 
echo '<br><br><br>';

echo '/* SPACER */<br>';
for($i=1;$i<=1000;$i++){
	echo '.space-'.$i.'{height:'.$i.'px}';
}



echo '<br><br><br>';

/* max-width:479px */
echo '@media (max-width:479px){<br>';
    for($i=0;$i<=1000;$i++){
        echo '.space-xxs-'.$i.'{height:'.$i.'px!important}';
    }
echo '}';



echo '<br><br><br>';

/* @media (min-width:480px) and (max-width:575px) */
echo '@media (min-width:480px) and (max-width:575px){<br>';
    for($i=0;$i<=1000;$i++){
        echo '.space-xs-'.$i.'{height:'.$i.'px!important}';
    }
echo '}';



echo '<br><br><br>';

/* @media (min-width:576px) and (max-width:767px) */
echo '@media (min-width:576px) and (max-width:767px){<br>';
    for($i=0;$i<=1000;$i++){
        echo '.space-xm-'.$i.'{height:'.$i.'px!important}';
    }
echo '}';



echo '<br><br><br>';

/* @media (min-width:768px) */
echo '@media (min-width:768px){<br>';
    for($i=0;$i<=1000;$i++){
        echo '.space-sm-'.$i.'{height:'.$i.'px!important}';
    }
echo '}';



echo '<br><br><br>';

/* @media (min-width:1025px) */
echo '@media (min-width:1025px){<br>';
    for($i=0;$i<=1000;$i++){
        echo '.space-md-'.$i.'{height:'.$i.'px!important}';
    }
echo '}';



echo '<br><br><br>';

/* @media (min-width:1280px)*/
echo '@media (min-width:1280px){<br>';
    for($i=0;$i<=1000;$i++){
        echo '.space-lg-'.$i.'{height:'.$i.'px!important}';
    }
echo '}';



echo '<br><br><br>';

/* @media (min-width:1440px)*/
echo '@media (min-width:1440px){<br>';
    for($i=0;$i<=1000;$i++){
        echo '.space-xl-'.$i.'{height:'.$i.'px!important}';
    }
echo '}';



echo '<br><br><br>';

/* @media (min-width:1600px)*/
echo '@media (min-width:1600px){<br>';
    for($i=0;$i<=1000;$i++){
        echo '.space-xxl-'.$i.'{height:'.$i.'px!important}';
    }
echo '}';



/***********/

echo '<br><br><br>';

echo '/* Vertical Css */<br>';
for($i=0;$i<=1000;$i++){
	echo '.mt-'.$i.'{margin-top:'.$i.'px!important}';
}

echo '<br><br><br>';

for($i=0;$i<=1000;$i++){
	echo '.mb-'.$i.'{margin-bottom:'.$i.'px!important}';
}

echo '<br><br><br>';

for($i=0;$i<=1000;$i++){
	echo '.pt-'.$i.'{padding-top:'.$i.'px!important}';
}

echo '<br><br><br>';

for($i=0;$i<=1000;$i++){
	echo '.pb-'.$i.'{padding-bottom:'.$i.'px!important}';
}


/***********/


echo '<br><br><br>';

/* max-width:479px */
echo '@media (max-width:479px){<br>';
    for($i=0;$i<=1000;$i++){
        echo '.mt-xxs-'.$i.'{margin-top:'.$i.'px!important}';
    }
    echo '<br>';
    for($i=0;$i<=1000;$i++){
        echo '.mb-xxs-'.$i.'{margin-bottom:'.$i.'px!important}';
    }
    echo '<br>';
    for($i=0;$i<=1000;$i++){
        echo '.pt-xxs-'.$i.'{padding-top:'.$i.'px!important}';
    }
    echo '<br>';
    for($i=0;$i<=1000;$i++){
        echo '.pb-xxs-'.$i.'{padding-bottom:'.$i.'px!important}';
    }
    echo '<br>';
echo '}';



echo '<br><br><br>';

/* @media (min-width:480px) and (max-width:575px) */
echo '@media (min-width:480px) and (max-width:575px){<br>';
    for($i=0;$i<=1000;$i++){
        echo '.mt-xs-'.$i.'{margin-top:'.$i.'px!important}';
    }
    echo '<br>';
    for($i=0;$i<=1000;$i++){
        echo '.mb-xs-'.$i.'{margin-bottom:'.$i.'px!important}';
    }
    echo '<br>';
    for($i=0;$i<=1000;$i++){
        echo '.pt-xs-'.$i.'{padding-top:'.$i.'px!important}';
    }
    echo '<br>';
    for($i=0;$i<=1000;$i++){
        echo '.pb-xs-'.$i.'{padding-bottom:'.$i.'px!important}';
    }
    echo '<br>';
echo '}';



echo '<br><br><br>';

/* @media (min-width:576px) and (max-width:767px) */
echo '@media (min-width:576px) and (max-width:767px){<br>';
    for($i=0;$i<=1000;$i++){
        echo '.mt-xm-'.$i.'{margin-top:'.$i.'px!important}';
    }
    echo '<br>';
    for($i=0;$i<=1000;$i++){
        echo '.mb-xm-'.$i.'{margin-bottom:'.$i.'px!important}';
    }
    echo '<br>';
    for($i=0;$i<=1000;$i++){
        echo '.pt-xm-'.$i.'{padding-top:'.$i.'px!important}';
    }
    echo '<br>';
    for($i=0;$i<=1000;$i++){
        echo '.pb-xm-'.$i.'{padding-bottom:'.$i.'px!important}';
    }
    echo '<br>';
echo '}';



echo '<br><br><br>';

/* @media (min-width:768px) */
echo '@media (min-width:768px){<br>';
    for($i=0;$i<=1000;$i++){
        echo '.mt-sm-'.$i.'{margin-top:'.$i.'px!important}';
    }
    echo '<br>';
    for($i=0;$i<=1000;$i++){
        echo '.mb-sm-'.$i.'{margin-bottom:'.$i.'px!important}';
    }
    echo '<br>';
    for($i=0;$i<=1000;$i++){
        echo '.pt-sm-'.$i.'{padding-top:'.$i.'px!important}';
    }
    echo '<br>';
    for($i=0;$i<=1000;$i++){
        echo '.pb-sm-'.$i.'{padding-bottom:'.$i.'px!important}';
    }
    echo '<br>';
echo '}';



echo '<br><br><br>';

/* @media (min-width:1025px) */
echo '@media (min-width:1025px){<br>';
    for($i=0;$i<=1000;$i++){
        echo '.mt-md-'.$i.'{margin-top:'.$i.'px!important}';
    }
    echo '<br>';
    for($i=0;$i<=1000;$i++){
        echo '.mb-md-'.$i.'{margin-bottom:'.$i.'px!important}';
    }
    echo '<br>';
    for($i=0;$i<=1000;$i++){
        echo '.pt-md-'.$i.'{padding-top:'.$i.'px!important}';
    }
    echo '<br>';
    for($i=0;$i<=1000;$i++){
        echo '.pb-md-'.$i.'{padding-bottom:'.$i.'px!important}';
    }
    echo '<br>';
echo '}';



echo '<br><br><br>';

/* @media (min-width:1280px)*/
echo '@media (min-width:1280px){<br>';
    for($i=0;$i<=1000;$i++){
        echo '.mt-lg-'.$i.'{margin-top:'.$i.'px!important}';
    }
    echo '<br>';
    for($i=0;$i<=1000;$i++){
        echo '.mb-lg-'.$i.'{margin-bottom:'.$i.'px!important}';
    }
    echo '<br>';
    for($i=0;$i<=1000;$i++){
        echo '.pt-lg-'.$i.'{padding-top:'.$i.'px!important}';
    }
    echo '<br>';
    for($i=0;$i<=1000;$i++){
        echo '.pb-lg-'.$i.'{padding-bottom:'.$i.'px!important}';
    }
    echo '<br>';
echo '}';



echo '<br><br><br>';

/* @media (min-width:1440px)*/
echo '@media (min-width:1440px){<br>';
    for($i=0;$i<=1000;$i++){
        echo '.mt-xl-'.$i.'{margin-top:'.$i.'px!important}';
    }
    echo '<br>';
    for($i=0;$i<=1000;$i++){
        echo '.mb-xl-'.$i.'{margin-bottom:'.$i.'px!important}';
    }
    echo '<br>';
    for($i=0;$i<=1000;$i++){
        echo '.pt-xl-'.$i.'{padding-top:'.$i.'px!important}';
    }
    echo '<br>';
    for($i=0;$i<=1000;$i++){
        echo '.pb-xl-'.$i.'{padding-bottom:'.$i.'px!important}';
    }
    echo '<br>';
echo '}';



echo '<br><br><br>';

/* @media (min-width:1600px)*/
echo '@media (min-width:1600px){<br>';
    for($i=0;$i<=1000;$i++){
        echo '.mt-xxl-'.$i.'{margin-top:'.$i.'px!important}';
    }
    echo '<br>';
    for($i=0;$i<=1000;$i++){
        echo '.mb-xxl-'.$i.'{margin-bottom:'.$i.'px!important}';
    }
    echo '<br>';
    for($i=0;$i<=1000;$i++){
        echo '.pt-xxl-'.$i.'{padding-top:'.$i.'px!important}';
    }
    echo '<br>';
    for($i=0;$i<=1000;$i++){
        echo '.pb-xxl-'.$i.'{padding-bottom:'.$i.'px!important}';
    }
    echo '<br>';
echo '}';

?>


<?php get_footer(); ?>