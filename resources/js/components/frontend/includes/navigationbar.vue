<template>
        <!-- ====== Header Nav Area ====== -->
        <header class="header-nav-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-sm-10 col-xs-10">
                        <div class="site-logo">
                            <router-link to="/"><img class="mlogo" style="margin-top: -40px"
                                    src="assets/images/heart-of-gold.png" alt="logo" /></router-link>
                        </div><!-- /.logo -->
                    </div><!-- /.col-md-3 -->
                    <div class="col-md-9 col-sm-2 col-xs-2 pd-right-0">
                        <nav class="site-navigation top-navigation nav-style-one">
                            <div class="menu-wrapper">
                                <div class="menu-content">
                                    <ul class="menu-list">
                                        <li>
                                            <router-link to="/" exact>HOME</router-link>
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
</template>
<script>


</script>
