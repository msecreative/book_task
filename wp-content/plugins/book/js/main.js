


    (function($) {
    'use strict';

// init Isotope
var $grid = $('.bookMesonry').isotope({
 itemSelector: '.mesonaryItem',
  percentPosition: true,
  masonry: {
    columnWidth: '.grid-sizer',
    gutter:5
  }
});


// filter items on button click
$('.menu-item').on( 'click', 'li', function() {
  var filterValue = $(this).attr('data-filter');
  $grid.isotope({ filter: filterValue });
});


    }(jQuery));