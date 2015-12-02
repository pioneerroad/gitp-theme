(function ($) {
    Drupal.behaviors.initbspopover = {
        attach: function (context, settings) {
            $('[data-toggle="popover"]').popover();
        }
    };
}) (jQuery);