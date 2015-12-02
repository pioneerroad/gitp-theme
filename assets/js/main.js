(function ($) {
    Drupal.behaviors.gitp = {
        attach: function (context, settings) {
            $(document).ready(responsiveStyling);

            $(window).resize(responsiveStyling);
        }
    };


    function responsiveStyling() {
        var bootstrapMediumBreakpoint   = 992;
        var headerPictureClass          = ".header-picture";
        var respnsiveHeaderPictureClass = 'header-picture-sm';

        if( $(window).width() >= bootstrapMediumBreakpoint ) {
            //remove it for larger layouts
            $(headerPictureClass).removeClass(respnsiveHeaderPictureClass);
        }

        if( $(window).width() < bootstrapMediumBreakpoint ) {
            //add our class for smaller layouts
            $(headerPictureClass).addClass(respnsiveHeaderPictureClass);
        }
    }

})(jQuery);