(function($) {
    "use strict";

    window.eltd = {};
    eltd.modules = {};

    eltd.scroll = 0;
    eltd.window = $(window);
    eltd.document = $(document);
    eltd.windowWidth = $(window).width();
    eltd.windowHeight = $(window).height();
    eltd.body = $('body');
    eltd.html = $('html, body');
    eltd.menuDropdownHeightSet = false;
    eltd.defaultHeaderStyle = '';
    eltd.minVideoWidth = 1500;
    eltd.videoWidthOriginal = 1280;
    eltd.videoHeightOriginal = 720;
    eltd.videoRatio = 1.61; // golden ration for video
    eltd.boxedLayoutWidth = 1280;
    
    $(document).ready(function(){
        eltd.scroll = $(window).scrollTop();
    });


    $(window).resize(function() {
        eltd.windowWidth = $(window).width();
        eltd.windowHeight = $(window).height();
    });


    $(window).scroll(function(){
        eltd.scroll = $(window).scrollTop();
    });

})(jQuery);