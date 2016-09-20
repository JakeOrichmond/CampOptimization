var contactMap;

/**
 * ==================
 * General Functions
 * ==================
 */

//5in30 page dates
var closestTues, closestWed, closestThur;

// Pause the slider, if it's currently running
function pauseSlider() {
	var slider = $('#slider');
	if (slider.hasClass('running') &&
		(window.innerWidth > 1025)) {
		slider.removeClass("running");
		slider.addClass("paused");
		slider.flexslider("pause");
	}
}

// Start the slider, but only if it's actually in view
function startSlider() {
	var slider = $('#slider');
	if (slider.hasClass("paused") &&
		(window.innerWidth > 1025) &&
		$(window).scrollTop() < (slider.height() * 0.7)) {
		slider.removeClass("paused");
		slider.addClass("running");
		slider.flexslider("play");
	}
}

// Initialize the Google map for the Contact page
function initialize() {
	var styles = [
		{
			stylers: [
				{ hue: '#70dafe' },
				{ saturation: '30'}
			]
		},
		{
			featureType: "road",
			elementType: "geometry",
			stylers: [
				{ lightness: 100 }
			]
		}
	];
	var fancyMap = new google.maps.StyledMapType(styles, {name: "RoboMap"});
	var mapOptions = {
		center: new google.maps.LatLng(45.519, -122.65),
		zoom: 14,
		mapTypeControl: false,
		scrollwheel: false,
		navigationControl: false,
		scaleControl: false,
		mapTypeControlOptions: {
			mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
		}
	};

	contactMap = new google.maps.Map(document.getElementById('contact-map'),
		mapOptions);
	contactMap.mapTypes.set('map_style', fancyMap);
	contactMap.setMapTypeId('map_style');
}

// Read any parameters attached to the URL
function readUrlParams() {
	var query = [];
	var search = window.location.search.substring(1);
	var params = search.split('&');

	for (var i = 0; i < params.length; i++) {
		var param = params[i].split('=');
		query[param[0]] = param[1];
	}
	return query;
}

function validateURI(input) {
	var uri = input.value;
	var pattern = new RegExp("http://|https://");
	if(!pattern.test(uri)) {
		uri = 'http://' + uri;
	}

	input.value = uri;
}

// scroll into view slowly
var scrollTabIntoView = function(elementToScroll, paddingTop) {
	setTimeout(function(){
		window.$('html, body').animate({ scrollTop: window.$(elementToScroll).offset().top -paddingTop }, 500);
	}, 50);
};

//debouncer to only query every 50 milliseconds on resize type events
var debouncer = function( func , timeout ) {
    var timeoutID , timeout = timeout || 50;
    return function () {
        var scope = this , args = arguments;
        clearTimeout( timeoutID );
        timeoutID = setTimeout( function () {
            func.apply( scope , Array.prototype.slice.call( args ) );
        } , timeout );
    };
};

//get next tues, wed, thurs calendar dates for 5in30 page
(function(){
    var today1 = new Date(), today2 = new Date(), today3 = new Date(), tuesday, wednesday, thursday, day;

    day = today1.getDay() + 2;

    tuesday = today1.getDate() - day + (day >= 2 ? 16 : 9);
    wednesday = today2.getDate() - day + (day >= 3 ? 17 : 10);
    thursday = today3.getDate() - day + (day >= 4 ? 17 :11);

    if (tuesday > wednesday) {
    	closestTues = new Date(today1.setDate(wednesday));
    	closestWed  = new Date(today2.setDate(thursday));
    	closestThur = new Date(today3.setDate(tuesday));
    } else if (wednesday > tuesday) {
    	closestTues = new Date(today1.setDate(thursday));
    	closestWed  = new Date(today2.setDate(tuesday));
    	closestThur = new Date(today3.setDate(wednesday));
    } else {
    	closestTues = new Date(today1.setDate(tuesday));
    	closestWed  = new Date(today2.setDate(wednesday));
    	closestThur = new Date(today3.setDate(thursday));
    }

    closestTues = '8/16';//(closestTues.getMonth() + 1) + "/" + closestTues.getDate();
    closestWed  = '8/17';//(closestWed.getMonth() + 1) + "/" + closestWed.getDate();
    closestThur = '8/18';//(closestThur.getMonth() + 1) + "/" + closestThur.getDate();

})();

//notify on change of class
(function(){
	var originalAddClassMethod = jQuery.fn.addClass;

	jQuery.fn.addClass = function(){
		// Execute the original method.
		var result = originalAddClassMethod.apply( this, arguments );

		// trigger a custom event
		jQuery(this).trigger('cssClassChanged');

		// return the original result
		return result;
	}
})();

/**
 * Adjust the Contact map based on available screen space
 */
$('#contact-map').width('100%').height($('.hero').height());

// Sets active link in Bootstrap nav menu
$('a[href="' + this.location.pathname + '"]').parents('li,ul').addClass('active');
if (window.location.pathname.indexOf("/results/") >= 0) {
    $('a[href="/results"]').parents('li,ul').addClass('active');
}
/**
 * ======================
 * On Page-Load Functions
 * ======================
 */
$(function () {

	/**
	 * ==================
	 * Homepage Functions
	 * ==================
	 */
	if ($('#home').length > 0 && window.innerWidth > 1025) {

		/**
		 * Scroll-dependent functions
		 */
		$(window).scroll(function () {
			/**
			 * Pause the main slider when it's scrolled out of view, and restart it when it comes back
			 */
			if ($('#slider').hasClass("running") &&
				$(window).scrollTop() > ($('#slider').height() * 0.7)) {
				pauseSlider();
			}
			else if ($('#slider').hasClass("paused") &&
				$(window).scrollTop() < ($('#slider').height() * 0.7)) {
				startSlider();
			}
		});
	}
	/**
	 * Slider initialization
	 */
	$('.flexslider').flexslider({
		slideshowSpeed: 8000,
		animation: 'fade',
		prevText: '<i></i>',
		nextText: '<i></i>',
		controlNav: true,
		manualControls: '.flex-control-nav li',
		start: function () {
			if (window.innerWidth < 768) {
				$('#home-content').css({ top: $('#slider').height() + 40 });
			}
		}
	});

	/**
	 * ======================
	 * Contact Page Functions
	 * ======================
	 */
	//contact form submission GA submit
	 $('.contact #contact-form').on('click', 'button', function(){
	 	ga('0.send', 'pageview', {
	 	  'dimension3': 'Contact Form Submission - Contact Page'
	 	});
	 });
	 $('.contact #contact-form').one('click', function(){
	 	ga('0.send', 'pageview', {
	 	  'dimension4': 'Contact Form Interaction - Contact Page'
	 	});
	 });
	/**
	 * Contact page map initialization
	 */

	// Check to see if the map exists, and create it if it doesn't
	if ($('#contact-map').length > 0 && !contactMap) {
		initialize();

		// Add a marker for the office
		new google.maps.Marker({
			position: new google.maps.LatLng(45.518962,-122.652093),
			icon: '/lib/img/icons/icon-map-pin.png',
			animation: google.maps.Animation.DROP,
			map: contactMap
		});
	}

	/**
	 * =====================
	 * Services Page Functions
	 * =====================
	 */
	$('.pricing-btn').click(function () {
		$('.pricing-content').slideToggle();
	});

	//bootstrap tab panels for dataActions
	//set the first tab active and get previous and next href ids
	if ( window.location.pathname === '/services') {
		var queryParameters = window.location.search;
		var tabToActivate   = '';
		switch(queryParameters){
			case '?dataaction=datadesign':
				tabToActivate = $('#design-tab, #design-tab-mobile, #design');
				break;
			case '?dataaction=dataconvert':
				tabToActivate = $('#convert-tab, #convert-tab-mobile, #convert');
				break;
			case '?dataaction=datatarget':
				tabToActivate = $('#target-tab, #target-tab-mobile, #target');
				break;
			default:
				tabToActivate = $('#insights-tab, #insights-tab-mobile, #insights');
		}
		$('.mobile-tabs, .tab-pane').removeClass('active');
		tabToActivate.addClass('active');

		var $contactContainer    = $('.contact-container');
		var sidebarWrapperHeight = $contactContainer.outerHeight();

		var scrollPosSetup = function(){

			var mainHeaderHeight     = $('.hero').outerHeight() + 100;
			var footerHeight         = $('footer').outerHeight() + $('.logo-bar').outerHeight() + 240;
			var footerScrollPos      = $('html').height() - (footerHeight + sidebarWrapperHeight);
			var rightSide = (window.innerWidth < 961) ? '30px' : '10%';

			if (window.innerWidth > 767) {

				if($(document).scrollTop() > mainHeaderHeight &&
					$(document).scrollTop() < footerScrollPos) {
					$contactContainer.css({
						'position' : 'fixed',
						'top' : '0px',
						'right' : rightSide
					});
				} else if ($(document).scrollTop() >= footerScrollPos ) {
					$contactContainer.css({
						'position' : 'relative',
						'top' : footerScrollPos - 500,
						'right' : ''
					});
				} else {
					$contactContainer.css({
						'position' : 'relative',
						'top' : '',
						'right' : '',
						'bottom' : ''
					});
				}
			}
		};

		$(window).scroll(function ( e ) {
			scrollPosSetup();
		});

		$( window ).resize( debouncer( function ( e ) {
		    scrollPosSetup();
		}));
	}

	//on active change, change the next/prev buttons href ids
	$('.nav-tabs li').on('cssClassChanged', function(){
		var previousHref = $(this).find('a').attr('href');
		var nextHref 	 = $(this).find('a').attr('href');

		$('.mobile-remove .previous').attr('href', previousHref);
		$('.mobile-remove .next').attr('href', nextHref);

		ga('0.send', 'pageview', {
		  'dimension5': 'DataActions Tab Clicks - Services Page'
		});
	});

	//change mobile tabs active state
	$('.tab-content .tab-pane').on('cssClassChanged', function(){
		$('.mobile-tabs').removeClass('active');
		$(this).prev().addClass('active');
	});

	$('.tab-content .mobile-tabs').on('click', function(){
		var that = this;
		var navTabId = $(this).attr('href') + '-tab';
		$('.nav-tabs li').removeClass('active');
		$(navTabId).addClass('active');
		scrollTabIntoView(that, 60);
	});

	//on previous change the active tab
	$('.previous').on('click', function(){
		var width = window.innerWidth
		|| document.documentElement.clientWidth
		|| document.body.clientWidth;

		var $activeTab  = $('.nav-tabs li.active');
		$activeTab.removeClass('active');
		if ($activeTab.prev().length) {
			$activeTab.prev().addClass('active');
		} else {
			$('.nav-tabs li:last-child').addClass('active');
		}

		if (width < 768) {
			setTimeout(function(){ scrollTabIntoView($('.tab-content .mobile-tabs.active'), 60); }, 1);
		} else {
			setTimeout(function(){ scrollTabIntoView($('.tab-contact-container'), 90); }, 1);
		}

	});

	//on next change the active tab
	$('.next').on('click', function(){
		var width = window.innerWidth
		|| document.documentElement.clientWidth
		|| document.body.clientWidth;

		var $activeTab = $('.nav-tabs li.active');
		$activeTab.removeClass('active');
		if ($activeTab.next().length) {
			$activeTab.next().addClass('active');
		} else {
			$('.nav-tabs li:first-child').addClass('active');
		}

		if (width < 768) {
			setTimeout(function(){ scrollTabIntoView($('.tab-content .mobile-tabs.active'), 60); }, 1);
		} else {
			setTimeout(function(){ scrollTabIntoView($('.tab-contact-container'), 90); }, 1);
		}

	});
	/**
	 * ===================
	 * Work Page Functions
	 * ===================
	 */

	/**
	 * Navigates to an individual work page.
	 */
	$('.work-thumb').click(function () {
		window.location.href = $(this).data("url");
	});

	/**
	 * ===================
	 * Culture Page Functions
	 * ===================
	 */
	 //send custom dimensions for camp-o signup
	$('#mc_embed_signup_scroll > div').one('click', function(){
		ga('0.send', 'pageview', {
		  'dimension2': 'Camp-O Form Interaction - Culture Page'
		});
	});
	$('#mc_embed_signup_scroll #mc-embedded-subscribe').on('click', function(){
		ga('0.send', 'pageview', {
		  'dimension1': 'Camp-O Form Submission - Culture Page'
		});
	});

	/**
	 * ===================
	 * 5in30 Page Functions
	 * ===================
	 */
	if (window.location.pathname === "/5in30") {
		$('#next-tuesday').text(closestTues);
		$('#next-wednesday').text(closestWed);
		$('#next-thursday').text(closestThur);
		$('#tuesdays').children().attr('data-date', closestTues);
		$('#wednesdays').children().attr('data-date', closestWed);
		$('#thursdays').children().attr('data-date', closestThur);

		$('form .days').on('click', 'div', function(e) {
			$('.days, .days div').removeClass('active');
			$(this).addClass('active');
			$(this).parent().addClass('active');
			var dateAndTime = $(this).attr('data-date') + ' : ' + $(this).attr('data-time');
			$('#calendar').val(dateAndTime);
		});

		$('form').on('change', '#date, #time', function(e) {
			$('.days, .days div').removeClass('active');
			$(this).addClass('black');
		});

		//5 in 30 custom GA form dimensions
		$('#contact-form > div').one('click', function(){
			ga('0.send', 'pageview', {
			  'dimension7': '5 in 30 Form Interaction - 5 in 30 Page'
			});
		});

		$('#contact-form .btn').on('click', function(){
			ga('0.send', 'pageview', {
			  'dimension6': '5 in 30 Form Submission - 5 in 30 Page'
			});
		});
	}

	/**
	 * ==================
	 * Sitewide Functions
	 * ==================
	 */
	$('.notification > .close').click(function () {
		$(this).parent().css("display", "none");
	});

	/**
	 * Adds a class if the window height exceeds the content length (so it's added for short pages).
	 */
	function adjustFooterPosition() {
		var height = window.innerHeight
		|| document.documentElement.clientHeight
		|| document.body.clientHeight;

		if (height >= $(document).height()) {
			$('.footer').addClass('affix');
		}
		else {
			$('.footer').removeClass('affix');
		}
	}

	/**
	 * Window resize handler to adjust footer position.
	 */
	$(window).resize(function () {
		adjustFooterPosition();
	});

	// Adjusts footer position on page load
	adjustFooterPosition();

	$('.mobile-menu-icon').click(function () {
		$('.nav-menu').toggle();
	});

	$('.mobile-toggle-ctrl').click(function () {
		var next = $(this).next();
		if (next.hasClass('mobile-portrait-hide')) {
			next.removeClass('mobile-portrait-hide');
			next.addClass('mobile-portrait-show');
		}
		else if (next.hasClass('mobile-portrait-show')) {
			next.addClass('mobile-portrait-hide');
			next.removeClass('mobile-portrait-show');
		}

	});

	startSlider();


	/**
	 * ===================
	 * darius touched here
	 * ===================
	 */

	// if (window.location.pathname === "/events") {
	$('ol.flex-control-nav.flex-control-paging').prepend($("<li id=\"arrow-backward\" class=\"nav-control-arrow1\"><div></div></li>"));
	$('ol.flex-control-nav.flex-control-paging').append($("<li id=\"arrow-forward\" class=\"nav-control-arrow2\"><div></div></li>"));

	// startSlider();

	$("#arrow-backward, #arrow-forward").click(function(){
		if("arrow-forward"==$(this)[0].id){
			$('.flexslider').flexslider("next");
		} else if ("arrow-backward"==$(this)[0].id){
			$('.flexslider').flexslider("prev");
		};
	})



	// $(".my-hero").css("height",  window.innerHeight);

	$(".my-hero").css("width",  window.innerWidth );

	$(".my-hero").css("height",  window.innerHeight - 60);
	$(".hero-video-overlay").css("height",  window.innerHeight - 60);

	$(window).resize(function(){


		$(".my-hero").css("width",  window.innerWidth );


    $(".my-hero").css("height",  window.innerHeight - 60);
		$(".hero-video-overlay").css("height",  window.innerHeight - 60);
  });

	// TODO handle video resize on exit fullscreen?

	$(".get-involved-arrow").click(function(){
		$('.get-involved-arrow').toggleClass("clicked-arrow");
		if($('.get-involved-arrow').hasClass("clicked-arrow")){

			scrollTabIntoView($(".container-fluid.event-container"), 90);
		} else{
			scrollTabIntoView($(".my-hero"), 90);
		}
	})




	//parseInt($("body > .modal-campo").css('top'))
	// $('body').on({
  //   'mousewheel': function(e) {
  //       if (e.target.id == 'el') return;
  //       e.preventDefault();
  //       e.stopPropagation();
  //   }
	// })
});
