<template>
    <div>
        <!-- ====== Header Top Area ====== -->
        <header class="header-top-area bg-nero">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-7 hidden-xs hidden-sm">
                        <div class="header-content-left">
                            <ul class="header-top-menu">

                            </ul><!-- /.header-top-menu -->
                        </div><!-- /.header-content-left -->
                    </div><!-- /.col-md-9 -->

                    <div class="col-md-6 col-sm-5 hidden-xs hidden-sm">
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
                            <li>
                                <a href="" class="mdn trigger-overlay">
                                    <i class="fa fa-user"></i>
                                    <span>Login</span>
                                </a>
                            </li>
                        </ul>
                        </div><!-- /.left-content -->
                    </div><!-- /.col-md-3 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </header><!-- /.head-area -->
        <div class="header-modal-area">
            <!-- Modal Search -->
            <div class="overlay-sidebar">
                <div class="author-area">
                    <a href="#" class="closebtn">&times;</a>

                    <div class="auth-form-wrap" v-if="registration==true">
                        <h2><i class="fa fa-user login-icon"></i> Login</h2>
                        <form id="login-form" @submit.prevent="login" >
                            <p>
                            <input type="email" id="email" name="email" v-model="user.email" placeholder="Email Address" required><i class="validation"><span></span><span></span></i>
                            </p>
                             <p>
                            <input type="password" id="password" name="password" v-model="user.password" placeholder="password" required><i class="validation"><span></span><span></span></i>
                            </p>
                            <p>
                            <button type="submit" id="login">Login</button>
                            </p>
                        </form>
                        <div id="create-account-wrap">
                            <p>Not a member? <a href="#" v-on:click="changetoggle">Create Account</a></p>
                        </div><!--create-account-wrap-->
                    </div><!--login-form-wrap-->
                    

                    <div class="auth-form-wrap" v-if="registration==false">
                        <h2><i class="fa fa-user login-icon"></i> Registration</h2>
                        <form id="registration-form" @submit.stop.prevent="onSubmit" @reset="onReset" >
                            <p>
                            <input type="text" id="name" v-model="form.name" name="name" placeholder="Name" required>
                            </p>
                            <p>
                            <input type="email" id="email" v-model="form.email" name="email" placeholder="Email Address" required><i class="validation"><span></span><span></span></i>
                            </p>
                             <p>
                            <input type="password" id="password" v-model="form.password" name="password" placeholder="Password" required><i class="validation"><span></span><span></span></i>
                            </p>
                            <p>
                            <input type="password" id="password_confirmation" v-model="form.password_confirmation" name="password_confirmation" placeholder="Verify Password" required><i class="validation"><span></span><span></span></i>
                            </p>
                            <p>
                            <Button type="submit" id="login">Registration</button>
                            </p>
                            <p>
                            <Button type="reset" id="login">Reset</button>
                            </p>
                        </form>
                        <div id="login">
                            <p>Not a member? <a href="#" v-on:click="changetoggle">Login</a></p>
                        </div><!--create-account-wrap-->
                    </div><!--login-form-wrap-->


                    <!-- <div class="author-area-content">
                        <div class="login-author">

                            <div class="author-info">
                                <div class="author-image yellow-border">
                                    <img src="assets/images/driver/driver-03.png" alt="author-image" />
                                </div>
                                <div class="author-des">
                                    <h4 class="author-name">Mr. Johan Smith</h4>
                                    <p class="author-description">Programmer</p>
                                </div>
                            </div>

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
                            </div>
                            
                        </div>
                    </div> -->



                </div><!-- /.author-area -->
            </div><!-- /.overlay-sidebar -->
        </div><!-- /.header-modal-area -->
        <navigation-bar></navigation-bar>
        <router-view> </router-view>
        <web-footer></web-footer>
    </div>
</template>
<script>
import http from "./http-common";
import NavigationBar from './components/frontend/includes/navigationbar.vue';
import WebFooter from './components/frontend/includes/footer.vue'

export default {
    data(){
        return{
            form: {
                name: "",
                email: "",
                password: "",
                password_confirmation: "",
                },
            user:{
                email: "",
                password: "",
                },
            errors: null,
            allData:null,
            registration:true
        }
    },
    methods: {
        login () {
            this.$store.dispatch('auth/loginUser', this.user)
        },
        onLogin(event) {

            axios.post("/login", {
                ...this.loginForm,
                })
                .then((res) => {
                    console.log(res)
                this.getUser().then((res) => {
                    console.log(res)
                    this.$router.push("/dashboard");
                });
                })
                .catch((err) => {
                   
                    });
          
        
            },
            onResetLogin(event) {
                event.preventDefault();
                // Reset our form values
                this.form.email = "";
                this.form.name = "";
                this.form.password = null;
                this.$nextTick(() => {
                    this.$validator.reset();
                });
            },
        //registration methods
        validateState(ref) {
      if (
        this.veeFields[ref] &&
        (this.veeFields[ref].dirty || this.veeFields[ref].validated)
      ) {
        return !this.veeErrors.has(ref);
      }
      return null;
    },
        onSubmit(event) {
        event.preventDefault();
        axios.get("http://localhost:8000/sanctum/csrf-cookie").then(() => {
            axios
            .post("/register", {
                ...this.form,
            })
            .then(() => {
                this.changetoggle ();
                this.onReset();
                this.$router.push("/");
            })
            .catch((err) => {
                this.errors = err.response.data.errors;
            });
        });
        },
        onReset(event) {
        event.preventDefault();
        // Reset our form values
            this.form.email = "";
            this.form.name = "";
            this.form.password = null;
            this.form.password_confirmation = null;
        },
        //end registration
        changetoggle () {
            this.registration = !this.registration
        },
        // async getAllData() {
        // try {
        //     const res = await http.get("/general/setting");
        //     const result = {
        //         status: res.status + "-" + res.statusText,
        //         headers: res.headers,
        //         data: res.data,
        //         };
        //     this.getResult = this.fortmatResponse(result);
        //     } catch (err) {
        //         this.getResult = this.fortmatResponse(err.response?.data) || err;
        //     }
        // },
    },
    created(){
        axios.defaults.header.common["Authorization"]="Bearer "+ localStorage.getItem("Bearer");
    },
     mounted () {
        // getAllData()
        axios.get('http://127.0.0.1:8000/api/general/setting').then(response => (this.allData = response))

        var modelApp = {
            /* ---------------------------------------------
             Menu
             --------------------------------------------- */
            menu: function () {
                var $combinedmenu = $(".site-navigation .menu-list").clone();
                $combinedmenu.appendTo("#mobile-main-nav #main-mobile-container");
                var $submenu = $(".sub-menu"), $hasSubmenu = $(".menu-list li").has(".sub-menu"), $subMenuMark = $("<span class='fa fa-angle-down'></span>"), $mobileNavClass = $("#main-mobile-container .main-navigation"), $mobileOverlay = $(".mobile-menu-main .menucontent.overlaybg, .mobile-menu-main .slideLeft"), $mobileNavContent = $(".mobile-menu-main .menucontent"), $mobileNavBar = $("#navtoggole-main");
                if ($hasSubmenu) {
                    $submenu.prev().append($subMenuMark);
                }
                // Main Navigation Mobile
                // --------------------------------
                $mobileNavClass.addClass("slideLeft");
                var menuopen_main = function () {
                    $mobileOverlay.removeClass("menuclose").addClass("menuopen");
                }, menuclose_main = function () {
                    $mobileOverlay.removeClass("menuopen").addClass("menuclose");
                };
                $mobileNavBar.on("click", function () {
                    if ($mobileNavContent.hasClass("menuopen")) {
                        $(menuclose_main);
                    }
                    else {
                        $(menuopen_main);
                    }
                });
                $mobileNavContent.on("click", function () {
                    if ($mobileNavContent.hasClass("menuopen")) {
                        $(menuclose_main);
                    }
                });
                // Sub Menu
                // --------------------------------
                $hasSubmenu.prepend("<span class='menu-click'><i class='menu-arrow fa fa-plus'></i></span>");
                var $menuMobile = $(".menu-mobile"), $menuWrap = $(".menu-list");
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
                        var elm = $("ul:first", $self), off = elm.offset(), l = off.left, w = elm.width(), docW = $(".header-bottom > .container").width(), isEntirelyVisible = (l + w <= docW);
                        if (!isEntirelyVisible) {
                            $self.addClass("right-side-menu");
                        }
                        else {
                            $self.removeClass("right-side-menu");
                        }
                    }
                });
                var $mbHeaderTop = $(".header-top-menu li a");
                $mbHeaderTop.on("click", function () {
                    $(this).next("ul").slideToggle("slow");
                    return false;
                });
                var $slimeScrollSelector = $(".mb-navigation .menu-wrapper, .author-area-content");
                $slimeScrollSelector.slimscroll({
                    height: "100%",
                    size: "5px"
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
                        var $this = $(this), $next_element = $this.prevAll().find(".block-navigation-area .item-navigation  .next-item"), $previous_element = $this.prevAll().find(".block-navigation-area .item-navigation .previous-item");
                        $next_element.on("click", function (e) {
                            e.preventDefault();
                            $this.trigger("next.owl.carousel");
                        });
                        $previous_element.on("click", function (e) {
                            e.preventDefault();
                            $this.trigger("prev.owl.carousel", [300]);
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
                    var $this = $(this), $next_element = $this.prevAll().find(".block-navigation-area .item-navigation  .next-item"), $previous_element = $this.prevAll().find(".block-navigation-area .item-navigation .previous-item");
                    $next_element.on("click", function (e) {
                        e.preventDefault();
                        $this.trigger("next.owl.carousel");
                    });
                    $previous_element.on("click", function (e) {
                        e.preventDefault();
                        // With optional speed parameter
                        // Parameters has to be in square bracket '[]'
                        $this.trigger("prev.owl.carousel", [300]);
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
                var $selector = $(".commingsoon-count");
                $selector.each(function () {
                    var $this = $(this), data_year = $this.attr("data-year"), data_month = $this.attr("data-month"), data_day = $this.attr("data-day"), data_hour = $this.attr("data-hour"), data_minutes = $this.attr("data-minutes");
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
                    if ($(this).next().hasClass("in")) {
                        $(this).children().addClass("menu-extend");
                    }
                    $(this).on("click", function (e) {
                        if ($(this).parent().prevAll().children().children().hasClass("menu-extend")) {
                            $(this).parent().prevAll().children().children().removeClass("menu-extend");
                        }
                        else if ($(this).parent().nextAll().children().children().hasClass("menu-extend")) {
                            $(this).parent().nextAll().children().children().removeClass("menu-extend");
                        }
                        $(this).children().addClass("menu-extend");
                    });
                });
            },
            /* ---------------------------------------------
            Gallery Style Two Carousel
            --------------------------------------------- */
            gallary: function () {
                var $sync1 = $(".full-view"), $sync2 = $(".list-view"), duration = 300;
                $sync1
                    .owlCarousel({
                    items: 1,
                    margin: 0,
                    nav: false,
                    owl2row: "true",
                    owl2rowTarget: "item"
                })
                    .on("changed.owl.carousel", function (e) {
                    var syncedPosition = syncPosition(e.item.index);
                    if (syncedPosition !== "stayStill") {
                        $sync2.trigger("to.owl.carousel", [syncedPosition, duration, true]);
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
                    .on("initialized.owl.carousel", function () {
                    addClassCurrent(0);
                })
                    .on("click", ".owl-item", function () {
                    $sync1.trigger("to.owl.carousel", [$(this).index(), duration, true]);
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
                var $bodyElement = $("body"), $window = $(window), $scrollHtml = $("<a href='#top' id='scroll-top' class='topbutton btn-hide'><span class='glyphicon glyphicon-menu-up'></span></a>");
                $bodyElement.append($scrollHtml);
                var $scrolltop = $("#scroll-top");
                $window.on("scroll", function () {
                    if ($(this).scrollTop() > $(this).height()) {
                        $scrolltop
                            .addClass("btn-show")
                            .removeClass("btn-hide");
                    }
                    else {
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
                    lang: "en",
                    timepicker: false,
                    format: "d/m/Y",
                    formatDate: "Y/m/d",
                    minDate: "1"
                });
                $timeSelector.datetimepicker({
                    datepicker: false,
                    format: "H:i",
                    step: 5
                });
            },
            /* ---------------------------------------------
            Search Overlay
            --------------------------------------------- */
            searchOverlay: function () {
                var  closeBttn = $("button.overlay-close");
                closeBttn.on("click", function () {
                    overlay.removeClass("open");
                    return false;
                });
                function openNav() {
                    var $authorSelector = $(".author-area"), $mobileOverlay = $(".mobile-menu-main .menucontent.overlaybg, .mobile-menu-main .slideLeft");
                    $authorSelector.addClass("open");
                    $mobileOverlay.removeClass("menuopen").addClass("menuclose");
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
            },
            /* ---------------------------------------------
            Mobile Tab
            --------------------------------------------- */
            mobileTab: function () {
                var $tabli = $(".vehicle-filter-area li a, .post-filter-area li a");
                var $nextEL = $(".vehicle-filter-area, .post-filter-area");
                var $selectOption = $("<select class=\"responsive-nav visible-xs-block visible-sm-block\"/>");
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
                        $navSlector.eq(url).tab("show");
                    }
                    else {
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
                        var scope = this, args = arguments;
                        clearTimeout(timeoutID);
                        timeoutID = setTimeout(function () {
                            func.apply(scope, Array.prototype.slice.call(args));
                        }, timeout);
                    };
                }
                function resized() {
                    var getWidgetTitle = $(".widget .widget-title");
                    var getWidgetTitleContent;
                    if ($(window).width() <= 991) {
                        getWidgetTitleContent = $(".widget .widget-title").nextAll().hide();
                        getWidgetTitle.addClass("expand-margin");
                        getWidgetTitle.on("click", function (e) {
                            e.stopImmediatePropagation();
                            $(this).toggleClass("expand");
                            $(this).nextAll().slideToggle();
                            return false;
                        });
                        getWidgetTitle.each(function () {
                            $(this).addClass("mb-widget");
                        });
                    }
                    else {
                        getWidgetTitleContent = $(".widget .widget-title").nextAll().show();
                        getWidgetTitle.removeClass("expand-margin");
                        getWidgetTitle.each(function () {
                            $(this).parent().removeClass("mb-widget");
                        });
                    }
                    ;
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
    },
    components: { NavigationBar, WebFooter }
}
</script>
