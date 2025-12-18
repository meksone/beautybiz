jQuery(".modal").appendTo("body"); 


function clearText(field){
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}


jQuery(window).on('scroll',function(){			
	
	var winWidth = jQuery(window).width();
	var winHeight = jQuery(window).height();
	
	if (jQuery(this).scrollTop() > 100) {
		jQuery('#back-top').fadeIn();
	} else {
		jQuery('#back-top').fadeOut();
	}


	if( jQuery(this).scrollTop() > jQuery('.stickup_menu_holder').height() ) {
		jQuery(".header").addClass("scrolled");
	} else {
		jQuery(".header").removeClass("scrolled");
	}

});


jQuery(window).on('load',function(){	
	jQuery('.header').css({'height':((jQuery('.stickup_menu_holder').height()))+'px'});
	jQuery('.header').attr('data-height',((jQuery('.stickup_menu_holder').height())));
});												
jQuery(window).on('resize',function(){	
	jQuery('.header').css({'height':((jQuery('.stickup_menu_holder').height()))+'px'});
	jQuery('.header').attr('data-height',((jQuery('.stickup_menu_holder').height())));
});


jQuery(document).ready(function(){
	
	var winWidth = jQuery(window).width();
	var winHeight = jQuery(window).height();
	
	console.log('winWidth-'+winWidth);
	console.log('winHeight-'+winHeight);
	
	/*
	jQuery(window).load(function(){
		jQuery('.header').css({'height':((jQuery('.stickup_menu_holder').height()))+'px'});
		jQuery('.header').attr('data-height',((jQuery('.stickup_menu_holder').height())));
	});												
	jQuery(window).resize(function(){
		jQuery('.header').css({'height':((jQuery('.stickup_menu_holder').height()))+'px'});
		jQuery('.header').attr('data-height',((jQuery('.stickup_menu_holder').height())));
	});
	*/
	
	
	/*
	$('a[href*=\\#]:not([href=\\#][data-toggle][data-target][data-slide])')
	*/
	
	
	jQuery('a[data-rel="anchor"]').click(function(){
		jQuery.scrollTo(this.hash, 1500, {offset:-30});
		return false;
	});

	
	//jQuery('.show-bg').heightFromBG();

	/*
	jQuery('#sidr').css({'top':((jQuery('.header').height()))+'px'});
	.css({'top':(jQuery('.header').attr("data-height"))+'px'});
	*/


	jQuery('.frontpage_speciali_slick').slick({
		dots: false,
		arrows: true,
		pauseOnHover: false,
		slidesToShow: 4,
		infinite: true,
		slidesToScroll: 1,
		autoplay: false,
		autoplaySpeed: 5000,
		nextArrow: '<div class="button-next"><i class="bi bi-arrow-right-circle-fill"></i></div>',
		prevArrow: '<div class="button-prev"><i class="bi bi-arrow-left-circle-fill"></i></div>',
		responsive: [
			{
				breakpoint: 1280,
				settings: {
					slidesToShow: 3,
				}
			},
			{
				breakpoint: 1025,
				settings: {
					slidesToShow: 2,
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
				}
			}
		]
	});
	
});
 

;(function($){
	/* SIDR
	==================== */
	jQuery('.header-item-hamburger__primary #btnRespNav').sidr({
		name: 'sidr',
		//source: '.nav__primary, .div-class-prova, #div-id-prova',
		source: '.nav__primary',
		side: 'left',
		displace: false, // Displace the body content or not
		//body: '.nav__primary',
		onOpen: function() {
			jQuery('body').addClass('sidr-open');
			jQuery('#sidr').css({'top':((jQuery('.stickup_menu_holder').height()))+'px'});
		},
		onClose: function() {
			jQuery('body').removeClass('sidr-open');
			jQuery('#sidr').css({'top':((jQuery('.stickup_menu_holder').height()))+'px'});
		}
	});

	jQuery('.header-item-hamburger__primary_scrolled #btnRespNav').sidr({
		name: 'sidr_scrolled',
		//source: '.nav__primary, .div-class-prova, #div-id-prova',
		source: '.nav__primary_scrolled',
		side: 'left',
		displace: false, // Displace the body content or not
		//body: '.nav__primary',
		onOpen: function() {
			jQuery('body').addClass('sidr-open');
			jQuery('#sidr_scrolled').css({'top':((jQuery('.stickydown_menu_holder').height()))+'px'});
		},
		onClose: function() {
			jQuery('body').removeClass('sidr-open');
			jQuery('#sidr_scrolled').css({'top':((jQuery('.stickydown_menu_holder').height()))+'px'});
		}
	});

	jQuery("#sidr .sidr-class-close").click(function(){
		jQuery.sidr('close', 'sidr');
	});
	

	jQuery("#sidr ul li:not(.sidr-class-menu-item-dropdown) a").click(function() {
		jQuery.sidr('close', 'sidr');
	});
	
	
	/*
	jQuery('.sidr-class-sub-menu').css('display', 'none');
	jQuery('.sidr-class-menu-item-has-children > a').eq(0).click(function(e) {
        e.preventDefault();
        jQuery('.sidr-class-menu-item-dropdown > a').next().slideToggle();
		jQuery('.sidr-class-menu-item-has-children > a').toggleClass('open');
    });
	*/
	jQuery('.sidr-class-sub-menu').hide();
	jQuery(".sidr-class-fa-angle-down").click(function(event) {
        event.preventDefault();
        event.stopPropagation();
                
        var id1 = jQuery(this).parent().parent().attr("id");
        jQuery("#" + id1 + " ul.sidr-class-sub-menu").slideToggle();
		
		jQuery(this).parent().parent().toggleClass('open');
        /*
		jQuery(this).parent().parent().children(".sidr-class-menu-item-has-children ul").each(function() {
            jQuery(this).find("li ul").hide();
        });
        */          
    });
	
	
	jQuery(".sidr-class-menu-item-has-children > a").click(function(event) {
        event.preventDefault();
        event.stopPropagation();
                
        var id1 = jQuery(this).parent().attr("id");
        jQuery("#" + id1 + " ul.sidr-class-sub-menu").slideToggle();
		
		jQuery(this).parent().toggleClass('open');
                  
    });
	
	
	/*
	jQuery(".sidr-class-menu-item-has-children > a").click(function(event) {
        event.preventDefault();
        event.stopPropagation();
                
        var id1 = jQuery(this).parent().attr("id");
        jQuery("#" + id1 + " ul.sidr-class-sub-menu").slideToggle();
		
		jQuery(this).parent().toggleClass('open');
        
	});
	*/

	jQuery('.header-item-hamburger__secondary #btnRespNav').sidr({
		name: 'sidr-secondary',
		//source: '.nav__primary, .div-class-prova, #div-id-prova',
		source: '.hamburger-secondary-nav-close, .hamburger-secondary-logo, .nav__secondary',
		side: 'left',
		displace: false, // Displace the body content or not
		//body: '.nav__primary',
		onOpen: function() {
			jQuery('body').addClass('sidr-open');
		},
		onClose: function() {
			jQuery('body').removeClass('sidr-open');
		}
	});
	jQuery(".sidr-class-secondary-nav-close-wrap").click(function(){
		jQuery.sidr('close', 'sidr-secondary');
	});
})(jQuery);