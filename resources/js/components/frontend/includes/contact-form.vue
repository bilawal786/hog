<template>
    <div>
        <form>
            <div class="input-content clearfix">
                <h3 class="from-title">Send a message</h3>
                <p>What is the reason you need to contact us today?</p>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mgb-30">
                            <select class="form-section" v-model="sendMessage.type">
                                <option class="form-option" value="Submit Feedback" selected="selected">
                                    Submit Feedback
                                </option>
                                <option class="form-option" value="Billing Question">
                                    Billing Question
                                </option>
                                <option class="form-option" value="Request Ride">
                                    Request Ride
                                </option>
                                <option class="form-option" value="Others">
                                    Others
                                </option>
                            </select>
                        </div>
                        <div class="contact-valid" v-if="errors.type">
                            {{ errors.type[0] }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mgb-30">
                            <input type="text" placeholder="First Name*" class="form-control"
                                v-model="sendMessage.Fname" :class="{ 'invalid-input': change ? errors.Fname : errors.Fname }" required />
                            <div class="contact-valid" v-if="errors.Fname">
                                {{ errors.Fname[0] }}
                            </div>
                        </div>
                    </div>
                    <!-- /.col-sm-6 -->
                    <div class="col-sm-6">
                        <div class="mgb-30">
                            <input type="text" placeholder="Last Name*" class="form-control" v-model="sendMessage.Lname" :class="{ 'invalid-input': change ? errors.Lname : errors.Lname }"
                                required />
                            <div class="contact-valid" v-if="errors.Lname">
                                {{ errors.Lname[0] }}
                            </div>
                        </div>
                    </div>
                    <!-- /.col-sm-6 -->
                    <div class="col-sm-6">
                        <div class="mgb-30">
                            <input type="email" placeholder="Email*" class="form-control email"
                                v-model="sendMessage.email" required
                                :class="{ 'invalid-input': change ? errors.email : errors.email }" />
                            <div class="contact-valid" v-if="errors.email">
                                {{ errors.email[0] }}
                            </div>
                        </div>
                    </div>
                    <!-- /.col-sm-6 -->
                    <div class="col-sm-6">
                        <div class="mgb-30">
                            <input type="number" placeholder="Phone*" class="form-control" v-model="sendMessage.phone"
                                :class="{ 'invalid-input': change ? errors.phone : errors.phone }"
                                required />
                            <div class="contact-valid" v-if="errors.phone">
                                {{ errors.phone[0] }}
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6"
                        v-if="sendMessage.type == 'Billing Question' || sendMessage.type == 'Submit Feedback'">
                        <div class="mgb-30">
                            <input type="text" placeholder="Account(Option)*" class="form-control"
                                v-model="sendMessage.account" />
                        </div>
                    </div>
                    <div class="col-sm-6" v-if="sendMessage.type == 'Billing Question'">
                        <div class="mgb-30">
                            <input type="text" placeholder="Invoice(Option)*" class="form-control"
                                v-model="sendMessage.invoice" />
                        </div>
                    </div>

                    <!-- /.col-sm-6 -->
                    <div class="col-sm-6" v-if="sendMessage.type == 'Request Ride'">

                        <p class="form-text">
                            Do you need wheelchair accessibility?
                        </p>
                        <div class="mgb-30">
                            <div class="m-v-radio">
                                <label class="form-radio-custom">
                                    Yes
                                    <input type="radio" name="wheelchair" value="yes" class="form-radio"
                                        v-model="sendMessage.wheelchair" />
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="m-v-radio">
                                <label class="form-radio-custom">
                                    No
                                    <input type="radio" name="wheelchair" value="no" class="form-radio"
                                        checked="checked" v-model="sendMessage.wheelchair" />
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="contact-valid" v-if="errors.wheelchair">
                                {{ errors.wheelchair[0] }}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6" v-if="sendMessage.type == 'Request Ride'">
                        <p class="form-text">Is this a round trip request?</p>
                        <div class="mgb-30">
                            <div class="m-v-radio">
                                <label class="form-radio-custom">
                                    Yes
                                    <input type="radio" name="round_trip" value="yes" class="form-radio"
                                        v-model="sendMessage.round_trip" />
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="m-v-radio">
                                <label class="form-radio-custom">
                                    No
                                    <input type="radio" name="round_trip" value="no" class="form-radio" checked="checked"
                                        v-model="sendMessage.round_trip" />
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="contact-valid" v-if="errors.round_trip">
                                {{ errors.round_trip[0] }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6" v-if="sendMessage.type == 'Request Ride'">
                        <div class="mgb-30">
                            <date-time type="datetime" v-model="sendMessage.trip_date" input-class="my-class"
                                value-zone="America/New_York" zone="Asia/Shanghai"
                                :format="{ year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: '2-digit', timeZoneName: 'short' }"
                                :phrases="{ ok: 'Continue', cancel: 'Exit' }" :hour-step="2" :minute-step="15"
                                :week-start="7" use12-hour auto class="theme-orange"
                                :class="{ 'invalid-input': change ? errors.trip_date : errors.trip_date }"></date-time>
                            <div class="contact-valid" v-if="errors.trip_date">
                                {{ errors.trip_date[0] }}
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-12 -->
                    <div class="col-md-12">
                        <div class="mgb-30">
                            <textarea rows="5" cols="80" v-model="sendMessage.message" required>Your Message</textarea>
                        </div>
                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
                <div class="row" v-if="sendMessage.type == 'Request Ride'">
                    <div class="col-md-6">
                        <div class="mgb-30">
                            <vue-google-autocomplete ref="addressStart" id="mapStart" classname="form-control"
                                placeholder="Start" v-on:placechanged="getAddressStart" country="sg" :class="{ 'invalid-input': change ? errors.start_address : errors.start_address }" >
                            </vue-google-autocomplete>
                            <div class="contact-valid" v-if="errors.start_address">
                                {{ errors.start_address[0] }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mgb-30">
                            <vue-google-autocomplete ref="addressEnd" id="mapEnd" classname="form-control"
                                placeholder="End" v-on:placechanged="getAddressEnd" country="sg" :class="{ 'invalid-input': change ? errors.end_address : errors.end_address }">
                            </vue-google-autocomplete>
                            <div class="contact-valid" v-if="errors.end_address">
                                {{ errors.end_address[0] }}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="row" v-if="sendMessage.type=='Request Ride'">
                    <div class="col-md-12">
                        <button class="btn-contact">Calculate Cost</button>
                    </div>
                </div> -->
                <div class="row" v-if="sendMessage.type == 'Request Ride'">
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
                                <input type="button" value="Submit" class="submit yellow-button"
                                    @click="sendDatatoDB" />
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
import { Datetime } from 'vue-datetime'
import 'vue-datetime/dist/vue-datetime.css'
import { mapGetters, mapActions } from "vuex";
export default {

    data() {
        return {
            sendMessage: {
                type: 'Request Ride',
                Fname: null,
                Lname: null,
                email: null,
                phone: null,
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
                end_address: null,
                cost: null
            },
            change: true

        };
    },
    methods: {
        getAddressStart: function (addressData, placeResultData, id) {
            this.sendMessage.start_lat = addressData.latitude;
            this.sendMessage.start_lng = addressData.longitude;
            this.sendMessage.start_address = placeResultData.formatted_address;
        },
        getAddressEnd: function (addressData, placeResultData, id) {
            this.sendMessage.end_lat = addressData.latitude;
            this.sendMessage.end_lng = addressData.longitude;
            this.sendMessage.end_address = placeResultData.formatted_address;
        },
        sendDatatoDB: function () {
            axios.post("send/message", this.sendMessage)
                .then(response => {
                     window.scrollTo(0, 0)
                    if (response) {
                        this.sendMessage.type = "Request Ride",
                            this.sendMessage.Fname = null,
                            this.sendMessage.Lname = null,
                            this.sendMessage.email = null,
                            this.sendMessage.phone = null,
                            this.sendMessage.account = null,
                            this.sendMessage.invoice = null,
                            this.sendMessage.wheelchair = 'no',
                            this.sendMessage.round_trip = 'no',
                            this.sendMessage.trip_date = new Date().toJSON(),
                            this.sendMessage.message = 'message',
                            this.sendMessage.start_lat = null,
                            this.sendMessage.start_lng = null,
                            this.sendMessage.end_lat = null,
                            this.sendMessage.end_lng = null,
                            this.sendMessage.cost = null,
                            this.$store.commit("setErrors", {}),
                            window.scrollTo(0, 0)
                    }

                });
        }
    },
    computed: {
        ...mapGetters(["errors"]),
    },
    mounted() {
        window.scrollTo(0, 0);
        this.$refs.addressStart.focus();
        this.$refs.addressEnd.focus();

    },
    components: {
        DateTime: Datetime,
        VueGoogleAutocomplete
    },
};
</script>
