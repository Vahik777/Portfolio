/* ----------------------------- 
Pre Loader
----------------------------- */
var SITE_URL = 'http://onelang/';

$(window).load(function() {
	'use strict';
	$('.loading-icon').delay(500).fadeOut();
	$('#preloader').delay(800).fadeOut('slow');
});


/* ----------------------------- 
Backgroung slider
----------------------------- */
$(window).ready(function() {
	'use strict';
	var url      = window.location.href;

	if(url == SITE_URL) {
		$.vegas('slideshow', {
			backgrounds: [
				{src: SITE_URL + 'frontend/web/images/bg-slider/bg-6.jpg', fade: 1000},
				{src: SITE_URL + 'frontend/web/images/bg-slider/bg-4.jpg', fade: 1000},
				{src: SITE_URL + 'frontend/web/images/bg-slider/bg-5.jpg', fade: 1000}
			]
		})();
	}
});


				

/* ----------------------------- 
Scroll into viewPort Animation
----------------------------- */
$(document).ready(function() {	
	'use strict';
	$('.animated').appear(function() {
		var element = $(this),
			animation = element.data('animation'),
			animationDelay = element.data('animation-delay');
			if ( animationDelay ) {

				setTimeout(function(){
					element.addClass( animation + " visible");
				}, animationDelay);

			} else {
				element.addClass( animation + " visible");
			}
	});
});
	

/* ----------------------------- 
NiceScroll
----------------------------- */	
//$(document).ready(function() {
//	'use strict';
//    $("html").niceScroll({
//		cursorcolor: '#E74C3C',
//		cursoropacitymin: '1',
//		cursorborder: '0px',
//		cursorborderradius: '0px',
//		cursorwidth: '5px',
//		cursorminheight: 60,
//		horizrailenabled: false,
//		zindex: 1090
//	});
//  });




				
/* ----------------------------- 
Card Style Script
----------------------------- */					
$(document).ready(function() {
	'use strict';
	var $el 			= $( '#card-ul' ),
		sectionFeature  = $('#section-feature'),
		baraja 			= $el.baraja();
	
		if ( $(window).width() > 480) {
			sectionFeature.appear(function(){
				baraja.fan({
					speed : 1500,
					easing : 'ease-out',
					range : 100,
					direction : 'right',
					origin : { x : 50, y : 200 },
					center : true
				});
			});
			$('#feature-expand').click(function() {
				baraja.fan({
					speed : 500,
					easing : 'ease-out',
					range : 100,
					direction : 'right',
					origin : { x : 50, y : 200 },
					center : true
				});
			}); 
		} else {
			sectionFeature.appear(function(){
				baraja.fan({
					speed : 1500,
					easing : 'ease-out',
					range : 80,
					direction : 'left',
					origin : { x : 200, y : 50 },
					center : true
				});
			});
			$('#feature-expand').click(function() {
				baraja.fan({
					speed : 500,
					easing : 'ease-out',
					range : 80,
					direction : 'left',
					origin : { x : 200, y : 50 },
					center : true
				});
			});
		}
		
	// Feature navigation
	$('#feature-prev').on( 'click', function( event ) {
		baraja.previous();
	});

	$('#feature-next').on( 'click', function( event ) {
		baraja.next();
	});
	
	// close Features
	$('#feature-close').on( 'click', function( event ) {
		baraja.close();
	});	
});

/* ----------------------------- 
Fitvids init
----------------------------- */
 $(document).ready(function(){
    'use strict';
    $('.video-content').fitVids();
 });


/* ----------------------------- 
IE 9 Placeholder fix
----------------------------- */
$('[placeholder]').focus(function() {
  var input = $(this);
  if (input.val() == input.attr('placeholder')) {
    input.val('');
    input.removeClass('placeholder');
  }
}).blur(function() {
  var input = $(this);
  if (input.val() == '' || input.val() == input.attr('placeholder')) {
    input.addClass('placeholder');
    input.val(input.attr('placeholder'));
  }
}).blur();



/* ----------------------------- 
Screenshot Load
----------------------------- */	
$(document).ready(function() {
	'use strict';
	$('.view-project').on('click', function(e) {
		e.preventDefault();

		var item = $(this).parent('.photo-zoom');

		var data = {
			description:item.find('.description').text(),
			date:item.find('.date').text(),
			title:item.find('.title').text(),
			img:item.find('.img').text(),
			cat_id:item.find('.category_id').text(),
			cat_slug:item.find('.category_slug').text(),
			cat_title:item.find('.category_title').text(),
		};

		var href 			= $(this).attr('href') + ' .portfolio-project',
			portfolioWrap	= $('.porfolio-container'),
			contentLoaded 	= $('#portfolio-load'),
			offset			= $('#section-screenshots').offset().top;
		
		portfolioWrap.animate({'left':'-120%'},{duration:400,queue:false});
		portfolioWrap.fadeOut(400);
		$('html, body').animate({scrollTop: offset},{duration:800,queue:true});
		setTimeout(function(){ $('#portfolio-loader').fadeIn('fast'); },300);
		
		setTimeout(function(){
            contentLoaded.load(href, { data: data }, function(){
                $('#portfolio-loader').fadeOut('fast');
                contentLoaded.fadeIn(600).animate({'left':'0'},{duration:800,queue:false});
                $('.back-button').fadeIn(600);
            });
        },400);
		
		
		
	});
	
	$('.backToProject').on('click', function(e){
		e.preventDefault();
		
		var portfolioWrap	= $('.porfolio-container'),
			contentLoaded 	= $('#portfolio-load');
			
		contentLoaded.animate({'left':'105%'},{duration:400,queue:false}).delay(300).fadeOut(400);
        $(this).parent().fadeOut(400);
		setTimeout(function(){
            portfolioWrap.animate({'left':'0'},{duration:400,queue:false});
            portfolioWrap.fadeIn(600);
        },500);
		
	});

});


							
/* ----------------------------- 
BxSlider
----------------------------- */		
$(document).ready(function() {
	'use strict';
	$('.testimonial-slider').bxSlider({
		pagerCustom: '#bx-pager',
		pager: true,
		touchEnabled: true,
		controls: false
	});	
});

				
/* ----------------------------- 
Main navigation
----------------------------- */
$(document).ready(function() {
	'use strict';
	$('.nav').onePageNav({
		currentClass: 'current',
		scrollSpeed: 1000,
		easing: 'easeInOutQuint'
	});
	$(window).bind('scroll', function(e) {
		var scrollPos = $(window).scrollTop();
		scrollPos > 220 ? $('.sticky-section').addClass('nav-bg') : $('.sticky-section').removeClass('nav-bg');
	});
});				
				
				
/* ----------------------------- 
MailCimp Plugin Script 
----------------------------- */
$(document).ready(function() {
	'use strict';
	$('#subscription-form').ajaxChimp({
		callback: mailchimpCallback,
		url: 'YOUR_URL' /* Replace it with your custom URL inside '' */
	});
	
	function mailchimpCallback(resp) {
		 if(resp.result === 'success') {
			$('.subscription-success')
				.html(resp.msg)
				.delay(500)
				.fadeIn(1000);

			$('.subscription-success').fadeOut(8000);
			
		} else if(resp.result === 'error') {
			$('.subscription-failed')
				.html(resp.msg)
				.delay(500)
				.fadeIn(1000);
				
			$('.subscription-failed').fadeOut(5000);
		}
		$('#subscription-form .input-email').val('');
	};
});

			

/* ----------------------------- 
Contact form
----------------------------- */			
//$(document).ready(function() {
//	'use strict';
//	$('form.contact-form').on('submit', function(e) {
//		$.post('contact/contact.php', $(this).serialize(), function(response) {
//			if ($('.confirmation p').html() != "") {
//				$('.confirmation p').replaceWith('<p><span class="fa fa-check"></span></p>');
//			}
//			$('.confirmation p').append(response).parent('.confirmation').show();
//			$('html, body').animate({
//				scrollTop: $('#section-contact').offset().top
//				},{duration:800,queue:true});
//			$('.form-item').val('');
//			setTimeout(function() {
//				$('.confirmation').hide();
//			}, 8000);
//		});
//		// disable default action
//		e.preventDefault();
//	});
//
//});
//
//

//$('.portfolio-item').hover(function(){
//	$(this).find('.cover').fadeIn();
//},function(){
//	$(this).find('.cover').fadeOut();
//}).stop();

$('.portfolio-item').hover(function(){
	$(this).find('.cover').stop().fadeToggle( "slow", "linear" );
});



$('.btn-video').on('click',function(e){
	var id = '.'+$(this).attr('data-video');

	var video = document.getElementById($(this).attr('data-video'));

	var source = document.createElement('source');

	source.setAttribute('src', $(this).attr('data-src'));

	video.appendChild(source);
	video.play();


	$(id).fadeIn();

	e.preventDefault();
})

$('.video_wrap').on('click',function(){
	$(this).fadeOut();
})