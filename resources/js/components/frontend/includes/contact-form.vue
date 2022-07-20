<template>
    <div>
        <form>
            <div class="input-content clearfix">
                <h3 class="from-title">Send a message</h3>
                <p>What is the reason you need to contact us today?</p>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mgb-30">
                            <select v-model="sendMessage.type" class="form-section" style="width: 144px">
                                <option
                                    class="form-option"
                                    selected="selected"
                                    value="Submit Feedback"
                                >
                                    Submit Feedback
                                </option>
                                <option class="form-option" value="Billing Question">
                                    Billing Question
                                </option>
                                <option class="form-option" value="Request Ride">
                                    Request Ride
                                </option>
                                <option class="form-option" value="Others">Other</option>
                            </select>
                        </div>
                        <div v-if="errors.type" class="contact-valid">
                            {{ errors.type[0] }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mgb-30">
                            <input
                                v-model="sendMessage.Fname"
                                :class="{
                  'invalid-input': change ? errors.Fname : errors.Fname,
                }"
                                class="form-control"
                                placeholder="First Name*"
                                required
                                type="text"
                            />
                            <div v-if="errors.Fname" class="contact-valid">
                                The first name field is required
                            </div>
                        </div>
                    </div>
                    <!-- /.col-sm-6 -->
                    <div class="col-sm-6">
                        <div class="mgb-30">
                            <input
                                v-model="sendMessage.Lname"
                                :class="{
                  'invalid-input': change ? errors.Lname : errors.Lname,
                }"
                                class="form-control"
                                placeholder="Last Name*"
                                required
                                type="text"
                            />
                            <div v-if="errors.Lname" class="contact-valid">
                                The last name field is required
                            </div>
                        </div>
                    </div>
                    <!-- /.col-sm-6 -->
                    <div class="col-sm-6">
                        <div class="mgb-30">
                            <input
                                v-model="sendMessage.email"
                                :class="{
                  'invalid-input': change ? errors.email : errors.email,
                }"
                                class="form-control email"
                                placeholder="Email*"
                                required
                                type="email"
                            />
                            <div v-if="errors.email" class="contact-valid">
                                The email field is required
                            </div>
                        </div>
                    </div>
                    <!-- /.col-sm-6 -->
                    <div class="col-sm-6">
                        <div class="mgb-30">
                            <input
                                v-model="sendMessage.phone"
                                :class="{
                  'invalid-input': change ? errors.phone : errors.phone,
                }"
                                class="form-control"
                                placeholder="Phone*"
                                required
                                type="text"
                            />
                            <div v-if="errors.phone" class="contact-valid">
                                The phone field is required
                            </div>
                        </div>
                    </div>
                    <!-- /.col-sm-6 -->
                    <div v-if="sendMessage.type == 'Request Ride'" class="col-sm-6">
                        <div class="mgb-30">
                            <input
                                v-model="sendMessage.card_on_file"
                                :class="{
                  'invalid-input': change ? errors.card_on_file : errors.card_on_file,
                }"
                                class="form-control"
                                placeholder="Card on File"
                                required
                                type="text"
                            />
                            <div v-if="errors.card_on_file" class="contact-valid">
                                {{ errors.card_on_file[0] }}
                            </div>
                        </div>
                    </div>
                    <!-- /.col-sm-6 -->
                    <div v-if="sendMessage.type == 'Request Ride'" class="col-sm-6">
                        <div class="mgb-30">
                            <input
                                v-model="sendMessage.relative"
                                :class="{ 'invalid-input': change ? errors.relative : errors.relative, }"
                                class="form-control"
                                placeholder="Relative"
                                required
                                type="text"
                            />
                            <div v-if="errors.relative" class="contact-valid">
                                {{ errors.relative[0] }}
                            </div>
                        </div>
                    </div>
                    <!-- /.col-sm-6 -->
                    <div v-if="sendMessage.type == 'Request Ride'" class="col-sm-6">
                        <div class="mgb-30">
                            <input
                                v-model="sendMessage.relative_no"
                                :class="{
                  'invalid-input': change ? errors.relative_no : errors.relative_no,
                }"
                                class="form-control"
                                placeholder="Relative Phone #"
                                required
                                type="text"
                            />
                            <div v-if="errors.relative_no" class="contact-valid">
                                {{ errors.relative_no[0] }}
                            </div>
                        </div>
                    </div>
                    <!-- /.col-sm-6 -->
                    <div v-if="sendMessage.type == 'Request Ride'" class="col-sm-6">
                        <div class="mgb-30">
                            <input
                                v-model="sendMessage.facility"
                                :class="{
                  'invalid-input': change ? errors.facility : errors.facility,
                }"
                                class="form-control"
                                placeholder="Facility"
                                required
                                type="text"
                            />
                            <div v-if="errors.facility" class="contact-valid">
                                {{ errors.facility[0] }}
                            </div>
                        </div>
                    </div>
                    <div
                        v-if="
              sendMessage.type == 'Billing Question' ||
              sendMessage.type == 'Submit Feedback'
            "
                        class="col-sm-6"
                    >
                        <div class="mgb-30">
                            <input
                                v-model="sendMessage.account"
                                class="form-control"
                                placeholder="Organization/Facility (Optional)"
                                type="text"
                            />
                        </div>
                    </div>
                    <div v-if="sendMessage.type == 'Billing Question'" class="col-sm-6">
                        <div class="mgb-30">
                            <input
                                v-model="sendMessage.invoice"
                                class="form-control"
                                placeholder="Invoice # (Optional)"
                                type="text"
                            />
                        </div>
                    </div>

                    <!-- /.col-sm-6 -->
                    <div v-if="sendMessage.type == 'Request Ride'" class="col-sm-6">
                        <p class="form-text">Do you need wheelchair accessibility?</p>
                        <div class="mgb-30">
                            <div class="m-v-radio">
                                <label class="form-radio-custom">
                                    W/C (Yes)
                                    <input
                                        v-model="sendMessage.wheelchair"
                                        class="form-radio"
                                        name="wheelchair"
                                        type="radio"
                                        value="yes"
                                    />
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="m-v-radio">
                                <label class="form-radio-custom">
                                    Amb (No)
                                    <input
                                        v-model="sendMessage.wheelchair"
                                        checked="checked"
                                        class="form-radio"
                                        name="wheelchair"
                                        type="radio"
                                        value="no"
                                    />
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div v-if="errors.wheelchair" class="contact-valid">
                                {{ errors.wheelchair[0] }}
                            </div>
                        </div>
                    </div>
                    <div v-if="sendMessage.type == 'Request Ride'" class="col-sm-6">
                        <p class="form-text">Is this a round trip request?</p>
                        <div class="mgb-30">
                            <div class="m-v-radio">
                                <label class="form-radio-custom">
                                    Yes
                                    <input
                                        v-model="sendMessage.round_trip"
                                        class="form-radio"
                                        name="round_trip"
                                        type="radio"
                                        value="yes"
                                    />
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="m-v-radio">
                                <label class="form-radio-custom">
                                    No
                                    <input
                                        v-model="sendMessage.round_trip"
                                        checked="checked"
                                        class="form-radio"
                                        name="round_trip"
                                        type="radio"
                                        value="no"
                                    />
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div v-if="errors.round_trip" class="contact-valid">
                                {{ errors.round_trip[0] }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div v-if="sendMessage.type == 'Request Ride'" class="col-md-6">
                        <p class="form-text">Trip Date & Time</p>
                        <div class="mgb-30">
                            <date-time
                                v-model="sendMessage.trip_date"
                                :class="{
                  'invalid-input': change ? errors.trip_date : errors.trip_date,
                }"
                                :format="{
                  year: 'numeric',
                  month: 'long',
                  day: 'numeric',
                  hour: 'numeric',
                  minute: '2-digit',
                }"
                                :hour-step="1"
                                :min-datetime='new Date().toJSON()'
                                :minute-step="1"
                                :phrases="{ ok: 'Continue', cancel: 'Exit' }"
                                :week-start="7"
                                auto
                                class="theme-orange"
                                input-class="form-control"
                                type="datetime"
                                use12-hour
                                zone="local"
                            ></date-time>
                            <div v-if="errors.trip_date" class="contact-valid">
                                {{ errors.trip_date[0] }}
                            </div>
                        </div>
                    </div>
                    <div v-if="sendMessage.type == 'Request Ride' && sendMessage.round_trip == 'yes'" class="col-sm-6">
                        <p class="form-text">Waiting in Hours</p>
                        <div class="mgb-30">
                            <input
                                v-model="sendMessage.waiting"
                                :class="{
                  'invalid-input': change ? errors.waiting : errors.waiting,
                }" class="form-control"
                                max="10"
                                min="1"
                                placeholder="1 to 10"
                                required
                                type="number"
                            />
                            <div v-if="errors.waiting" class="contact-valid">
                                {{ errors.waiting[0] }}
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-12 -->
                    <div class="col-md-12">
                        <div class="mgb-30">
              <textarea
                  v-model="sendMessage.message"
                  cols="80"
                  required
                  rows="5"
              >
Your Message</textarea
              >
                        </div>
                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
                <div v-if="sendMessage.type == 'Request Ride'" class="row">
                    <div class="col-md-6">
                        <div class="mgb-30">
                            <vue-google-autocomplete
                                id="mapStart"
                                ref="addressStart"
                                :class="{
                  'invalid-input': change
                    ? errors.start_address
                    : errors.start_address,
                }"
                                classname="form-control"
                                country="us"
                                placeholder="Start"
                                types="establishment"
                                v-on:placechanged="getAddressStart"
                            >
                            </vue-google-autocomplete>
                            <div v-if="errors.start_address" class="contact-valid">
                                {{ errors.start_address[0] }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mgb-30">
                            <vue-google-autocomplete
                                id="mapEnd"
                                ref="addressEnd"
                                :class="{
                  'invalid-input': change
                    ? errors.end_address
                    : errors.end_address,
                }"
                                classname="form-control"
                                country="us"
                                placeholder="End"
                                types="establishment"
                                v-on:placechanged="getAddressEnd"
                            >
                            </vue-google-autocomplete>
                            <div v-if="errors.end_address" class="contact-valid">
                                {{ errors.end_address[0] }}
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if="sendMessage.type == 'Request Ride'" class="row">
                    <div class="col-md-12">
                        <div class="clearfix">
                            <button class="btn-contact" type="button"
                                @click="calculateCost(sendMessage.start_lat, sendMessage.start_lng, sendMessage.end_lat, sendMessage.end_lng)">
                                Calculate Cost
                            </button>
                            <span
                                v-show="calculate.totalCost"
                                style="float: left; font-size: 2rem; padding: 10px"
                            >{{ calculate.totalCost }} $</span
                            >

                        </div>
                        <div class=""></div>
                        <div v-if="errors.cost" class="contact-valid">
                            {{ errors.cost[0] }}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div v-if="sendMessage.cost">
                            <div class="clearfix">
                                <div class="float-left"><span>$ {{ calculate.distCost }}: = </span><span
                                    class="text-yellow">Distance {{ calculate.distance }} - round trip ({{ calculate.round }})</span>
                                </div>
                            </div>
                            <div class="clearfix">
                                <div class="float-left"><span>$ {{ calculate.chair }}: = </span><span
                                    class="text-yellow">Wheel Chair Cost</span></div>
                            </div>
                            <div class="clearfix">
                                <div class="float-left"><span>$ {{ calculate.time }}: = </span><span
                                    class="text-yellow">Before or after the hours of 8am-5pm</span></div>
                            </div>
                            <div class="clearfix">
                                <div class="float-left"><span>$ {{ calculate.waiting }}: = </span><span
                                    class="text-yellow">Waiting Charges</span></div>
                            </div>
                            <div class="clearfix">
                                <div class="float-left"><span>$ {{ calculate.day }}: = </span><span class="text-yellow">Weekend charges</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if="sendMessage.type == 'Request Ride'" class="row">
                    <div class="col-md-12">
                        <div class="header-map-content">
                            <!-- <iframe
                                              height="300"
                                              width="100%"
                                              src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC871wKM6aoCLSV_pT3xBVsYzNGXaDh7Pw&q=121+King+St,Melbourne+VIC+3000,Australia"
                                              allowfullscreen="allowfullscreen"
                                          ></iframe> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="subimt-button-contact clearfix">
                            <button class="btn btn-lg submit yellow-button" type="button" @click="sendDatatoDB" :disabled="isloading">
                                <span v-if="isloading"><span class="fam fa fa-spinner fa-spin"></span>Loading</span>
                                <span v-else>Submit</span>
                            </button>
                        </div>
                        <!-- /.subimt -->
                    </div>
                </div>
            </div>

            <!-- /.input-content -->
        </form>
    </div>
</template>
<script>
import VueGoogleAutocomplete from "vue-google-autocomplete";
import {Datetime} from 'vue-datetime'
import 'vue-datetime/dist/vue-datetime.css'
import {mapGetters, mapActions} from "vuex";

export default {

    data() {
        return {
            isloading:false,
            sendMessage: {
                type: 'Request Ride',
                Fname: null,
                Lname: null,
                email: null,
                phone: null,
                card_on_file: null,
                relative: null,
                relative_no: null,
                facility: null,
                waiting: 0,
                account: null,
                invoice: null,
                wheelchair: 'no',
                round_trip: 'no',
                trip_date: new Date().toJSON(),
                message: 'Message',
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
                status_assign: 'no',
                user_id: null,
            },
            calculate: {
                day: 0,
                distance: 0,
                round: null,
                chair: 0,
                distCost: 0,
                time: 0,
                waiting: 0,
                holiday: null,
                totalCost: null,
            },
            change: true,
            tempData: {}

        };
    },
    props: {},
    computed: {
        ...mapGetters("auth", ["user", "errors"]),
    },
    mounted() {

        this.$store.commit("auth/setErrors", {})
        //clear veriables
        this.sendMessage.Fname = null
            this.sendMessage.Lname = null
            this.sendMessage.email = null
            this.sendMessage.phone = null
            this.sendMessage.card_on_file = null
            this.sendMessage.relative = null
            this.sendMessage.relative_no = null
            this.sendMessage.facility = null
            this.sendMessage.waiting = null
            this.sendMessage.account = null
            this.sendMessage.invoice = null
            this.sendMessage.wheelchair = 'no'
            this.sendMessage.round_trip = 'no'
            this.sendMessage.trip_date = new Date().toJSON()
            this.sendMessage.message = 'message'
            this.sendMessage.start_lat = null
            this.sendMessage.start_lng = null
            this.sendMessage.start_address = null
            this.sendMessage.start_city = null
            this.sendMessage.start_country = null
            this.sendMessage.end_lat = null
            this.sendMessage.end_lng = null
            this.sendMessage.end_address = null
            this.sendMessage.end_city = null
            this.sendMessage.end_country = null
            this.sendMessage.cost = null
            this.calculate.day= 0
            this.calculate.distance= 0
            this.calculate.round= null
            this.calculate.chair= 0
            this.calculate.distCost= 0
            this.calculate.time= 0
            this.calculate.waiting= 0
            this.calculate.holiday= null
            this.calculate.totalCost= null

        window.scrollTo(0, 0);
        this.$refs.addressStart.focus();
        this.$refs.addressEnd.focus();
        if (this.$route.params.title) {
            this.sendMessage = this.$route.params.title
        }
        if (this.user) {
            this.sendMessage.Fname = this.user.first_name
            this.sendMessage.Lname = this.user.last_name
            this.sendMessage.email = this.user.email
            this.sendMessage.phone = this.user.phone
        }
    },
    watch: {
        user: function (val) {
            this.sendMessage.Fname = this.user.first_name
            this.sendMessage.Lname = this.user.last_name
            this.sendMessage.email = this.user.email
            this.sendMessage.phone = this.user.phone
        },
        sendMessage: function (val){
            console.log('a')
            if(this.sendMessage.Fname != null){
                delete this.errors['Fname'];
            }
        }
    },
    methods: {

        getAddressStart: function (addressData, placeResultData, id) {
            this.sendMessage.start_lat = addressData.latitude;
            this.sendMessage.start_lng = addressData.longitude;
            this.sendMessage.start_address = addressData.street_number + ', ' + addressData.route;
            this.sendMessage.start_city = addressData.locality;
            this.sendMessage.start_country = addressData.country;
        },
        getAddressEnd: function (addressData, placeResultData, id) {
            this.sendMessage.end_lat = addressData.latitude;
            this.sendMessage.end_lng = addressData.longitude;
            this.sendMessage.end_address = placeResultData.formatted_address;
            this.sendMessage.end_address = addressData.street_number + ', ' + addressData.route;
            this.sendMessage.end_city = addressData.locality;
            this.sendMessage.end_country = addressData.country;
        },
        calculateCost: function (lat1, lon1, lat2, lon2) {
            if ((lat1 == lat2) && (lon1 == lon2)) {
                return 0;
            } else {
                if(lat1 != null && lat2 != null && lon1 != null && lon2 != null){
                    var theta = lon1 - lon2;
                    var dist = Math.sin(this.deg2rad(lat1)) * Math.sin(this.deg2rad(lat2)) + Math.cos(this.deg2rad(lat1)) * Math.cos(this.deg2rad(lat2)) * Math.cos(this.deg2rad(theta));
                    dist = Math.acos(dist);
                    dist = this.rad2deg(dist);
                    var miles = dist * 60 * 1.1515;
                    // var km = miles * 1.609344;
                    var roundmiles = Math.round(miles * 100) / 100;
                    this.getCost(roundmiles, this.sendMessage.trip_date, this.sendMessage.round_trip, this.sendMessage.wheelchair, this.sendMessage.waiting)
                }else{
                    return 0
                }

            }
        },
        getCost(distance, date, round, chair, wait) {
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
                    this.calculate.waiting = wait * 60
                    this.calculate.round = 'Yes'
                    this.calculate.distance = 'Less then 5 miles'
                    this.calculate.distCost = 120
                    this.calculate.totalCost = 120 + (wait * 60)
                } else {
                    this.calculate.round = 'No'
                    this.calculate.distance = 'Less then 5 miles'
                    this.calculate.distCost = 70
                    this.calculate.totalCost = 70
                }

            } else if (distance > 5 && distance <= 10) {
                console.log('5 to 10')
                if (round == 'yes') {
                    this.calculate.waiting = wait * 60
                    this.calculate.round = 'Yes'
                    this.calculate.distance = 'Between 5 to 10 miles'
                    this.calculate.distCost = 130
                    this.calculate.totalCost = 130 + (wait * 60)
                } else {
                    this.calculate.round = 'No'
                    this.calculate.distance = 'Between 5 to 10 miles'
                    this.calculate.distCost = 75
                    this.calculate.totalCost = 75
                }
            } else {
                // console.log('more then 10')
                if (round == 'yes') {
                    this.calculate.waiting = wait * 60
                    this.calculate.round = 'Yes'
                    this.calculate.distance = 'More then 10 miles'
                    this.calculate.distCost = Math.round(6 * (distance - 10) + 130)
                    this.calculate.totalCost = Math.round(6 * (distance - 10) + 130) + (wait * 60)
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
            this.sendMessage.cost = this.calculate.totalCost

        },
        rad2deg: function (deg) {
            var pi = Math.PI;
            return deg * (180 / pi);
        },
        deg2rad: function (deg) {
            return deg * (Math.PI / 180)
        },
        sendDatatoDB: function () {
            if (this.user) {
                this.sendMessage.user_id = this.user.id
            } else {
                this.sendMessage.user_id = null
            }
            if (this.sendMessage.type == "Request Ride") {
                let tempData = {}
                let sendmsg = JSON.parse(JSON.stringify(this.sendMessage))
                for (const key in sendmsg) {
                    if (sendmsg[key] == null) {
                        if (key != 'account' && key != 'invoice' && key != 'user_id' && key != 'card_on_file' && key != 'relative' && key != 'relative_no' && key != 'facility') {
                            if (sendmsg['round_trip'] != 'yes') {
                                if (key != 'waiting') {
                                    tempData[key] = ['The ' + key + ' field is required.'];
                                }
                            } else {
                                tempData[key] = ['The ' + key + ' field is required.'];
                            }

                        }
                    }
                }
                this.$store.commit("auth/setErrors", tempData)
                if (Object.keys(tempData).length === 0) {
                    this.$router.push({name: 'request1_ride', params: {title: this.sendMessage}})
                }
            } else {
                this.isloading = true
                axios.post("send/message", this.sendMessage)
                    .then(response => {
                        window.scrollTo(0, 0)
                        this.isloading = false
                        if (response) {
                            this.sendMessage.type = "Request Ride",
                                this.sendMessage.Fname = null,
                                this.sendMessage.Lname = null,
                                this.sendMessage.email = null,
                                this.sendMessage.phone = null,
                                this.sendMessage.card_on_file = null,
                                this.sendMessage.relative = null,
                                this.sendMessage.relative_no = null,
                                this.sendMessage.facility = null,
                                this.sendMessage.waiting = null,
                                this.sendMessage.account = null,
                                this.sendMessage.invoice = null,
                                this.sendMessage.wheelchair = 'no',
                                this.sendMessage.round_trip = 'no',
                                this.sendMessage.trip_date = new Date().toJSON(),
                                this.sendMessage.message = 'message',
                                this.sendMessage.start_lat = null,
                                this.sendMessage.start_lng = null,
                                this.sendMessage.start_address = null,
                                this.sendMessage.start_city = null,
                                this.sendMessage.start_country = null,
                                this.sendMessage.end_lat = null,
                                this.sendMessage.end_lng = null,
                                this.sendMessage.end_address = null,
                                this.sendMessage.end_city = null,
                                this.sendMessage.end_country = null,
                                this.sendMessage.cost = null,
                                this.calculate.day= 0,
                                this.calculate.distance= 0,
                                this.calculate.round= null,
                                this.calculate.chair= 0,
                                this.calculate.distCost= 0,
                                this.calculate.time= 0,
                                this.calculate.waiting= 0,
                                this.calculate.holiday= null,
                                this.calculate.totalCost= null,

                                this.$store.commit("auth/setErrors", {}),
                                window.scrollTo(0, 0)
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
                        }
                    }).catch(()=>{

                });
            }
        }
    },

    components: {
        DateTime: Datetime,
        VueGoogleAutocomplete
    },
};
</script>
<style>
.toast {
    font-size: 1.4rem;
}

#toast-container > div {
    opacity: 1;
}
</style>
