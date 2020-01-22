/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */

jQuery(document).ready(function ($) {


	/* Slideshow */
	if( $("#slideshow").length ) {
		var swiper = new Swiper('#slideshow', {
			slidesPerView: 1,
			spaceBetween: 0,
			effect: 'slide', /* "fade", "cube", "coverflow" or "flip" */
			loop: true,
			autoplay: {
				delay: 4000,
			},
			pagination: {
				el: '.swiper-pagination',
				clickable: true,
			},
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
	    });
	    swiper.on('slideChangeTransitionStart', function (e) {
	    	$(".swiper-slide").each(function(){
	    		if( $(this).hasClass('swiper-slide-active') ) {
	    			$(this).find('.slideTxt').addClass('fadeInLeft');
	    		} else {
	    			$(this).find('.slideTxt').removeClass('fadeInLeft');
	    		}
	    	});
		});
	}
	

	/*
	*
	*	Wow Animation
	*
	------------------------------------*/
	new WOW().init();


	$(document).on("click",".menu-toggle",function(e){
		e.preventDefault();
		$(this).toggleClass('open');
		$('#mobile-navigation').toggleClass('open');
		$('body').toggleClass('nav-open');
		$('.site-header').toggleClass('move-left');
	});

	$(document).on("click","#header-overlay",function(){
		$(".menu-toggle").trigger("click");
	});
	

});// END #####################################    END