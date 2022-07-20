<template>
        <!-- ====== Header Nav Area ====== -->
        <header class="header-nav-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-sm-10 col-xs-10">
                        <div class="site-logo" v-if="settings">
                            <router-link to="/"><img class="mlogo" style="margin-top: -40px"
                                    v-bind:src="settings.header_logo" alt="logo" /></router-link>
                        </div><!-- /.logo -->
                    </div><!-- /.col-md-3 -->
                    <div class="col-md-9 col-sm-2 col-xs-2 pd-right-0">
                        <nav class="site-navigation top-navigation nav-style-one">
                            <div class="menu-wrapper">
                                <div class="menu-content">
                                    <ul class="menu-list" id="loginadd">
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
                                        <li class='hidden-md hidden-lg signinlink'>
                                            <router-link to='/signin'>SignIn</router-link>
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
import { mapGetters, mapActions } from "vuex";

export default {
    data(){
        return{
            st:null
        }
    },
    computed: {
        ...mapGetters("auth", ["settings", "user"])
    },
    mounted() {

    },
    watch:{
        checkVariable(){
            if(this.settings){
            }else{
                this.settings.phone = null
                this.settings.email = null
            }
        }

    },
    methods: {
        ...mapActions("auth", ["sendLogoutRequest"]),

        logout() {
            this.sendLogoutRequest();

        }
    }
};
</script>
