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