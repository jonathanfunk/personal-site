(function($) {

//This will inverse the navigation colours on scroll
$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll > 0) {
        $('#masthead').addClass('nav-inverse');
    } else {
        $('#masthead').removeClass('nav-inverse');
    }
});

})( jQuery );