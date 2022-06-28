<template>
            <!-- ====== Header Top Area ====== -->
        <header class="header-top-area bg-nero">
            <div class="container-flud" style="margin: 0 20px;">
                <div class="row">
                    <div class="col-md-12  hidden-xs hidden-sm">
                        <div class="header-content-right">
                            <ul class="header-top-menu">
                                <li class="mdn" v-if="settings">
                                    <a v-bind:href="'tel:'+settings.phone" class="top-left-menu">
                                        <i class="fa fa-phone"></i>
                                        <span>{{settings.phone}}</span>
                                    </a>
                                </li>
                                <li class="mdn" v-if="settings">
                                    <a v-bind:href="'mailto:'+settings.email" class="top-left-menu">
                                        <i class="fa fa-envelope"></i>
                                        <span>{{settings.email}}</span>
                                    </a>
                                </li>
                                <li v-show="!user">
                                    <router-link to="/signin" class="mdn">
                                        <i class="fa fa-user"></i>
                                        <span style="text-transform: capitalize;">Sign In</span>
                                    </router-link>
                                </li>
                                <li v-show="user">
                                    <router-link to="/dashboard" class="mdn">
                                        <i class="fa fa-user"></i>
                                        <span v-if="user">{{ user.name }}</span>
                                    </router-link>
                                </li>
                        </ul>
                        </div><!-- /.left-content -->
                    </div><!-- /.col-md-3 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </header><!-- /.head-area -->
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
