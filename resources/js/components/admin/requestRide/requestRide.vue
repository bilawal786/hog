<template>
    <div>
        <div class="row" v-show="panel.allRides">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Request Rides</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">

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
                                                <td>{{ ride.start_date }}</td>
                                                <td>{{ ride.cost }}</td>
                                                <td>
                                                    <button class="
                              btn btn-default btn-icon-anim btn-circle btn-sm
                            ">
                                                        <i class="fa fa-pencil"></i>
                                                    </button>
                                                    <button class="
                              btn btn-success btn-icon-anim btn-circle btn-sm
                            " @click="getRideDetail(ride.id)">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <button class="
                              btn btn-primary btn-icon-anim btn-circle btn-sm
                            ">
                                                        <i class="fa fa-lock"></i>
                                                    </button>
                                                    <button class="btn btn-info btn-icon-anim btn-circle btn-sm">
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
                </div>
            </div>
        </div>
        <div class="row" v-show="panel.detail">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Rider details</h6>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-primary btn-anim btn-sm" @click="backToList()">
                                <i class="fa fa-arrow-left" style="color: #fff"></i><span class="btn-text">back</span>
                            </button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" v-show="panel.detail">
            <div class="col-sm-6">
                <lead-detail :rideDetail="rideDetail"></lead-detail>
            </div>
            <div class="col-sm-6" v-show="leedAssign">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Lead Detail</h6>
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
                                                <td class="border-none">Status</td>
                                                <td class="border-none">{{leadDetail.status}} </td>
                                            </tr>
                                            <tr>
                                                <td>Assign Date</td>
                                                <td> {{leadDetail.created_at}}</td>
                                            </tr>
                                            <tr>
                                                <td>Note</td>
                                                <td>{{leadDetail.notes}}} </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Driver</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <driver-detail :selectdriver="selectdriver"></driver-detail>
                    </div>
                </div>
            </div>
            <div class="col-sm-6" v-show="!leedAssign">
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
                                                <td class="border-none" v-show="options">
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
                        <div class="form-group" v-show="!leedAssign">
                            <label class="control-label mb-10 text-left">Notes</label>
                            <textarea class="form-control" rows="5" v-model="driverNote"></textarea>
                        </div>
                        <button class="btn  btn-info" @click="assignLead()">Assign Lead</button>
                    </div>
                       </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import select2 from "../includes/select2";
import LeadDetail from "../includes/LeadDetail";
import DriverDetail from "../includes/driverDetail";
export default {
    data() {
        return {
            // all rides data
            rides: null,
            // ride detals
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
            //cnhange panel
            panel: {
                allRides: true,
                detail: false,
            },
            //driver options
            selected: 0,
            options: null,
            // select drivers
            selectdriver: {
                id: null,
                name: null,
                email: null,
                phone: null,
                address: null,
                created_at: null
            },
            driverNote: null,
            //lead assign
            leedAssign: false,
            leadDetail:{
                status: null,
                created_at:null,
                notes:null
            }
        };
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
            axios.get("admin/web/form/request/ride").then((response) => {
                this.rides = response.data;
            });
        },
        getRideDetail: function (id) {
            this.panel.allRides = false;
            this.panel.detail = true;
            axios.get("admin/web/form/request/ride/" + id).then((response) => {
                if (response.status == 200) {
                    this.rideDetail = response.data;
                    this.getLeadDetail(response.data.id)

                }
            });
        },
        getLeadDetail: function(id){
            axios.get('admin/web/show/lead/' + id).then((res) => {
                        if (res.data == "no") {
                            this.driversList()
                        } else {
                            this.leedAssign = true;
                            this.leadDetail = res.data
                            this.driverById(res.data.driver_id)
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
            this.leedAssign = false
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
                        driver_id: this.selectdriver.id,
                        ride_id: this.rideDetail.id,
                        notes: this.driverNote,
                        status: 'Assigned',
                    })
                        .then(response => {
                            window.scrollTo(0, 0)
                            if (response.status == 200) {
                                this.leedAssign = true;
                                 this.getLeadDetail(this.rideDetail.id)
                                this.$vToastify.success("successfully Updated");
                            } else {

                            }
                        })
                }
            })
        }
    },
    components: {
        select2,
        LeadDetail,
        DriverDetail
    }
};
</script>