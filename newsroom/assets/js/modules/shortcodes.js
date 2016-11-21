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