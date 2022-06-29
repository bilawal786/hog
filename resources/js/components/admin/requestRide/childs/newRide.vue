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
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Phone #</th>
                                    <th>Start Date</th>
                                    <th>Cost</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr v-for="ride in rides" :key="ride.id">
                                    <td>{{ ride.Fname + " " + ride.Lname }}</td>
                                    <td>{{ ride.email }}</td>
                                    <td>{{ ride.phone }}</td>
                                    <td>{{ ride.trip_date }}</td>
                                    <td>$ {{ ride.cost }}</td>
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
                            <h6 class="panel-title txt-dark">Drivers</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr>
                                                <td class="border-none">Drivers List:</td>
                                                <td class="border-none" v-if="options != null">
                                                    <select2 :options="options" v-model="selected">
                                                        <option disabled value="0">Select one</option>
                                                    </select2>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-heading" v-if="selected != 0">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Selected Driver</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in" v-if="selected != 0">
                        <div class="panel-body">
                            <driver-detail :selectdriver="selectdriver"></driver-detail>
                            <div class="form-group">
                                <label class="control-label mb-10 text-left">Driver Cost</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                    <input type="number" class="form-control" placeholder="Cost" v-model="driver_cost">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 text-left">Notes</label>
                                <textarea class="form-control" rows="5" v-model="driverNote"></textarea>
                            </div>
                            <button class="btn  btn-info" @click="assignLead()">Assign Lead</button>
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
        getRides: function () {
            axios.get("admin/web/form/request/unassign/ride").then((response) => {
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
                    this.driversList()
                    // this.getLeadDetail(response.data.id)
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
                        'driver_cost': this.driver_cost,
                        'status'    : 'assign',
                        'assign'    : 'yes',
                        'process'    : 'no',
                        'reject'    : 'no',
                        'complete'    : 'no',
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
        delRideRequest: function (id) {
            Swal.fire({
                title: 'Are you sure ?',
                text: "You want to delete this Ride",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'rgb(34 110 237 / 85%)',
                cancelButtonColor: '#ff2a00',
                confirmButtonText: 'Yes, Delect it!'
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
        driversList: function () {
            axios.get('admin/web/driver/all').then((response) => {
                this.options = response.data
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
