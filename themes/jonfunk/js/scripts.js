(function ($) {

  //This will inverse the navigation colours on scroll
  $(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll > 0) {
      $('#masthead').addClass('nav-inverse');
    } else {
      $('#masthead').removeClass('nav-inverse');
    }
  });

  $('.hamburger-menu').on('click', function (event) {
    $(this).focus();
    $('.bar').toggleClass('animate');
    $('#primary-menu').toggleClass('menu-expanded');
  })

  $('#primary-menu a').on('click', function () {
    $('#primary-menu').removeClass('menu-expanded');
    $('.bar').removeClass('animate');
  })

  $('.project-item').on('click', function (event) {
    $(this).toggleClass('item-expanded');
  });

  $(function () {
    var filterList = {
      init: function () {
        $('.project-list').mixItUp({
          selectors: {
            target: '.project-item',
            filter: '.filter'
          },
          load: {
            filter: '*'
          }
        });
      }
    };
    filterList.init();
  });

})(jQuery);