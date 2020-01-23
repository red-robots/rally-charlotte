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

	/* Get Window Width size */
	screen_width_size();
	window.addEventListener("resize", function() {
	    screen_width_size();
	}, false);
	
	function screen_width_size() {
		var currentScreenSize = $('body').outerWidth();
		var wrapperWidth = $("#masthead > .wrapper").outerWidth();
		var screenSpace = currentScreenSize - wrapperWidth;
		var sideWidth = Math.round(screenSpace/2);
		$(".rightbg").css('width',sideWidth+'px');
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