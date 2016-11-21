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