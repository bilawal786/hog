<template>
            <!-- ====== Header Top Area ====== -->
        <header class="header-top-area bg-nero">
            <div class="container">
                <div class="row">
                    <div class="col-md-12  hidden-xs hidden-sm">
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
                                <li v-show="!user">
                                    <router-link to="/login" class="mdn">
                                        <i class="fa fa-user"></i>
                                        <span>LogIn</span>
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
  computed: {
    ...mapGetters("auth", ["user"])
  },

  mounted() {
    if (localStorage.getItem("authToken")) {
      this.getUserData();
    }
  },

  methods: {
    ...mapActions("auth", ["sendLogoutRequest", "getUserData"]),

    logout() {
      this.sendLogoutRequest();
      this.$router.push("Login");
    }
  }
};
</script>
