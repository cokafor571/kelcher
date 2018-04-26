(function( $ ) {
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