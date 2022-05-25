<template>
    <div>
        <top-header></top-header>
        <navigation-bar></navigation-bar>
        <div class="container">
            <div class="ds-mg-90">
                <div class="row">
                    <div class="col-4">
                        <div class="contact">
                            <div class="contact-btn">
                                <h3><i class="fa fa-tachometer" ></i> Dashboard</h3>
                            </div>
                        </div>
                        <div class="nav flex-column nav-pills ds-mg-30" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        
                        <a class="nav-link ds-pd-10 active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                        <a class="nav-link ds-pd-10" id="v-pills-billing-tab" data-toggle="pill" href="#v-pills-billing" role="tab" aria-controls="v-pills-billing" aria-selected="false">Billing Question</a>
                        <a class="nav-link ds-pd-10" id="v-pills-ride-tab" data-toggle="pill" href="#v-pills-ride" role="tab" aria-controls="v-pills-ride" aria-selected="false">Request Ride</a>
                        <a class="nav-link ds-pd-10" id="v-pills-other-tab" data-toggle="pill" href="#v-pills-other" role="tab" aria-controls="v-pills-other" aria-selected="false">Others</a>
                        <a class="nav-link ds-pd-10"  href="" v-on:click="sendLogoutRequest"  >Logout</a>


                        </div>
                    </div>
                    <div class="col-8 input-content">
                        <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <div class="ds-m-25">
                                <h2>User Profile</h2>
                                <div class="ds-divider"></div>
                                <div class="ds-profile">
                                <div class="row ds-profile">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="ds-profile-heading">Name:</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="ds-profile-p">{{ user.name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                 <p class="ds-profile-heading">E-mail:</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="ds-profile-p"> {{ user.email }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                                <!-- <div class="row ds-profile">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="ds-profile-heading">Phone:</p>
                                            </div>
                                            <div class="col-md-6">
                                               <p class="ds-profile-p"></p>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                              <p></p>
                                            </div>
                                            <div class="col-md-6">
                                              <p class="ds-profile-p"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- end row -->
                                <!-- <div class="row ds-profile">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="ds-profile-heading">Address:</p>
                                            </div>
                                            <div class="col-md-6">
                                               
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                              
                                            </div>
                                            <div class="col-md-6">
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- end row -->
                                <!-- <div class="row ds-profile">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button class="btn submit yellow-button">Edit Profile</button>
                                            </div>
                                            <div class="col-md-6">
                                               <button class="btn submit yellow-button">Change Password</button>
                                            </div> 
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                              
                                            </div>
                                            <div class="col-md-6">
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-billing" role="tabpanel" aria-labelledby="v-pills-billing-tab">...</div>
                        <div class="tab-pane fade" id="v-pills-ride" role="tabpanel" aria-labelledby="v-pills-ride-tab">...</div>
                        <div class="tab-pane fade" id="v-pills-other" role="tabpanel" aria-labelledby="v-pills-other-tab">...</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <web-footer></web-footer>
</div>
</template>
<script>
import TopHeader from "./includes/TopHeader.vue";
import NavigationBar from "./includes/navigationbar.vue";
import WebFooter from "./includes/footer.vue";
import { mapGetters, mapActions } from "vuex";

export default {
    components: { TopHeader, NavigationBar, WebFooter },
    mounted() {
        window.scrollTo(0, 0);
        if (localStorage.getItem("authToken")) {
            this.getUserData();
        }
    },
    computed: {
        ...mapGetters("auth", ["user"])
    },
    methods:{
        ...mapActions("auth", ["sendLogoutRequest", "getUserData"]),

    logout() {
      this.sendLogoutRequest();
      console.log('function')
      this.$router.push("Login");
      console.log('logout')
    }
       
    }
};


</script>

