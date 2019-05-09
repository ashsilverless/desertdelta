//@prepros-prepend jquery.magnific-popup.js
//@prepros-prepend mixitup.js
//@prepros-prepend mixitup-pagination.js
//@prepros-prepend jquery.magnific-popup.js
//@prepros-prepend owl.carousel.min.js

jQuery(document).ready(function( $ ) {

/* ADD CLASS ON LOAD*/

    $("html").delay(100).queue(function(next) {
        $(this).addClass("loaded");

        next();
    });

/* ADD CLASS ON SCROLL*/

	$(window).scroll(function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 100) {
            $("body").addClass("scrolled");
        } else {
            $("body").removeClass("scrolled");
        }
    });
    
/* File upload name */

	$(document).ready(function(){
        $('input#fileupload').change(function(){
	        var file = $("input[type=file]")[0].files;
	        var name = file.length > 0 ? file[0].name : "";
	        
	        if(file.length > 0 && name) {
		        $('.custom-file-upload').addClass('attached');
	        }
	        
	        $(".file-name").text(name);
        });
    });

/* CLASS AND FOCUS ON CLICK */

    $('.menu-trigger').click(function() {
        $("nav").toggleClass("menu-open");
    });

    $('.multi-panel__trigger').click(function() {
        $(".multi-panel__trigger.active").removeClass("active");
        $(this).addClass('active');
    });

    $('.menu-item a').click(function() {
        $(".nav-wrapper").removeClass("menu-open");
        $(".nav-wrapper__trigger.is-active").removeClass("is-active");
    });

    $(".openTrigger").click(function(event) {
      $('.content__hidden').addClass("show");
      $(this).addClass("hide");
    });

    $(".closeTrigger").click(function(event) {
      $('.content__hidden').removeClass("show");
      $('.openTrigger').removeClass("hide");
    });

    $(".trigger-copy-expand").click(function(event) {
      $('.collapsed-content').addClass("expand");
      $(this).hide();
       $('.trigger-copy-collapse').show();     
    });

    $(".trigger-copy-collapse").click(function(event) {
        $('.collapsed-content').removeClass("expand");
        $(this).hide();
        $('.trigger-copy-expand').show();     
    });


    $(".trigger-expand").click(function(event) {
        $(this).closest('.expanding-copy').addClass("expand");
    });

    $(".trigger-collapse").click(function(event) {
        $(this).closest('.expanding-copy').removeClass("expand");
    });

    $(".toggle").click(function() {   
      	$('.toggle.active').removeClass("active"); 
        $(this).addClass("active");   
    });

// GLOBAL OWL CAROUSEL SETTINGS

    $('.carousel').owlCarousel({
        animateOut: 'fadeOut',
        loop:true,
        margin:10,
        nav:true,
    	navClass: ['owl-prev', 'owl-next'],
        dots:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });

    $('.testimonial-slider').owlCarousel({
        autoplay:true,
        autoplayTimeout:10000,
        loop:true,
        margin:10,
        nav: false,
        dots:false,
        responsive:{
            0:{
                items:1
            },
            2000:{
                items:1
            }
        }
    });
    
    $('.latest-news-slider').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
    	navClass: ['owl-prev', 'owl-next'],
        dots:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
    
/* MIX IT UP*/

var mixer = mixitup('.mix-it-up');

// ========== Add class if in viewport on page load

$.fn.isOnScreen = function(){
    
    var win = $(window);
    
    var viewport = {
        top : win.scrollTop(),
        left : win.scrollLeft()
    };
    viewport.right = viewport.left + win.width();
    viewport.bottom = viewport.top + win.height();
     
    var bounds = this.offset();
    bounds.right = bounds.left + this.outerWidth();
    bounds.bottom = bounds.top + this.outerHeight();
    
    return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
    
};

  $('.slide-up').each(function() {
    if ($(this).isOnScreen()) {
      $(this).addClass('active');    
    } 
  });   
    $('.slide-down').each(function() {
    if ($(this).isOnScreen()) {
      $(this).addClass('active');    
    } 
  });   
    $('.slide-right').each(function() {
    if ($(this).isOnScreen()) {
      $(this).addClass('active');    
    } 
  });  
    $('.slow-fade').each(function() {
    if ($(this).isOnScreen()) {
      $(this).addClass('active');    
    } 
  });  

// ========== Add class on entering viewport

$.fn.isInViewport = function() {
var elementTop = $(this).offset().top;
var elementBottom = elementTop + $(this).outerHeight();
var viewportTop = $(window).scrollTop();
var viewportBottom = viewportTop + $(window).height();
return elementBottom > viewportTop && elementTop < viewportBottom;
};

$(window).on('resize scroll', function() {
  $('.experience-level').each(function() {
    if ($(this).isInViewport()) {
      $(this).addClass('active');
    } 
  });
  $('.slide-up').each(function() {
    if ($(this).isInViewport()) {
      $(this).addClass('active');    
    } 
  });   
    $('.slide-down').each(function() {
    if ($(this).isInViewport()) {
      $(this).addClass('active');    
    } 
  }); 
    $('.slide-right').each(function() {
    if ($(this).isInViewport()) {
      $(this).addClass('active');    
    } 
  });  
    $('.slow-fade').each(function() {
    if ($(this).isInViewport()) {
      $(this).addClass('active');    
    } 
  });    
    
});



});//Don't remove ---- end of jQuery wrapper

