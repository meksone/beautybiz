<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


global $post;


$permalink = esc_url(get_permalink( get_the_ID() ));	
$title = esc_html(get_the_title());
	
$title_parts = explode(' ', $title);
$share_title = implode('+', $title_parts);
$fb_title = str_replace(':', '', $share_title);
$share_title = str_replace("'", '', $share_title);
	
/*$share_title_div = apply_filters( 'pincuter_text_translate', $pincuter_theme_opt['pnctredux_single_post_share_button_title'], 'share_title_div' );*/
	

/*
if (has_excerpt()) {
	$content = esc_html(get_the_excerpt(get_the_id()));
} else {
	$getcontent = get_the_content(get_the_id());
	$content = preg_replace( '/\[[^\]]+\]/', '', $getcontent );
	$content = apply_filters( '_pincuter_standard_post_content_list', wp_trim_words( $content, 15 ) );
	$content = esc_html(strip_shortcodes($content));
}
*/
/*
$content = $wp_query->post->post_content;
$echocontent = preg_replace( '/\[[^\]]+\]/', '', $content );
$excerpt_strip = strip_shortcodes($echocontent);
$excerpt = esc_html(wp_trim_words($excerpt_strip,25));
*/
/*LINKEDIN
<a href="https://www.linkedin.com/shareArticle?mini=true&url=http://chillyfacts.com/create-linkedin-share-button-on-website-webpages&title=Create LinkedIn Share button on Website Webpages&summary=chillyfacts.com&source=Chillyfacts" onclick="window.open(this.href, 'mywin', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;">
  <img src="http://chillyfacts.com/wp-content/uploads/2017/06/LinkedIN.gif" alt="" width="54" height="20" />
</a>

https://www.linkedin.com/shareArticle?mini=true&url=http://chillyfacts.com/create-linkedin-share-button-on-website-webpages&title=Create%20LinkedIn%20Share%20button%20on%20Website%20Webpages&summary=chillyfacts.com&source=Chillyfacts

http://www.linkedin.com/shareArticle?mini=true&url=https://new.bestmovie.it/bestserial/eddie-munson-e-i-metallica-sono-realta-ecco-il-primo-live-che-fara-impazzire-i-fan-di-stranger-things-video/817973/&title=Eddie%20Munson%20e%20i%20Metallica%20sono%20realt%C3%A0:%20ecco%20il%20primo%20live%20che%20far%C3%A0%20impazzire%20i%20fan%20di%20Stranger%20Things%20[VIDEO]
*/

if (has_excerpt()) {
	$content = esc_html(get_the_excerpt(get_the_id()));
} else {
	$getcontent = get_the_content(get_the_id());
	$echocontent = preg_replace( '/\[[^\]]+\]/', '', $getcontent );
	$echocontent_strip = strip_shortcodes($echocontent);
	$content = esc_html(wp_trim_words($echocontent_strip,25));
}
	

/*
if(has_post_thumbnail()) :
	$attachment_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
	$url = $attachment_url['0'];
else:
	$first_catch = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	if(!empty($matches[1])){
		$url_image = $matches[1][0];
		$id_image = attachment_url_to_postid($url_image);
		$url_attachment = wp_get_attachment_image_src($id_image, 'full');
		$url = $url_attachment[0];
	} else {
		$default_image = _pincuter_theme_option('theme_options_default_image');
		$default_image_id = attachment_url_to_postid($default_image);
		$url = $default_image;
	}
endif;
*/

if(has_post_thumbnail()) :
	$attachment_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
	$url = $attachment_url['0'];
else:
	$default_image = _pincuter_theme_option('theme_options_default_image');
	$default_image_id = _pincuter_theme_option('theme_options_default_image_id');
	$url = $default_image;
endif;
?>

<aside id="share-post" class="share-post">
	<div class="row">
		<div class="col-md-12 col-xs-12">
		
			<ul class="share-buttons unstyled clearfix">
				<li class="facebook">
					<a href="http://www.facebook.com/sharer.php?u=<?php echo $permalink; ?>&t=<?php echo $share_title; ?>&sms_ss=Facebook" target="_blank" title="Condividi l'articolo su Facebook">
						<i class="bi bi-facebook"></i>
					</a>
				</li>
				<li class="twitter">
					<a href="http://twitter.com/share?url=<?php echo $permalink; ?>&text=<?php echo $share_title; ?>" target="_blank">
						<i class="bi bi-twitter"></i>
					</a>
				</li>
				<li class="linkedin">
					<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $permalink; ?>&title=<?php echo $title;?>" target="_blank">
						<i class="bi bi-linkedin"></i>
					</a>
				</li>
				<li class="email">
					<a href="mailto:?subject=<?php echo 'BestMovie - '.$title; ?>&body=<?php echo $content.'... '.$permalink; ?>">
						<i class="bi bi-envelope"></i> 
					</a>
				</li>
				<li class="telegram">
					<a href="https://telegram.me/share/url?url=<?php echo $permalink; ?>&text=<?php echo $title; ?>" target="_blank">
						<i class="bi bi-telegram"></i>
					</a>
				</li>
			</ul>
			
		</div>
	</div>
</aside>