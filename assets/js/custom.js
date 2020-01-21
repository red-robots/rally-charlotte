/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */

jQuery(document).ready(function ($) {
	
	/*
	*
	*	Flexslider
	*
	------------------------------------*/
	$('.flexslider').flexslider({
		animation: "slide",
	}); // end register flexslider
	
	/*
	*
	*	Colorbox
	*
	------------------------------------*/
	$('a.gallery').colorbox({
		rel:'gal',
		width: '80%', 
		height: '80%'
	});
	

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