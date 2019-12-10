jQuery(document).ready(function( $ ) {

  // hero slider : homepage
  $('.hero-slider').owlCarousel({
    items: 1,
    margin: 0,
    nav: false,
    dots: true,
    autoplay: true,
    rewind: true,
  });

  // hero slider : homepage
  $('.owl-carousel').owlCarousel({
    items: 1,
    margin: 0,
    nav: true,
    dots: false,
    autoplay: true,
    rewind: true,
  });

  // add show class in accordion

  $('.accordion .card:first-child .collapse').addClass('show');



});