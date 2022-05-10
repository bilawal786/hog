<template>
    <div>
        <!-- ====== Header Top Area ====== -->
        <header class="header-top-area bg-nero">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-7 hidden-xs">
                        <div class="header-content-left">
                            <ul class="header-top-menu">

                            </ul><!-- /.header-top-menu -->
                        </div><!-- /.header-content-left -->
                    </div><!-- /.col-md-9 -->

                    <div class="col-md-6 col-sm-5">
                        <div class="header-content-right">
                            <ul class="header-top-menu">
                                <li class="mdn">
                                    <a href="tel:+19167406447" class="top-left-menu">
                                        <i class="fa fa-phone"></i>
                                        <span>(916) 740-6447</span>
                                    </a>
                                </li>
                                <li class="mdn">
                                    <a href="mailto:contact@heartofgoldmedtransport.com" class="top-left-menu">
                                        <i class="fa fa-envelope"></i>
                                        <span>contact@heartofgoldmedtransport.com</span>
                                    </a>
                                </li>
                                <!--                            <li>-->
                                <!--                                <a href="#" class="trigger-overlay">-->
                                <!--                                    <i class="fa fa-bars"></i>-->
                                <!--                                </a>-->
                                <!--                            </li>-->
                            </ul>
                        </div><!-- /.left-content -->
                    </div><!-- /.col-md-3 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </header><!-- /.head-area -->
        <div class="header-modal-area">
            <!-- Modal Search -->
            <div class="overlay overlay-scale">
                <button type="button" class="overlay-close">&#x2716;</button>
                <div class="overlay__content">
                    <form id="search-form" class="search-form outer" action="#" method="post">
                        <div class="input-group">
                            <input type="text" class=" input--full" placeholder="search text here ...">
                        </div>
                        <button class="btn text-uppercase search-button">Search</button>
                    </form>
                </div>
            </div>

            <div class="overlay-sidebar">
                <div class="author-area">
                    <a href="#" class="closebtn">&times;</a>
                    <div class="author-area-content">
                        <div class="login-author">
                            <div class="author-info">
                                <div class="author-image yellow-border">
                                    <img src="assets/images/driver/driver-03.png" alt="author-image" />
                                </div><!-- /.author-image -->
                                <div class="author-des">
                                    <h4 class="author-name">Mr. Johan Smith</h4>
                                    <p class="author-description">Programmer</p>
                                </div><!-- /.author-des -->
                            </div><!-- /.author-info -->
                            <div class="author-menu">
                                <ul class="yellow-color">
                                    <li><a href=""><i class="fa fa-user-circle-o"></i>Author Dashboard</a></li>
                                    <li><a href=""><i class="fa fa-envelope-open"></i>Your Inbox</a></li>
                                    <li><a href=""><i class="fa fa-location-arrow"></i>Track your texi</a></li>
                                    <li><a href=""><i class="fa fa-area-chart"></i>Your Bookings Status</a></li>
                                    <li><a href=""><i class="fa fa-automobile"></i>New Bookings</a></li>
                                    <li><a href=""><i class="fa fa-archive"></i>Your Bookings</a></li>
                                    <li><a href=""><i class="fa fa-money"></i>Your Deposit - $150.00</a></li>
                                    <li><a href=""><i class="fa fa-sign-out"></i>Sign Out</a></li>
                                </ul>
                            </div><!-- /.author-menu -->
                        </div><!-- /.login-author -->
                    </div><!-- /.author-area-content -->
                </div><!-- /.author-area -->
            </div><!-- /.overlay-sidebar -->
        </div><!-- /.header-modal-area -->

        <!-- ====== Header Nav Area ====== -->
        <header class="header-nav-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-sm-10 col-xs-10">
                        <div class="site-logo">
                            <a href="index.html"><img class="mlogo" style="margin-top: -40px"
                                    src="assets/images/heart-of-gold.png" alt="logo" /></a>
                        </div><!-- /.logo -->
                    </div><!-- /.col-md-3 -->
                    <div class="col-md-9 col-sm-2 col-xs-2 pd-right-0">
                        <nav class="site-navigation top-navigation nav-style-one">
                            <div class="menu-wrapper">
                                <div class="menu-content">
                                    <ul class="menu-list">
                                        <li>
                                            <router-link to="/">HOME</router-link>
                                        </li>
                                        <li>
                                            <router-link to="/about">ABOUT</router-link>
                                        </li>
                                        <li>
                                            <router-link to="/services">SERVICES</router-link>
                                        </li>
                                        <li>
                                            <router-link to="/contact">CONTACT US</router-link>
                                        </li>
                                        <li>
                                            <router-link to="/resources">RESOURCES</router-link>
                                        </li>
                                    </ul> <!-- /.menu-list -->
                                </div> <!-- /.menu-content-->
                            </div> <!-- /.menu-wrapper -->
                        </nav><!-- /.site-navigation -->
                        <!--Mobile Main Menu-->
                        <div class="mobile-menu-main hidden-md hidden-lg">
                            <div class="menucontent overlaybg"> </div>
                            <div class="menuexpandermain slideRight">
                                <a id="navtoggole-main" class="animated-arrow slideLeft menuclose">
                                    <span></span>
                                </a>
                            </div>
                            <!--/.menuexpandermain-->

                            <div id="mobile-main-nav" class="mb-navigation slideLeft">
                                <div class="menu-wrapper">
                                    <div id="main-mobile-container" class="menu-content clearfix"></div>
                                </div>
                            </div>
                            <!--/#mobile-main-nav-->
                        </div>
                        <!--/.mobile-menu-main-->
                    </div><!-- /.col-md-9 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </header><!-- /.header-bottom-area -->

        <router-view> </router-view>
        <footer class="footer-block bg-black" style="background-image: url(assets/images/footer-bg.png);">
            <div class="container">
                <!-- footer-top-block -->
                <div class="footer-top-block yellow-theme">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="widget widget_about">
                                <h3 class="widget-title">
                                    About us
                                </h3><!-- /.widget-title -->
                                <div class="widget-about-content">
                                    <img src="assets/images/footlogo.png" alt="logo" />
                                    <p>Heart of Gold Medical Transport is a family-owned non-emergency medical
                                        transportation company serving the greater Sacramento area since 2016. Its
                                        owners are Megan and Cecilia.

                                        Megan has worked as a nurse since 2009, becoming a Registered Nurse</p>
                                    <router-link to="/about" class="button">Reade More</router-link>
                                </div><!-- /.widget-content -->
                            </div><!-- /.widget widget_about -->
                        </div><!-- /.col-md-3 -->
                        <div class="col-md-4 col-sm-6">
                            <div class="widget widget_menu">
                                <h3 class="widget-title">
                                    Useful link
                                </h3><!-- /.widget-title -->
                                <ul>
                                    <li><router-link to="/fqa">FAQ</router-link></li>
                                    <li><router-link to="/contact"> Contact Support</router-link></li>
                                    <li><router-link to="/policy">Privacy Policy</router-link></li>
                                </ul>
                            </div><!-- /.widget -->
                        </div><!-- /.col-md-3 -->

                        <div class="col-md-4 col-sm-6">
                            <div class="widget widget_hot_contact">
                                <h3 class="widget-title">
                                    STAY CONNECTED
                                </h3><!-- /.widget-title -->
                                <ul>
                                    <li><a href="#"><i
                                                class="fa fa-envelope"></i>contact@heartofgoldmedtransport.com</a></li>
                                    <li><a href="#"><i class="fa fa-phone"></i> (916) 740-6447</a></li>
                                    <li><a href="#"><i class="fa fa-map-marker"></i>1329 Howe Ave #205, Sacramento, CA
                                            95825</a></li>
                                </ul>
                            </div><!-- /.widget -->
                        </div><!-- /.col-md-3 -->

                    </div><!-- /.row -->
                </div><!-- /.footer-top-block -->

                <!-- footer-bottom-block -->
                <div class="footer-bottom-block">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="bottom-content-left">
                                <p class="copyright">Copyright &copy; 2020 Heart of Gold</p>
                            </div><!-- /.bottom-top-content -->
                        </div><!-- /.col-md-9 -->
                        <div class="col-md-3">
                           
                        </div><!-- /.col-md-3 -->
                    </div><!-- /.row -->
                </div><!-- /.footer-bottom-block -->
            </div><!-- /.container -->
        </footer><!-- /.footer-block -->
    </div>
</template>

<style lang="scss" scoped>
//   @import "../styles/sass/style.scss";
</style>
<script>
export default {
    mounted() {
        var modelApp = {

            /* ---------------------------------------------
             Menu
             --------------------------------------------- */
            menu: function () {
                var $combinedmenu = $(".site-navigation .menu-list").clone();
                $combinedmenu.appendTo("#mobile-main-nav #main-mobile-container");

                var $submenu = $(".sub-menu"),
                    $hasSubmenu = $(".menu-list li").has(".sub-menu"),
                    $subMenuMark = $("<span class='fa fa-angle-down'></span>"),
                    $mobileNavClass = $("#main-mobile-container .main-navigation"),
                    $mobileOverlay = $(".mobile-menu-main .menucontent.overlaybg, .mobile-menu-main .slideLeft"),
                    $mobileNavContent = $('.mobile-menu-main .menucontent'),
                    $mobileNavBar = $('#navtoggole-main');

                if ($hasSubmenu) {
                    $submenu.prev().append($subMenuMark);
                }
                // Main Navigation Mobile
                // --------------------------------
                $mobileNavClass.addClass('slideLeft');

                var menuopen_main = function () {
                    $mobileOverlay.removeClass('menuclose').addClass('menuopen');
                },
                    menuclose_main = function () {
                        $mobileOverlay.removeClass('menuopen').addClass('menuclose');
                    };
                $mobileNavBar.on('click', function () {
                    if ($mobileNavContent.hasClass('menuopen')) {
                        $(menuclose_main);
                    } else {
                        $(menuopen_main);
                    }
                });
                $mobileNavContent.on('click', function () {
                    if ($mobileNavContent.hasClass('menuopen')) {
                        $(menuclose_main);
                    }
                });

                // Sub Menu
                // --------------------------------
                $hasSubmenu.prepend("<span class='menu-click'><i class='menu-arrow fa fa-plus'></i></span>");

                var $menuMobile = $(".menu-mobile"),
                    $menuWrap = $(".menu-list");
                $menuMobile.on("click", function () {
                    $menuWrap.slideToggle("slow");
                });

                var $mobileSubMenuOpen = $(".menu-click");
                $mobileSubMenuOpen.on("click", function () {
                    var $self = $(this);
                    $self.siblings(".sub-menu").slideToggle("slow");
                    $self.children(".menu-arrow").toggleClass("menu-extend");
                });

                var $navRightIssue = $(".navigation .mainmenu li");
                $navRightIssue.on("mouseenter mouseleave", function (e) {
                    var $self = $(this);
                    if ($("ul", $self).length) {
                        var elm = $("ul:first", $self),
                            off = elm.offset(),
                            l = off.left,
                            w = elm.width(),
                            docW = $(".header-bottom > .container").width(),
                            isEntirelyVisible = (l + w <= docW);

                        if (!isEntirelyVisible) {
                            $self.addClass("right-side-menu");
                        } else {
                            $self.removeClass("right-side-menu");
                        }
                    }
                });

                var $mbHeaderTop = $('.header-top-menu li a');
                $mbHeaderTop.on('click', function () {
                    $(this).next('ul').slideToggle('slow');
                    return false;
                });

                var $slimeScrollSelector = $(".mb-navigation .menu-wrapper, .author-area-content");
                $slimeScrollSelector.slimscroll({
                    height: '100%',
                    size: '5px'
                });
            },
            /* ---------------------------------------------
            slider_style_two
             --------------------------------------------- */
            slider_style_two: function () {
                var $mainSliderTwo = $(".slider-style-two");
                $mainSliderTwo.each(function () {
                    var $self = $(this);
                    var $sliderItems = $(this).data("item");
                    var $sliderItemsMargin = $(this).data("margin");
                    var $sliderCenterItem = $(this).data("center");
                    ($sliderCenterItem == "true") ? true : false;
                    (typeof $sliderItemsMargin !== "undefined") ? $sliderItemsMargin : $sliderItemsMargin = 30;
                    $self.owlCarousel({
                        loop: true,
                        items: (typeof $sliderItems !== "undefined") ? $sliderItems[0] : 3,
                        margin: $sliderItemsMargin,
                        center: $sliderCenterItem,
                        responsive: {
                            280: {
                                items: (typeof $sliderItems !== "undefined") ? $sliderItems[3] : 1
                            },
                            480: {
                                items: (typeof $sliderItems !== "undefined") ? $sliderItems[2] : 1
                            },
                            768: {
                                items: (typeof $sliderItems !== "undefined") ? $sliderItems[1] : 2
                            },
                            1200: {
                                items: (typeof $sliderItems !== "undefined") ? $sliderItems[0] : 3
                            }
                        }
                    });
                    $self.each(function () {
                        var $this = $(this),
                            $next_element = $this.prevAll().find('.block-navigation-area .item-navigation  .next-item'),
                            $previous_element = $this.prevAll().find('.block-navigation-area .item-navigation .previous-item');

                        $next_element.on('click', function (e) {
                            e.preventDefault();
                            $this.trigger('next.owl.carousel');
                        });
                        $previous_element.on('click', function (e) {
                            e.preventDefault();
                            $this.trigger('prev.owl.carousel', [300]);
                        });
                    });
                });
            },
            /* ---------------------------------------------
            brand-slider
             --------------------------------------------- */
            brand_slider: function () {
                var $brandSlider = $(".brand-carousel");
                $brandSlider.owlCarousel({
                    loop: true,
                    margin: 15,
                    responsive: {
                        280: {
                            items: 1
                        },
                        480: {
                            items: 3
                        },
                        768: {
                            items: 4
                        },
                        1200: {
                            items: 7
                        }
                    }
                });
                $brandSlider.each(function () {
                    var $this = $(this),
                        $next_element = $this.prevAll().find('.block-navigation-area .item-navigation  .next-item'),
                        $previous_element = $this.prevAll().find('.block-navigation-area .item-navigation .previous-item');

                    $next_element.on('click', function (e) {
                        e.preventDefault();
                        $this.trigger('next.owl.carousel');
                    });
                    $previous_element.on('click', function (e) {
                        e.preventDefault();
                        // With optional speed parameter
                        // Parameters has to be in square bracket '[]'
                        $this.trigger('prev.owl.carousel', [300]);
                    });
                });
            },

            /* ---------------------------------------------
             fun_fects
             --------------------------------------------- */
            fun_fects: function () {
                var $countSelector = $(".stat-count");
                if ($countSelector.length) {
                    $countSelector.countTo();
                }
            },

            /* ---------------------------------------------
             Time Count For Coming Soon
             --------------------------------------------- */
            time_count: function () {
                var $selector = $('.commingsoon-count');
                $selector.each(function () {
                    var $this = $(this),
                        data_year = $this.attr('data-year'),
                        data_month = $this.attr('data-month'),
                        data_day = $this.attr('data-day'),
                        data_hour = $this.attr('data-hour'),
                        data_minutes = $this.attr('data-minutes');
                    $this.syotimer({
                        year: data_year,
                        month: data_month,
                        day: data_day,
                        hour: data_hour,
                        minute: data_minutes
                    });
                });
            },
            /* ---------------------------------------------
             Accordion Panel
             --------------------------------------------- */
            accordion: function () {
                var $panelHeading = $(".panel-heading");
                $panelHeading.each(function () {
                    if ($(this).next().hasClass('in')) {
                        $(this).children().addClass('menu-extend');
                    }
                    $(this).on('click', function (e) {
                        if ($(this).parent().prevAll().children().children().hasClass('menu-extend')) {
                            $(this).parent().prevAll().children().children().removeClass('menu-extend');
                        } else if ($(this).parent().nextAll().children().children().hasClass('menu-extend')) {
                            $(this).parent().nextAll().children().children().removeClass('menu-extend')
                        }
                        $(this).children().addClass('menu-extend');
                    });
                });
            },

            /* ---------------------------------------------
            Gallery Style Two Carousel
            --------------------------------------------- */
            gallary: function () {
                var $sync1 = $(".full-view"),
                    $sync2 = $(".list-view"),
                    duration = 300;

                $sync1
                    .owlCarousel({
                        items: 1,
                        margin: 0,
                        nav: false,
                        owl2row: 'true',
                        owl2rowTarget: 'item'
                    })
                    .on('changed.owl.carousel', function (e) {
                        var syncedPosition = syncPosition(e.item.index);
                        if (syncedPosition !== "stayStill") {
                            $sync2.trigger('to.owl.carousel', [syncedPosition, duration, true]);
                        }
                    });
                $sync2
                    .owlCarousel({
                        margin: 15,
                        items: 6,
                        nav: false,
                        center: false,
                        dots: false,
                        responsive: {
                            280: {
                                items: 2
                            },
                            500: {
                                items: 2
                            },
                            600: {
                                items: 3
                            },
                            800: {
                                items: 4
                            },
                            1000: {
                                items: 6
                            },
                            1200: {
                                items: 6
                            },
                            1400: {
                                items: 6
                            },
                        }
                    })
                    .on('initialized.owl.carousel', function () {
                        addClassCurrent(0);
                    })
                    .on('click', '.owl-item', function () {
                        $sync1.trigger('to.owl.carousel', [$(this).index(), duration, true]);

                    });
                function addClassCurrent(index) {
                    $sync2
                        .find(".owl-item.active")
                        .removeClass("current")
                        .eq(index)
                        .addClass("current");
                }
                addClassCurrent(0);
                function syncPosition(index) {
                    addClassCurrent(index);
                    var itemsNo = $sync2.find(".owl-item").length;
                    var visibleItemsNo = $sync2.find(".owl-item.active").length;

                    if (itemsNo === visibleItemsNo) {
                        return "stayStill";
                    }
                    var visibleCurrentIndex = $sync2.find(".owl-item.active").index($sync2.find(".owl-item.current"));
                    if (visibleCurrentIndex === 0 && index !== 0) {
                        return index - 1;
                    }
                    if (visibleCurrentIndex === (visibleItemsNo - 1) && index !== (itemsNo - 1)) {
                        return index - visibleItemsNo + 2;
                    }
                    return "stayStill";
                }
            },
            /* ---------------------------------------------
             Scroll top
             --------------------------------------------- */
            scroll_top: function () {
                var $bodyElement = $("body"),
                    $window = $(window),
                    $scrollHtml = $("<a href='#top' id='scroll-top' class='topbutton btn-hide'><span class='glyphicon glyphicon-menu-up'></span></a>");

                $bodyElement.append($scrollHtml);

                var $scrolltop = $("#scroll-top");
                $window.on("scroll", function () {
                    if ($(this).scrollTop() > $(this).height()) {
                        $scrolltop
                            .addClass("btn-show")
                            .removeClass("btn-hide");
                    } else {
                        $scrolltop
                            .addClass("btn-hide")
                            .removeClass("btn-show");
                    }
                });

                var $selectorAnchor = $("a[href='#top']");
                $selectorAnchor.on("click", function () {
                    $("html, body").animate({
                        scrollTop: 0
                    }, "normal");
                    return false;
                });
            },
            /* ---------------------------------------------
            Date Picker
            --------------------------------------------- */
            datePicker: function () {
                var $dateSelector = $(".date-selector");
                var $timeSelector = $(".time-selector");
                $dateSelector.datetimepicker({
                    yearOffset: 0,
                    lang: 'en',
                    timepicker: false,
                    format: 'd/m/Y',
                    formatDate: 'Y/m/d',
                    minDate: "1"
                });
                $timeSelector.datetimepicker({
                    datepicker: false,
                    format: 'H:i',
                    step: 5
                });
            },
            /* ---------------------------------------------
            Search Overlay
            --------------------------------------------- */
            searchOverlay: function () {
                var triggerBttn = $(".search-open"),
                    overlay = $("div.overlay-scale"),
                    closeBttn = $("button.overlay-close");
                triggerBttn.on("click", function () {
                    overlay.addClass("open");
                    console.log(overlay);
                    return false;
                });

                closeBttn.on("click", function () {
                    overlay.removeClass("open");
                    return false;
                });
                function openNav() {
                    var $authorSelector = $(".author-area");
                    $authorSelector.addClass("open")
                }
                function closeNav() {
                    var $authorSelector = $(".author-area");
                    $authorSelector.removeClass("open");
                }

                var $triggerBtn = $(".trigger-overlay");
                $triggerBtn.on("click", function () {
                    openNav();
                    return false;
                });
                var $closeBtn = $(".closebtn");
                $closeBtn.on("click", function () {
                    closeNav();
                    return false;
                });

                $(document).on('click', function (e) {
                    var $authorSelectorDoc = $(".author-area");
                    if (!$authorSelectorDoc.is(e.target) && $authorSelectorDoc.has(e.target).length === 0) {
                        $authorSelectorDoc.removeClass("open");
                    }
                });

                var $advanceSearchBtn = $(".advanced-search-btn");
                $advanceSearchBtn.on("click", function () {
                    var $advanceSerachContainer = $(".advance-search");
                    $advanceSerachContainer.slideToggle()
                    return false;
                });
            },
            /* ---------------------------------------------
            Mobile Tab
            --------------------------------------------- */
            mobileTab: function () {
                var $tabli = $('.vehicle-filter-area li a, .post-filter-area li a');
                var $nextEL = $('.vehicle-filter-area, .post-filter-area');

                var $selectOption = $('<select class="responsive-nav visible-xs-block visible-sm-block"/>');

                $tabli.each(function (e, value) {
                    var $select = $("<option value='" + e + "'>" + $(this).text() + "</option>");
                    $selectOption.append($select);
                });
                $selectOption.appendTo($nextEL);

                var $responsiveNav = $(".responsive-nav");

                $responsiveNav.on("change", function (e) {
                    var url = $(this).val();
                    if ($.isNumeric(url) === true) {
                        var $navSlector = $(".vehicle-filter-area li a, .post-filter-area li a");
                        $navSlector.eq(url).tab('show');
                    } else {
                        window.location = url;
                    }
                });
            },
            /* ---------------------------------------------
            Map iframe
            --------------------------------------------- */
            mapIframe: function () {
                var $mapIframe = $(".header-map-content");
                $mapIframe
                    .click(function () {
                        var $self = $(this);
                        $self.find("iframe").addClass("clicked");
                    })
                    .mouseleave(function () {
                        var $self = $(this);
                        $self.find("iframe").removeClass("clicked");
                    });
            },

            /* ---------------------------------------------
             Widget Mobile fix
             --------------------------------------------- */
            widget_mobile: function () {
                function debouncer(func, timeout) {
                    var timeoutID, timeout = timeout || 500;
                    return function () {
                        var scope = this,
                            args = arguments;
                        clearTimeout(timeoutID);
                        timeoutID = setTimeout(function () {
                            func.apply(scope, Array.prototype.slice.call(args));
                        }, timeout);
                    }
                }
                function resized() {
                    var getWidgetTitle = $('.widget .widget-title');
                    var getWidgetTitleContent;
                    if ($(window).width() <= 991) {
                        getWidgetTitleContent = $('.widget .widget-title').nextAll().hide();
                        getWidgetTitle.addClass('expand-margin');
                        getWidgetTitle.on('click', function (e) {
                            e.stopImmediatePropagation();
                            $(this).toggleClass('expand');
                            $(this).nextAll().slideToggle();
                            return false;
                        });
                        getWidgetTitle.each(function () {
                            $(this).addClass('mb-widget');
                        });
                    } else {
                        getWidgetTitleContent = $('.widget .widget-title').nextAll().show();
                        getWidgetTitle.removeClass('expand-margin');
                        getWidgetTitle.each(function () {
                            $(this).parent().removeClass('mb-widget');
                        });
                    };
                }
                resized();

                var prevW = window.innerWidth || $(window).width();
                $(window).resize(debouncer(function (e) {
                    var currentW = window.innerWidth || $(window).width();
                    if (currentW != prevW) {
                        resized();
                    }
                    prevW = window.innerWidth || $(window).width();
                }));

                //Mobile Responsive
                var $extendBtn = $(".extend-btn .extend-icon");
                $extendBtn.on("click", function (e) {
                    e.preventDefault();
                    var $self = $(this);
                    $self.parent().prev().toggleClass("mobile-extend");
                    $self.parent().toggleClass("extend-btn");
                    $self.toggleClass("up");
                });
            },

            /* ---------------------------------------------
             function initializ
             --------------------------------------------- */
            initializ: function () {
                modelApp.menu();
                modelApp.slider_style_two();
                modelApp.brand_slider();
                modelApp.accordion();
                modelApp.fun_fects();
                modelApp.time_count();
                modelApp.mobileTab();
                modelApp.datePicker();
                modelApp.gallary();
                modelApp.searchOverlay();
                modelApp.widget_mobile();
                modelApp.mapIframe();
                modelApp.scroll_top();
            }
        };
        /* ---------------------------------------------
         Document ready function
         --------------------------------------------- */
        $(function () {
            modelApp.initializ();
        });


    }
}
</script>
