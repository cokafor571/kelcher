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