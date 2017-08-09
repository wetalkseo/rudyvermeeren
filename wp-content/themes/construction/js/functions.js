"use strict";

/* Mute the page header background video */

/* YouTube */

var player;
function onYouTubeIframeAPIReady() {
  player = new YT.Player('ytplayer', {
    events: {
      'onReady': function() {
		player.mute()
      },
    }
  });
}

jQuery(function($) {
	/* Vimeo */

    var iframe = $('#vimeoplayer');
    if( iframe.length ) {
	    var player = $f(iframe[0]);

		player.addEvent('ready', function() {
		    player.api('setVolume', 0);
		});
	}

	var isMobile = false;
	$.support.placeholder = ('placeholder' in document.createElement('input'));

	/* Screen size (grid) */
	var	screenLarge = 1200,
		screenMedium = 992,
		screenSmall = 768;

	/* Check if on mobile */
    if(/Mobi/.test(navigator.userAgent)) {
        isMobile = true;
    }

	/*-----------------------------------------------------------------------------------*/
	/*	WordPress
	/*-----------------------------------------------------------------------------------*/

	$('[data-toggle="collapse"]').on('click', function() {
		$(this).blur();
	});

	$('#commentform .form-submit').append('<button class="btn btn-md" type="reset">' + anps.reset_button + '</button>');

	/* Search pointer events (IE, Opera mini) fix */
	$('.searchform').on('click', function(e) {
		if ( $(e.target).is("div") ) {
			$(this).find('#searchsubmit').click();
		}
	});

	/* Search form placeholder */
	$('.searchform input[type="text"]').attr('placeholder', anps.search_placeholder);

	/* VC grid changes */
	$(window).on('grid:items:added', function() {
		$('.vc_btn3-left').find('a').attr('class', 'btn btn-md btn-gradient btn-shadow');
	});

    if( $('.megamenu-wrapper').length ) {
        $('.megamenu-wrapper').each(function() {
            var megaMenu = $(this);

            megaMenu.children('ul').wrap('<div class="megamenu" />').children().unwrap();
            var cols = megaMenu.find('.megamenu').children().length;
            megaMenu.find('.megamenu').children().each(function() {
                var title = $(this).children('a:first-of-type');
                $(this).find('ul').removeClass('sub-menu').prepend('<li><span class="megamenu-title">' + title.text() + '</span></li>');
                title.remove();
                $(this).find('li').attr('style', '');
                $(this).replaceWith('<div class="col-lg-' + (12/cols) + '">' + $(this).html() + '</div>');
            });
        });
	}

	/*-----------------------------------------------------------------------------------*/
	/*	Recent News
	/*-----------------------------------------------------------------------------------*/
	$('.recent-news[data-owlcolumns]').each(function(){
		var el = $(this);
		var owl = $('.owl-carousel', this);
		var owlcolumns = el.data('owlcolumns');
		var owlSettings = {
	        loop: el.find('.post').length <= owlcolumns ? false : true,
	        margin: 30,
	        responsiveClass: true,
	        rtl: ($('html[dir="rtl"]').length > 0),
	        responsive: {
	            0: {
	                items: 1,
	                slideBy: 1
	            },
	            500: {
	                items: 2,
	                slideBy: 2
	            },
	            992: {
	                items: owlcolumns,
	                slideBy: owlcolumns
	            }
	        }
	    }
	    owl.owlCarousel(owlSettings);

	    owl.siblings('.row').find('.owlnext').on('click', function(){
	    	owl.trigger('next.owl.carousel');
	    });

	    owl.siblings('.row').find('.owlprev').on('click', function(){
	    	owl.trigger('prev.owl.carousel');
	    });

	})

	/*-----------------------------------------------------------------------------------*/
	/*	Testimonials
	/*-----------------------------------------------------------------------------------*/

    $('.testimonials .owl-carousel, .anps-twitter .owl-carousel').each(function() {
    	var el = $(this);
	    var owlSettings = {
			loop:false,
	        margin: 0,
	        responsiveClass:true,
	        mouseDrag: false,
	        touchDrag: false,
	        rtl: ($('html[dir="rtl"]').length > 0),
	        responsive:{
	            0:{
	                items: 1,
	                nav: false,
	                slideBy: 1
	            }
	        }
	    }

	    if( el.children('li').length > 1 ) {
	    	owlSettings.loop = true;
	    	owlSettings.navigation = true;
	    	owlSettings.mouseDrag = true;
	    	owlSettings.touchDrag = true;
	    }

	    el.owlCarousel(owlSettings);

	    // Custom Navigation Events
	    el.parents('.testimonials, .anps-twitter').find('.owlnext').on('click', function(){
	    	el.trigger('next.owl.carousel');
	    });

	    el.parents('.testimonials, .anps-twitter').find('.owlprev').on('click', function(){
	    	el.trigger('prev.owl.carousel');
	    });
    });

	/*-----------------------------------------------------------------------------------*/
	/*	Projects
	/*-----------------------------------------------------------------------------------*/

	/* Reset Pagination */

	function resetPagination(items, itemClass, perPage) {
		var pageTemp = 0;

		items.find(itemClass).each(function(item) {
			var tempClass = $(this).attr('class');

			$(this).attr('class', tempClass.replace(/(page-[1-9][0-9]*)/g, ''));
		});

		items.find(itemClass).each(function(index) {
			if( index % perPage === 0 ) {
				pageTemp += 1;
			}

			items.find(itemClass).eq(index).addClass('page-' + pageTemp);
		});
	}

	/* Main logic */

	window.onload = function() {
		$('.projects').each(function() {
			var items = $(this).find('.projects-content');
			var itemClass = '.projects-item';
			var filter = $(this).find('.filter');
			var initialFilter = '';
			var hash = window.location.hash.replace('#', '');

			if( hash && filter.find('[data-filter="' + hash + '"]').length ) {
				initialFilter = '.' + hash;
				filter.find('.selected').removeClass('selected');
				filter.find('[data-filter="' + hash + '"]').addClass('selected');
			}

			if( $(this).find('.projects-pagination').length ) {
				var pageNum = 1;
				var perPage = 3;
				var numPages = Math.ceil(items.find(itemClass).length / perPage);

				if( window.innerWidth < screenSmall ) {
					perPage = 2;
				} else if( window.innerWidth < screenMedium ) {
					perPage = 4;
				} else if ( items.find(itemClass).hasClass('col-md-3') ) {
					perPage = 4;
				}

				if( numPages < 2 ) {
					$('.projects-pagination').css('visibility', 'hidden');
				} else {
					$('.projects-pagination').css('visibility', 'visible');
				}

				$(window).on('resize', function() {
					if( window.innerWidth < screenSmall ) {
						perPage = 2;
					} else if( window.innerWidth < screenMedium ) {
						perPage = 4;
					} else if ( items.find(itemClass).hasClass('col-md-3') ) {
						perPage = 4;
					} else {
						perPage = 3;
					}

					filter.find('.selected').click();
				});

				resetPagination(items, itemClass, perPage);

				/* Layout */
				items.isotope({
					itemSelector: itemClass,
					layoutMode  : 'fitRows',
					filter      : '.page-' + pageNum + initialFilter,
					transitionDuration: '.3s',
                    isOriginLeft: !$('html[dir="rtl"]').length,
					hiddenStyle: {
						opacity: 0,
					},
					visibleStyle: {
						opacity: 1,
					}
				});

                /* Remove empty filter category buttons */
                filter.find('li').each(function() {
                    var className = $(this).children('button').attr('data-filter');

                    if( className === '*' ) {
                        return true;
                    }

                    if (!items.find('.' + className).length) {
                        $(this).remove();
                    }
                });

				/* Filtering */
				filter.find('button').on('click', function(e) {
					var value = $(this).attr('data-filter');
					value = (value != '*') ? '.' + value : value;
					pageNum = 1;

					numPages = Math.ceil(items.find(itemClass + value).length / perPage);

					if( numPages < 2 ) {
						$('.projects-pagination').css('visibility', 'hidden');
					} else {
						$('.projects-pagination').css('visibility', 'visible');
					}

					resetPagination(items, itemClass + value, perPage)
					items.isotope({ filter: value + '.page-1' });

					/* Change select class */
					filter.find('.selected').removeClass('selected');
					$(this).addClass('selected');
				});

				$('.projects-pagination button').on('click', function() {
					var value = $('.filter .selected').attr('data-filter');
					value = (value != '*') ? '.' + value : value;

					if( $(this).hasClass('prev') ) {
						if( pageNum - 1 == 0 ) {
							pageNum = numPages;
						} else {
							pageNum -= 1;
						}
					} else {
						if( pageNum + 1 > numPages ) {
							pageNum = 1;
						} else {
							pageNum += 1;
						}
					}

					items.isotope({ filter: value + '.page-' + pageNum });
				});
			} else {
				/* Layout */
				items.isotope({
					itemSelector: itemClass,
					layoutMode  : 'fitRows',
					filter      : initialFilter,
                    isOriginLeft: !$('html[dir="rtl"]').length,
				});

				/* Filtering */
				filter.find('button').on('click', function(e) {
					var value = $(this).attr('data-filter');
					value = (value != '*') ? '.' + value : value;

					items.isotope({ filter: value });

					/* Change select class */
					filter.find('.selected').removeClass('selected');
					$(this).addClass('selected');
				});
			}

			/* Add background to parent row */
			$('.projects-recent').parents('.vc_row').addClass('bg-dark');
		});
	}

	/*-----------------------------------------------------------------------------------*/
	/*	Main menu
	/*-----------------------------------------------------------------------------------*/

	/* Add Support for touch devices for desktop menu */
	$('#main-menu').doubleTapToGo();

	function moveNav() {
		/* Create ghost-na-wrap if it doesn't exist */
		if ( !$('.ghost-nav-wrap').length ) {
			$('body').prepend('<div class="ghost-nav-wrap empty site-navigation"></div>')
		}

		if ( (window.innerWidth < screenLarge) && $('.ghost-nav-wrap').hasClass('empty') ) {
			/* Mobile */
	    	$("nav.site-navigation .mobile-wrap").detach().appendTo('.ghost-nav-wrap');
	    	$('.ghost-nav-wrap').removeClass('empty');
	    	$('.main-menu .menu-item-has-children').each(function(){
				$( "> ul", this ).hide();
				$('.megamenu').hide();
			});
			$('.header-wrap').append($('.mini-cart'));
	    } else if ( (window.innerWidth > screenLarge - 1) && !$('.ghost-nav-wrap').hasClass('empty') ) {
	    	/* Desktop */
	    	$('.ghost-nav-wrap .mobile-wrap').detach().appendTo('nav.site-navigation');
	    	$('.ghost-nav-wrap').addClass('empty');
	    	$('.main-menu .menu-item-has-children').each(function(){
				$( '> ul', this ).show();
				$('.megamenu').show();
			});
			if( $('.widget_anpsminicart').length ) {
				$('.widget_anpsminicart').append($('.mini-cart'));
			} else {
				$('.main-menu').append($('.mini-cart'));
			}
	    }

	    /* Reset if mobile nav is open and window is resized to desktop mode */
	    if ((window.innerWidth > screenLarge - 1) && $('html').hasClass('show-menu')) {
	    	$('.burger').toggleClass('active');
	    	$('html').removeClass('show-menu');
	    }
	}

	moveNav();
	$( window ).resize(function() {
		moveNav();
		if ($('body').hasClass('stickyheader')) {
			setSticky();
		}

        if($('html').hasClass('show-menu')) {
            window.menuContentResize = true;
        } else {
            window.menuContentResize = false;
        }
	});

	$('.burger').on('click', mobileMenuToggle);

	function mobileMenuToggle() {
	    $('.burger').toggleClass('active');
	    $(window).scrollTop(0);
	    $(this).blur();

        $('html').toggleClass('show-menu');

        if (!$('html').hasClass('show-menu')) {
            window.menuJustClosed = true;

            if(window.menuContentResize) {
                setTimeout(window.vc_fullWidthRow, 400);
            }
        } else {
            window.menuJustOpened = true;
        }
	};

	$('.main-menu .menu-item-has-children').each(function(){
		$(this).append('<span class="mobile-showchildren"><i class="fa fa-angle-down"></i></span>');
	});

	$(".mobile-showchildren").on('click', function(){
		$(this).siblings("ul, .megamenu").toggle('300');
	});



	/* Menu search */

	$('.menu-search-toggle').on('click', function() {
		$('.menu-search-form').toggleClass('hide');
		$(this).blur();
	});

	/* push submenu to the left if no space on the right: */

	function isSubmenuVisible() {
		var el = $(this);
		var windowWidth = $(window).width();
		var elementPosition = el.offset().left;
		var submenuWidth = '204';
		if (windowWidth - elementPosition - submenuWidth > submenuWidth ) {
		    $(this).removeClass('children-right')

		} else {
		  $(this).addClass('children-right')
		  console.log(windowWidth);
		}
	}
	$('.site-navigation ul ul li').on('mouseenter', isSubmenuVisible);

    window.$stickyEl = $('.site-header');

    if( $('.preheader-wrap').length ) {
        $stickyEl = $('.header-wrap');
    }

    window.topbarHeight = 0;
    window.headerHeight = 0;
    window.adminBarHeight = 0;
    window.topOffsetSticky = 0;

    window.addSticky = function() {
        $stickyEl.addClass('sticky');
        if(!$stickyEl.hasClass('transparent')){
            $('.site-main').css('padding-top', headerHeight + 'px' );
        }
        if (topOffsetSticky != '0') {
            $stickyEl.css({top:adminBarHeight + 'px'});
        }
    }

    window.removeSticky = function() {
        $stickyEl.removeClass('sticky');
        $('.site-main').css('padding-top', '0' );
        $stickyEl.stop(true).css('top','');
    }

	function setSticky() {
		if ( $('.top-bar').length ) {
			topbarHeight = $('.top-bar').outerHeight();
		}

		headerHeight = $('.site-header').outerHeight();

        if( $('.site-header').hasClass('full-width') ) {
            headerHeight = $('.header-wrap').outerHeight();
        }

		if ($('#wpadminbar').length) {
			adminBarHeight = $('#wpadminbar').outerHeight();
		}

		var offset = topbarHeight;

		topOffsetSticky = adminBarHeight;

		if( $('header.bottom').length ) {
			offset += $(window).innerHeight();
			offset -= headerHeight;
		}

		if (offset <= 0) {
			offset = 1;
		}

		if( $('.preheader-wrap').length ) {
			offset += $('.preheader-wrap').innerHeight();
		}

		if (window.innerWidth > screenLarge - 1) {
            if(typeof Waypoint !== 'undefined') {
    			var headerwaypoint = new Waypoint({
    				element: $('body'),
    				handler: function(direction) {
    					if ((direction == 'down') && (window.innerWidth > screenLarge - 1) && $('body').hasClass('stickyheader')) {
                            window.addSticky();
    					} else if ($stickyEl.hasClass('sticky')) {
                            window.removeSticky();
    					}
    				},
    				offset: -offset
    			});
            }
		}
	}

	$(window).on('load', function() {
        setSticky();
	});

	/*-----------------------------------------------------------------------------------*/
	/*	Gallery Thumbnails
	/*-----------------------------------------------------------------------------------*/

	var openGallery = false;

	function changeThumb(el) {
		var $gallery = el.parents('.gallery-fs');

		if( !el.hasClass('selected') ) {
			$gallery.find('> figure > img').attr('src', el.attr('href'));
			$gallery.find('> figure > figcaption').html(el.attr('title'));
			$gallery.find('.gallery-fs-thumbnails .selected').removeClass('selected');
			el.addClass('selected');
		}
	}

	var thumbCol = 6;
	var galleryParent = $('.gallery-fs').parents('[class*="col-"]');
	var galleryParentSize = Math.floor(galleryParent.outerWidth() / galleryParent.parent().outerWidth() * 100);

	if( galleryParentSize < 60 ) { thumbCol = 5; }
	if( galleryParentSize == 100 ) { thumbCol = 9; }



	var navText = ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'];

	if( $('html[dir="rtl"]').length ) {
		navText.reverse();
	}

    function setOwlNav(e){
        var offset = '0';

		if(e.page.size >= e.item.count) {
			if ($('html[dir="rtl"]').length) {
				offset = '-83';
			} else {
				offset = '83';
			}
		}

        $(e.target).siblings('.gallery-fs-nav').children('.gallery-fs-fullscreen').css('transform', 'translateX(' + offset + 'px)');
	}

	$('.gallery-fs-thumbnails').owlCarousel({
		onInitialized: setOwlNav,
		onResized: setOwlNav,
	    loop: false,
	    margin: 17,
	    nav: true,
	    navText: navText,
	    rtl: ($('html[dir="rtl"]').length > 0),
	    responsive: {
	        0:    { items: 2 },
	        600:  { items: 4 },
	        1000: { items: thumbCol },
	    },
	});

	$('.gallery-fs-thumbnails a').swipebox({
		hideBarsDelay : -1,
		afterOpen: function() {
			if( !openGallery ) {
				$.swipebox.close();
			}
			openGallery = false;
		},
		nextSlide: function() {
			var index = $('.gallery-fs-thumbnails .owl-item a.selected').parent().index();

			if( index < $('.gallery-fs-thumbnails .owl-item').length - 1 ) {
				changeThumb($('.gallery-fs-thumbnails .owl-item').eq(index+1).children('a'));
			}
		},
		prevSlide: function() {
			var index = $('.gallery-fs-thumbnails .owl-item a.selected').parent().index();

			if( index > 0 ) {
				changeThumb($('.gallery-fs-thumbnails .owl-item').eq(index-1).children('a'));
			}
		},
	});

	$('.gallery-fs-thumbnails .owl-item a').on('click', function() {
		changeThumb($(this));
	});

	$('.gallery-fs-fullscreen').on('click', function(e) {
		e.preventDefault();
		openGallery = true;

		var $gallery = $(this).parents('.gallery-fs');

		if( $gallery.find('.gallery-fs-thumbnails').length ) {
			$gallery.find('.gallery-fs-thumbnails .owl-item a.selected').eq(0).click();
		}
	});

	/* Only one thumbnail */

	if( !$('.gallery-fs-thumbnails').length ) {
		$('.gallery-fs-fullscreen').css({
			'right': '21px'
		});
		$('.gallery-fs-fullscreen').swipebox({ hideBarsDelay : 1 })
	}

	/* Gallery */

	$('.gallery a').swipebox({
		hideBarsDelay : -1,
	});

	/*-----------------------------------------------------------------------------------*/
	/*	Fixed Footer
	/*-----------------------------------------------------------------------------------*/
	$(window).on('load', function() {
		if( $('.fixed-footer').length ) {
			fixedFooter();

			$(window).on('resize',function() {
				fixedFooter();
			});
		}
	})
	function fixedFooter() {
		$('.site-main').css('margin-bottom', $('.site-footer').innerHeight());
	}

	/*-----------------------------------------------------------------------------------*/
	/*	Quantity field
	/*-----------------------------------------------------------------------------------*/

	$('.quantity input[type="button"]').on('click', function(e) {
		var field = $(this).parent().find('.quantity-field'),
			val = parseInt(field.val(), 10),
			step = parseInt(field.attr('step'), 10) || 0,
			min = parseInt(field.attr('min'), 10) || 1,
			max = parseInt(field.attr('max'), 10) || 0;

		if( $(this).val() === '+' && (val < max || !max) ) {
			/* Plus */
			field.val(val + step);
		} else if ( $(this).val() === '-' && val > min ) {
			/* Minus */
			field.val(val - step);
		}
                field.trigger('change');
	});

	/*-----------------------------------------------------------------------------------*/
	/*	Featured Element (lightbox)
	/*-----------------------------------------------------------------------------------*/

	$('.featured-video .featured-header a, .featured-image .featured-header a').swipebox({ hideBarsDelay : 1 });

	/*-----------------------------------------------------------------------------------*/
	/*	IE9 Placeholders
	/*-----------------------------------------------------------------------------------*/

	if (!$.support.placeholder) {
		$('[placeholder]').on('focus', function () {
			if ($(this).val() == $(this).attr('placeholder')) {
				$(this).val('');
			}
		}).on('blur', function() {
			if($(this).val() == "") {
				$(this).val($(this).attr('placeholder'));
			}
		}).blur();

		$('[placeholder]').parents('form').on('submit', function () {
			if( $('[placeholder]').parents('form').find('.alert') ) { return false; }

			$(this).find('[placeholder]:not(.alert)').each(function() {
				if ($(this).val() == $(this).attr('placeholder')) {
					$(this).val('');
				}
			});
		});
	}
	/*-----------------------------------------------------------------------------------*/
	/*	Is on screen?
	/*-----------------------------------------------------------------------------------*/

	jQuery.fn.isOnScreen = function(){

	    var win = jQuery(window);

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

	/*-----------------------------------------------------------------------------------*/
	/*	Counter
	/*-----------------------------------------------------------------------------------*/

	function checkForOnScreen() {
	    $('.counter-number').each(function(index) {
	      if(!$(this).hasClass('animated') && $('.counter-number').eq(index).isOnScreen()) {
	        $('.counter-number').eq(index).countTo({
	          speed: 5000
	        });
	        $('.counter-number').eq(index).addClass('animated');
	      }
	    });
	  }

	checkForOnScreen();

	$(window).scroll(function() {
		checkForOnScreen();
 	});


	/*-----------------------------------------------------------------------------------*/
	/*	Page Header
	/*-----------------------------------------------------------------------------------*/

	function pageHeaderVideoSize() {
		$(".page-header iframe").height($(window).width()/1.77777777778);
	}

	if( $('.page-header').length ) {
		pageHeaderVideoSize();
		$(window).on('resize', pageHeaderVideoSize);

		if( isMobile ) {
			$('.page-header').find('.page-header-video').remove();
		}

		if( $('#ytplayer') ) {
			$('body').append('<script src="https://www.youtube.com/player_api">');
		}
	}

	/*-----------------------------------------------------------------------------------*/
	/*	Google Maps
	/*-----------------------------------------------------------------------------------*/

	/* Helper function to check if a number is a float */
	function isFloat(n){
	    return parseFloat(n.match(/^-?\d*(\.\d+)?$/))>0;
	}

	/* Check if a string is a coordinate */
	function checkCoordinates(str) {
		if( !str ) { return false; }

		str = str.split(',');
		var isCoordinate = true;

		if( str.length !== 2 || !isFloat(str[0].trim()) || !isFloat(str[1].trim()) ) {
			isCoordinate = false;
		}

		return isCoordinate;
	}

  	$('.map').each(function() {
	    /* Options */
	    var gmap = {
			zoom   : ($(this).attr('data-zoom')) ? parseInt($(this).attr('data-zoom')) : 15,
			address: $(this).attr('data-address'),
			markers: $(this).attr('data-markers'),
			icon   : $(this).attr('data-icon'),
			typeID : $(this).attr('data-type'),
			ID     : $(this).attr('id'),
			styles : $(this).attr('data-styles') ? JSON.parse($(this).attr('data-styles')): '',
	    };

	    var gmapScroll = ($(this).attr('data-scroll')) ? $(this).attr('data-scroll') : 'false';
	    var markersArray = [];
	    var bound = new google.maps.LatLngBounds();

	    if( gmapScroll == 'false' ) {
			gmap.draggable = false;
			gmap.scrollwheel = false;
	    }

	    if( gmap.markers ) {
	    	gmap.markers = gmap.markers.split('|');

	    	/* Get markers and their options */
			gmap.markers.forEach(function(marker) {
				if( marker ) {
					marker = $.parseJSON(marker);

					if( checkCoordinates(marker.address) ) {
						marker.position = marker.address.split(',');
						delete marker.address;
					}

					markersArray.push(marker);
				}
		    });

            /* Initialize map */
			$('#' + gmap.ID).gmap3({
                zoom       : gmap.zoom,
                draggable  : gmap.draggable,
                scrollwheel: gmap.scrollwheel,
                mapTypeId  : google.maps.MapTypeId[gmap.typeID],
                styles     : gmap.styles
            }).on({
                'tilesloaded': function() {
                    if( typeof window.anpsMapsLoaded !== 'undefined' ) {
                        window.anpsMapsLoaded();
                    }
                }
            }).marker(markersArray).then(function(results) {
                var center = null;

                if( typeof results[0].position.lat !== 'function' ||
                    typeof results[0].position.lng !== 'function' ) {
                    return false;
                }

                results.forEach(function(m, i) {
                    if( markersArray[i].center ) {
                        center = new google.maps.LatLng(m.position.lat(), m.position.lng());
                    } else {
                        bound.extend(new google.maps.LatLng(m.position.lat(), m.position.lng()));
                    }
                });

                window.anpsMarkers = results;

                if( !center ) {
                    center = bound.getCenter();
                }

                this.get(0).setCenter(center);
            }).infowindow({
                content: ''
            }).then(function (infowindow) {
                var map = this.get(0);
                this.get(1).forEach(function(marker) {
                    if( marker.data !== '' ) {
                        marker.addListener('click', function() {
                            infowindow.setContent(decodeURIComponent(marker.data));
                            infowindow.open(map, marker);
                        });
                    }
                });
            });
	    } else {
            console.error('No markers found. Add markers to the Google maps item using Visual Composer.');
        }
  	}); /* Each Map element */

	/*-----------------------------------------------------------------------------------*/
	/*	Widgets
	/*-----------------------------------------------------------------------------------*/

	/* Calendar */

	var $calendars = $('.calendar_wrap table');

	function calendarSize() {
		$calendars.each(function() {
			var $calendarTD = $(this).find('td');
			var $calendarTH = $(this).find('th');

			$calendarTD.css('line-height', $calendarTH.width() + 'px');
		});
	}

	calendarSize();

	$(window).on('resize', calendarSize);

    /*-----------------------------------------------------------------------------------*/
	/*	Accordions & tabs # URL open
	/*-----------------------------------------------------------------------------------*/

    if (window.location.hash && $('.tabs, .panel')) {
        var el = $('[href="' + window.location.hash + '"]');

        if (el.length) {
            el.click();
        }
    }

	/*-----------------------------------------------------------------------------------*/
	/*	Post Carousel
	/*-----------------------------------------------------------------------------------*/

	$('.post-carousel').owlCarousel({
	    loop: true,
	    margin: 0,
	    nav: true,
	    navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
	    responsive: {
	        0: {
	            items:1
	        }
	    }
	});

	/*-----------------------------------------------------------------------------------*/
	/*	WooCommerce
	/*-----------------------------------------------------------------------------------*/

	/* Add button class to WooCommerce AJAX button */

	$('body').on('added_to_cart',function(e) {
		$('.added_to_cart').addClass('btn btn-md btn-light');
	});

	/* Ordering submit (needed due to select-wrapper) */

	$('.ordering select').on('change', function() {
		$(this).parents('.ordering').submit();
	});

	/* Demo Notice */

	function demoNotice() {
		$('.site-header, .woocommerce-demo-store .top-bar').css('margin-top', $('.demo_store_wrapper').innerHeight());
	}

	if( $('.demo_store_wrapper').length ) {
		$(window).on('resize', demoNotice);
		demoNotice();
	}

	/* Wrap select for styling purpuses */

	$('select.dropdown_product_cat, select.dropdown_layered_nav_color, .widget_archive select, .widget_categories select').wrap('<div class="select-wrapper"></div>');

	/* Review Form Reset */

	$('#review_form').on('reset', function() {
		$(this).find('.stars').removeClass('selected');
		$(this).find('.stars .active').removeClass('active');
	});

    /*-----------------------------------------------------------------------------------*/
    /*  Scroll to top button
    /*-----------------------------------------------------------------------------------*/

    /* Hide button */
    $(window).on('scroll', function(){
        if ($(this).scrollTop() > 100) {
            $('.scroll-top').removeClass('scroll-top-hide');
        } else {
            $('.scroll-top').addClass('scroll-top-hide');
        }
    });

    /* Go to top */
    $('.scroll-top').on('click', function(){
        $('html, body').animate({
            scrollTop : 0
        }, 800);

        $(this).blur();
    });

	/*-----------------------------------------------------------------------------------*/
	/*	Overwriting Visual Composer Sizing Function
	/*-----------------------------------------------------------------------------------*/

    window.vc_rowBehaviour = function() {
        function fullWidthRow() {
            var $elements = $('[data-vc-full-width="true"]');
            $.each($elements, function(key, item) {
                    /* Anpthemes */
                    var verticalOffset = 0;
                    if ($('.vertical-menu').length && window.innerWidth > 992) {
                        verticalOffset = $('.site-header.vertical').innerWidth();
                    }

                    var boxedOffset = 0;
                    if ($('body.boxed').length && window.innerWidth > 992) {
                        boxedOffset = ($('body').innerWidth() - $('.site-main').innerWidth()) / 2;
                    }

                    var $el = $(this);
                    $el.addClass("vc_hidden");
                    var $el_full = $el.next(".vc_row-full-width");
                    $el_full.length || ($el_full = $el.parent().next(".vc_row-full-width"));
                    var el_margin_left = parseInt($el.css("margin-left"), 10),
                        el_margin_right = parseInt($el.css("margin-right"), 10),
                        offset = 0 - $el_full.offset().left - el_margin_left,
                        width = $(window).width() - verticalOffset - boxedOffset * 2,
                        positionProperty = $('html[dir="rtl"]').length ? 'right' : 'left';

                    if( positionProperty === 'right' ) {
                        verticalOffset = 0;
                    }

                    /* If the mobile menu was just closed */
    				if( window.menuJustClosed || $('.show-menu').length ) {
    					if( !window.menuJustOpened ) {
    						offset -= $('.ghost-nav-wrap').innerWidth();
    					}
    				}

                    var options = {
                        'position': 'relative',
                        'box-sizing': 'border-box',
                        'width': width
                    };
                    options[positionProperty] = offset + verticalOffset + boxedOffset;

                    $el.css(options);

                    if (!$el.data("vcStretchContent")) {
                        var padding = -1 * offset - verticalOffset - boxedOffset;
                        0 > padding && (padding = 0);
                        var paddingRight = width - padding - $el_full.width() + el_margin_left + el_margin_right;
                        0 > paddingRight && (paddingRight = 0),
                            $el.css({
                                "padding-left": padding + "px",
                                "padding-right": paddingRight + "px"
                            })
                    }
                    $el.attr("data-vc-full-width-init", "true"),
                        $el.removeClass("vc_hidden")
                }),
                $(document).trigger("vc-full-width-row", $elements)
        }
        window.vc_fullWidthRow = fullWidthRow;

        function parallaxRow() {
            var vcSkrollrOptions, callSkrollInit = !1;
            return window.vcParallaxSkroll && window.vcParallaxSkroll.destroy(),
                $(".vc_parallax-inner").remove(),
                $("[data-5p-top-bottom]").removeAttr("data-5p-top-bottom data-30p-top-bottom"),
                $("[data-vc-parallax]").each(function() {
                    var skrollrSpeed, skrollrSize, skrollrStart, skrollrEnd, $parallaxElement, parallaxImage, youtubeId;
                    callSkrollInit = !0,
                        "on" === $(this).data("vcParallaxOFade") && $(this).children().attr("data-5p-top-bottom", "opacity:0;").attr("data-30p-top-bottom", "opacity:1;"),
                        skrollrSize = 100 * $(this).data("vcParallax"),
                        $parallaxElement = $("<div />").addClass("vc_parallax-inner").appendTo($(this)),
                        $parallaxElement.height(skrollrSize + "%"),
                        parallaxImage = $(this).data("vcParallaxImage"),
                        youtubeId = vcExtractYoutubeId(parallaxImage),
                        youtubeId ? insertYoutubeVideoAsBackground($parallaxElement, youtubeId) : "undefined" != typeof parallaxImage && $parallaxElement.css("background-image", "url(" + parallaxImage + ")"),
                        skrollrSpeed = skrollrSize - 100,
                        skrollrStart = -skrollrSpeed,
                        skrollrEnd = 0,
                        $parallaxElement.attr("data-bottom-top", "top: " + skrollrStart + "%;").attr("data-top-bottom", "top: " + skrollrEnd + "%;")
                }),
                callSkrollInit && window.skrollr ? (vcSkrollrOptions = {
                        forceHeight: !1,
                        smoothScrolling: !1,
                        mobileCheck: function() {
                            return !1
                        }
                    },
                    window.vcParallaxSkroll = skrollr.init(vcSkrollrOptions),
                    window.vcParallaxSkroll) : !1
        }

        function fullHeightRow() {
            var $element = $(".vc_row-o-full-height:first");
            if ($element.length) {
                var $window, windowHeight, offsetTop, fullHeight;
                $window = $(window),
                    windowHeight = $window.height(),
                    offsetTop = $element.offset().top,
                    windowHeight > offsetTop && (fullHeight = 100 - offsetTop / (windowHeight / 100),
                        $element.css("min-height", fullHeight + "vh"))
            }
            $(document).trigger("vc-full-height-row", $element)
        }

        function fixIeFlexbox() {
            var ua = window.navigator.userAgent,
                msie = ua.indexOf("MSIE ");
            (msie > 0 || navigator.userAgent.match(/Trident.*rv\:11\./)) && $(".vc_row-o-full-height").each(function() {
                "flex" === $(this).css("display") && $(this).wrap('<div class="vc_ie-flexbox-fixer"></div>')
            })
        }
        var $ = window.jQuery;
        $(window).off("resize.vcRowBehaviour").on("resize.vcRowBehaviour", fullWidthRow).on("resize.vcRowBehaviour", fullHeightRow),
            fullWidthRow(),
            fullHeightRow(),
            fixIeFlexbox(),
            vc_initVideoBackgrounds(),
            parallaxRow()
    }
    /* One page support */

    var onePageLinks = $('.site-navigation a[href*="#"]:not([href="#"]):not([href*="="])');

    if( !$('.home').length ) {
        onePageLinks.each(function() {
            var href = $(this).attr('href');
            if( href.indexOf('#') === 0 ) {
                $(this).attr('href', anps.home_url + href);
            }
        });
    }
    onePageLinks.on('click', function(e) {
        if( window.innerWidth > 1199 ) {

            var href = $(this).attr('href');

            if( !$('.home').length || href.indexOf('#') !== 0 ) {
                window.location = href;
                e.preventDefault();
                return false;
            } else {
                var target = $($(this).attr('href'));
                var offset = 30; /* Desired spacing */

                if( $('#wpadminbar').length ) {
                    offset += $('#wpadminbar').height();
                }

                if( $('.stickyheader').length ) {
                    offset += $('.site-header').height();
                }

                if (target.length) {
                    var targetoffset = target.offset().top - offset;
                    $('html,body').animate({
                        scrollTop: targetoffset
                    }, 1000, function () {
                        history.pushState(null, null, href);
                    });

                    return false;
                }
            }
        } else {
            mobileMenuToggle();
        }
    });

    $('.project-mobile-hover').on('click', function (e) {
        if($(this).css('opacity') !== '1') {
            e.preventDefault();
        }
    });

    if(isMobile) {
        $('.projects').addClass('projects-mobile');
    }
});
