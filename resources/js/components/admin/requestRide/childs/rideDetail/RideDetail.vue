<template>
    <div class="panel panel-default card-view">
        <div class="panel-wrapper">
            <div class="panel-body">
                <div class="row mt-10 mb-10">
                    <div class="col-sm-12">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Ride detail</h6>
                        </div>
                        <div class="pull-right">
<!--                            <button class="btn btn-primary btn-anim btn-sm" @click="backToList()">-->
<!--                                <i class="fa fa-arrow-left" style="color: #fff"></i><span-->
<!--                                class="btn-text btn-sm">back</span>-->
<!--                            </button>-->
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6" v-if="rideDetail != null">
                        <lead-detail :rideDetail="rideDetail"></lead-detail>
                    </div>
                    <div class="col-sm-6" v-if="rideDetail != null">
                        <driver-detail v-if="rideDetail.status_assign == 'yes'" :rideId="rideId"></driver-detail>
                        <select-driver v-if="rideDetail.status_assign == 'no'" :rideId="rideId"></select-driver>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import LeadDetail from "../LeadDetail";
import SelectDriver from "../selectDriver";
import DriverDetail from "./driverDetail";

export default {
    name: "RideDetail",
    data() {
        return {
            rideId: null,
            rideDetail: null,
            driverId:null,
        }
    },
    mounted() {
        this.getRideDetail(this.$route.params.id)
    },
    methods: {
        getRideDetail: function (id) {
            this.rideId = id
            axios.get("admin/web/form/request/ride/" + id).then((response) => {
                if (response.status == 200) {
                    this.rideDetail = response.data;
                }
            });
        },
    },
    components: {
        LeadDetail,
        SelectDriver,
        DriverDetail
    }
}
</script>

<style scoped>

</style>
