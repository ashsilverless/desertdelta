//@prepros-prepend jquery.magnific-popup.js
//@prepros-prepend mixitup.js
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
   
/* SMOOTH SCROLL TO ANCHOR */

	$('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
				
			$('html,body').animate({
				scrollTop: target.offset().top
			}, 1000);
			return false;
		}
	});
    
/* TOGGLE SLIDE OF CAMP LONG DESCRIPTION */

	$(".read-more.expand").click(function() {
		
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
		var self = this;
		$(this).closest("tr").siblings().find(".collapsible").slideUp(500);
		$(this).parent().find(".collapsible").slideToggle(500, function() {
			$('html,body').animate({
				scrollTop: $(self).offset().top - 30
			}, 500);
		});
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
			$('.modal iframe').remove();
			$('.modal-content').append('<iframe width="100%" src="' + $(this).attr("video-url") + '" height="100%" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen"> </iframe>');
		
			$('.modal .loading').addClass('visible');
			$('.modal').addClass('is-visible');
			$('html').addClass('no-scroll');
			$(".modal").css("top", window.scrollY);
				
			$('.modal iframe').load(function() {
				$('.modal .loading').removeClass('visible');
				$('.modal iframe').addClass('visible');
			});
		} else {
			$('.modal iframe').removeClass('visible');
			$('.modal').removeClass('is-visible');
			$('html').removeClass('no-scroll');
		}
		
	});
	
	$('.wrapper-video iframe').load(function() {
		setTimeout(function() {
			$(".wrapper-video").css("opacity", 1);
		}, 1500);
	});
	
/* TRIGGER COLLAPSE IN FLEXIBLE CONTENT */

	$(".flexible-content.toggle-block label").click(function() {
		var otherLabels = $(this).parent().siblings(".item").find("label");
		otherLabels.removeClass("collapsed");
		otherLabels.next().slideUp();
		$(this).toggleClass("collapsed");
		$(this).next().slideToggle();
	});
	
/* SHOW POPUP ON MAP */

	var clickTriggered = false;

	$(".camps svg.map-camps circle").click(function() {
		
		if(!$(this).hasClass("clicked")) {
		
			var height   = parseFloat($(".camps svg.map-camps").height());       // Content height
			var width    = parseFloat($(".camps svg.map-camps").width());        // Content width
			var v_height = parseFloat($(".camps svg.map-camps").attr("height")); // Viewbox height
			var v_width  = parseFloat($(".camps svg.map-camps").attr("width"));  // Viewbox width
			var v_top    = parseFloat($(this).attr("cy"));                       // Viewbox distance top
			var v_bottom = parseFloat(v_height - v_top);                         // Viewbox distance bottom
			var v_left   = parseFloat($(this).attr("cx"));                       // Viewbox distance left
			
			var top     = ((v_top     * height) / v_height) + "px";
			var bottom  = ((v_bottom  * height) / v_height) + "px";
			var left    = ((v_left    * width)  / v_width)  + "px";
			
			var popup_top    = (parseFloat(top)    + 15)  + "px";
			var popup_bottom = (parseFloat(bottom) + 15)  + "px";
			var popup_left   = (parseFloat(left)   - 3.5) + "px";
			
			if($(this).hasClass("popup-top") || window.innerWidth < 1600) {
				$(".popup").addClass("popup-top");
				bottom = "auto";
				popup_bottom = "auto";
			} else {
				$(".popup").removeClass("popup-top");
				top = "auto";
				popup_top = "auto";
			}
			
			$(".camps svg.map-camps circle").removeClass("clicked");
			$(this).addClass("clicked");
			$(".popup").addClass("clicked");
	        		
			$(".popup").css({
				"top":    top,
				"bottom": bottom,
				"left":   left
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
				"top":    popup_top,
				"bottom": popup_bottom,
				"left":   popup_left
			});
			
			$(".path-dotted-small").addClass("visible");
			
			$(".popup").css("display", "flex");
			$(".popup").addClass("visible");
			
			if(!clickTriggered) {
				var scrollIndex = window.innerHeight * 0.2;
				$("html, body").animate({ scrollTop: $(".popup").offset().top - scrollIndex}, 500);
			}
			
			clickTriggered = false;
			
		} else {
			$(".popup .close-popup")[0].click();
		}
	});
	
/* CLOSE POPUP */

$(".popup .close-popup").click(function() {
		
		$(".popup").removeClass("visible");
		setTimeout(function() {
			$(".popup").css("display", "none");
		}, 500);
		$(".popup").removeClass("clicked");
		$(".camps svg.map-camps circle").removeClass("clicked");
		$(".path-dotted-small").removeClass("visible");
		
	});

/* SHOW POPUP ON ENTER CAMP */
	
	activateCamp();
	
	function activateCamp() {
		var currentUrl = window.location.pathname.split("/").filter(Boolean);
		
		if(currentUrl.length == 2 && currentUrl[0] == "camps") {
			var currentCamp = $("#" + currentUrl[1]);
			var camps = JSON.parse($(".map.camps").attr("camps"));
			
			if(currentCamp.length) {
				clickTriggered = true;
				var event = document.createEvent("SVGEvents");
				event.initEvent("click", true, true);
				currentCamp[0].dispatchEvent(event);
			}
		}
	}

/* HIDE OR SHOW READ MORE */

	$(".wrapper-text-block").each(function() {
		if(hasOverflow($(this).find(".text-block")[0])) {
			$(this).find(".read-more").show();
		} else {
			$(this).find(".read-more").hide();
		}
	});
	
	$(".itinerary-description").each(function() {
		if(hasOverflow($(this)[0])) {
			$(this).next().show();
		} else {
			$(this).next().hide();
		}
	});
	
	function hasOverflow(element) {
		return element.scrollHeight > element.clientHeight;
	}

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
    
    $(".toggle-newsletter .button, .close-newsletter").click(function() {
	    $(".collapse-newsletter").slideToggle();
    });
    
    $("body:not(.page-template-destinations) .camps svg.map-camps circle").click(function() {
	    $("#" + $(this).attr("parent")).addClass("selected").siblings(".area-destination").removeClass("selected");
    });
    
    $("body:not(.page-template-destinations) .map .popup .close-popup").click(function() {
	    $(".area-destination").removeClass("selected");
    });

// GLOBAL OWL CAROUSEL SETTINGS

	$('.itinerary-gallery-slider').owlCarousel({
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
			var v_top    = parseFloat($(circle).attr("cy"));                      // Viewbox distance top
			var v_bottom = parseFloat(v_height - v_top);                          // Viewbox distance bottom
			var v_left   = parseFloat($(circle).attr("cx"));                      // Viewbox distance left
			
			var top     = ((v_top     * height) / v_height) + "px";
			var bottom  = ((v_bottom  * height) / v_height) + "px";
			var left    = ((v_left    * width)  / v_width)  + "px";
			
			var popup_top    = (parseFloat(top)    + 15)  + "px";
			var popup_bottom = (parseFloat(bottom) + 15)  + "px";
			var popup_left   = (parseFloat(left)   - 3.5) + "px";
			
			if($(circle).hasClass("popup-top")) {
				$(".popup").addClass("popup-top");
				bottom = "auto";
				popup_bottom = "auto";
			} else {
				$(".popup").removeClass("popup-top");
				top = "auto";
				popup_top = "auto";
			}
			
			$(".popup").css({
				"top":    top,
				"bottom": bottom,
				"left":   left
			});
			
			$(".path-dotted-small").css({
				"top":    popup_top,
				"bottom": popup_bottom,
				"left":   popup_left
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
	$('#canvas').each(function() {
		if($(this).isInViewport() && !$(this).hasClass("active")) {
			
			$(this).addClass('active');
			var margin = $(".hero").height() - $(this).offset().top - 60;
			$(this).css("margin-top", margin + "px");
			
			setTimeout(function() {
				percentDirection = -4;
				radiusDirection = 1.2;
			}, 2500);
		} 
	});
	
	if($("body").hasClass("single-itineraries")) {
		$("#map-canvas").each(function() {
			if($(this).isInViewport() && !$(this).hasClass("active")) {
				$(this).addClass("active");
				setTimeout(function() {
					startMapAnimation();
				}, 500);
			}
		});
	}
    
});

/* TOGGLE CAMP PULSE ON ITINERARY PAGE */

	if($("body").hasClass("single-itineraries")) {
		
		// Display only camps inside itinerary
		var routeInfo = JSON.parse($(".visible-camps").attr("visible-camps"));
		var visibleCamps  = routeInfo["camps"];
		var startLocation = routeInfo["start"];
		var endLocation   = routeInfo["end"];
		
		$("svg.map-camps circle").not(visibleCamps.join(", ")).addClass("no-pulse");
		
		// Define radius and coordinates
		var coordinates = [];
		var radius;
		
		if(startLocation) {
			coordinates.push({
				x: parseFloat($(startLocation).attr("x")) + $(startLocation).attr("width")/2,
				y: parseFloat($(startLocation).attr("y")) + $(startLocation).attr("height")/2,
				camp: false
			});
			
			startLocation = {
				x: parseFloat($(startLocation).attr("x")) + $(startLocation).attr("width")/2,
				y: parseFloat($(startLocation).attr("y")) + $(startLocation).attr("height")/2,
				height: parseFloat($(startLocation).attr("height")),
				width:  parseFloat($(startLocation).attr("width"))
			}
		}
		
		for(var i = 0; i < visibleCamps.length; i++) {	
			if(i == 0)
				radius = parseFloat($("circle" + visibleCamps[i]).attr("r"));
			
			coordinates.push({
				x: parseFloat($("circle" + visibleCamps[i]).attr("cx")),
				y: parseFloat($("circle" + visibleCamps[i]).attr("cy")),
				camp: true
			});
		}
		
		if(endLocation) {
			coordinates.push({
				x: parseFloat($(endLocation).attr("x")) + $(endLocation).attr("width")/2,
				y: parseFloat($(endLocation).attr("y")) + $(endLocation).attr("height")/2,
				camp: false
			});
			
			endLocation = {
				x: parseFloat($(endLocation).attr("x")) + $(endLocation).attr("width")/2,
				y: parseFloat($(endLocation).attr("y")) + $(endLocation).attr("height")/2,
				height: parseFloat($(endLocation).attr("height")),
				width:  parseFloat($(endLocation).attr("width"))
			}
		}
		
		/* REMOVE SINGLE LINE DUPLICATION
		if(coordinates.length == 3 && coordinates[0].x == coordinates[2].x && coordinates[0].y == coordinates[2].y) {
			coordinates.pop();
		}
		*/
		
		// Dimensions settings
		var mapMeasures = $("#map-camps-regions")[0].getBBox();
		
		var canvas = document.getElementById('map-canvas');
		canvas.setAttribute("width", mapMeasures.width);
		canvas.setAttribute("height", mapMeasures.height);
		canvas.setAttribute("x", mapMeasures.x);
		canvas.setAttribute("y", mapMeasures.y);
		
		
		// Define animation variables and line settings
		var framesElapsed;
		var allCoordinates = calcWaypoints(coordinates);
		var ctx = canvas.getContext("2d");
		
		// Function that starts animation
		var animationStarted = false;
		
		function startMapAnimation() {
			animationStarted = true;
			canvas.width = canvas.width;
			ctx.lineWidth = 4;
			framesElapsed = 1;
			animateLine(allCoordinates);
		}
		
		$("#view-route").click(function() {
			if(!animationStarted)
				startMapAnimation();
		});
		
		// Calculate coordinates inside path
		function calcWaypoints(coordinates) {
			var waypoints = [];
			
			for(var i = 1; i < coordinates.length; i++) {
				var pt0 = coordinates[i - 1];
				var pt1 = coordinates[i];
				
				var dx = pt1.x - pt0.x;
				var dy = pt1.y - pt0.y;
				
				var distance = Math.round(Math.sqrt(dx * dx + dy * dy)/4);
				
				for(var j = 0; j < distance; j++) {
					var x = pt0.x + dx * j / distance;
					var y = pt0.y + dy * j / distance;
					
					waypoints.push({
						x: x,
						y: y,
						insideCircle: insideCircle(coordinates, x, y)
					});
				}
			}
			
			return waypoints;
		}
		
		// Animate path drawing
		function animateLine() {
			if(framesElapsed < allCoordinates.length - 1) {
				requestAnimationFrame(animateLine);
			} else {
				animationStarted = false;
			}
			
			if(framesElapsed % 4 > 1 && allCoordinates[framesElapsed - 1].insideCircle == false) {
				ctx.strokeStyle = "#50514d";
			} else {
				ctx.strokeStyle = "transparent"
			}
			
			ctx.beginPath();
			ctx.moveTo(allCoordinates[framesElapsed - 1].x, allCoordinates[framesElapsed - 1].y);
			ctx.lineTo(allCoordinates[framesElapsed].x, allCoordinates[framesElapsed].y);
			ctx.stroke();
			
			framesElapsed++;
		}
		
		function insideCircle(coordinates, x, y) {
			
			for(var i = 0; i < coordinates.length; i++)
				if(Math.pow(x - coordinates[i].x, 2) + Math.pow(y - coordinates[i].y, 2) < Math.pow(radius, 2))
					return true;
			
			return false;
		}
	}

// ========== Animation Play Video on Cares children pages

if($("body").hasClass("page-template-cares-children")) {
		
	var sideCount = 3;
	
	var canvas = document.getElementById("canvas");
	var ctx = canvas.getContext("2d");;
	ctx.lineWidth = 2;
	ctx.fillStyle = '#FFFFFF';
	
	var PI2 = Math.PI * 2;
	var cx = 30;
	var cy = 30;
	
	var radius = 5;
	var radiusDirection = 0;
	
	var xx = function (a) {
	    return (cx + radius * Math.cos(a));
	}
	var yy = function (a) {
	    return (cy + radius * Math.sin(a));
	}
	var lerp = function (a, b, x) {
	    return (a + x * (b - a));
	}
	
	var sides = [];
	for (var i = 0; i < sideCount; i++) {
	    sides.push(makeSide(i, sideCount));
	}
	
	var percent = 100;
	var percentDirection = 0;
	
	$('#canvas').each(function() {
		if($(this).isOnScreen()) {
			
			$(this).addClass('active');
			var margin = $(".hero").height() - $(this).offset().top - 60;
			$(this).css("margin-top", margin + "px");
			
			setTimeout(function() {
				percentDirection = -4;
				radiusDirection = 1.2;
			}, 2500);
		} 
	}); 
	
	animate();
	
	// functions
	
	function animate() {
	  
	    requestAnimationFrame(animate);
	    drawSides(percent);
	    percent += percentDirection;
	  
	    radius += radiusDirection;
	
	  
	    if (percent > 100) {
	        percent = 100;
	    }
	    if (percent < 0) {
	        percent = 0;
	    }
	    if (radius > 30) {
	        radius = 30;
	    }
	    if (radius < 5) {
	        radius = 5;
	    }
	}
	
	function drawSides(pct) {
	  
	    ctx.clearRect(0, 0, canvas.width, canvas.height);
	    if (pct == 100) {
	        ctx.beginPath();
	        ctx.arc(cx, cy, radius, 0, PI2);
	        ctx.closePath();
	        ctx.fill();
	    } else {
	          for (var i = 0; i < sideCount; i++) {
	              sides[i] = makeSide(i, sideCount);
	          }
	      
	        ctx.beginPath();
	        ctx.moveTo(sides[0].x0, sides[0].y0);
	        for (var i = 0; i < sideCount; i++) {
	            var side = sides[i];
	            var cpx = lerp(side.midX, side.cpX, pct / 100);
	            var cpy = lerp(side.midY, side.cpY, pct / 100);
	            ctx.quadraticCurveTo(cpx, cpy, side.x2, side.y2);
	        }
	        ctx.fill();
	    }
	}
	
	function makeSide(n, sideCount) {
	    var sweep = PI2 / sideCount;
	    var sAngle = sweep * (n - 1);
	    var eAngle = sweep * n;
	
	    var x0 = xx(sAngle);
	    var y0 = yy(sAngle);
	    var x1 = xx((eAngle + sAngle) / 2);
	    var y1 = yy((eAngle + sAngle) / 2);
	    var x2 = xx(eAngle);
	    var y2 = yy(eAngle);
	
	    var dx = x2 - x1;
	    var dy = y2 - y1;
	    var a = Math.atan2(dy, dx);
	    var midX = lerp(x0, x2, 0.50);
	    var midY = lerp(y0, y2, 0.50);
	    var cpX = 2 * x1 - x0 / 2 - x2 / 2;
	    var cpY = 2 * y1 - y0 / 2 - y2 / 2;
	
	    return ({
	        x0: x0,
	        y0: y0,
	        x2: x2,
	        y2: y2,
	        midX: midX,
	        midY: midY,
	        cpX: cpX,
	        cpY: cpY,
	        color: '#FFFFFF'
	    });
	}
}


});//Don't remove ---- end of jQuery wrapper

