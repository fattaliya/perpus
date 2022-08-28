(function($) {

	"use strict";

	var carousel = function() {
		$('.featured-carousel').owlCarousel({
	    loop: true,
	    autoplay: true,
	    margin:30,
	    animateOut: 'fadeOut',
	    animateIn: 'fadeIn',
	    nav:true,
	    dots: true,
	    autoplayHoverPause: false,
	    items: 1,
	    navText : ["<span class='ion-ios-arrow-back'></span>","<span class='ion-ios-arrow-forward'></span>"],
	    responsive:{
	      0:{
	        items:2
	      },
	      600:{
	        items:3
	      },
	      1000:{
	        items:6
	      }
	    }
		});

	};
	carousel();

})(jQuery);