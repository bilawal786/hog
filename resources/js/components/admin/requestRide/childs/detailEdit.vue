<template>
    <div class="panel panel-default card-view">
        <div class="panel-wrapper collapse in">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="form-wrap">
                            <form action="#">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10">First Name</label>
                                                <input type="text" class="form-control" placeholder="First Name" v-model="ride.Fname">
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10">Last Name</label>
                                                <input type="text" class="form-control" placeholder="Last Name" v-model="ride.Lname">

                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10">E-Mail</label>
                                                <input type="email" class="form-control" placeholder="E-mail" v-model="ride.email">
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10">Phone</label>
                                                <input type="text" class="form-control" placeholder="Last Name" v-model="ride.phone">
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10">Do you need wheelchair
                                                    accessibility?</label>
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="yes" v-model="ride.wheelchair">
                                                            <label>Yes</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="no" v-model="ride.wheelchair">
                                                            <label>No</label>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10">Is this a round trip request?</label>
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="yes" v-model="ride.round_trip">
                                                            <label>Yes</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="no" v-model="ride.round_trip">
                                                            <label>No</label>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!-- /Row -->
                                    <div class="row">
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label class="control-label mb-10">Ride Date Time</label>
                                                <datetime type="datetime" input-class="form-control"
                                                    value-zone="America/New_York" zone="Asia/Shanghai"
                                                    v-model="ride.trip_date"
                                                    :format="{
                                                        year: 'numeric',
                                                        month: 'long',
                                                        day: 'numeric',
                                                        hour: 'numeric',
                                                        minute: '2-digit',
                                                        timeZoneName: 'short',
                                                    }" :phrases="{ ok: 'Continue', cancel: 'Exit' }" :hour-step="2"
                                                    :minute-step="15" :week-start="7" use12-hour auto></datetime>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label mb-10">Message</label>
                                                <textarea class="form-control" rows="5" v-model="ride.message"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /Row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10">Start</label>
                                                <vue-google-autocomplete ref="addressStart" id="mapStart"
                                                    classname="form-control" placeholder="Start">
                                                </vue-google-autocomplete>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10">End</label>
                                                <vue-google-autocomplete ref="addressEnd" id="mapEnd"
                                                    classname="form-control" placeholder="End">
                                                </vue-google-autocomplete>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class="btn btn-success btn-outline btn-icon right-icon">
                                                <span>Cost</span>
                                                <i class="zmdi zmdi-money"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions mt-10">
                                    <button type="submit" class="btn btn-success  mr-10"> Update</button>
                                    <button type="button" class="btn btn-default">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import VueGoogleAutocomplete from "vue-google-autocomplete";
export default {
    props: ['rideId'],
    data() {
        return {
            ride: {
                type: null,
                Fname: null,
                Lname: null,
                email: null,
                phone: null,
                wheelchair: null,
                round_trip: null,
                trip_date: null,
                message: null,
                start_lat: null,
                start_lng: null,
                end_lat: null,
                end_lng: null,
                start_address: null,
                end_address: null,
                cost: null,
                status_assign: null,
                user_id: null
            }
        }
    },
    components: {
        VueGoogleAutocomplete
    },
    mounted() {
        this.getRideDetailById(this.rideId)
    },
    methods: {
        getRideDetailById: function (id) {
            axios.get("admin/web/form/request/ride/" + id).then((response) => {
                // this.rides = response.data;
                console.log(response.data)
                    this.ride.type = response.data.type,
                    this.ride.Fname = response.data.Fname,
                    this.ride.Lname = response.data.Lname,
                    this.ride.email = response.data.email,
                    this.ride.phone = response.data.phone,
                    this.ride.wheelchair = response.data.wheelchair,
                    this.ride.round_trip = response.data.round_trip,
                    this.ride.trip_date = response.data.trip_date,
                    this.ride.message = response.data.message,
                    this.ride.start_lat = response.data.start_lat,
                    this.ride.start_lng = response.data.start_lng,
                    this.ride.end_lat = response.data.end_lat,
                    this.ride.end_lng = response.data.end_lng,
                    this.ride.cost = response.data.cost
                    this.ride.status_assign = response.data.status_assign
                    this.ride.user_id = response.data.user_id
            });
        }
    }
}

</script>