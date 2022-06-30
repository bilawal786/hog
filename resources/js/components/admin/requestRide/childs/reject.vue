<template>
    <div>
        <!-- all ride -->
        <div class="row" v-if="panel.allRides == true">
            <div class="col-sm-12">
                <div class="table-wrap">
                    <div class="table-responsive">
                        <table id="" class="table table-hover display pb-30">
                            <thead>
                                <tr>
                                    <th>Client Name</th>
                                    <th>Client E-mail</th>
                                    <th>Start Date</th>
                                    <th>Assign Driver</th>
                                    <th>Cost</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                            <tr v-if="leads.data == ''">
                                <td colspan="7" class="tb-empty">No Record Found</td>
                            </tr>
                                <tr v-else v-for="lead in leads.data" :key="lead.id">
                                    <td>{{ lead.leads.Fname + " " + lead.leads.Lname }}</td>
                                    <td>{{ lead.leads.email }}</td>
                                    <td>
                                        <set-date :date="lead.leads.trip_date" :year="'yes'"></set-date>
                                    </td>
                                    <td>{{ lead.driver.name }}</td>
                                    <td>$ {{ lead.leads.cost }}</td>
                                    <td>
                                        <button class="btn btn-default btn-icon-anim btn-circle btn-sm"
                                            @click="editRideDetail(lead.leads.id)">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                        <button class="btn btn-success btn-icon-anim btn-circle btn-sm"
                                            @click="getLeadDetail(lead.leads.id, lead.driver_id )">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="">
                        <div class="pull-left" v-if="leads">Showing {{leads.from}} to {{leads.to}} of {{leads.total}} entries</div>
                        <div class="pull-right">
                            <pagination class="" :show-disabled="true" :router="false" :size="'small'" :limit="2" :data="leads" :align="'right'" v-on:pagination-change-page="getRides"></pagination>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- back button -->
        <div class="row" v-if="panel.detail == true || panel.edit == true">
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
        <!-- end back button -->
        <!-- ride detail -->
        <div class="row" v-if="panel.detail == true">
            <div class="col-sm-6">
                <lead-detail :rideDetail="rideDetail"></lead-detail>
            </div>
            <div class="col-sm-6">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Selected Driver</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <driver-detail :selectdriver="selectdriver"></driver-detail>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end ride detail -->
         <!-- edit detail -->
        <div class="row" v-if="panel.edit == true">
            <div class="col-sm-8" >
                <ride-edit :rideId="rideId"></ride-edit>
            </div>
        </div>
        <!-- end edit detail -->
    </div>
</template>
<script>
import RideEdit from "./detailEdit.vue";
import LeadDetail from "./LeadDetail";
import select2 from "./select2";
import DriverDetail from "./driverDetail";
export default {
    data() {
        return {
            panel: {
                allRides: true,
                detail: false,
                edit: false
            },
            leads: null,
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
            //driver options
            selected: 0,
            options: null,
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
            axios.get("admin/web/reject/leads?page="+page).then((response) => {
                console.log(response);
                this.leads = response.data;
            });
        },
        editRideDetail: function (id) {
            this.panel.allRides = false
            this.panel.detail = false
            this.panel.edit = true
            this.rideId = id
        },
        getLeadDetail: function (id, dr_id) {
            this.panel.allRides = false;
            this.panel.detail = true;
            this.panel.edit = false;
            this.rideId = id
            axios.get("admin/web/form/request/ride/" + id).then((response) => {
                if (response.status == 200) {
                    this.rideDetail = response.data;
                    axios.get('admin/web/drivers/' + dr_id).then((response) => {
                        this.selectdriver = response.data
                    })
                }
            });
        },
        assignLead: function () {
            Swal.fire({
                title: 'Are you sure ?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'rgb(34 110 237 / 85%)',
                cancelButtonColor: '#ff2a00',
                confirmButtonText: 'Yes, Change it!'
            }, () => {
            }).then((result) => {
                if (result.value) {
                    axios.post('admin/web/show/lead', {
                        'driver_id' : this.selectdriver.id,
                        'ride_id'   : this.rideId,
                        'notes'     : this.driverNote,
                        'status'    : 'assign',
                        'assign'    : 'yes'
                    })
                        .then(response => {
                            window.scrollTo(0, 0)
                            if (response.status == 200) {
                                axios.put('admin/web/form/status/request/ride/'+this.rideId, {
                                    'status_assign':'yes'
                                }).then(response => {
                                    if(response.status == 200){
                                        console.log(response)
                                        this.getRides();
                                        this.panel.allRides = true;
                                        this.panel.detail = false;
                                        this.panel.edit = false;
                                    }
                                })
                                this.$vToastify.success("successfully Updated");
                            } else {

                            }
                        })
                }
            })
        },
        driverById: function (id) {
            axios.get('admin/web/drivers/' + id).then((response) => {
                this.selectdriver = response.data
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
        select2,
        DriverDetail
    }
}
</script>
