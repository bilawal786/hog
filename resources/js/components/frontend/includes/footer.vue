<template>
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
                                    <li>
                                        <router-link to="/fqa">FAQ</router-link>
                                    </li>
                                    <li>
                                        <router-link to="/contact"> Contact Support</router-link>
                                    </li>
                                    <li>
                                        <router-link to="/policy">Privacy Policy</router-link>
                                    </li>
                                    <li>
                                        <router-link to="/services">Services</router-link>
                                    </li>
                                    <li>
                                        <router-link to="/resources">Resources</router-link>
                                    </li>
                                    <li>
                                        <router-link to="/about">About</router-link>
                                    </li>
                                </ul>
                            </div><!-- /.widget -->
                        </div><!-- /.col-md-3 -->

                        <div class="col-md-4 col-sm-6">
                            <div class="widget widget_hot_contact">
                                <h3 class="widget-title">
                                    STAY CONNECTED
                                </h3><!-- /.widget-title -->
                                <ul>
                                    <li><a href="#"><i class="fa fa-envelope"></i>contact@heartofgoldmedtransport.com</a></li>
                                    <li><a href="#"><i class="fa fa-phone"></i> (916) 740-6447</a></li>
                                    <li><a href="#"><i class="fa fa-map-marker"></i><span>Office Address:</span> 1329 Howe Ave #205, Sacramento, CA 95825</a></li>
                                    <li><a href="#"><i class="fa fa-map-marker"></i><span>Mailing Address:</span> 7828 Zenith Dr. #7862, Citrus Heights, CA 95621</a></li>
                                    
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
</template>