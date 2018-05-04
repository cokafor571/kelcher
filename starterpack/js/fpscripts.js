(function($){
    $('figure.wp-caption.aligncenter').removeAttr('style');
    $('img.aligncenter').wrap('<figure class="centered-image" />');

    /*
     * Test if inline SVGs are supported.
     * @link https://github.com/Modernizr/Modernizr/
     */
    function supportsInlineSVG() {
        var div = document.createElement( 'div' );
        div.innerHTML = '<svg/>';
        return 'http://www.w3.org/2000/svg' === ( 'undefined' !== typeof SVGRect && div.firstChild && div.firstChild.namespaceURI );
    }

    if ( true === supportsInlineSVG() ) {
        document.documentElement.className = document.documentElement.className.replace( /(\s*)no-svg(\s*)/, '$1svg$2' );
    }
})(jQuery);
(function( $ ) {

    if ($(window).width() >= 870) {

        var $window = $( window );
            
        var approach = $('.approach-block'),
            approachMath = $('.approach-block').offset().top - 600;

        var serviceBlock = $('.full-service-list'),
            serviceBlockMath = $('.full-service-list').offset().top - 600;

        var individualService = $('.individual-service'),
            individualServiceMath = $('.individual-service').offset().top - 400;

        var homeWork = $('.home-work-section'),
            homeWorkMath = $('.home-work-section').offset().top - 600;

        var homeBrands = $('.home-brands-section'),
            homeBrandsMath = $('.home-brands-section').offset().top - 600;

        var scroll = function() { 
            scrollTop = $window.scrollTop();

            if ( scrollTop >= approachMath ) {
            approach.addClass( 'animate-element' );
            }

            if ( scrollTop >= serviceBlockMath ) {
            serviceBlock.addClass( 'animate-element' );
            }

            if ( scrollTop >= individualServiceMath ) {
            individualService.addClass( 'animate-element' );
            }

            if ( scrollTop >= homeWorkMath ) {
            homeWork.addClass( 'animate-element' );
            }

            if ( scrollTop >= homeBrandsMath ) {
            homeBrands.addClass( 'animate-element' );
            }
        };

        var raf = window.requestAnimationFrame,
            lastScrollTop = $window.scrollTop();

        if (raf) {
            loop();
        }

        function loop() {

            var scrollTop = $window.scrollTop();

            if (lastScrollTop === scrollTop) {
                raf(loop);
                return;
            } else {
                lastScrollTop = scrollTop;

                // fire scroll function if scrolls vertically
                scroll();
                raf(loop);
            }

        // console.log( 'scrolling' );
        }
    }

})( jQuery );
(function( $ ) {

    // Header BG Color
    $(window).on('scroll', function() {
        var scrollTop = $(this).scrollTop(),
            header = $('.site-header');

        if ( scrollTop > 100 ) {
            header.addClass('bg-color');
        } else {
            header.removeClass('bg-color');
        }
    });

})( jQuery );
/**
 * File skip-link-focus-fix.js.
 *
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://git.io/vWdr2
 */
(function() {
	var isIe = /(trident|msie)/i.test( navigator.userAgent );

	if ( isIe && document.getElementById && window.addEventListener ) {
		window.addEventListener( 'hashchange', function() {
			var id = location.hash.substring( 1 ),
				element;

			if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
				return;
			}

			element = document.getElementById( id );

			if ( element ) {
				if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
					element.tabIndex = -1;
				}

				element.focus();
			}
		}, false );
	}
})();
