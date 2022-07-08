<template>
    <div>


<!--        <div class="available-block vehicle-padding bg-gray-color">-->
<!--            <div class="container">-->
<!--                <div class="row">-->
<!--                    <div class="col-md-3">-->
<!--                        <div class="vehicle-sidebar">-->
<!--                         <div>-->
<!--                             <h3>Dashboard</h3>-->
<!--                         </div>-->
<!--                        </div>&lt;!&ndash; /.vehicle-sidebar &ndash;&gt;-->
<!--                    </div>&lt;!&ndash; /.col-md-3 &ndash;&gt;-->
<!--                    <div class="col-md-9">-->

<!--                    </div>&lt;!&ndash; /.col-md-9 &ndash;&gt;-->


<!--                </div>&lt;!&ndash; /.row &ndash;&gt;-->
<!--            </div>&lt;!&ndash; /.container  &ndash;&gt;-->
<!--        </div>-->






        <div class="container-fluid">
            <div class="ds-mg-90">

                <div class="row">
                    <div class="col-md-3">
                        <div class="contact">
                            <div class="contact-btn">
                                <h3 class="m-0" ><i class="fa fa-tachometer" ></i> Dashboard</h3>
                            </div>
                        </div>
                        <div class="nav flex-column nav-pills ds-mg-30" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                        <a class="nav-link ds-pd-10 active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="ture">Profile</a>
                        <a class="nav-link ds-pd-10" id="v-pills-feedback-tab" data-toggle="pill" href="#v-pills-feedback" role="tab" aria-controls="v-pills-billing" aria-selected="false">Submit FeedBack</a>
                        <a class="nav-link ds-pd-10" id="v-pills-billing-tab" data-toggle="pill" href="#v-pills-billing" role="tab" aria-controls="v-pills-billing" aria-selected="false">Billing Question</a>
                        <a class="nav-link ds-pd-10" id="v-pills-ride-tab" data-toggle="pill" href="#v-pills-ride" role="tab" aria-controls="v-pills-ride" aria-selected="false">Request Ride</a>
                        <a class="nav-link ds-pd-10" id="v-pills-other-tab" data-toggle="pill" href="#v-pills-other" role="tab" aria-controls="v-pills-other" aria-selected="false">Others</a>
                        <a class="nav-link ds-pd-10"  href="" v-on:click="logout()"  >Logout</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="input-content">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade active show in" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    <view-profile></view-profile>
                                </div>
                                <div class="tab-pane fade" id="v-pills-feedback" role="tabpanel" aria-labelledby="v-pills-feedback-tab">
                                    <submit-feedback></submit-feedback>
                                </div>
                                <div class="tab-pane fade" id="v-pills-billing" role="tabpanel" aria-labelledby="v-pills-billing-tab">
                                    <billing-question></billing-question>
                                </div>
                                <div class="tab-pane fade" id="v-pills-ride" role="tabpanel" aria-labelledby="v-pills-ride-tab">
                                    <request-ride></request-ride>
                                </div>
                                <div class="tab-pane fade" id="v-pills-other" role="tabpanel" aria-labelledby="v-pills-other-tab">
                                    <view-others></view-others>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
</template>
<script>
import { mapActions } from "vuex";

import ViewProfile from "./includes/profile.vue";

import ViewOthers from "./includes/others.vue";
import BillingQuestion from "./includes/billing_question.vue";
import RequestRide from "./includes/request_ride.vue";
import SubmitFeedback from "./includes/submit_feedback.vue";

export default {
    components: {ViewProfile, ViewOthers, BillingQuestion, RequestRide, SubmitFeedback },
    mounted() {
        window.scrollTo(0, 0);
    },

    methods:{
        ...mapActions("auth", ["sendLogoutRequest"]),

    logout() {
        this.sendLogoutRequest().then(response => {
            this.$router.push({name: "Login"});
        });
    }

    }
};


</script>

