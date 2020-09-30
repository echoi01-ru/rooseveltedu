/*
 * @file Javascripts.
 */
(function ($, Drupal) {

  Drupal.behaviors.storyFilterToggle = {
    attach: function () {
      $(".storyFilterToggle").once('storyFilterToggle').click(function () {
        $(".storyFilterTogglePanel").slideToggle("slow");
        $(".storyFilterToggle").toggleClass("open");
      });
    }
  }
})(jQuery, Drupal);