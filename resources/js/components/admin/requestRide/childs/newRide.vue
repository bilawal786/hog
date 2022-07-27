<template>
    <div>

<!--        <router-view></router-view>-->

        <div class="row" v-if="panel.allRides == true">
            <div class="col-sm-12">
                <div class="table-wrap">
                    <div class="table-responsive">
                        <table id="" class="table table-hover display pb-30" v-if="rides">
                            <thead>
                                <tr>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>W/C or Amb</th>
                                    <th>Phone Number</th>
                                    <th>Card on File Y/N</th>
                                    <th>Relative</th>
                                    <th>Relative's #</th>
                                    <th>Facility</th>
                                    <th>Notes</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                            <tr v-if="rides.data == ''">
                                <td colspan="12" class="tb-empty">No Record Found</td>
                            </tr>
                                <tr v-else v-for="ride in rides.data" :key="ride.id">
                                    <td>{{ride.Lname}}</td>
                                    <td>{{ ride.Fname}}</td>
                                    <td>{{ ride.start_address}}</td>
                                    <td>{{ ride.start_city}}</td>
                                    <td>{{ ride.wheelchair }}</td>
                                    <td>{{ ride.phone }}</td>
                                    <td>{{ ride.card_on_file }}</td>
                                    <td>{{ ride.relative }}</td>
                                    <td>{{ ride.relative_no }}</td>
                                    <td>{{ ride.facility }}</td>
                                    <td>{{ ride.message }}</td>
                                    <td>
                                        <button class="btn btn-default btn-icon-anim btn-circle btn-sm"
                                            @click="editRideDetail(ride.id)">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                        <button class="btn btn-success btn-icon-anim btn-circle btn-sm"
                                            @click="getRideDetail(ride.id)">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                        <button class="btn btn-info btn-icon-anim btn-circle btn-sm"
                                            @click="delRideRequest(ride.id)">
                                            <i class="icon-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="" v-if="rides">
                    <div class="pull-left" v-if="rides">Showing {{rides.from}} to {{rides.to}} of {{rides.total}} entries</div>
                    <div class="pull-right">
                        <pagination class="" :show-disabled="true" :router="false" :size="'small'" :limit="2" :data="rides" :align="'right'" v-on:pagination-change-page="getRides"></pagination>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-10 mb-10" v-if="panel.detail == true || panel.edit == true">
            <div class="col-sm-12">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark" v-if="panel.detail == true">Ride detail</h6>
                    <h6 class="panel-title txt-dark" v-if="panel.edit == true">Edit Ride</h6>
                </div>
                <div class="pull-right">
                    <button class="btn btn-primary btn-anim btn-sm" @click="backToList()">
                        <i class="fa fa-arrow-left" style="color: #fff"></i><span class="btn-text btn-sm">back</span>
                    </button>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="row" v-if="panel.detail == true">
            <div class="col-sm-6">
                <lead-detail :rideDetail="rideDetail"></lead-detail>
            </div>
            <div class="col-sm-6">
                <select-driver :rideId="rideId"></select-driver>
            </div>
        </div>

        <div class="row" v-if="panel.edit == true">
            <div class="col-sm-8" >
                <ride-edit :rideId="rideId"></ride-edit>
            </div>
        </div>

    </div>
</template>
<script>
import RideEdit from "./detailEdit.vue";
import LeadDetail from "./LeadDetail";
import SelectDriver from "./selectDriver";
export default {
    data() {
        return {
            panel: {
                allRides: true,
                detail: false,
                edit: false
            },
            rides: null,
            rideId: null,
            rideDetail: {
                id: null,
                Fname: null,
                Lname: null,
                email: null,
                phone: null,
                account: null,
                message: null,
                created_at: null,
            },
            // select drivers
            selectdriver: {
                id: null,
                name: null,
                email: null,
                phone: null,
                address: null,
                created_at: null
            },
            driverNote:null,
            driver_cost:null,
            //driver options
            selected: 0,
            options: null,

            //error
            errorshow:null
        }
    },
     watch: {
        selected: {
            handler: function (val, oldVal) {
                this.driverById(val)
            },
            deep: true
        }
    },
    mounted() {
        this.getRides();
    },
    methods: {
        getRides: function (page = 1) {
            axios.get("admin/web/form/request/unassign/ride?page="+page).then((response) => {
                this.rides = response.data;
            });
        },
        editRideDetail: function (id) {
            this.panel.allRides = false
            this.panel.detail = false
            this.panel.edit = true
            this.rideId = id
        },
        getRideDetail: function (id) {
            this.panel.allRides = false;
            this.panel.detail = true;
            this.panel.edit = false;
            this.rideId = id
            axios.get("admin/web/form/request/ride/" + id).then((response) => {
                if (response.status == 200) {
                    this.rideDetail = response.data;
                    // this.getLeadDetail(response.data.id)
                }
            });
        },

        delRideRequest: function (id) {
            Swal.fire({
                title: 'Are you sure ?',
                text: "You want to delete this Ride",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'rgb(34 110 237 / 85%)',
                cancelButtonColor: '#ff2a00',
                confirmButtonText: 'Yes, Delete it!'
            }, () => {
            }).then((result) => {
                if (result.value) {
                    axios.delete('admin/web/form/request/ride/' + id)
                        .then(response => {
                            window.scrollTo(0, 0)
                            if (response.status == 200) {
                                this.getRides();
                                this.$vToastify.success("successfully Updated");
                            } else {

                            }
                        })
                }
            })
        },

        backToList: function () {
            this.panel.allRides = true;
            this.panel.detail = false;
            this.panel.edit = false;
            this.getRides();
        },
    },
    components:{
        RideEdit,
        LeadDetail,
        SelectDriver
    }
}
</script>
