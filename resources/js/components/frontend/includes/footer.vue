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
                                <div class="widget-about-content" v-if="settings">
                                    <img v-bind:src="settings.footer_logo" alt="logo" />
                                    <p>{{settings.footer_about}}</p>
                                    <router-link to="/about" class="button">Read More</router-link>
                                </div><!-- /.widget-content -->
                            </div><!-- /.widget widget_about -->
                        </div><!-- /.col-md-3 -->
                        <div class="col-md-4 col-sm-6">
                            <div class="widget widget_menu">
                                <h3 class="widget-title">
                                    Useful links
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
                                <ul v-if="settings">
                                    <li><a v-bind:href="'mailto:'+settings.email"><i class="fa fa-envelope"></i>{{settings.email}}</a></li>
                                    <li><a v-bind:href="'tel:'+settings.phone"><i class="fa fa-phone"></i> {{settings.phone}}</a></li>
                                    <li><a href="#"><i class="fa fa-map-marker"></i><span>Office Address: </span>{{settings.office_address}}</a></li>
                                    <li><a href="#"><i class="fa fa-map-marker"></i><span>Mailing Address: </span>{{settings.mailing_address}}</a></li>

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

<script>
import { mapGetters } from "vuex";

export default {
  computed: {
    ...mapGetters("auth", ["settings"])
  },
  watch:{
        checkVariable(){
            if(this.settings){
            }else{
                this.settings = null
            }
        }

    },

};
</script>
