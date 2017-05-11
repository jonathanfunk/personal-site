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

$('.hamburger-menu').on('click', function() {
  $('.bar').toggleClass('animate');
  if ($('.bar').hasClass('animate')) {
    $('#primary-menu').show({width:'toggle'},350);
  } else {
    $('#primary-menu').hide({width:'toggle'},350);
  }
})

$('#primary-menu a').on('click', function() {
  $('.bar').removeClass('animate');
    if ($('.bar').hasClass('animate')) {
    $('#primary-menu').show({width:'toggle'},350);
  } else {
    $('#primary-menu').hide({width:'toggle'},350);
  }
}) 

})( jQuery );