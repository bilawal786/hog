<template>

    <div class="panel panel-default card-view">
        <div class="panel-wrapper collapse in">
            <div class="panel-heading">
                <h4>Create New Ride</h4>
            </div>
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
                                                <input type="text" class="form-control" placeholder="First Name"
                                                       v-model="ride.Fname">
                                                <ul class="c-err" v-if="errorshow">
                                                    <li class="c-err-li" v-for="error in errorshow.Fname"
                                                        :key="error">{{ error }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10">Last Name</label>
                                                <input type="text" class="form-control" placeholder="Last Name"
                                                       v-model="ride.Lname">
                                                <ul class="c-err" v-if="errorshow">
                                                    <li class="c-err-li" v-for="error in errorshow.Lname"
                                                        :key="error">{{ error }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10">E-Mail</label>
                                                <input type="email" class="form-control" placeholder="E-mail"
                                                       v-model="ride.email">
                                                <ul class="c-err" v-if="errorshow">
                                                    <li class="c-err-li" v-for="error in errorshow.email"
                                                        :key="error">{{ error }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10">Phone</label>
                                                <input type="text" class="form-control" placeholder="Phone"
                                                       v-model="ride.phone">
                                                <ul class="c-err" v-if="errorshow">
                                                    <li class="c-err-li" v-for="error in errorshow.phone"
                                                        :key="error">{{ error }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select v-model="ride.ridePerson" class="form-control"
                                                        style="width: 160px">
                                                    <option class="form-option" value="Self a Ride">Self a Ride
                                                    </option>
                                                    <option class="form-option" value="Someone Else">Someone Else
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" v-if="ride.ridePerson == 'Someone Else'">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10">first Name</label>
                                                <input type="text" class="form-control" placeholder="First Name"
                                                       v-model="ride.else_first_name">
                                                <ul class="c-err" v-if="errorshow">
                                                    <li class="c-err-li" v-for="error in errorshow.else_first_name"
                                                        :key="error">{{ error }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10">Last Name</label>
                                                <input type="text" class="form-control" placeholder="Last Name"
                                                       v-model="ride.else_last_name">
                                                <ul class="c-err" v-if="errorshow">
                                                    <li class="c-err-li" v-for="error in errorshow.else_last_name"
                                                        :key="error">{{ error }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!--                                    <div class="row">-->
                                    <!--                                        <div class="col-md-6">-->
                                    <!--                                            <div class="form-group">-->
                                    <!--                                                <label class="control-label mb-10">Card on File Y/N</label>-->
                                    <!--                                                <input type="text" class="form-control" placeholder="Card on File Y/N (Yes-2/26)" v-model="ride.card_on_file">-->
                                    <!--                                                <ul class="c-err" v-if="errorshow">-->
                                    <!--                                                    <li class="c-err-li" v-for="error in errorshow.card_on_file" :key="error">{{error}}</li>-->
                                    <!--                                                </ul>-->
                                    <!--                                            </div>-->
                                    <!--                                        </div>-->
                                    <!--                                        &lt;!&ndash;/span&ndash;&gt;-->
                                    <!--                                        <div class="col-md-6">-->
                                    <!--                                            <div class="form-group">-->
                                    <!--                                                <label class="control-label mb-10">Relative</label>-->
                                    <!--                                                <input type="text" class="form-control" placeholder="Relative" v-model="ride.relative">-->
                                    <!--                                                <ul class="c-err" v-if="errorshow">-->
                                    <!--                                                    <li class="c-err-li" v-for="error in errorshow.relative" :key="error">{{error}}</li>-->
                                    <!--                                                </ul>-->
                                    <!--                                            </div>-->
                                    <!--                                        </div>-->
                                    <!--                                        &lt;!&ndash;/span&ndash;&gt;-->
                                    <!--                                    </div>-->
                                    <!--                                    <div class="row">-->
                                    <!--                                        <div class="col-md-6">-->
                                    <!--                                            <div class="form-group">-->
                                    <!--                                                <label class="control-label mb-10">Relative No.</label>-->
                                    <!--                                                <input type="text" class="form-control" placeholder="Relative Phone No." v-model="ride.relative_no">-->
                                    <!--                                                <ul class="c-err" v-if="errorshow">-->
                                    <!--                                                    <li class="c-err-li" v-for="error in errorshow.relative_no" :key="error">{{error}}</li>-->
                                    <!--                                                </ul>-->
                                    <!--                                            </div>-->
                                    <!--                                        </div>-->
                                    <!--                                        &lt;!&ndash;/span&ndash;&gt;-->
                                    <!--                                        <div class="col-md-6">-->
                                    <!--                                            <div class="form-group">-->
                                    <!--                                                <label class="control-label mb-10">Facility</label>-->
                                    <!--                                                <input type="text" class="form-control" placeholder="Facility" v-model="ride.facility">-->
                                    <!--                                                <ul class="c-err" v-if="errorshow">-->
                                    <!--                                                    <li class="c-err-li" v-for="error in errorshow.facility" :key="error">{{error}}</li>-->
                                    <!--                                                </ul>-->
                                    <!--                                            </div>-->
                                    <!--                                        </div>-->
                                    <!--                                        &lt;!&ndash;/span&ndash;&gt;-->
                                    <!--                                    </div>-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10">Do you need wheelchair
                                                    accessibility?</label>
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="yes" v-model="ride.wheelchair">
                                                            <label>W/c(Yes)</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="no" v-model="ride.wheelchair">
                                                            <label>Ambulatory(No)</label>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10">Is this a round trip
                                                    request?</label>
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
                                                          zone="local"
                                                          v-model="ride.trip_date"
                                                          :format="{
                                                        year: 'numeric',
                                                        month: 'long',
                                                        day: 'numeric',
                                                        hour: 'numeric',
                                                        minute: '2-digit',

                                                    }" :phrases="{ ok: 'Continue', cancel: 'Exit' }" :hour-step="1"
                                                          :minute-step="1" :week-start="7" use12-hour
                                                          auto></datetime>
                                            </div>
                                            <ul class="c-err" v-if="errorshow">
                                                <li class="c-err-li" v-for="error in errorshow.trip_date"
                                                    :key="error">{{ error }}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10">Approximate Length of
                                                    Appt</label>
                                                <input type="text" class="form-control"
                                                       placeholder="Appointment Duration"
                                                       v-model="ride.appt_length">
                                                <ul class="c-err" v-if="errorshow">
                                                    <li class="c-err-li" v-for="error in errorshow.appt_length"
                                                        :key="error">{{ error }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--                                        <div class="col-md-6 " v-if="ride.round_trip == 'yes'">-->
                                        <!--                                            <div class="form-group">-->
                                        <!--                                                <label class="control-label mb-10">Waiting</label>-->
                                        <!--                                                <input type="text" class="form-control" placeholder="Waiting in hours" v-model="ride.waiting">-->
                                        <!--                                                <ul class="c-err" v-if="errorshow">-->
                                        <!--                                                    <li class="c-err-li" v-for="error in errorshow.waiting" :key="error">{{error}}</li>-->
                                        <!--                                                </ul>-->
                                        <!--                                            </div>-->
                                        <!--                                        </div>-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label mb-10">Message</label>
                                                <textarea class="form-control" rows="5"
                                                          v-model="ride.message"></textarea>
                                                <ul class="c-err" v-if="errorshow">
                                                    <li class="c-err-li" v-for="error in errorshow.message"
                                                        :key="error">{{ error }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /Row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10">Pickup Address</label>
                                                <vue-google-autocomplete v-model="ride.start_address"
                                                                         types="address" ref="addressStart"
                                                                         v-on:placechanged="getAddressStart"
                                                                         id="mapStart"
                                                                         classname="form-control"
                                                                         placeholder="Start" country="us">
                                                </vue-google-autocomplete>
                                                <ul class="c-err" v-if="errorshow">
                                                    <li class="c-err-li" v-for="error in errorshow.start_address"
                                                        :key="error">{{ error }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10">Destination Address</label>
                                                <vue-google-autocomplete v-model="ride.end_address" types="address"
                                                                         ref="addressEnd"
                                                                         v-on:placechanged="getAddressEnd"
                                                                         id="mapEnd"
                                                                         classname="form-control" placeholder="End"
                                                                         country="us">
                                                </vue-google-autocomplete>
                                                <ul class="c-err" v-if="errorshow">
                                                    <li class="c-err-li" v-for="error in errorshow.end_address"
                                                        :key="error">{{ error }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10">Will a caregiver and/or family
                                                    member be riding along?</label>
                                                <select v-model="ride.familycaregive" class="form-control"
                                                        style="width: 160px">
                                                    <option class="form-option" value="yes">Yes</option>
                                                    <option class="form-option" value="no">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" v-if="ride.familycaregive == 'yes'">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10">how many family member/s?</label>
                                                <input type="text" class="form-control" placeholder="Number of Member"
                                                       v-model="ride.num_family_member">
                                                <ul class="c-err" v-if="errorshow">
                                                    <li class="c-err-li"
                                                        v-for="error in errorshow.num_family_member" :key="error">
                                                        {{ error }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label mb-10">Anything else we should know
                                                    pertaining to this ride?</label>
                                                <input type="text" class="form-control" placeholder="Pertaining"
                                                       v-model="ride.pertaining">
                                                <ul class="c-err" v-if="errorshow">
                                                    <li class="c-err-li" v-for="error in errorshow.pertaining"
                                                        :key="error">{{ error }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10">Payment Status</label>
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="yes" v-model="ride.payment">
                                                            <label>Paid</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="no" v-model="ride.payment">
                                                            <label>Unpaid</label>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button"
                                                    class="btn btn-success btn-outline btn-icon right-icon"
                                                    @click="calculateCost(ride.start_lat, ride.start_lng, ride.end_lat, ride.end_lng)">
                                                <span>Cost</span>
                                                <i class="zmdi zmdi-money"></i>
                                            </button>
                                            <span> $ {{ ride.cost }}</span>
                                            <br>
                                            <ul class="c-err" v-if="errorshow">
                                                <li class="c-err-li" v-for="error in errorshow.cost" :key="error">
                                                    {{ error }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions mt-10">
                                    <button type="button" class="btn btn-success  mr-10"
                                            @click="updateRideDetailById()" :disabled="isloading">
                                            <span v-if="isloading"><i
                                                class="fam fa fa-spinner fa-spin"></i>Loading</span>
                                        <span v-else>Create</span>
                                    </button>
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
            isloading: false,
            ride: {
                type: 'Request Ride',
                customerType: 'Retruning Customer',
                Fname: null,
                Lname: null,
                email: null,
                phone: null,
                ridePerson: 'Self a Ride',
                else_first_name: null,
                else_last_name: null,
                facility: null,
                appt_length: null,
                account: null,
                invoice: null,
                wheelchair: 'no',
                round_trip: 'no',
                trip_date: new Date().toJSON(),
                message: null,
                start_lat: null,
                start_lng: null,
                end_lat: null,
                end_lng: null,
                start_address: null,
                start_city: null,
                start_country: null,
                end_address: null,
                end_city: null,
                end_country: null,
                cost: null,
                familycaregive: 'no',
                num_family_member: null,
                pertaining: null,
                payment:'no',
                status_assign: 'no',
                user_id: null,
            },
            calculate: {
                day: null,
                distance: null,
                round: null,
                chair: null,
                time: null,
                holiday: null,
                totalCost: null,
            },
            errorshow: null,
        }
    },
    components: {
        VueGoogleAutocomplete
    },
    mounted() {
        this.$refs.addressStart.focus();
        this.$refs.addressEnd.focus();
    },
    methods: {
        updateRideDetailById: function () {

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
                    this.isloading = true,
                        axios.post("admin/web/form/request/ride", this.ride).then(response => {
                            window.scrollTo(0, 0)
                            this.isloading = false
                            if (response.status == 200) {
                                window.scrollTo(0, 0)
                                this.$router.push({ name: 'RequestRideList' })
                                switch (response.data.type) {
                                    case 'info':
                                        toastr.info(response.data.messege);
                                        break;
                                    case 'success':
                                        toastr.success(response.data.messege);
                                        break;
                                    case 'warning':
                                        toastr.warning(response.data.messege);
                                        break;
                                    case 'error':
                                        toastr.error(response.data.messege);
                                        break;
                                }
                                // this.router.push({ name: 'RequestRideList' })
                            } else {

                            }
                        }).catch(err => {
                            this.isloading = false
                            this.errorshow = err.response.data.errors
                        })
                }
            }).catch(() => {
                // this.isloading=false
            })
        },
        getAddressStart: function (addressData, placeResultData, id) {
            this.ride.start_lat = addressData.latitude;
            this.ride.start_lng = addressData.longitude;
            this.ride.start_address = addressData.street_number + ', ' + addressData.route;
            this.ride.start_city = addressData.locality;
            this.ride.start_country = addressData.country;

        },
        getAddressEnd: function (addressData, placeResultData, id) {
            this.ride.end_lat = addressData.latitude;
            this.ride.end_lng = addressData.longitude;
            // this.ride.end_address = placeResultData.formatted_address;
            this.ride.end_address = addressData.street_number + ', ' + addressData.route;
            this.ride.end_city = addressData.locality;
            this.ride.end_country = addressData.country;
            // this.$refs.ride.end_address.clear();
        },
        calculateCost: function (lat1, lon1, lat2, lon2) {
            if ((lat1 == lat2) && (lon1 == lon2)) {
                return 0;
            } else {
                if (lat1 != null && lat2 != null && lon1 != null && lon2 != null) {
                    var theta = lon1 - lon2;
                    var dist = Math.sin(this.deg2rad(lat1)) * Math.sin(this.deg2rad(lat2)) + Math.cos(this.deg2rad(lat1)) * Math.cos(this.deg2rad(lat2)) * Math.cos(this.deg2rad(theta));
                    dist = Math.acos(dist);
                    dist = this.rad2deg(dist);
                    var miles = dist * 60 * 1.1515;
                    // var km = miles * 1.609344;
                    var roundmiles = Math.round(miles * 100) / 100;
                    this.getCost(roundmiles, this.ride.trip_date, this.ride.round_trip, this.ride.wheelchair)
                } else {
                    return 0
                }

            }
        },
        getCost(distance, date, round, chair) {
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
            if (distance <= 5) {
                if (round == 'yes') {
                    this.calculate.round = 'Yes'
                    this.calculate.distance = 'Less then 5 miles'
                    this.calculate.distCost = 120
                    this.calculate.totalCost = 120
                } else {
                    this.calculate.round = 'No'
                    this.calculate.distance = 'Less then 5 miles'
                    this.calculate.distCost = 70
                    this.calculate.totalCost = 70
                }

            } else if (distance > 5 && distance <= 10) {
                console.log('5 to 10')
                if (round == 'yes') {
                    this.calculate.round = 'Yes'
                    this.calculate.distance = 'Between 5 to 10 miles'
                    this.calculate.distCost = 130
                    this.calculate.totalCost = 130
                } else {
                    this.calculate.round = 'No'
                    this.calculate.distance = 'Between 5 to 10 miles'
                    this.calculate.distCost = 75
                    this.calculate.totalCost = 75
                }
            } else {
                // console.log('more then 10')
                if (round == 'yes') {
                    this.calculate.round = 'Yes'
                    this.calculate.distance = 'More then 10 miles'
                    this.calculate.distCost = Math.round(6 * (distance - 10) + 130)
                    this.calculate.totalCost = Math.round(6 * (distance - 10) + 130)
                } else {
                    this.calculate.round = 'No'
                    this.calculate.distance = 'More then 10 miles'
                    this.calculate.distCost = Math.round(3 * (distance - 10) + 75)
                    this.calculate.totalCost = Math.round(3 * (distance - 10) + 75)
                }
            }
            if (chair == 'yes') {
                this.calculate.chair = 25
                this.calculate.totalCost = this.calculate.totalCost + 25
            } else {
                this.calculate.chair = 0
            }
            console.log(day)
            if (day == 'Saturday' || day == 'Sunday') {
                console.log(day)
                if (round == 'yes') {
                    this.calculate.day = 20
                    this.calculate.totalCost = this.calculate.totalCost + 20
                } else {
                    this.calculate.day = 10
                    this.calculate.totalCost = this.calculate.totalCost + 10
                }
            } else {
                this.calculate.day = 0
            }

            var currentTime = new Date(date).getHours();
            console.log(currentTime)
            if (currentTime >= 8 && currentTime <= 17) {

            } else {
                this.calculate.time = 10
                this.calculate.totalCost = this.calculate.totalCost + 10
            }
            this.ride.cost = this.calculate.totalCost

        },
        rad2deg: function (deg) {
            var pi = Math.PI;
            return deg * (180 / pi);
        },
        deg2rad: function (deg) {
            return deg * (Math.PI / 180)
        },
    }
}
</script>

<style scoped>

</style>
