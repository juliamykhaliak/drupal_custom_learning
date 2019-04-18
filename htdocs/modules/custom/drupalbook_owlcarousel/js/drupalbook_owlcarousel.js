(function ($) {
  Drupal.behaviors.drupalBookOwlCarousel = {
    attach: function (context, settings) {
      $('.view-content #widget_pager_bottom_-block_1').owlCarousel({
        items: 5,
        margin: 5,
        nav:true,
        responsiveClass:true,
        responsive:{
          0: {
            items: 3
          },
          600:{
            items: 4
          },
          1000:{
            items: 5
          }
        }
      });
      $('.view-content #widget_pager_bottom_-block_1').addClass('owl-carousel');
    }
  };
})(jQuery);
