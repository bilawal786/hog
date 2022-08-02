<template>
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
                                <td v-if="options != null" class="border-none">
                                    <select2 v-model="selected" :options="options">
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
        <div v-if="selected != 0" class="panel-heading">
            <div class="pull-left">
                <h6 class="panel-title txt-dark">Selected Driver</h6>
            </div>
            <div class="clearfix"></div>
        </div>
        <div v-if="selected != 0" class="panel-wrapper collapse in">
            <div class="panel-body">
                <driver-detail :selectdriver="selectdriver"></driver-detail>
<!--                <div class="form-group">-->
<!--                    <label class="control-label mb-10 text-left">Driver Cost</label>-->
<!--                    <div class="input-group">-->
<!--                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>-->
<!--                        <input v-model="driver_cost" class="form-control" placeholder="Cost" type="number">-->
<!--                    </div>-->
<!--                    <ul v-if="errorshow" class="c-err">-->
<!--                        <li v-for="error in errorshow.driver_cost" :key="error" class="c-err-li">{{ error }}</li>-->
<!--                    </ul>-->
<!--                </div>-->
                <div class="form-group">
                    <label class="control-label mb-10 text-left">Ride Start (date & time)</label>
                    <datetime v-model="start_date" :format="{
                                                        year: 'numeric',
                                                        month: 'long',
                                                        day: 'numeric',
                                                        hour: 'numeric',
                                                        minute: '2-digit',

                                                    }"
                              :min-datetime = 'new Date().toJSON()'
                              :hour-step="1" :minute-step="15"
                              :phrases="{ ok: 'Continue', cancel: 'Exit' }"
                              :week-start="7" auto input-class="form-control"
                              type="datetime" use12-hour  zone="local"></datetime>
                    <ul v-if="errorshow" class="c-err">
                        <li v-for="error in errorshow.start_date" :key="error" class="c-err-li">{{ error }}</li>
                    </ul>
                </div>
                <div class="form-group">
                    <label class="control-label mb-10 text-left">Ride End (date & time)</label>
                    <datetime v-model="end_date" :format="{
                                                        year: 'numeric',
                                                        month: 'long',
                                                        day: 'numeric',
                                                        hour: 'numeric',
                                                        minute: '2-digit',

                                                    }"
                              :min-datetime = 'start_date'
                              :hour-step="1" :minute-step="15"
                              :phrases="{ ok: 'Continue', cancel: 'Exit' }"
                              :week-start="7" auto input-class="form-control"
                              type="datetime" use12-hour zone="local"></datetime>
                    <ul v-if="errorshow" class="c-err">
                        <li v-for="error in errorshow.end_date" :key="error" class="c-err-li">{{ error }}</li>
                    </ul>
                </div>
                <div class="form-group">
                    <label class="control-label mb-10 text-left">Notes</label>
                    <textarea v-model="driverNote" class="form-control" rows="5"></textarea>
                    <ul v-if="errorshow" class="c-err">
                        <li v-for="error in errorshow.notes" :key="error" class="c-err-li">{{ error }}</li>
                    </ul>
                </div>

                <button class="btn  btn-info" @click="assignLead()" :disabled="isloading">
                    <span v-if="isloading"><i class="fam fa fa-spinner fa-spin"></i>Loading</span>
                    <span v-else>Assign Lead</span>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import select2 from "./select2";
import DriverDetail from "./driverDetail";

export default {
    props: ['rideId', 'reject', 'leadId'],
    name: "selectDriver",
    data() {
        return {
            isloading:false,
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
            driver_cost: null,
            //driver options
            selected: 0,
            options: null,
            //error
            errorshow: null,
            start_date:new Date().toJSON(),
            end_date:new Date().toJSON()
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
        this.driversList()
    },
    methods: {
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
                if(this.reject == 'yes'){
                    this.isloading=true
                    axios.put('admin/web/show/lead/'+this.leadId, {
                        'status': 'end'
                    })
                }
                if (result.value) {
                    this.isloading=true
                    axios.post('admin/web/show/lead', {
                        'driver_id': this.selectdriver.id,
                        'ride_id': this.rideId,
                        'notes': this.driverNote,
                        'start_date': this.start_date,
                        'end_date': this.end_date,
                        'driver_cost': this.driver_cost,
                        'status': 'assign',
                        'assign': 'yes',
                        'process': 'no',
                        'reject': 'no',
                        'complete': 'no',
                    }).then(response => {
                            if (response.status == 200) {
                                axios.put('admin/web/form/status/request/ride/' + this.rideId, {
                                    'status_assign': 'yes'
                                }).then(response => {
                                    if (response.status == 200) {
                                        this.isloading=false
                                        window.scrollTo(0, 0)
                                        this.$vToastify.success("successfully Updated");
                                        this.$router.push({ name: 'RequestRideAssign' })
                                    }
                                })

                            } else {

                            }
                        }).catch(err => {
                        this.isloading=false
                        this.errorshow = err.response.data.errors
                    })
                }
            })
        },
        driversList: function () {
            axios.get('admin/web/driver/all').then((response) => {
                this.options = response.data
                console.log(response.data)
            })
        },
        driverById: function (id) {
            axios.get('admin/web/drivers/' + id).then((response) => {
                this.selectdriver = response.data
            })
        },
    },
    components: {
        select2,
        DriverDetail
    }

}
</script>

<style scoped>

</style>
