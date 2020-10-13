/*
 * @file Javascripts.
 */
(function ($, Drupal) {

  Drupal.behaviors.storyFilterToggle = {
    attach: function () {
      /* Expand the exposed filter form if there is a query string */
      if (window.location.href.indexOf('?') !== -1) {
        $('.storyFilterTogglePanel').once('storyFilterTogglePanel').slideToggle();
      }
      /* Toggle the exposed filter form */
      $('.storyFilterToggle').once('storyFilterToggle').click(function () {
        $('.storyFilterTogglePanel').slideToggle('slow');
        $('.storyFilterToggle').toggleClass('open');
      });
    }
  }
})(jQuery, Drupal);