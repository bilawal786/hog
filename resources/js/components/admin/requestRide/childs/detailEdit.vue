<template>
    <div class="panel panel-default card-view">
        <div class="panel-wrapper collapse in">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="form-wrap">
                            <form>
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
                                                <vue-google-autocomplete v-model="ride.start_address" types="establishment" ref="addressStart" v-on:placechanged="getAddressStart" id="mapStart"
                                                    classname="form-control" placeholder="Start" country="us">
                                                </vue-google-autocomplete>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10">End</label>
                                                <vue-google-autocomplete v-model="ride.end_address" types="establishment" ref="addressEnd" v-on:placechanged="getAddressEnd" id="mapEnd"
                                                    classname="form-control" placeholder="End" country="us">
                                                </vue-google-autocomplete>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-success btn-outline btn-icon right-icon" @click="calculateCost(ride.start_lat, ride.start_lng, ride.end_lat, ride.end_lng)">
                                                <span>Cost</span>
                                                <i class="zmdi zmdi-money"></i>
                                            </button>
                                            <span>{{ride.cost}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions mt-10">
                                    <button type="button" class="btn btn-success  mr-10" @click="updateRideDetailById(rideId)"> Update</button>
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
            },
            calculate:{
                day:null,
                distance:null,
                round:null,
                chair:null,
                time:null,
                holiday:null,
                totalCost:null,
            },
        }
    },
    components: {
        VueGoogleAutocomplete
    },
    mounted() {
        window.scrollTo(0, 0);
        this.$refs.addressStart.focus();
        this.$refs.addressEnd.focus();
        this.getRideDetailById(this.rideId)
    },
    methods: {
        getRideDetailById: function (id) {
            axios.get("admin/web/form/request/ride/" + id).then((response) => {
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
                    this.ride.start_address = response.data.start_address,
                    this.ride.end_address = response.data.end_address,
                    this.ride.cost = response.data.cost
                    this.ride.status_assign = response.data.status_assign
                    this.ride.user_id = response.data.user_id
            });
        },
        updateRideDetailById: function (id) {

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
                     axios.put("admin/web/form/request/ride/" + id, this.ride).then(response => {
                            window.scrollTo(0, 0)
                            if (response.status == 200) {
                                window.scrollTo(0, 0)
                                this.$vToastify.success("successfully Updated");
                            } else {

                            }
                        })
                }
            })
        },
        getAddressStart: function (addressData, placeResultData, id) {
            this.ride.start_lat = addressData.latitude;
            this.ride.start_lng = addressData.longitude;
            this.ride.start_address = placeResultData.formatted_address;
        },
        getAddressEnd: function (addressData, placeResultData, id) {
            this.ride.end_lat = addressData.latitude;
            this.ride.end_lng = addressData.longitude;
            this.ride.end_address = placeResultData.formatted_address;
        },
        calculateCost: function(lat1,lon1,lat2,lon2){
            if ((lat1 == lat2) && (lon1 == lon2)) {
                return 0;
            }
            else {
                var theta = lon1 - lon2;
                var dist = Math.sin(this.deg2rad(lat1)) * Math.sin(this.deg2rad(lat2)) +  Math.cos(this.deg2rad(lat1)) * Math.cos(this.deg2rad(lat2)) * Math.cos(this.deg2rad(theta));
                dist = Math.acos(dist);
                dist = this.rad2deg(dist);
                var miles = dist * 60 * 1.1515;
                // var km = miles * 1.609344;
                var roundmiles = Math.round(miles * 100) / 100;
                this.getCost(roundmiles, this.ride.trip_date, this.ride.round_trip, this.ride.wheelchair, 0)

            }
        },
        getCost(distance, date, round, chair, wait){
            switch (new Date(date).getDay()) {
                case 0:
                    var day = "Sunday";
                    break;
                case 1:
                    var day = "Monday";
                    break;
                case 2:
                    var day = "Tuesday";
                    break;
                case 3:
                    var day = "Wednesday";
                    break;
                case 4:
                    var day = "Thursday";
                    break;
                case 5:
                    var day = "Friday";
                    break;
                case 6:
                    var day = "Saturday";
            }
            if(distance <= 5){
                console.log('less then 5')
                if(round == 'yes'){
                    this.calculate.day = day
                    this.calculate.round = 'Yes'
                    this.calculate.distance = distance
                    this.calculate.totalCost = 120
                }else{
                    this.calculate.day = day
                    this.calculate.round = 'No'
                    this.calculate.distance = distance
                    this.calculate.totalCost = 70
                }

            }else if(distance > 5 && distance <= 10){
                console.log('5 to 10')
                if(round == 'yes'){
                    this.calculate.day = day
                    this.calculate.round = 'Yes'
                    this.calculate.distance = distance
                    this.calculate.totalCost = 130
                }else{
                    this.calculate.day = day
                    this.calculate.round = 'No'
                    this.calculate.distance = distance
                    this.calculate.totalCost = 75
                }
            }else{
                // console.log('more then 10')
                if(round == 'yes'){
                    this.calculate.day = day
                    this.calculate.round = 'Yes'
                    this.calculate.distance = distance
                    this.calculate.totalCost = Math.round(6*(distance-10)+130)
                }else{
                    this.calculate.day = day
                    this.calculate.round = 'No'
                    this.calculate.distance = distance
                    this.calculate.totalCost = Math.round(3*(distance-10)+75)
                }
            }
            if(chair == 'yes'){
                this.calculate.chair = 'Yes'
                this.calculate.totalCost = this.calculate.totalCost+25
            }else{
                this.calculate.chair = 'No'
            }
            if(day == 'Saturday' && day == 'Sunday'){
                if(round == 'yes'){
                    this.calculate.totalCost = this.calculate.totalCost+20
                }else{
                    this.calculate.totalCost = this.calculate.totalCost+10
                }
            }

            var currentTime = new Date(date).getHours();
            console.log(currentTime)
            if (currentTime >= 8 && currentTime <= 17) {

            } else {
                this.calculate.totalCost = this.calculate.totalCost+60
            }
            this.ride.cost=this.calculate.totalCost

        },
        rad2deg: function (deg){
        var pi = Math.PI;
        return deg * (180/pi);
        },
        deg2rad: function(deg) {
            return deg * (Math.PI/180)
        },
    }
}

</script>
