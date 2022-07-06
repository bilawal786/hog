<template>
<div>
    <!-- back button -->
    <div class="row">
        <div class="col-sm-12">
            <div class="pull-left">
                <h6 class="panel-title txt-dark">Ride detail</h6>
            </div>
            <div class="pull-right">
                <button class="btn btn-primary btn-anim btn-sm" @click="backToList()">
                    <i class="fa fa-arrow-left" style="color: #fff"></i><span class="btn-text btn-sm">back</span>
                </button>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- end back button -->
    <!-- ride detail -->
    <div class="row">
        <div class="col-sm-6">
            <lead-detail :rideDetail="rideDetail"></lead-detail>
        </div>
        <div class="col-sm-6">
<!--            <select-driver :rideId="rideId"></select-driver>-->
        </div>
    </div>
    <!-- end ride detail -->
</div>
</template>

<script>
import LeadDetail from "./LeadDetail";
import SelectDriver from "./selectDriver";
export default {
    name: "newRideDetail",
    data(){
        return{
            rideDetail:null
        }
    },
    mounted() {
        this.getRideDetail(this.$route.params.id)
    },
    methods:{
        getRideDetail: function (id) {
            this.panel.allRides = false;
            this.panel.detail = true;
            this.panel.edit = false;
            this.rideId = id
            axios.get("admin/web/form/request/ride/" + id).then((response) => {
                if (response.status == 200) {
                    this.rideDetail = response.data;
                }
            });
        },
    },
    components:{
        LeadDetail,
        SelectDriver
    }
}
</script>

<style scoped>

</style>
