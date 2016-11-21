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
(function ($) {
    "use strict";

    var common = {};
    eltd.modules.common = common;

    common.eltdIsTouchDevice = eltdIsTouchDevice;
    common.eltdDisableSmoothScrollForMac = eltdDisableSmoothScrollForMac;
    common.eltdInitAudioPlayer = eltdInitAudioPlayer;
    common.eltdPostGallerySlider = eltdPostGallerySlider;
    common.eltdFluidVideo = eltdFluidVideo;
    common.eltdPrettyPhoto = eltdPrettyPhoto;
    common.eltdPreloadBackgrounds = eltdPreloadBackgrounds;
    common.eltdEnableScroll = eltdEnableScroll;
    common.eltdDisableScroll = eltdDisableScroll;
    common.eltdWheel = eltdWheel;
    common.eltdKeydown = eltdKeydown;
    common.eltdPreventDefaultValue = eltdPreventDefaultValue;
    common.eltdInitSelfHostedVideoPlayer = eltdInitSelfHostedVideoPlayer;
    common.eltdSelfHostedVideoSize = eltdSelfHostedVideoSize;
    common.eltdInitBackToTop = eltdInitBackToTop;
    common.eltdBackButtonShowHide = eltdBackButtonShowHide;
    common.eltdInitParallax = eltdInitParallax;
    common.eltdUnconveringFooter = eltdUnconveringFooter;

    $(document).ready(function () {
        eltdIsTouchDevice();
        eltdDisableSmoothScrollForMac();
        eltdInitAudioPlayer();
        eltdFluidVideo();
        eltdPrettyPhoto();
        eltdPostGallerySlider();
        eltdPreloadBackgrounds();
        eltdInitElementsAnimations();
        eltdInitAnchor().init();
        eltdInitVideoBackground();
        eltdInitVideoBackgroundSize();
        eltdInitSelfHostedVideoPlayer();
        eltdSelfHostedVideoSize();
        eltdInitBackToTop();
        eltdBackButtonShowHide();
        eltdUnconveringFooter();
    });

    $(window).resize(function () {
        eltdInitVideoBackgroundSize();
        eltdSelfHostedVideoSize();
    });

    $(window).load(function () {
        eltdInitParallax();
    });

    /*
     ** Disable shortcodes animation on appear for touch devices
     */
    function eltdIsTouchDevice() {
        if (Modernizr.touch && !eltd.body.hasClass('eltd-no-animations-on-touch')) {
            eltd.body.addClass('eltd-no-animations-on-touch');
        }
    }

    /*
     ** Disable smooth scroll for mac if smooth scroll is enabled
     */
    function eltdDisableSmoothScrollForMac() {
        var os = navigator.appVersion.toLowerCase();

        if (os.indexOf('mac') > -1 && eltd.body.hasClass('eltd-smooth-scroll')) {
            eltd.body.removeClass('eltd-smooth-scroll');
        }
    }

    function eltdFluidVideo() {
        fluidvids.init({
            selector: ['iframe'],
            players: ['www.youtube.com', 'player.vimeo.com']
        });
    }

    function eltdInitAudioPlayer() {

        var players = $('audio.eltd-blog-audio');

        players.mediaelementplayer({
            audioWidth: '100%'
        });
    }

    /*
     **  Init gallery post slider
     */
    function eltdPostGallerySlider() {

        var bsHolder = $('.eltd-pg-slider');

        if (bsHolder.length) {
            bsHolder.each(function () {
                var thisBsHolder = $(this);

                thisBsHolder.flexslider({
                    selector: ".eltd-pg-slides",
                    animation: "fade",
                    controlNav: false,
                    directionNav: true,
                    prevText: "<span class='ion-chevron-left'></span>",
                    nextText: "<span class='ion-chevron-right'></span>",
                    slideshowSpeed: 6000,
                    animationSpeed: 400,
                });
            });
        }
    }

    function eltdPrettyPhoto() {
        /*jshint multistr: true */
        var markupWhole = '<div class="pp_pic_holder"> \
                        <div class="ppt">&nbsp;</div> \
                        <div class="pp_top"> \
                            <div class="pp_left"></div> \
                            <div class="pp_middle"></div> \
                            <div class="pp_right"></div> \
                        </div> \
                        <div class="pp_content_container"> \
                            <div class="pp_left"> \
                            <div class="pp_right"> \
                                <div class="pp_content"> \
                                    <div class="pp_loaderIcon"></div> \
                                    <div class="pp_fade"> \
                                        <a href="#" class="pp_expand" title="Expand the image">Expand</a> \
                                        <div class="pp_hoverContainer"> \
                                            <a class="pp_next" href="#"><span class="fa fa-angle-right"></span></a> \
                                            <a class="pp_previous" href="#"><span class="fa fa-angle-left"></span></a> \
                                        </div> \
                                        <div id="pp_full_res"></div> \
                                        <div class="pp_details"> \
                                            <div class="pp_nav"> \
                                                <a href="#" class="pp_arrow_previous">Previous</a> \
                                                <p class="currentTextHolder">0/0</p> \
                                                <a href="#" class="pp_arrow_next">Next</a> \
                                            </div> \
                                            <p class="pp_description"></p> \
                                            {pp_social} \
                                            <a class="pp_close" href="#">Close</a> \
                                        </div> \
                                    </div> \
                                </div> \
                            </div> \
                            </div> \
                        </div> \
                        <div class="pp_bottom"> \
                            <div class="pp_left"></div> \
                            <div class="pp_middle"></div> \
                            <div class="pp_right"></div> \
                        </div> \
                    </div> \
                    <div class="pp_overlay"></div>';

        $("a[data-rel^='prettyPhoto']").prettyPhoto({
            hook: 'data-rel',
            animation_speed: 'normal', /* fast/slow/normal */
            slideshow: false, /* false OR interval time in ms */
            autoplay_slideshow: false, /* true/false */
            opacity: 0.80, /* Value between 0 and 1 */
            show_title: true, /* true/false */
            allow_resize: true, /* Resize the photos bigger than viewport. true/false */
            horizontal_padding: 0,
            default_width: 960,
            default_height: 540,
            counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
            theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
            hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
            wmode: 'opaque', /* Set the flash wmode attribute */
            autoplay: true, /* Automatically start videos: True/False */
            modal: false, /* If set to true, only the close button will close the window */
            overlay_gallery: false, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
            keyboard_shortcuts: true, /* Set to false if you open forms inside prettyPhoto */
            deeplinking: false,
            custom_markup: '',
            social_tools: false,
            markup: markupWhole
        });
    }

    /*
     *	Preload background images for elements that have 'eltd-preload-background' class
     */
    function eltdPreloadBackgrounds() {

        $(".eltd-preload-background").each(function () {
            var preloadBackground = $(this);
            if (preloadBackground.css("background-image") !== "" && preloadBackground.css("background-image") != "none") {

                var bgUrl = preloadBackground.attr('style');

                bgUrl = bgUrl.match(/url\(["']?([^'")]+)['"]?\)/);
                bgUrl = bgUrl ? bgUrl[1] : "";

                if (bgUrl) {
                    var backImg = new Image();
                    backImg.src = bgUrl;
                    $(backImg).load(function () {
                        preloadBackground.removeClass('eltd-preload-background');
                    });
                }
            } else {
                $(window).load(function () {
                    preloadBackground.removeClass('eltd-preload-background');
                }); //make sure that eltd-preload-background class is removed from elements with forced background none in css
            }
        });
    }

    /*
     *	Start animations on elements
     */
    function eltdInitElementsAnimations() {

        var touchClass = $('.eltd-no-animations-on-touch'),
            noAnimationsOnTouch = true,
            elements = $('.eltd-grow-in, .eltd-fade-in-down, .eltd-element-from-fade, .eltd-element-from-left, .eltd-element-from-right, .eltd-element-from-top, .eltd-element-from-bottom, .eltd-flip-in, .eltd-x-rotate, .eltd-z-rotate, .eltd-y-translate, .eltd-fade-in, .eltd-fade-in-left-x-rotate'),
            clasess,
            animationClass;

        if (touchClass.length) {
            noAnimationsOnTouch = false;
        }

        if (elements.length > 0 && noAnimationsOnTouch) {
            elements.each(function () {
                var element = $(this);

                clasess = element.attr('class').split(/\s+/);
                animationClass = clasess[1];

                element.appear(function () {
                    element.addClass(animationClass + '-on');
                }, {accX: 0, accY: eltdGlobalVars.vars.eltdElementAppearAmount});
            });
        }
    }

    /*
     **	Anchor functionality
     */
    var eltdInitAnchor = eltd.modules.common.eltdInitAnchor = function () {

        /**
         * Set active state on clicked anchor
         * @param anchor, clicked anchor
         */
        var setActiveState = function (anchor) {

            $('.eltd-main-menu .eltd-active-item, .eltd-mobile-nav .eltd-active-item, .eltd-vertical-menu .eltd-active-item, .eltd-fullscreen-menu .eltd-active-item').removeClass('eltd-active-item');
            anchor.parent().addClass('eltd-active-item');

            $('.eltd-main-menu a, .eltd-mobile-nav a, .eltd-vertical-menu a, .eltd-fullscreen-menu a').removeClass('current');
            anchor.addClass('current');
        };

        /**
         * Check anchor active state on scroll
         */
        var checkActiveStateOnScroll = function () {

            $('[data-eltd-anchor]').waypoint(function (direction) {
                if (direction === 'down') {
                    setActiveState($("a[href='" + window.location.href.split('#')[0] + "#" + $(this.element).data("eltd-anchor") + "']"));
                }
            }, {offset: '50%'});

            $('[data-eltd-anchor]').waypoint(function (direction) {
                if (direction === 'up') {
                    setActiveState($("a[href='" + window.location.href.split('#')[0] + "#" + $(this.element).data("eltd-anchor") + "']"));
                }
            }, {
                offset: function () {
                    return -($(this.element).outerHeight() - 150);
                }
            });

        };

        /**
         * Check anchor active state on load
         */
        var checkActiveStateOnLoad = function () {
            var hash = window.location.hash.split('#')[1];

            if (hash !== "" && $('[data-eltd-anchor="' + hash + '"]').length > 0) {
                //triggers click which is handled in 'anchorClick' function
                $("a[href='" + window.location.href.split('#')[0] + "#" + hash).trigger("click");
            }
        };

        /**
         * Calculate header height to be substract from scroll amount
         * @param anchoredElementOffset, anchorded element offest
         */
        var headerHeihtToSubtract = function(anchoredElementOffset, anchoredElementPosition){

            var headerHeight;
            if(eltd.windowWidth > 1024) {

                if (eltd.modules.header.behaviour == 'eltd-sticky-header-on-scroll-down-up') {
                    eltd.modules.header.isStickyVisible = (anchoredElementOffset > eltd.modules.header.stickyAppearAmount) ? true : false;
                }

                if (eltd.modules.header.behaviour == 'eltd-sticky-header-on-scroll-up') {
                    if (anchoredElementOffset > eltd.scroll) {
                        eltd.modules.header.isStickyVisible = false;
                    }
                }

                headerHeight = eltd.modules.header.isStickyVisible ? eltdGlobalVars.vars.eltdStickyHeaderTransparencyHeight : eltdPerPageVars.vars.eltdHeaderTransparencyHeight;
            }

            else {
                if(anchoredElementPosition === 'down') {
                    headerHeight = anchoredElementOffset > eltd.modules.header.stickyMobileAppearAmount ? 0 : eltd.modules.header.stickyMobileAppearAmount;
                }
                else {
                    headerHeight = eltdGlobalVars.vars.eltdMobileHeaderHeight;
                }
            }
            return headerHeight;
        };

        /**
         * Handle anchor click
         */
        var anchorClick = function () {
            eltd.document.on("click", ".eltd-main-menu a, .eltd-btn, .eltd-anchor", function () {
                var scrollAmount;
                var anchor = $(this);
                var hash = anchor.prop("hash").split('#')[1];

                if (hash !== "" && $('[data-eltd-anchor="' + hash + '"]').length > 0 && anchor.attr('href').split('#')[0] == window.location.href.split('#')[0]) {

                    var anchoredElementOffset = $('[data-eltd-anchor="' + hash + '"]').offset().top;
                    var anchoredElementPosition = anchoredElementOffset > eltd.scroll ? 'down' : 'up';
                    scrollAmount = $('[data-eltd-anchor="' + hash + '"]').offset().top - headerHeihtToSubtract(anchoredElementOffset, anchoredElementPosition);

                    setActiveState(anchor);

                    eltd.html.stop().animate({
                        scrollTop: Math.round(scrollAmount)
                    }, 1000, function () {
                        //change hash tag in url
                        if (history.pushState) {
                            history.pushState(null, null, '#' + hash);
                        }
                    });
                    return false;
                }
            });
        };

        return {
            init: function () {
                if ($('[data-eltd-anchor]').length) {
                    anchorClick();
                    checkActiveStateOnScroll();
                    $(window).load(function () {
                        checkActiveStateOnLoad();
                    });
                }
            }
        };

    };

    /*
     **	Video background initialization
     */
    function eltdInitVideoBackground() {

        $('.eltd-section .eltd-video-wrap .eltd-video').mediaelementplayer({
            enableKeyboard: false,
            iPadUseNativeControls: false,
            pauseOtherPlayers: false,
            // force iPhone's native controls
            iPhoneUseNativeControls: false,
            // force Android's native controls
            AndroidUseNativeControls: false
        });

        //mobile check
        if (navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)) {
            eltdInitVideoBackgroundSize();
            $('.eltd-section .eltd-mobile-video-image').show();
            $('.eltd-section .eltd-video-wrap').remove();
        }
    }

    /*
     **	Calculate video background size
     */
    function eltdInitVideoBackgroundSize() {

        $('.eltd-section .eltd-video-wrap').each(function () {

            var element = $(this);
            var sectionWidth = element.closest('.eltd-section').outerWidth();
            element.width(sectionWidth);

            var sectionHeight = element.closest('.eltd-section').outerHeight();
            eltd.minVideoWidth = eltd.videoRatio * (sectionHeight + 20);
            element.height(sectionHeight);

            var scaleH = sectionWidth / eltd.videoWidthOriginal;
            var scaleV = sectionHeight / eltd.videoHeightOriginal;
            var scale = scaleV;
            if (scaleH > scaleV)
                scale = scaleH;
            if (scale * eltd.videoWidthOriginal < eltd.minVideoWidth) {
                scale = eltd.minVideoWidth / eltd.videoWidthOriginal;
            }

            element.find('video, .mejs-overlay, .mejs-poster').width(Math.ceil(scale * eltd.videoWidthOriginal + 2));
            element.find('video, .mejs-overlay, .mejs-poster').height(Math.ceil(scale * eltd.videoHeightOriginal + 2));
            element.scrollLeft((element.find('video').width() - sectionWidth) / 2);
            element.find('.mejs-overlay, .mejs-poster').scrollTop((element.find('video').height() - (sectionHeight)) / 2);
            element.scrollTop((element.find('video').height() - sectionHeight) / 2);
        });
    }

    function eltdDisableScroll() {

        if (window.addEventListener) {
            window.addEventListener('DOMMouseScroll', eltdWheel, false);
        }
        window.onmousewheel = document.onmousewheel = eltdWheel;
        document.onkeydown = eltdKeydown;

        if (eltd.body.hasClass('eltd-smooth-scroll')) {
            window.removeEventListener('mousewheel', smoothScrollListener, false);
            window.removeEventListener('DOMMouseScroll', smoothScrollListener, false);
        }
    }

    function eltdEnableScroll() {
        if (window.removeEventListener) {
            window.removeEventListener('DOMMouseScroll', eltdWheel, false);
        }
        window.onmousewheel = document.onmousewheel = document.onkeydown = null;

        if (eltd.body.hasClass('eltd-smooth-scroll')) {
            window.addEventListener('mousewheel', smoothScrollListener, false);
            window.addEventListener('DOMMouseScroll', smoothScrollListener, false);
        }
    }

    function eltdWheel(e) {
        eltdPreventDefaultValue(e);
    }

    function eltdKeydown(e) {
        var keys = [37, 38, 39, 40];

        for (var i = keys.length; i--;) {
            if (e.keyCode === keys[i]) {
                eltdPreventDefaultValue(e);
                return;
            }
        }
    }

    function eltdPreventDefaultValue(e) {
        e = e || window.event;
        if (e.preventDefault) {
            e.preventDefault();
        }
        e.returnValue = false;
    }

    function eltdInitSelfHostedVideoPlayer() {

        var players = $('.eltd-self-hosted-video');
        players.mediaelementplayer({
            audioWidth: '100%'
        });
    }

    function eltdSelfHostedVideoSize() {

        $('.eltd-self-hosted-video-holder .eltd-video-wrap').each(function () {
            var thisVideo = $(this);

            var videoWidth = thisVideo.closest('.eltd-self-hosted-video-holder').outerWidth();
            var videoHeight = videoWidth / eltd.videoRatio;

            if (navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)) {
                thisVideo.parent().width(videoWidth);
                thisVideo.parent().height(videoHeight);
            }

            thisVideo.width(videoWidth);
            thisVideo.height(videoHeight);

            thisVideo.find('video, .mejs-overlay, .mejs-poster').width(videoWidth);
            thisVideo.find('video, .mejs-overlay, .mejs-poster').height(videoHeight);
        });
    }

    function eltdToTopButton(a) {

        var b = $("#eltd-back-to-top");
        b.removeClass('off on');
        if (a === 'on') {
            b.addClass('on');
        } else {
            b.addClass('off');
        }
    }

    function eltdBackButtonShowHide() {
        eltd.window.scroll(function () {
            var b = $(this).scrollTop();
            var c = $(this).height();
            var d;
            if (b > 0) {
                d = b + c / 2;
            } else {
                d = 1;
            }
            if (d < 1e3) {
                eltdToTopButton('off');
            } else {
                eltdToTopButton('on');
            }
        });
    }

    function eltdInitBackToTop() {
        var backToTopButton = $('#eltd-back-to-top');
        backToTopButton.on('click', function (e) {
            e.preventDefault();
            eltd.html.animate({scrollTop: 0}, eltd.window.scrollTop() / 5, 'linear');
        });
    }

    /*
     **	Sections with parallax background image
     */
    function eltdInitParallax() {

        if ($('.eltd-parallax-section-holder').length) {
            $('.eltd-parallax-section-holder').each(function () {

                var parallaxElement = $(this);
                var speed = parallaxElement.data('eltd-parallax-speed') * 0.4;
                parallaxElement.parallax("50%", speed);
            });
        }
    }

    /*
    * Uncovering footer effect
    */
    function eltdUnconveringFooter() {
        if (eltd.body.hasClass('eltd-uncovering-footer') && !$('html').hasClass('touch')) {
            var footer = $('footer'),
                footerHeight = footer.find('.eltd-footer-inner').outerHeight(),
                contentWrapper = $('#eltd-content-wrapper');

            var uncoveringCalcs = function() {
                contentWrapper.css('margin-bottom', footerHeight);
                footer.css('height', footerHeight);
            }

            uncoveringCalcs();
            footer.css('visibility', 'visible');
            contentWrapper.css({
                'border-bottom' : '2px solid #dddcdc',
                'background-color' : eltd.body.css('background-color')
            });

            $(window).resize(function(){
                footerHeight = footer.find('.eltd-footer-inner').outerHeight();
                uncoveringCalcs();
            });
        }
    }

})(jQuery);
(function($) {
    "use strict";

    var header = {};
    eltd.modules.header = header;

    header.isStickyVisible = false;
    header.stickyAppearAmount = 0;
    header.stickyMobileAppearAmount = 0;
    header.behaviour = "";
    header.eltdInitMobileNavigation = eltdInitMobileNavigation;
    header.eltdMobileHeaderBehavior = eltdMobileHeaderBehavior;
    header.eltdSetDropDownMenuPosition = eltdSetDropDownMenuPosition;
    header.eltdSetWideMenuPosition = eltdSetWideMenuPosition;
    header.eltdSideArea = eltdSideArea;
    header.eltdSideAreaScroll = eltdSideAreaScroll;
    header.eltdDropDownMenu = eltdDropDownMenu;
    header.eltdSearch = eltdSearch;

    $(document).ready(function() {
        eltdHeaderBehaviour();
        eltdInitMobileNavigation();
        eltdMobileHeaderBehavior();
        eltdSideArea();
        eltdSideAreaScroll();
        eltdSetDropDownMenuPosition();
        eltdSetWideMenuPosition();
        eltdSearch();
    });

    $(window).load(function() {
        eltdDropDownMenu();
        eltdSetDropDownMenuPosition();
    });

    $(window).resize(function() {
        eltdSetWideMenuPosition();
        eltdDropDownMenu();
    });

    /*
     **	Show/Hide sticky header on window scroll
     */
    function eltdHeaderBehaviour() {

        var header = $('.eltd-page-header');
        var stickyHeader = $('.eltd-sticky-header');
        var stickyAppearAmount;
        var headerAppear;

        var fixedHeaderWrapper = $('.eltd-fixed-wrapper');
        var headerMenuAreaOffset = $('.eltd-page-header').find('.eltd-fixed-wrapper').length ? $('.eltd-page-header').find('.eltd-fixed-wrapper').offset().top: null;

        switch(true) {
            // sticky header that will be shown when user scrolls up
            case eltd.body.hasClass('eltd-sticky-header-on-scroll-up'):
                eltd.modules.header.behaviour = 'eltd-sticky-header-on-scroll-up';
                var docYScroll1 = $(document).scrollTop();
                stickyAppearAmount = eltdGlobalVars.vars.eltdTopBarHeight + eltdGlobalVars.vars.eltdLogoAreaHeight + eltdGlobalVars.vars.eltdMenuAreaHeight + eltdGlobalVars.vars.eltdStickyHeaderHeight + 200; //200 is designer's whish

                headerAppear = function(){
                    var docYScroll2 = $(document).scrollTop();

                    if((docYScroll2 > docYScroll1 && docYScroll2 > stickyAppearAmount) || (docYScroll2 < stickyAppearAmount)) {
                        eltd.modules.header.isStickyVisible= false;
                        stickyHeader.removeClass('header-appear').find('.eltd-main-menu .second').removeClass('eltd-drop-down-start');
                    }else {
                        eltd.modules.header.isStickyVisible = true;
                        stickyHeader.addClass('header-appear');
                    }

                    docYScroll1 = $(document).scrollTop();
                };
                headerAppear();

                $(window).scroll(function() {
                    headerAppear();
                });

                break;

            // sticky header that will be shown when user scrolls both up and down
            case eltd.body.hasClass('eltd-sticky-header-on-scroll-down-up'):
                eltd.modules.header.behaviour = 'eltd-sticky-header-on-scroll-down-up';
                stickyAppearAmount = eltdPerPageVars.vars.eltdStickyScrollAmount !== 0 ? eltdPerPageVars.vars.eltdStickyScrollAmount : eltdGlobalVars.vars.eltdTopBarHeight + eltdGlobalVars.vars.eltdLogoAreaHeight + eltdGlobalVars.vars.eltdMenuAreaHeight +200; //200 is designer's whish
                eltd.modules.header.stickyAppearAmount = stickyAppearAmount; //used in anchor logic

                headerAppear = function(){
                    if(eltd.scroll < stickyAppearAmount) {
                        eltd.modules.header.isStickyVisible = false;
                        stickyHeader.removeClass('header-appear').find('.eltd-main-menu .second').removeClass('eltd-drop-down-start');
                    }else{
                        eltd.modules.header.isStickyVisible = true;
                        stickyHeader.addClass('header-appear');
                    }
                };

                headerAppear();

                $(window).scroll(function() {
                    headerAppear();
                });

                break;

            // on scroll down, when viewport hits header's top position it remains fixed
            case eltd.body.hasClass('eltd-fixed-on-scroll'):
                eltd.modules.header.behaviour = 'eltd-fixed-on-scroll';
                var headerFixed = function(){
                    if(eltd.scroll < headerMenuAreaOffset){
                        fixedHeaderWrapper.removeClass('fixed');
                        header.css('margin-bottom',0);}
                    else{
                        fixedHeaderWrapper.addClass('fixed');
                        header.css('margin-bottom',fixedHeaderWrapper.height());
                    }
                };

                headerFixed();

                $(window).scroll(function() {
                    headerFixed();
                });

                break;
        }
    }


    function eltdInitMobileNavigation() {
        var navigationOpener = $('.eltd-mobile-header .eltd-mobile-menu-opener');
        var navigationHolder = $('.eltd-mobile-header .eltd-mobile-nav');
        var dropdownOpener = $('.eltd-mobile-nav .mobile_arrow, .eltd-mobile-nav h6, .eltd-mobile-nav a[href*="#"]');
        var animationSpeed = 200;

        //whole mobile menu opening / closing
        if(navigationOpener.length && navigationHolder.length) {
            navigationOpener.on('tap click', function(e) {
                e.stopPropagation();
                e.preventDefault();

                if(navigationHolder.is(':visible')) {
                    navigationOpener.removeClass('opened');
                    navigationHolder.slideUp(animationSpeed);
                } else {
                    navigationOpener.addClass('opened');
                    navigationHolder.slideDown(animationSpeed);
                }
            });
        }

        //dropdown opening / closing
        if(dropdownOpener.length) {
            dropdownOpener.each(function() {
                $(this).on('tap click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    var dropdownToOpen = $(this).nextAll('ul').first();
                    var openerParent = $(this).parent('li');
                    if(dropdownToOpen.is(':visible')) {
                        dropdownToOpen.slideUp(animationSpeed);
                        openerParent.removeClass('eltd-opened');
                    } else {
                        dropdownToOpen.slideDown(animationSpeed);
                        openerParent.addClass('eltd-opened');
                    }
                });
            });
        }

        $('.eltd-mobile-nav a, .eltd-mobile-logo-wrapper a').on('click tap', function(e) {
            if($(this).attr('href') !== 'http://#' && $(this).attr('href') !== '#') {
                navigationHolder.slideUp(animationSpeed);
            }
        });
    }

    function eltdMobileHeaderBehavior() {
        if(eltd.body.hasClass('eltd-sticky-up-mobile-header')) {
            var stickyAppearAmount;
            var topBar = $('.eltd-top-bar');
            var mobileHeader = $('.eltd-mobile-header');
            var adminBar     = $('#wpadminbar');
            var mobileHeaderHeight = mobileHeader.length ? mobileHeader.height() : 0;
            var topBarHeight = topBar.is(':visible') ? topBar.height() : 0;
            var adminBarHeight = adminBar.length ? adminBar.height() : 0;

            var docYScroll1 = $(document).scrollTop();
            eltd.modules.header.stickyMobileAppearAmount = topBarHeight + mobileHeaderHeight + adminBarHeight;
            stickyAppearAmount = eltd.modules.header.stickyMobileAppearAmount;

            $(window).scroll(function() {
                var docYScroll2 = $(document).scrollTop();

                if(docYScroll2 > stickyAppearAmount) {
                    mobileHeader.addClass('eltd-animate-mobile-header');
                    mobileHeader.css('margin-bottom',  mobileHeaderHeight);
                } else {
                    mobileHeader.removeClass('eltd-animate-mobile-header');
                    mobileHeader.css('margin-bottom', 0);
                }

                if((docYScroll2 > docYScroll1 && docYScroll2 > stickyAppearAmount) || (docYScroll2 < stickyAppearAmount)) {
                    mobileHeader.removeClass('mobile-header-appear');
                    if(adminBar.length) {
                        mobileHeader.find('.eltd-mobile-header-inner').css('top', 0);
                    }
                } else {
                    mobileHeader.addClass('mobile-header-appear');

                }

                docYScroll1 = $(document).scrollTop();
            });
        }
    }

    /**
     * Set dropdown position
     */
    function eltdSetDropDownMenuPosition(){

        var menuItems = $(".eltd-drop-down > ul > li.eltd-menu-narrow");
        menuItems.each( function(i) {

            var browserWidth = eltd.windowWidth-16; // 16 is width of scroll bar
            var menuItemPosition = $(this).offset().left;
            var dropdownMenuWidth = $(this).find('.eltd-menu-second .eltd-menu-inner ul').width();

            var menuItemFromLeft = 0;
            if(eltd.body.hasClass('eltd-boxed')){
                menuItemFromLeft = eltd.boxedLayoutWidth  - (menuItemPosition - (browserWidth - eltd.boxedLayoutWidth)/2);
            } else {
                menuItemFromLeft = browserWidth - menuItemPosition;
            }

            var dropDownMenuFromLeft; //has to stay undefined beacuse 'dropDownMenuFromLeft < dropdownMenuWidth' condition will be true

            if($(this).find('li.eltd-menu-sub').length > 0){
                dropDownMenuFromLeft = menuItemFromLeft - dropdownMenuWidth;
            }

            if(menuItemFromLeft < dropdownMenuWidth || dropDownMenuFromLeft < dropdownMenuWidth){
                $(this).find('.eltd-menu-second').addClass('right');
                $(this).find('.eltd-menu-second .eltd-menu-inner ul').addClass('right');
            } else {
                $(this).find('.eltd-menu-second').removeClass('right');
                $(this).find('.eltd-menu-second .eltd-menu-inner ul').removeClass('right');
            }
        });
    }

    function eltdSetWideMenuPosition() {

        var browserWidth = eltd.windowWidth;
        var menu_items = $('.eltd-drop-down > ul > li.eltd-menu-wide');
        menu_items.each(function(i) {
            if($(menu_items[i]).find('.eltd-menu-second').length > 0) {

                var dropDownSecondDiv = $(menu_items[i]).find('.eltd-menu-second');
                dropDownSecondDiv.css('left','0'); //reinit left offset for fixed header transition
                var dropdown = $(this).find('.eltd-menu-inner > ul');
                var dropdownWidth = dropdown.outerWidth();
                var dropdownPosition = dropdown.offset().left;
                var left_position = 0;


                if(!$(this).hasClass('eltd-menu-left-position') && !$(this).hasClass('eltd-menu-right-position')) {
                    left_position = dropdownPosition - (browserWidth - dropdownWidth)/2;
                    dropDownSecondDiv.css('left', -left_position);
                    dropDownSecondDiv.css('width', dropdownWidth);
                }
            }
        });
    }

    function eltdDropDownMenu() {

        var menu_items = $('.eltd-drop-down > ul > li');

        menu_items.each(function(i) {
            if($(menu_items[i]).find('.eltd-menu-second').length > 0) {

                var dropDownSecondDiv = $(menu_items[i]).find('.eltd-menu-second');

                if($(menu_items[i]).hasClass('eltd-menu-wide')) {
                    if($(menu_items[i]).data('wide_background_image') !== '' && $(menu_items[i]).data('wide_background_image') !== undefined){
                        var wideBackgroundImageSrc = $(menu_items[i]).data('wide_background_image');
                        dropDownSecondDiv.find('> .eltd-menu-inner > ul').css('background-image', 'url('+wideBackgroundImageSrc+')');
                    }
                }

                if(!eltd.menuDropdownHeightSet) {
                    $(menu_items[i]).data('original_height', dropDownSecondDiv.height() + 'px');
                    dropDownSecondDiv.height(0);
                }

                if(navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
                    $(menu_items[i]).on("touchstart mouseenter", function() {
                        dropDownSecondDiv.css({
                            'height': $(menu_items[i]).data('original_height'),
                            'overflow': 'visible',
                            'visibility': 'visible',
                            'opacity': '1'
                        });
                    }).on("mouseleave", function() {
                        dropDownSecondDiv.css({
                            'height': '0px',
                            'overflow': 'hidden',
                            'visibility': 'hidden',
                            'opacity': '0'
                        });
                    });

                } else {
                    $(menu_items[i]).mouseenter(function() {
                        dropDownSecondDiv.css({'opacity': '1','height':$(menu_items[i]).data('original_height')});
                        dropDownSecondDiv.addClass('eltd-drop-down-start');
                    });
                    $(menu_items[i]).mouseleave(function() {
                        dropDownSecondDiv.css({'opacity': '0','height':'0'});
                        dropDownSecondDiv.removeClass('eltd-drop-down-start');
                    });
                }
            }
        });

        $('.eltd-drop-down ul li.eltd-menu-wide ul li a').on('click', function(e) {
            if (e.which == 1) {
                var $this = $(this);
                setTimeout(function () {
                    $this.mouseleave();
                }, 500);
            }
        });
        eltd.menuDropdownHeightSet = true;

    }

    /**
     * Show/hide side area
     */
    function eltdSideArea() {

        var wrapper = $('.eltd-wrapper'),
            sideMenu = $('.eltd-side-menu'),
            sideMenuButtonOpen = $('a.eltd-side-menu-button-opener'),
            cssClass,
        //Flags
            slideFromRight = false,
            slideWithContent = false,
            slideUncovered = false,
            slideOverContent = false;

        if (eltd.body.hasClass('eltd-side-menu-slide-from-right')) {
            $('.eltd-cover').remove();
            cssClass = 'eltd-right-side-menu-opened';
            wrapper.prepend('<div class="eltd-cover"/>');
            slideFromRight = true;

        } else if (eltd.body.hasClass('eltd-side-menu-slide-with-content')) {

            cssClass = 'eltd-side-menu-open';
            slideWithContent = true;

        } else if (eltd.body.hasClass('eltd-side-area-uncovered-from-content')) {

            cssClass = 'eltd-right-side-menu-opened';
            slideUncovered = true;

        } else if (eltd.body.hasClass('eltd-side-menu-slide-over-content')) {

            cssClass = 'eltd-side-menu-open';
            slideOverContent = true;

        }

        $('a.eltd-side-menu-button-opener, a.eltd-close-side-menu').click( function(e) {
            e.preventDefault();

            if(!sideMenuButtonOpen.hasClass('opened')) {

                sideMenuButtonOpen.addClass('opened');
                eltd.body.addClass(cssClass);

                if (slideFromRight) {
                    $('.eltd-wrapper .eltd-cover').click(function() {
                        eltd.body.removeClass('eltd-right-side-menu-opened');
                        sideMenuButtonOpen.removeClass('opened');
                    });
                }

                if (slideUncovered) {
                    sideMenu.css({
                        'visibility' : 'visible'
                    });
                }

                var currentScroll = $(window).scrollTop();
                $(window).scroll(function() {
                    if(Math.abs(eltd.scroll - currentScroll) > 400){
                        eltd.body.removeClass(cssClass);
                        sideMenuButtonOpen.removeClass('opened');
                        if (slideUncovered) {
                            var hideSideMenu = setTimeout(function(){
                                sideMenu.css({'visibility':'hidden'});
                                clearTimeout(hideSideMenu);
                            },400);
                        }
                    }
                });

            } else {

                sideMenuButtonOpen.removeClass('opened');
                eltd.body.removeClass(cssClass);
                if (slideUncovered) {
                    var hideSideMenu = setTimeout(function(){
                        sideMenu.css({'visibility':'hidden'});
                        clearTimeout(hideSideMenu);
                    },400);
                }

            }

            if (slideWithContent || slideOverContent) {

                e.stopPropagation();
                wrapper.click(function() {
                    e.preventDefault();
                    sideMenuButtonOpen.removeClass('opened');
                    eltd.body.removeClass('eltd-side-menu-open');
                });

            }

        });

    }

    /*
     **  Smooth scroll functionality for Side Area
     */
    function eltdSideAreaScroll(){

        var sideMenu = $('.eltd-side-menu');

        if(sideMenu.length){
            sideMenu.niceScroll({
                scrollspeed: 60,
                mousescrollstep: 40,
                cursorwidth: 0,
                cursorborder: 0,
                cursorborderradius: 0,
                cursorcolor: "transparent",
                autohidemode: false,
                horizrailenabled: false
            });
        }
    }


    /**
     * Init Search Types
     */
    function eltdSearch() {

        var searchOpener = $('.eltd-search-submit');

        searchOpener.each(function(){
            var opener = $(this),
                closeBtn = $(this).parent().parent().siblings('.eltd-form-holder-close-btn'),
                searchWidget = opener.parent().parent().find('.eltd-search-field');

            //Search results
            if (eltd.body.hasClass('search-results') || eltd.body.hasClass('search-no-results')){
                opener.addClass('eltd-active');
                closeBtn.addClass('eltd-active-close');
                searchWidget.addClass('eltd-active');
            }

            //Open / Close
            opener.on('click', function(e) {
                if (!opener.hasClass('eltd-active')) {
                    e.preventDefault();
                    opener.addClass('eltd-active');
                    closeBtn.addClass('eltd-active-close');
                    searchWidget.addClass('eltd-active');
                    searchWidget.focus();
                } else {
                    if (searchWidget.val() === '') {
                        e.preventDefault();
                        opener.removeClass('eltd-active');
                        closeBtn.removeClass('eltd-active-close');
                        searchWidget.removeClass('eltd-active');
                        searchWidget.blur();
                    }
                }
            });

            //Open / Close
            closeBtn.on('click', function(e) {
                e.preventDefault();
                opener.removeClass('eltd-active');
                closeBtn.removeClass('eltd-active-close');
                searchWidget.removeClass('eltd-active');
                searchWidget.blur();
            });

            //Close on click away
            $(document).mouseup(function (e) {
                var container = $(".eltd-search-menu-holder, .eltd-search-opener");
                if (!container.is(e.target) && container.has(e.target).length === 0)  {
                    e.preventDefault();
                    opener.removeClass('eltd-active');
                    closeBtn.removeClass('eltd-active-close');
                    searchWidget.removeClass('eltd-active');
                }
            });

            //Close on escape
            $(document).keyup(function(e){
                if (e.keyCode == 27 ) { //KeyCode for ESC button is 27
                    e.preventDefault();
                    opener.removeClass('eltd-active');
                    closeBtn.removeClass('eltd-active-close');
                    searchWidget.removeClass('eltd-active');
                }
            });

        });

    }

})(jQuery);
(function ($) {
    'use strict';

    var shortcodes = {};

    eltd.modules.shortcodes = shortcodes;

    shortcodes.eltdInitTabs = eltdInitTabs;
    shortcodes.eltdCustomFontResize = eltdCustomFontResize;
    shortcodes.eltdBlockReveal = eltdBlockReveal;
    shortcodes.eltdBreakingNews = eltdBreakingNews;
    shortcodes.eltdInitStickyWidget = eltdInitStickyWidget;
    shortcodes.eltdShowGoogleMap = eltdShowGoogleMap;
    shortcodes.eltdInitBlogMasonryGallery = eltdInitBlogMasonryGallery;
    shortcodes.eltdInitSliderPostOne = eltdInitSliderPostOne;
    shortcodes.eltdInitSliderPostTwo = eltdInitSliderPostTwo;
    shortcodes.eltdInitSliderPostThree = eltdInitSliderPostThree;
    shortcodes.eltdInitSliderPostFour = eltdInitSliderPostFour;
    shortcodes.eltdInitStandardCategory = eltdInitStandardCategory;

    $(document).ready(function () {
        eltdIcon().init();
        eltdInitTabs();
        eltdButton().init();
        eltdCustomFontResize();
        eltdBlockReveal();
        eltdBreakingNews();
        eltdSocialIconWidget().init();
        eltdPostPagination().init();
        eltdRecentCommentsHover();
        eltdShowGoogleMap();
        eltdInitBlogMasonryGallery();
        eltdInitSliderPostOne();
        eltdInitSliderPostTwo();
        eltdInitSliderPostThree();
        eltdInitSliderPostFour();
    });

    $(window).resize(function () {
        eltdCustomFontResize();
        eltdInitStickyWidget();
    });

    $(window).load(function () {
        eltdInitStandardCategory();
        eltdPostLayoutTabWidget().init();
        eltd.modules.common.eltdInitParallax();
        eltdInitStickyWidget();
    });

    /**
     * Object that represents icon shortcode
     * @returns {{init: Function}} function that initializes icon's functionality
     */
    var eltdIcon = eltd.modules.shortcodes.eltdIcon = function () {
        //get all icons on page
        var icons = $('.eltd-icon-shortcode');

        /**
         * Function that triggers icon animation and icon animation delay
         */
        var iconAnimation = function (icon) {
            if (icon.hasClass('eltd-icon-animation')) {
                icon.appear(function () {
                    icon.parent('.eltd-icon-animation-holder').addClass('eltd-icon-animation-show');
                }, {accX: 0, accY: eltdGlobalVars.vars.eltdElementAppearAmount});
            }
        };

        /**
         * Function that triggers icon hover color functionality
         */
        var iconHoverColor = function (icon) {
            if (typeof icon.data('hover-color') !== 'undefined') {
                var changeIconColor = function (event) {
                    event.data.icon.css('color', event.data.color);
                };

                var iconElement = icon.find('.eltd-icon-element');
                var hoverColor = icon.data('hover-color');
                var originalColor = iconElement.css('color');

                if (hoverColor !== '') {
                    icon.on('mouseenter', {icon: iconElement, color: hoverColor}, changeIconColor);
                    icon.on('mouseleave', {icon: iconElement, color: originalColor}, changeIconColor);
                }
            }
        };

        /**
         * Function that triggers icon holder background color hover functionality
         */
        var iconHolderBackgroundHover = function (icon) {
            if (typeof icon.data('hover-background-color') !== 'undefined') {
                var changeIconBgColor = function (event) {
                    event.data.icon.css('background-color', event.data.color);
                };

                var hoverBackgroundColor = icon.data('hover-background-color');
                var originalBackgroundColor = icon.css('background-color');

                if (hoverBackgroundColor !== '') {
                    icon.on('mouseenter', {icon: icon, color: hoverBackgroundColor}, changeIconBgColor);
                    icon.on('mouseleave', {icon: icon, color: originalBackgroundColor}, changeIconBgColor);
                }
            }
        };

        /**
         * Function that initializes icon holder border hover functionality
         */
        var iconHolderBorderHover = function (icon) {
            if (typeof icon.data('hover-border-color') !== 'undefined') {
                var changeIconBorder = function (event) {
                    event.data.icon.css('border-color', event.data.color);
                };

                var hoverBorderColor = icon.data('hover-border-color');
                var originalBorderColor = icon.css('border-color');

                if (hoverBorderColor !== '') {
                    icon.on('mouseenter', {icon: icon, color: hoverBorderColor}, changeIconBorder);
                    icon.on('mouseleave', {icon: icon, color: originalBorderColor}, changeIconBorder);
                }
            }
        };

        return {
            init: function () {
                if (icons.length) {
                    icons.each(function () {
                        iconAnimation($(this));
                        iconHoverColor($(this));
                        iconHolderBackgroundHover($(this));
                        iconHolderBorderHover($(this));
                    });

                }
            }
        };
    };

    /**
     * Object that represents social icon widget
     * @returns {{init: Function}} function that initializes icon's functionality
     */
    var eltdSocialIconWidget = eltd.modules.shortcodes.eltdSocialIconWidget = function () {
        //get all social icons on page
        var icons = $('.eltd-social-icon-widget-holder');

        /**
         * Function that triggers icon hover color functionality
         */
        var socialIconHoverColor = function (icon) {
            if (typeof icon.data('hover-color') !== 'undefined') {
                var changeIconColor = function (event) {
                    event.data.icon.css('color', event.data.color);
                };

                var iconElement = icon;
                var hoverColor = icon.data('hover-color');
                var originalColor = iconElement.css('color');

                if (hoverColor !== '') {
                    icon.on('mouseenter', {icon: iconElement, color: hoverColor}, changeIconColor);
                    icon.on('mouseleave', {icon: iconElement, color: originalColor}, changeIconColor);
                }
            }
        };

        return {
            init: function () {
                if (icons.length) {
                    icons.each(function () {
                        socialIconHoverColor($(this));
                    });

                }
            }
        };
    };

    /*
     **	Init tabs shortcode
     */
    function eltdInitTabs() {

        var tabs = $('.eltd-tabs');
        if (tabs.length) {
            tabs.each(function () {
                var thisTabs = $(this);

                if (!thisTabs.hasClass('eltd-ptw-holder')) {
                    thisTabs.children('.eltd-tab-container').each(function (index) {
                        index = index + 1;

                        var that = $(this),
                            link = that.attr('id');

                        var navItem = -1;
                        if (that.parent().find('.eltd-tabs-nav li').hasClass('eltd-tabs-title-holder')) {
                            index = index + 1;

                            if (that.parent().find('.eltd-tabs-nav li.eltd-tabs-title-holder .eltd-tabs-title-image').length) {
                                that.parent().find('.eltd-tabs-nav li.eltd-tabs-title-holder').children('.eltd-tabs-title-image:first-child').addClass('eltd-active-tab-image');
                            }
                        }
                        navItem = that.parent().find('.eltd-tabs-nav li:nth-child(' + index + ') a');

                        var navLink = navItem.attr('href');

                        link = '#' + link;

                        if (link.indexOf(navLink) > -1) {
                            navItem.attr('href', link);
                        }
                    });
                }

                thisTabs.tabs({
                    activate: function () {
                        thisTabs.find('.eltd-tabs-nav li').each(function () {
                            var thisTab = $(this);

                            if (thisTab.hasClass('ui-tabs-active')) {
                                var activeTab = thisTab.index();

                                if (thisTab.parent().find('.eltd-tabs-title-image').length) {
                                    thisTab.parent().find('.eltd-tabs-title-image').removeClass('eltd-active-tab-image');
                                    thisTab.parent().find('.eltd-tabs-title-image:nth-child(' + activeTab + ')').addClass('eltd-active-tab-image');
                                }
                            }
                        });
                    }
                });
            });
        }
    }

    /**
     * Button object that initializes whole button functionality
     * @type {Function}
     */
    var eltdButton = eltd.modules.shortcodes.eltdButton = function () {
        //all buttons on the page
        var buttons = $('.eltd-btn');

        /**
         * Initializes button hover color
         * @param button current button
         */
        var buttonHoverColor = function (button) {
            if (typeof button.data('hover-color') !== 'undefined') {
                var changeButtonColor = function (event) {
                    event.data.button.css('color', event.data.color);
                };

                var originalColor = button.css('color');
                var hoverColor = button.data('hover-color');

                button.on('mouseenter', {button: button, color: hoverColor}, changeButtonColor);
                button.on('mouseleave', {button: button, color: originalColor}, changeButtonColor);
            }
        };


        /**
         * Initializes button hover background color
         * @param button current button
         */
        var buttonHoverBgColor = function (button) {
            if (typeof button.data('hover-bg-color') !== 'undefined') {
                var changeButtonBg = function (event) {
                    event.data.button.css('background-color', event.data.color);
                };

                var originalBgColor = button.css('background-color');
                var hoverBgColor = button.data('hover-bg-color');

                button.on('mouseenter', {button: button, color: hoverBgColor}, changeButtonBg);
                button.on('mouseleave', {button: button, color: originalBgColor}, changeButtonBg);
            }
        };

        /**
         * Initializes button icon hover background color
         * @param button current button
         */
        var buttonIconHoverBgColor = function (button) {
            if (!button.hasClass('eltd-btn-outline') && (typeof button.data('icon-hover-bg-color') !== 'undefined' || typeof button.data('icon-hover-bg-color') !== 'undefined')) {
                if (typeof button.data('icon-bg-color') !== 'undefined') {
                    button.children('.eltd-btn-icon-element').css('background-color', button.data('icon-bg-color'));
                }

                var changeButtonIconBg = function (event) {
                    event.data.button.children('.eltd-btn-icon-element').css('background-color', event.data.color);
                };

                var originalIconBgColor = (typeof button.data('icon-bg-color') !== 'undefined') ? button.data('icon-bg-color') : 'transparent';
                var hoverIconBgColor = (typeof button.data('icon-hover-bg-color') !== 'undefined') ? button.data('icon-hover-bg-color') : 'transparent';

                button.on('mouseenter', {button: button, color: hoverIconBgColor}, changeButtonIconBg);
                button.on('mouseleave', {button: button, color: originalIconBgColor}, changeButtonIconBg);
            }
        };

        /**
         * Initializes button border color
         * @param button
         */
        var buttonHoverBorderColor = function (button) {
            if (typeof button.data('hover-border-color') !== 'undefined') {
                var changeBorderColor = function (event) {
                    event.data.button.css('border-color', event.data.color);
                };

                var originalBorderColor = button.css('border-color');
                var hoverBorderColor = button.data('hover-border-color');

                button.on('mouseenter', {button: button, color: hoverBorderColor}, changeBorderColor);
                button.on('mouseleave', {button: button, color: originalBorderColor}, changeBorderColor);
            }
        };

        return {
            init: function () {
                if (buttons.length) {
                    buttons.each(function () {
                        buttonHoverColor($(this));
                        buttonHoverBgColor($(this));
                        buttonHoverBorderColor($(this));
                        buttonIconHoverBgColor($(this));
                    });
                }
            }
        };
    };

    /*
     **	Custom Font resizing
     */
    function eltdCustomFontResize() {
        var customFont = $('.eltd-custom-font-holder');
        if (customFont.length) {
            customFont.each(function () {
                var thisCustomFont = $(this);
                var fontSize;
                var lineHeight;
                var coef1 = 1;
                var coef2 = 1;

                if (eltd.windowWidth < 1200) {
                    coef1 = 0.8;
                }

                if (eltd.windowWidth < 1024) {
                    coef1 = 0.7;
                }

                if (eltd.windowWidth < 768) {
                    coef1 = 0.6;
                    coef2 = 0.7;
                }

                if (eltd.windowWidth < 600) {
                    coef1 = 0.5;
                    coef2 = 0.6;
                }

                if (eltd.windowWidth < 480) {
                    coef1 = 0.4;
                    coef2 = 0.5;
                }

                if (typeof thisCustomFont.data('font-size') !== 'undefined' && thisCustomFont.data('font-size') !== false) {
                    fontSize = parseInt(thisCustomFont.data('font-size'));

                    if (fontSize > 70) {
                        fontSize = Math.round(fontSize * coef1);
                    }
                    else if (fontSize > 35) {
                        fontSize = Math.round(fontSize * coef2);
                    }

                    thisCustomFont.css('font-size', fontSize + 'px');
                }

                if (typeof thisCustomFont.data('line-height') !== 'undefined' && thisCustomFont.data('line-height') !== false) {
                    lineHeight = parseInt(thisCustomFont.data('line-height'));

                    if (lineHeight > 70 && eltd.windowWidth < 1200) {
                        lineHeight = '1.2em';
                    }
                    else if (lineHeight > 35 && eltd.windowWidth < 768) {
                        lineHeight = '1.2em';
                    }
                    else {
                        lineHeight += 'px';
                    }

                    thisCustomFont.css('line-height', lineHeight);
                }
            });
        }
    }

    /*
     **  Init block revealing
     */
    function eltdBlockReveal() {

        var blockHolder = $('.eltd-block-revealing .eltd-bnl-inner');

        if (blockHolder.length) {
            blockHolder.each(function () {
                var thisBlockHolder = $(this);
                var thisBlockNonFeaturedHolder = thisBlockHolder.find('.eltd-pbr-non-featured');
                var thisBlockFeaturedHolder = thisBlockHolder.find('.eltd-pbr-featured');
                var currentItemPosition = 1;
                var activeItemClass = 'eltd-block-reveal-active-item';

                var thisFeaturedBlocks = thisBlockFeaturedHolder.find('.eltd-post-block-part-inner');

                thisFeaturedBlocks.each(function (e) {
                    var thisFeatured = $(this);

                    if (thisFeatured.hasClass('eltd-block-reveal-active-item')) {
                        currentItemPosition = e + 1;
                    }
                });

                thisBlockFeaturedHolder.children('.eltd-post-block-part-inner:nth-child(' + currentItemPosition + ')').addClass(activeItemClass);
                thisBlockFeaturedHolder.children('.eltd-post-block-part-inner:nth-child(' + currentItemPosition + ')').fadeIn(150);

                thisBlockNonFeaturedHolder.find('a').click(function (e) {
                    e.preventDefault();

                    currentItemPosition = $(this).parents('.eltd-pbr-non-featured > .eltd-pbr-non-featured-inner > .eltd-post-item-outer > .eltd-post-item').index() + 1; // +1 is because index start from 0 and list from 1

                    thisBlockFeaturedHolder.children('.eltd-post-block-part-inner').fadeOut(150);
                    thisBlockFeaturedHolder.children('.eltd-post-block-part-inner').removeClass(activeItemClass);


                    thisBlockFeaturedHolder.children('.eltd-post-block-part-inner:nth-child(' + currentItemPosition + ')').addClass(activeItemClass);

                    setTimeout(function () {
                        thisBlockFeaturedHolder.children('.eltd-post-block-part-inner:nth-child(' + currentItemPosition + ')').fadeIn(150);
                    }, 160);
                });

                eltd.modules.common.eltdInitParallax();
            });
        }
    }


    /*
     **  Init breaking news
     */
    function eltdBreakingNews() {

        var bnHolder = $('.eltd-bn-holder');

        if (bnHolder.length) {
            bnHolder.each(function () {
                var thisBnHolder = $(this);

                thisBnHolder.css('display', 'inline-block');

                var slideshowSpeed = (thisBnHolder.data('slideshowSpeed') !== '' && thisBnHolder.data('slideshowSpeed') !== undefined) ? thisBnHolder.data('slideshowSpeed') : 3000;
                var animationSpeed = (thisBnHolder.data('animationSpeed') !== '' && thisBnHolder.data('animationSpeed') !== undefined) ? thisBnHolder.data('animationSpeed') : 400;

                thisBnHolder.flexslider({
                    selector: ".eltd-bn-text",
                    animation: "fade",
                    controlNav: false,
                    directionNav: false,
                    maxItems: 1,
                    allowOneSlide: true,
                    slideshowSpeed: slideshowSpeed,
                    animationSpeed: animationSpeed
                });
            });
        }
    }


    /*
     **  Init sticky sidebar widget
     */
    function eltdInitStickyWidget() {

        var stickyHeader = $('.eltd-sticky-header'),
            mobileHeader = $('.eltd-mobile-header'),
            stickyWidgets = $('.eltd-widget-sticky-sidebar'),
            sidebar;
        if (stickyWidgets.length && eltd.windowWidth > 1024) {

            stickyWidgets.each(function () {
                var widget = $(this),
                    parent = '.eltd-full-section-inner, .eltd-section-inner, .eltd-two-columns-75-25, .eltd-two-columns-25-75, .eltd-two-columns-66-33, .eltd-two-columns-33-66, .eltd-two-columns-7-5, .eltd-two-columns-1-2',
                    stickyHeight = 0,
                    widgetOffset = widget.offset().top;


                if (widget.parent('.eltd-sidebar').length) {
                    sidebar = widget.parents('.eltd-sidebar');
                } else if (widget.parents('.wpb_widgetised_column').length) {
                    sidebar = widget.parents('.wpb_widgetised_column');
                    widget.closest('.wpb_column').css('position', 'static');
                }

                var sidebarOffset = sidebar.offset().top;
                if (eltd.body.hasClass('eltd-sticky-header-on-scroll-down-up')) {
                    stickyHeight = eltdGlobalVars.vars.eltdStickyHeaderHeight;
                } else {
                    stickyHeight = 0;
                }
                var offset = -(widgetOffset - sidebarOffset - stickyHeight - 10); //10 is to push down from browser top edge

                sidebar.stick_in_parent({
                    parent: parent,
                    sticky_class: 'eltd-sticky-sidebar',
                    inner_scrolling: false,
                    offset_top: offset,
                }).on("sticky_kit:bottom", function () { //check if sticky sidebar have hit the bottom and use that class for pull it down when sticky header appears
                    sidebar.addClass('eltd-sticky-sidebar-on-bottom');
                }).on("sticky_kit:unbottom", function () {
                    sidebar.removeClass('eltd-sticky-sidebar-on-bottom');
                });

                $(window).scroll(function () {
                    if (eltd.windowWidth >= 1024) {
                        if (stickyHeader.hasClass('header-appear') && eltd.body.hasClass('eltd-sticky-header-on-scroll-up') && sidebar.hasClass('eltd-sticky-sidebar') && !sidebar.hasClass('eltd-sticky-sidebar-on-bottom')) {
                            sidebar.css('-webkit-transform', 'translateY(' + eltdGlobalVars.vars.eltdStickyHeaderHeight + 'px)');
                            sidebar.css('transform', 'translateY(' + eltdGlobalVars.vars.eltdStickyHeaderHeight + 'px)');
                        } else {
                            sidebar.css('-webkit-transform', 'translateY(0px)');
                            sidebar.css('transform', 'translateY(0px)');
                        }
                    } else {
                        if (mobileHeader.hasClass('mobile-header-appear') && sidebar.hasClass('eltd-sticky-sidebar') && !sidebar.hasClass('eltd-sticky-sidebar-on-bottom')) {
                            sidebar.css('-webkit-transform', 'translateY(' + eltdGlobalVars.vars.eltdMobileHeaderHeight + 'px)');
                            sidebar.css('transform', 'translateY(' + eltdGlobalVars.vars.eltdMobileHeaderHeight + 'px)');
                        } else {
                            sidebar.css('-webkit-transform', 'translateY(0px)');
                            sidebar.css('transform', 'translateY(0px)');
                        }
                    }
                });

            });
        }
    }


    /*
     * Init slider post one
     */
    function eltdInitSliderPostOne() {
        var sliderOneHolder = $('.eltd-sp-one-holder');

        if (sliderOneHolder.length) {

            sliderOneHolder.each(function () {

                var sliderOneData = eltdPostData($(this));
                var sliderOne = $(this).find('.eltd-post-slider');

                // initialise slider
                sliderOne.on('init', function () {

                    // change default opacity on init
                    sliderOneHolder.css({'opacity': '1'});

                }).slick({
                    slidesToShow: sliderOneData.slider_slides_to_show,
                    slidesToScroll: sliderOneData.slider_slides_to_scroll,
                    autoplay: sliderOneData.slider_autoplay,
                    autoplaySpeed: sliderOneData.slider_autoplay_speed,
                    pauseOnHover: sliderOneData.slider_autoplay_pause,
                    arrows: sliderOneData.slider_arrows,
                    dots: sliderOneData.slider_dots,
                    speed: sliderOneData.slider_speed,
                    responsive: [
                        {
                            breakpoint: 1025,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1,
                                autoplay: sliderOneData.slider_autoplay,
                                autoplaySpeed: sliderOneData.slider_autoplay_speed,
                                pauseOnHover: false,
                                arrows: true,
                                dots: sliderOneData.slider_dots,
                                speed: sliderOneData.slider_speed,
                            }
                        },
                        {
                            breakpoint: 769,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1,
                                autoplay: sliderOneData.slider_autoplay,
                                autoplaySpeed: sliderOneData.slider_autoplay_speed,
                                pauseOnHover: false,
                                arrows: true,
                                dots: sliderOneData.slider_dots,
                                speed: sliderOneData.slider_speed,
                            }
                        },
                        {
                            breakpoint: 601,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                autoplay: sliderOneData.slider_autoplay,
                                autoplaySpeed: sliderOneData.slider_autoplay_speed,
                                pauseOnHover: false,
                                arrows: true,
                                dots: sliderOneData.slider_dots,
                                speed: sliderOneData.slider_speed,
                            }
                        },
                    ]
                });

                // set bottom margin for slider holder if dost are being used in slider
                if (sliderOneData.slider_dots === true) {
                    sliderOneHolder.css({'margin-bottom': '52px'});
                }


                if (sliderOneData.slider_arrows === true) {
                    var difference = (sliderOne.height() - sliderOne.find('section:first-child .eltd-pt-image-holder').height() - 44)/2;
                    sliderOne.children('button').css("margin-top",-1*difference+"px");
                }


            });
        }
    }


    /*

     * Init slider post two
     */
    function eltdInitSliderPostTwo() {
        var sliderTwoHolder = $('.eltd-sp-two-holder');

        if (sliderTwoHolder.length) {

            sliderTwoHolder.each(function () {

                var sliderTwoData = eltdPostData($(this));
                var sliderTwo = $(this).find('.eltd-post-slider');

                // initialise slider
                sliderTwo.on('init', function () {

                    // change default opacity on init
                    sliderTwoHolder.css({'opacity': '1'});

                }).slick({
                    slidesToShow: sliderTwoData.slider_slides_to_show,
                    slidesToScroll: sliderTwoData.slider_slides_to_scroll,
                    autoplay: sliderTwoData.slider_autoplay,
                    autoplaySpeed: sliderTwoData.slider_autoplay_speed,
                    pauseOnHover: sliderTwoData.slider_autoplay_pause,
                    arrows: sliderTwoData.slider_arrows,
                    dots: sliderTwoData.slider_dots,
                    speed: sliderTwoData.slider_speed,
                    centerMode: true,
                    centerPadding: '0px',
                    responsive: [
                        {
                            breakpoint: 1025,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1,
                                autoplay: sliderTwoData.slider_autoplay,
                                autoplaySpeed: sliderTwoData.slider_autoplay_speed,
                                pauseOnHover: false,
                                arrows: false,
                                dots: sliderTwoData.slider_dots,
                                speed: sliderTwoData.slider_speed,
                                centerMode: false,
                            }
                        },
                        {
                            breakpoint: 769,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                autoplay: sliderTwoData.slider_autoplay,
                                autoplaySpeed: sliderTwoData.slider_autoplay_speed,
                                pauseOnHover: false,
                                arrows: false,
                                dots: sliderTwoData.slider_dots,
                                speed: sliderTwoData.slider_speed,
                                centerMode: false,
                            }
                        },
                    ]
                });

                // set bottom margin for slider holder if dost are being used in slider
                if (sliderTwoData.slider_dots === true) {
                    sliderTwoHolder.css({'margin-bottom': '52px'});
                }
            });
        }
    }


    /*
     * Init slider post three
     */
    function eltdInitSliderPostThree() {
        var sliderThreeHolder = $('.eltd-sp-three-holder');

        if (sliderThreeHolder.length) {

            sliderThreeHolder.each(function () {

                var sliderThreeData = eltdPostData($(this));
                var sliderThreePrimary = $(this).find('.eltd-post-slider-primary');
                var sliderThreeSecondary = $(this).find('.eltd-post-slider-secondary');

                // initialise primary slider
                sliderThreePrimary.on('init', function () {

                    // change default opacity on init
                    sliderThreeHolder.css({'opacity': '1'});

                }).slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: sliderThreeData.slider_autoplay,
                    autoplaySpeed: sliderThreeData.slider_autoplay_speed,
                    pauseOnHover: sliderThreeData.slider_autoplay_pause,
                    arrows: false,
                    dots: false,
                    speed: sliderThreeData.slider_speed,
                    asNavFor: sliderThreeSecondary,
                    fade: true
                });

                // initialize secondary slider - thumbnail navigation
                sliderThreeSecondary.slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: sliderThreeData.slider_autoplay,
                    autoplaySpeed: sliderThreeData.slider_autoplay_speed,
                    pauseOnHover: sliderThreeData.slider_autoplay_pause,
                    arrows: false,
                    dots: false,
                    speed: sliderThreeData.slider_speed,
                    asNavFor: sliderThreePrimary,
                    fade: false,
                    focusOnSelect: true,
                    responsive: [
                        {
                            breakpoint: 769,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                autoplay: sliderThreeData.slider_autoplay,
                                autoplaySpeed: sliderThreeData.slider_autoplay_speed,
                                pauseOnHover: sliderThreeData.slider_autoplay_pause,
                                arrows: false,
                                dots: false,
                                speed: sliderThreeData.slider_speed,
                                asNavFor: sliderThreePrimary,
                                fade: false,
                                focusOnSelect: true,
                            }
                        }
                    ]
                });

                // custom play/pause on hovering parent container
                if (sliderThreeData.slider_autoplay_pause === true) {
                    sliderThreeHolder.hover(
                        function () {
                            sliderThreePrimary.slick('slickPause');
                            sliderThreeSecondary.slick('slickPause');
                        },
                        function () {
                            sliderThreePrimary.slick('slickPlay');
                            sliderThreeSecondary.slick('slickPlay');
                        }
                    );
                }

                // set height of sliders according to value from shortcode
                sliderThreePrimary.find('.eltd-post-item-inner').innerHeight(sliderThreeData.slider_height);
                sliderThreeSecondary.innerHeight(sliderThreeData.slider_height);
            });
        }
    }


    /*
     * Init slider post four
     */
    function eltdInitSliderPostFour() {
        var sliderFourHolder = $('.eltd-sp-four-holder');

        if (sliderFourHolder.length) {

            sliderFourHolder.each(function () {

                var sliderFourData = eltdPostData($(this));
                var sliderFourPrimary = $(this).find('.eltd-post-slider-primary');
                var sliderFourSecondary = $(this).find('.eltd-post-slider-secondary');

                // initialize primary slider
                sliderFourPrimary.on('init', function () {

                    // change default opacity on init
                    sliderFourHolder.css({'opacity': '1'});

                }).slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: sliderFourData.slider_autoplay,
                    autoplaySpeed: sliderFourData.slider_autoplay_speed,
                    pauseOnHover: sliderFourData.slider_autoplay_pause,
                    arrows: true,
                    appendArrows: '.eltd-slider-navigation-holder',
                    dots: false,
                    speed: sliderFourData.slider_speed,
                    asNavFor: sliderFourSecondary,
                    fade: true,
                    responsive: [
                        {
                            breakpoint: 1025,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                autoplay: sliderFourData.slider_autoplay,
                                autoplaySpeed: sliderFourData.slider_autoplay_speed,
                                pauseOnHover: sliderFourData.slider_autoplay_pause,
                                arrows: true,
                                appendArrows: '.eltd-slider-navigation-holder',
                                dots: true,
                                speed: sliderFourData.slider_speed,
                                fade: true,
                            }
                        }
                    ]
                });

                // initialize secondary slider - thumbnail navigation
                sliderFourSecondary.slick({
                    slidesToShow: sliderFourData.slider_slides_to_show,
                    slidesToScroll: 1,
                    autoplay: sliderFourData.slider_autoplay,
                    autoplaySpeed: sliderFourData.slider_autoplay_speed,
                    pauseOnHover: sliderFourData.slider_autoplay_pause,
                    arrows: true,
                    dots: false,
                    speed: sliderFourData.slider_speed,
                    asNavFor: sliderFourPrimary,
                    fade: false,
                    focusOnSelect: true,
                    responsive: [
                        {
                            breakpoint: 1025,
                            settings: "unslick"
                        }
                    ]
                });

                // custom play/pause on hovering parent container
                if (sliderFourData.slider_autoplay_pause === true) {
                    sliderFourHolder.hover(
                        function () {
                            sliderFourPrimary.slick('slickPause');
                            sliderFourSecondary.slick('slickPause');
                        },
                        function () {
                            sliderFourPrimary.slick('slickPlay');
                            sliderFourSecondary.slick('slickPlay');
                        }
                    );
                }
            });
        }
    }

    /*
     * Init standard category
     */
    function eltdInitStandardCategory() {
        var categoryHolder = $('.eltd-unique-category-layout.eltd-unique-template-standard');
        
        if (categoryHolder.length) {

            categoryHolder.each(function () {

                var categoryLayoutsPrimary,
                    categoryLayoutsSecondary,
                    categoryLayoutsThird,
                    categoryLayoutsThirdPadding,
                    categoryLayoutsThirdInner,
                    difference;

                categoryLayoutsPrimary = $(this).find('.eltd-pl-one-holder');
                categoryLayoutsSecondary = $(this).find('.eltd-pl-two-holder');
                categoryLayoutsThird = $(this).find('.eltd-pl-three-holder');
                categoryLayoutsThirdInner = categoryLayoutsThird.find('.eltd-post-item-inner');

                categoryLayoutsThirdPadding = parseInt(categoryLayoutsThirdInner.css('padding-bottom'));

                difference = categoryLayoutsPrimary.height() - (categoryLayoutsSecondary.height() + (categoryLayoutsThird.height() - categoryLayoutsThirdPadding));


                if(difference > 0) {
                    categoryLayoutsThirdInner.css('padding-bottom', difference+'px');
                }


            });
        }

    }


    /**
     * Object that represents post pagination
     * @returns {{init: Function}} function that initializes post pagination functionality
     */
    var eltdPostPagination = eltd.modules.shortcodes.eltdPostPagination = function () {

        // get all post with load more
        var blogBlockWithPaginationLoadMore = $('.eltd-post-pag-load-more');
        var blogBlockWithPaginationPrevNext = $('.eltd-post-pag-np-horizontal');
        var blogBlockWithPaginationInfinitive = $('.eltd-post-pag-infinite');

        $('.eltd-post-item').addClass('eltd-active-post-page');

        /**
         * Function that triggers load more functionality
         */
        var eltdPostLoadMoreEvent = function (thisBlock) {
            var thisBlockShowLoadMoreHolder = thisBlock.children('.eltd-bnl-navigation-holder'),
                thisBlockShowLoadMore = thisBlockShowLoadMoreHolder.children('.eltd-bnl-load-more'),
                thisBlockShowLoadMoreLoading = thisBlockShowLoadMoreHolder.children('.eltd-bnl-load-more-loading'),
                thisBlockShowLoadMoreButton = thisBlockShowLoadMore.children(),
                blockData = eltdPostData(thisBlock),
                blogBlockOuter = thisBlock.children('.eltd-bnl-outer'),
                isBlockItem = isBlock(thisBlock);

            thisBlockShowLoadMoreButton.on('click', function (e) {
                e.preventDefault();
                e.stopPropagation();

                thisBlockShowLoadMore.hide();
                thisBlockShowLoadMoreLoading.css('display', 'inline-block');

                blockData.paged = blockData.next_page;

                $.ajax({
                    type: 'POST',
                    data: blockData,
                    url: eltdGlobalVars.vars.eltdAjaxUrl,
                    success: function (data) {
                        var response = $.parseJSON(data);
                        if (response.showNextPage === true) {
                            blockData.next_page++;

                            if (isBlockItem) {
                                blogBlockOuter.append(response.html);
                            }
                            else {
                                blogBlockOuter.children('.eltd-bnl-inner').append(response.html);
                            } // Append the new content

                            thisBlock.waitForImages(function () {
                                postAjaxCallback(thisBlock);
                            });

                            if (blockData.max_pages > (blockData.paged)) {
                                thisBlockShowLoadMore.show();
                                thisBlockShowLoadMoreLoading.hide();
                            }
                            else {
                                thisBlockShowLoadMoreHolder.hide();
                            }
                        }
                    }
                });
            });
        };

        /**
         * Function that triggers next prev functionality
         */
        var eltdPostNextPrevEvent = function (thisBlock) {
            var thisBlockPostPrevNextButton = thisBlock.children('.eltd-bnl-navigation-holder').find('a'),
                thisBlockSliderPaging = thisBlock.find('.eltd-bnl-slider-paging'),
                thisBlockAjaxPreloader = thisBlock.children('.eltd-post-ajax-preloader'),
                blockData = eltdPostData(thisBlock),
                blogBlockOuter = thisBlock.children('.eltd-bnl-outer'),
                isBlockItem = isBlock(thisBlock);

            if (thisBlock.hasClass('eltd-post-pag-np-horizontal')) {
                setActivePaging(thisBlockSliderPaging, blockData.paged);
            }

            thisBlockPostPrevNextButton.on('click', function (e) {
                e.preventDefault();
                e.stopPropagation();

                blockData.paged = getClickedButton($(this), blockData);
                if (blockData.paged === false) {
                    return;
                }

                if (!setAjaxLoading(thisBlock, true)) {
                    return;
                }

                if (thisBlock.hasClass('eltd-post-pag-np-horizontal')) {
                    setActivePaging(thisBlockSliderPaging, blockData.paged);
                }

                thisBlockAjaxPreloader.show();

                if (!isBlockItem) {
                    blogBlockOuter.children('.eltd-bnl-inner').find('.eltd-post-item').addClass('eltd-removed-post-page');
                }

                $.ajax({
                    type: 'POST',
                    data: blockData,
                    url: eltdGlobalVars.vars.eltdAjaxUrl,
                    success: function (data) {
                        var response = $.parseJSON(data);
                        if (response.showNextPage === true) {
                            blockData.next_page = blockData.paged + 1;
                            blockData.prev_page = blockData.paged - 1;

                            if (isBlockItem) {
                                blogBlockOuter.html(response.html);
                            }
                            else {
                                var postItems = thisBlock.hasClass('eltd-pl-eight-holder') ? $(response.html).find('.eltd-post-item') : response.html;
                                blogBlockOuter.children('.eltd-bnl-inner').find('.eltd-post-item:last').after(postItems);
                                thisBlock.find('.eltd-removed-post-page').remove();
                            }// Append the new content

                            thisBlock.waitForImages(function () {
                                thisBlock.css('min-height', '');
                                thisBlockAjaxPreloader.hide();
                                setAjaxLoading(thisBlock, false);
                                postAjaxCallback(thisBlock);

                            });
                        }
                    }
                });
            });

            function setAjaxLoading(thisBlock, start) {
                if (start) {
                    if (!thisBlock.hasClass('eltd-post-pag-active')) {
                        thisBlock.css('min-height', thisBlock.height());
                        thisBlock.addClass('eltd-post-pag-active');
                        return true;
                    }
                    else {
                        return false;
                    }
                }

                else if (!start && thisBlock.hasClass('eltd-post-pag-active')) {
                    thisBlock.removeClass('eltd-post-pag-active');
                }

                return true;
            }

            function getClickedButton(thisButton, blockData) {
                if (thisButton.hasClass('eltd-bnl-nav-next') && blockData.next_page <= blockData.max_pages) {
                    blockData.paged = blockData.next_page;
                    return blockData.paged;
                }
                else if (thisButton.hasClass('eltd-bnl-nav-prev') && blockData.prev_page > 0) {
                    blockData.paged = blockData.prev_page;
                    return blockData.paged;
                }
                else if (thisButton.hasClass('eltd-paging-button-holder')) {
                    blockData.paged = thisBlockSliderPaging.children('a').index(thisButton) + 1;
                    return blockData.paged;
                }
                else {
                    return false;
                }
            }

            function setActivePaging(pagingHolder, number) {
                pagingHolder.children('a').removeClass('eltd-bnl-paging-active');
                pagingHolder.children('a:nth-child(' + number + ')').addClass('eltd-bnl-paging-active');
            }
        };

        /**
         * Function that triggers load more functionality
         */
        var eltdPostInfinitiveEvent = function (thisBlock) {
            var blogBlockOuter = thisBlock.children('.eltd-bnl-outer'),
                blockData = eltdPostData(thisBlock),
                isBlockItem = isBlock(thisBlock);

            eltd.window.scroll(function () {

                if (!thisBlock.hasClass('eltd-ajax-infinite-started') && (blockData.next_page <= blockData.max_pages) && ((eltd.window.height() + eltd.window.scrollTop()) > (blogBlockOuter.offset().top + blogBlockOuter.height()))) {

                    var preloaderHTML = '<div class="eltd-inf-scroll-preloader eltd-post-ajax-preloader"><div class="eltd-cubes-holder"><div class="eltd-cube eltd-c1"></div><div class="eltd-cube eltd-c2"></div><div class="eltd-cube eltd-c4"></div><div class="eltd-cube eltd-c3"></div></div></div>';

                    thisBlock.after(preloaderHTML);
                    thisBlock.addClass('eltd-ajax-infinite-started');
                    blockData.paged = blockData.next_page;

                    setTimeout(function () {
                        $.ajax({
                            type: 'POST',
                            data: blockData,
                            url: eltdGlobalVars.vars.eltdAjaxUrl,
                            success: function (data) {
                                var response = $.parseJSON(data);
                                if (response.showNextPage === true) {
                                    blockData.next_page++;

                                    if (isBlockItem) {
                                        blogBlockOuter.append(response.html);
                                    }
                                    else {
                                        blogBlockOuter.children('.eltd-bnl-inner').append(response.html);
                                    } // Append the new content

                                    thisBlock.waitForImages(function () {
                                        postAjaxCallback(thisBlock);
                                        thisBlock.removeClass('eltd-ajax-infinite-started');
                                        $('.eltd-inf-scroll-preloader').remove();
                                    });
                                }
                            }
                        });
                    }, 300); //show inf animation
                }
            });
        };

        function isBlock($thisblock) {
            return ($thisblock.hasClass("eltd-block-holder"));
        }

        function postAjaxCallback(thisBlock) {

            thisBlock.find('.eltd-post-item').addClass('eltd-active-post-page');

            if (thisBlock.parent().hasClass('widget')) {
                eltd.modules.header.eltdDropDownMenu();
                thisBlock.parent().parent().css('height', '');
            }
            eltdBlockReveal();
            eltd.modules.common.eltdPrettyPhoto();
            eltdInitStickyWidget();
        }

        return {
            init: function () {
                if (blogBlockWithPaginationLoadMore.length) {
                    blogBlockWithPaginationLoadMore.each(function () {
                        eltdPostLoadMoreEvent($(this));
                    });
                }
                if (blogBlockWithPaginationPrevNext.length) {
                    blogBlockWithPaginationPrevNext.each(function () {
                        eltdPostNextPrevEvent($(this));
                    });
                }
                if (blogBlockWithPaginationInfinitive.length) {
                    blogBlockWithPaginationInfinitive.each(function () {
                        eltdPostInfinitiveEvent($(this));
                    });
                }
            }
        };
    };

    /*
     * Init pagination - load more
     * @returns object with data parameters
     */

    function eltdPostData(container) {

        var myObj = container.data();

        myObj.action = 'newsroom_elated_list_ajax';

        return myObj;
    }

    /**
     * Object that represents post layout tabs widget
     * @returns {{init: Function}} function that initializes post layout tabs widget functionality
     */
    var eltdPostLayoutTabWidget = eltd.modules.shortcodes.eltdPostLayoutTabWidget = function () {

        var layoutTabsWidget = $('.eltd-plw-tabs');


        var eltdPostLayoutTabWidgetEvent = function (thisWidget) {
            var plwTabsHolder = thisWidget.find('.eltd-plw-tabs-tabs-holder');
            var plwTabsContent = thisWidget.find('.eltd-plw-tabs-content-holder');
            var currentItemPosition = plwTabsHolder.children('.eltd-plw-tabs-tab:first-child').index() + 1; // +1 is because index start from 0 and list from 1

            setActiveTab(plwTabsContent, plwTabsHolder, currentItemPosition);

            plwTabsHolder.find('a').mouseover(function (e) {
                e.preventDefault();

                currentItemPosition = $(this).parents('.eltd-plw-tabs-tab').index() + 1; // +1 is because index start from 0 and list from 1

                setActiveTab(plwTabsContent, plwTabsHolder, currentItemPosition);
            });
        };

        function setActiveTab(plwTabsContent, plwTabsHolder, currentItemPosition) {
            var activeItemClass = 'eltd-plw-tabs-active-item';

            plwTabsContent.children('.eltd-plw-tabs-content').removeClass(activeItemClass);
            plwTabsHolder.children('.eltd-plw-tabs-tab').removeClass(activeItemClass);

            var height = plwTabsContent.children('.eltd-plw-tabs-content:nth-child(' + currentItemPosition + ')').addClass(activeItemClass).height();
            plwTabsContent.css('min-height', height + 'px');
            plwTabsHolder.children('.eltd-plw-tabs-tab:nth-child(' + currentItemPosition + ')').addClass(activeItemClass);
        }

        return {
            init: function () {
                if (layoutTabsWidget.length) {
                    layoutTabsWidget.each(function () {
                        eltdPostLayoutTabWidgetEvent($(this));
                    });
                }
            },

        };
    };

    /*
     * Recent comments hover
     */
    function eltdRecentCommentsHover() {
        var link = $('footer .eltd-rpc-link');
        if (link.length) {
            link.each(function () {
                var thisLink = $(this),
                    commentsNumber = thisLink.closest('li').find('.eltd-rpc-number-holder');
                thisLink.mouseenter(function () {
                    commentsNumber.addClass('eltd-hovered');
                });
                thisLink.mouseleave(function () {
                    commentsNumber.removeClass('eltd-hovered');
                });

            });
        }
    }


    /*
     **	Show Google Map
     */
    function eltdShowGoogleMap() {

        if ($('.eltd-google-map').length) {
            $('.eltd-google-map').each(function () {

                var element = $(this);

                var customMapStyle;
                if (typeof element.data('custom-map-style') !== 'undefined') {
                    customMapStyle = element.data('custom-map-style');
                }

                var colorOverlay;
                if (typeof element.data('color-overlay') !== 'undefined' && element.data('color-overlay') !== false) {
                    colorOverlay = element.data('color-overlay');
                }

                var saturation;
                if (typeof element.data('saturation') !== 'undefined' && element.data('saturation') !== false) {
                    saturation = element.data('saturation');
                }

                var lightness;
                if (typeof element.data('lightness') !== 'undefined' && element.data('lightness') !== false) {
                    lightness = element.data('lightness');
                }

                var zoom;
                if (typeof element.data('zoom') !== 'undefined' && element.data('zoom') !== false) {
                    zoom = element.data('zoom');
                }

                var pin;
                if (typeof element.data('pin') !== 'undefined' && element.data('pin') !== false) {
                    pin = element.data('pin');
                }

                var mapHeight;
                if (typeof element.data('height') !== 'undefined' && element.data('height') !== false) {
                    mapHeight = element.data('height');
                }

                var uniqueId;
                if (typeof element.data('unique-id') !== 'undefined' && element.data('unique-id') !== false) {
                    uniqueId = element.data('unique-id');
                }

                var scrollWheel;
                if (typeof element.data('scroll-wheel') !== 'undefined') {
                    scrollWheel = element.data('scroll-wheel');
                }
                var addresses;
                if (typeof element.data('addresses') !== 'undefined' && element.data('addresses') !== false) {
                    addresses = element.data('addresses');
                }

                var map = "map_" + uniqueId;
                var geocoder = "geocoder_" + uniqueId;
                var holderId = "eltd-map-" + uniqueId;

                eltdInitializeGoogleMap(customMapStyle, colorOverlay, saturation, lightness, scrollWheel, zoom, holderId, mapHeight, pin, map, geocoder, addresses);
            });
        }

    }

    /*
     **	Init Google Map
     */
    function eltdInitializeGoogleMap(customMapStyle, color, saturation, lightness, wheel, zoom, holderId, height, pin, map, geocoder, data) {

        var mapStyles = [
            {
                stylers: [
                    {hue: color},
                    {saturation: saturation},
                    {lightness: lightness},
                    {gamma: 1}
                ]
            }
        ];

        var googleMapStyleId;

        if (customMapStyle) {
            googleMapStyleId = 'eltd-style';
        } else {
            googleMapStyleId = google.maps.MapTypeId.ROADMAP;
        }

        var qoogleMapType = new google.maps.StyledMapType(mapStyles,
            {name: "Elated Google Map"});

        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(-34.397, 150.644);

        if (!isNaN(height)) {
            height = height + 'px';
        }

        var myOptions = {

            zoom: zoom,
            scrollwheel: wheel,
            center: latlng,
            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.SMALL,
                position: google.maps.ControlPosition.RIGHT_CENTER
            },
            scaleControl: false,
            scaleControlOptions: {
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            streetViewControl: false,
            streetViewControlOptions: {
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            panControl: false,
            panControlOptions: {
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            mapTypeControl: false,
            mapTypeControlOptions: {
                mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'eltd-style'],
                style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            mapTypeId: googleMapStyleId
        };

        map = new google.maps.Map(document.getElementById(holderId), myOptions);
        map.mapTypes.set('eltd-style', qoogleMapType);

        var index;

        for (index = 0; index < data.length; ++index) {
            eltdInitializeGoogleAddress(data[index], pin, map, geocoder);
        }

        var holderElement = document.getElementById(holderId);
        holderElement.style.height = height;
    }

    /*
     **	Init Google Map Addresses
     */
    function eltdInitializeGoogleAddress(data, pin, map, geocoder) {
        if (data === '')
            return;
        var contentString = '<div id="content">' +
            '<div id="siteNotice">' +
            '</div>' +
            '<div id="bodyContent">' +
            '<p>' + data + '</p>' +
            '</div>' +
            '</div>';
        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });
        geocoder.geocode({'address': data}, function (results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location,
                    icon: pin,
                    title: data['store_title']
                });
                google.maps.event.addListener(marker, 'click', function () {
                    infowindow.open(map, marker);
                });

                google.maps.event.addDomListener(window, 'resize', function () {
                    map.setCenter(results[0].geometry.location);
                });

            }
        });
    }


    function eltdInitBlogMasonryGallery() {

        if ($('.eltd-blog-masonry').length) {
            $('.eltd-blog-masonry').each(function () {
                var container = $(this);
                var gridGutter = container.find('.eltd-blog-masonry-grid-gutter');
                var gridSizer = container.find('.eltd-blog-masonry-grid-sizer');

                eltdResizeBlogMasonryGallery(container, gridSizer.width(), gridGutter.width());

                container.width(Math.round(container.parent().width()));
                container.isotope({
                    itemSelector: '.eltd-blog-masonry-item',
                    resizable: false,
                    masonry: {
                        columnWidth: '.eltd-blog-masonry-grid-sizer',
                        gutter: '.eltd-blog-masonry-grid-gutter'
                    }
                });


                container.waitForImages(function () {
                    container.animate({opacity: "1"}, 300, function () {
                        container.isotope().isotope('layout');
                    });
                });

                $(window).resize(function () {
                    eltdResizeBlogMasonryGallery(container, gridSizer.width(), gridGutter.width());
                    container.isotope().isotope('layout');
                    container.width(Math.round(container.parent().width()));
                });
            });
        }

    }

    function eltdResizeBlogMasonryGallery(masonry, size, gutter) {

        var rectanglePortrait = masonry.find('.eltd-masonry-large-height');
        var rectangleLandscape = masonry.find('.eltd-masonry-large-width');
        var squareSmall = masonry.find('.eltd-masonry-default');

        rectanglePortrait.css('height', 2 * size + gutter);
        rectangleLandscape.css('height', size);
        if (eltd.windowWidth < 480) {
            rectangleLandscape.css('height', size / 2);
            rectanglePortrait.css('height', 2 * size);
        }
        squareSmall.css('height', size);
    }

})(jQuery);
(function($) {
    'use strict';

    var woocommerce = {};
    eltd.modules.woocommerce = woocommerce;

    woocommerce.eltdInitQuantityButtons = eltdInitQuantityButtons;
    woocommerce.eltdInitSelect2 = eltdInitSelect2;

    woocommerce.eltdOnDocumentReady = eltdOnDocumentReady;
    woocommerce.eltdOnWindowLoad = eltdOnWindowLoad;
    woocommerce.eltdOnWindowResize = eltdOnWindowResize;
    woocommerce.eltdOnWindowScroll = eltdOnWindowScroll;

    $(document).ready(eltdOnDocumentReady);
    $(window).load(eltdOnWindowLoad);
    $(window).resize(eltdOnWindowResize);
    $(window).scroll(eltdOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdOnDocumentReady() {
        eltdInitQuantityButtons();
        eltdInitSelect2();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function eltdOnWindowLoad() {

    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function eltdOnWindowResize() {

    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function eltdOnWindowScroll() {

    }
    

    function eltdInitQuantityButtons() {

        $(document).on( 'click', '.eltd-quantity-minus, .eltd-quantity-plus', function(e) {
            e.stopPropagation();

            var button = $(this),
                inputField = button.siblings('.eltd-quantity-input'),
                step = parseFloat(inputField.attr('step')),
                max = parseFloat(inputField.attr('max')),
                minus = false,
                inputValue = parseFloat(inputField.val()),
                newInputValue;

            if (button.hasClass('eltd-quantity-minus')) {
                minus = true;
            }

            if (minus) {
                newInputValue = inputValue - step;
                if (newInputValue >= 1) {
                    inputField.val(newInputValue);
                } else {
                    inputField.val(1);
                }
            } else {
                newInputValue = inputValue + step;
                if ( max === undefined ) {
                    inputField.val(newInputValue);
                } else {
                    if ( newInputValue >= max ) {
                        inputField.val(max);
                    } else {
                        inputField.val(newInputValue);
                    }
                }
            }
            inputField.trigger( 'change' );
        });

    }

    function eltdInitSelect2() {

        if ($('.woocommerce-ordering .orderby').length ||  $('#calc_shipping_country').length ) {

            $('.woocommerce-ordering .orderby').select2({
                minimumResultsForSearch: Infinity
            });

            $('#calc_shipping_country').select2();

        }

    }


})(jQuery);