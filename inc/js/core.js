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
    
/* TOGGLE SLIDE OF CAMP LONG DESCRIPTION */

	$(".read-more").click(function() {
		
		$(this).prev().toggleClass("closed");
		
		var more = $(this);
		more.toggleClass("open");
	
		if (more.hasClass("open"))
			more.html("Read less");
		else
			more.html("Read more");
	});
	
/* TOGGLE ACTIVE DIV IN CAMP AND DESTINATION PAGE */

	$(".custom-actions button").click(function() {
		$(".custom-actions button").removeClass("active");
		$(this).addClass("active");
		
		var active = ".custom-info ." + $(this).attr("name");
		$(".custom-info > div").addClass("hidden");
		$(active).removeClass("hidden");
	});

/* TOGGLE COLLAPSE ON ITINERARY PAGE */

	$(".item-timeline h3").click(function() {
		$(this).parent().find(".collapsible").slideToggle();
		$(this).closest("tr").siblings().find(".collapsible").slideUp();
	});
	
/* TRIGGER TIMELINE AFTER CLICK ON CIRCLE */

	$(".circle").click(function() {
		$(this).parents("tr").find(".item-timeline h3").trigger("click");
	});
	
/* FILTER DESTINATION */

	$(".wrapper-destinations .menu button").click(function() {
		var destination = $(this).attr("name");
		
		$(this).siblings().removeClass("active");
		$(this).addClass("active");
		
		if(destination == "all") {
			$(".wrapper-cards-horizontal .wrapper-card").slideDown();
			$(".area-destination").removeClass("hidden");
		} else {
			$(".wrapper-cards-horizontal .wrapper-card:not(." + destination + ")").slideUp();
			$(".wrapper-cards-horizontal .wrapper-card." + destination).slideDown();
			$(".wrapper-cards-horizontal .wrapper-card." + destination + " .info-card").addClass('active');
			$(".area-destination:not(#" + destination + ")").addClass("hidden");
			$(".area-destination#" + destination).removeClass("hidden");
		}
	});

/* TRIGGER TIMELINE AFTER CLICK ON CIRCLE */

	$(".contact .collapsible span").click(function() {
		$(this).parent().siblings(".collapsible").find("div").slideUp();
		$(this).next().slideToggle();
	});
	
/* LOAD VIDEOS */
		
	$(".modal-toggle").on("click", function() {
		if(!$('.modal').hasClass("is-visible")) {
			$(".modal video source").attr("src", $(this).attr("video-url"));
			$(".modal video").get(0).load();
			$(".modal video").trigger("focus");
			$(".modal").css("top", window.scrollY);
		}
		$('.modal').toggleClass('is-visible');
		$('html').toggleClass('no-scroll');
	});
	
/* TRIGGER COLLAPSE IN FLEXIBLE CONTENT */

	$(".flexible-content.toggle-block label").click(function() {
		$(this).siblings("label").removeClass("collapsed");
		$(this).siblings("label").next().slideUp();
		$(this).toggleClass("collapsed");
		$(this).next().slideToggle();
	});
	
/* SHOW POPUP ON MAP */

	$(".camps svg.map-camps circle").click(function() {
		var height   = parseFloat($(".camps svg.map-camps").height());       // Content height
		var width    = parseFloat($(".camps svg.map-camps").width());        // Content width
		var v_height = parseFloat($(".camps svg.map-camps").attr("height")); // Viewbox height
		var v_width  = parseFloat($(".camps svg.map-camps").attr("width"));  // Viewbox width
		var v_bottom = parseFloat(v_height - $(this).attr("cy"));            // Viewbox distance top
		var v_left   = parseFloat($(this).attr("cx"));                       // Viewbox distance left
		
		var bottom  = (v_bottom  * height) / v_height;
		var left    = (v_left * width)  / v_width;
		
		$(".camps svg.map-camps circle").removeClass("clicked");
		$(this).addClass("clicked");
		$(".popup").addClass("clicked");
		
		$(".popup").css({
			"bottom": bottom + "px",
			"left": left + "px"
		});
		
		var camps = JSON.parse($(".map.camps").attr("camps"));
		var current = camps[$(this).attr("id")];
		
		$(".popup .content h2").text(current.title_camp);
		$(".popup .content span").text(current.destination);
		$(".popup .content p").text(current.description);
		$(".popup .content a").attr("href", current.link);
		$(".popup .content .img").css("background", "url(" + current.image + ")");
		
		// Dotted path
		
		$(".path-dotted-small").css({
			"bottom": (bottom + 15) + "px",
			"left": (left - 3.5) + "px"
		});
		
		$(".path-dotted-small").addClass("visible");
		
		
		$(".popup").show();
		
		var scrollIndex = window.innerHeight * 0.2;
		
		$("html, body").animate({ scrollTop: $(".popup").offset().top - scrollIndex}, 500);
	});
	
/* CLOSE POPUP */

	$(".popup .close-popup").click(function() {
		
		$(".popup").hide();
		$(".popup").removeClass("clicked");
		$(".camps svg.map-camps circle").removeClass("clicked");
		$(".path-dotted-small").removeClass("visible");
		
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

	if($('.mix-it-up').length > 0) {
		mixitup('.mix-it-up');
	}
	
/* MAGNIFIC POPUP */
	
	$('.gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1]
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
		}
	});
	
// ========== Actions on resize - alter popup camp position

	$(window).on("resize", function() {
		
		if($(".popup").hasClass("clicked")) {
			var circle   = $(".camps svg circle.clicked");
			var height   = parseFloat($(".camps svg.map-camps").height());        // Content height
			var width    = parseFloat($(".camps svg.map-camps").width());         // Content width
			var v_height = parseFloat($(".camps svg.map-camps").attr("height"));  // Viewbox height
			var v_width  = parseFloat($(".camps svg.map-camps").attr("width"));   // Viewbox width
			var v_bottom = parseFloat(v_height - $(circle).attr("cy")); // Viewbox distance top
			var v_left   = parseFloat($(circle).attr("cx"));            // Viewbox distance left
			
			var bottom  = (v_bottom  * height) / v_height;
			var left    = (v_left * width)  / v_width;
			
			$(".popup").css({
				"bottom":  bottom  + "px",
				"left": left + "px"
			});
		}
		
	});

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

