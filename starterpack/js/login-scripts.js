(function( $ ) {

    // Customer Area Dashboard On Login
    $(function() {

        var login = $( '.logged-in .login-content' ),
            dashboard = '<a class="customer-dash" href="http://kelcherpromotions.com/customer-area/dashboard">Customer Dashboard</a>';

        login.append( dashboard );
    });

})( jQuery );