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

$('.hamburger-menu').on('click', function(event) {
  $(this).focus();  
  $('.bar').toggleClass('animate');
  $('#primary-menu').toggleClass('expanded');
})

$('#primary-menu a').on('click', function() {
  $('#primary-menu').removeClass('expanded');
  $('.bar').removeClass('animate'); 
}) 

})( jQuery );