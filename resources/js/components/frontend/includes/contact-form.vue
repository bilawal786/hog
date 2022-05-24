<template>
    <div>
        <form>
            <div class="input-content clearfix">
                <h3 class="from-title">Send a message</h3>
                <p>What is the reason you need to contact us today?</p>
                <div class="row">
                    <div class="col-sm-6">
                        <select
                            class="form-section"
                            v-model="sendMessage.type"
                        >
                            <option
                                class="form-option"
                                value="Submit Feedback"
                                selected="selected"
                            >
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
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <input
                            type="text"
                            placeholder="First Name*"
                            class="form-control"
                             v-model="sendMessage.Fname"
                             required
                        />
                    </div>
                    <!-- /.col-sm-6 -->
                    <div class="col-sm-6">
                        <input
                            type="text"
                            placeholder="Last Name*"
                            class="form-control"
                             v-model="sendMessage.Lname"
                             required
                        />
                    </div>
                    <!-- /.col-sm-6 -->
                    <div class="col-sm-6">
                        <input
                            type="email"
                            placeholder="Email*"
                            class="form-control email"
                             v-model="sendMessage.email"
                             required
                             
                        />
                    </div>
                    <!-- /.col-sm-6 -->
                    <div class="col-sm-6">
                        <input
                            type="number"
                            placeholder="Phone*"
                            class="form-control"
                             v-model="sendMessage.phone"
                             required
                        />
                    </div>
               
                        <div class="col-sm-6" v-if="sendMessage.type=='Billing Question' || sendMessage.type=='Submit Feedback'">
                            <input
                                type="text"
                                placeholder="Account(Option)*"
                                class="form-control"
                                 v-model="sendMessage.account"
                            />
                        </div>
                        <div class="col-sm-6" v-if="sendMessage.type=='Billing Question'">
                            <input
                                type="text"
                                placeholder="Invoice(Option)*"
                                class="form-control"
                                 v-model="sendMessage.invoice"
                            />
                        </div>
                 
                    <!-- /.col-sm-6 -->
                    <div class="col-sm-6" v-if="sendMessage.type=='Request Ride'">
                        <p class="form-text">
                            Do you need wheelchair accessibility?
                        </p>
                        <div>
                           <div class="m-v-radio">
                               <label class="form-radio-custom">
                                Yes
                                <input
                                    type="radio"
                                    name="wheelchair"
                                    value="yes"
                                    class="form-radio"
                                     v-model="sendMessage.wheelChair"
                                />
                                <span class="checkmark"></span>
                            </label>
                           </div> 
                            <div class="m-v-radio">
                                <label class="form-radio-custom">
                                No
                                <input
                                    type="radio"
                                    name="wheelchair"
                                    value="no"
                                    class="form-radio"
                                    checked="checked"
                                    v-model="sendMessage.wheelChair"
                                />
                                <span class="checkmark"></span>
                            </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6" v-if="sendMessage.type=='Request Ride'">
                        <p class="form-text">Is this a round trip request?</p>
                        <div>
                            <div class="m-v-radio">
                            <label class="form-radio-custom">
                                Yes
                                <input
                                    type="radio"
                                    name="roundtrip"
                                    value="yes"
                                    class="form-radio"
                                    v-model="sendMessage.roundTrip"
                                />
                                <span class="checkmark"></span>
                            </label>
                            </div>
                            <div class="m-v-radio">
                            <label class="form-radio-custom">
                                No
                                <input
                                    type="radio"
                                    name="roundtrip"
                                    value="no"
                                    class="form-radio"
                                    checked="checked"
                                    v-model="sendMessage.roundTrip"
                                />
                                <span class="checkmark"></span>
                            </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6" v-if="sendMessage.type=='Request Ride'">
                        <date-time
                           type="datetime"
                            v-model="sendMessage.rideDate"
                            input-class="my-class"
                            value-zone="America/New_York"
                            zone="Asia/Shanghai"
                            :format="{ year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: '2-digit', timeZoneName: 'short' }"
                            :phrases="{ok: 'Continue', cancel: 'Exit'}"
                            :hour-step="2"
                            :minute-step="15"
                            :week-start="7"
                            use12-hour
                            auto
                            class="theme-orange"
                        ></date-time>
                    </div>
                    <!-- /.col-md-12 -->
                    <div class="col-md-12">
                        <textarea rows="5" cols="80" v-model="sendMessage.message" required>Your Message</textarea>
                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
                <div class="row" v-if="sendMessage.type=='Request Ride'">
                    <div class="col-md-6">
                        <vue-google-autocomplete
                            ref="addressStart"
                            id="mapStart"
                            classname="form-control"
                            placeholder="Start"
                            v-on:placechanged="getAddressStart"
                            country="sg"
                            >
                            </vue-google-autocomplete>
                    </div>
                    <div class="col-md-6">
                        <vue-google-autocomplete
                            ref="addressEnd"
                            id="mapEnd"
                            classname="form-control"
                            placeholder="End"
                            v-on:placechanged="getAddressEnd"
                            country="sg"
                            >
                            </vue-google-autocomplete>
                    </div>
                </div>
                <div class="row" v-if="sendMessage.type=='Request Ride'">
                    <div class="col-md-12">
                        <button class="btn-contact">Calculate Cost</button>
                    </div>
                </div>
                <div class="row" v-if="sendMessage.type=='Request Ride'">
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
                            <!-- <button class="submit yellow-button" v-on:click="sendDatatoDB" >Send</button> -->
                            <input
                                type="button"
                                value="Submit"
                                class="submit yellow-button"
                                @click="sendDatatoDB"
                               
                            />
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
export default {
   
    data() {
        return {
            sendMessage:{
                type:'Request Ride',
                Fname:null,
                Lname:null,
                email:null,
                phone:null,
                account:null,
                invoice:null,
                wheelChair:'no',
                roundTrip:'no',
                rideDate:new Date().toJSON(),
                message:'Message',
                start_latitude:null,
                start_longitude:null,
                end_latitude:null,
                end_longitude:null,
                cost:null
            },
             addressStart: "",
             addressEnd: "",
        };
    },
    methods: {
        getAddressStart: function (addressData, placeResultData, id) {
            this.sendMessage.start_latitude = addressData.latitude;
            this.sendMessage.start_longitude= addressData.longitude;
            this.addressStart = addressData;
      },
       getAddressEnd: function (addressData, placeResultData, id) {
           this.sendMessage.end_latitude = addressData.latitude;
            this.sendMessage.end_longitude= addressData.longitude;
            this.addressEnd = addressData;
      },
      sendDatatoDB: function(){
          console.log('onclick');
          axios.post("send/message", this.sendMessage)
            .then(response =>{
                if(response.status==200){
                    this.sendMessage.type = "Request Ride",
                    this.sendMessage.Fname = null,
                    this.sendMessage.Lname = null,
                    this.sendMessage.email = null,
                    this.sendMessage.phone = null,
                    this.sendMessage.account = null,
                    this.sendMessage.invoice = null,
                    this.sendMessage.wheelChair = 'no',
                    this.sendMessage.roundTrip = 'no',
                    this.sendMessage.rideDate = new Date().toJSON(),
                    this.sendMessage.message = 'message',
                    this.sendMessage.start_latitude = null,
                    this.sendMessage.start_longitude = null,
                    this.sendMessage.end_latitude = null,
                    this.sendMessage.end_longitude = null,
                    this.sendMessage.cost = null
                }
                console.log(response.data.type)
                console.log(response.status)
            } )
            .catch(error => {
           
            });
      }
    },
    mounted () {
        this.$refs.addressStart.focus();
        this.$refs.addressEnd.focus();
        
    },
    components: {
        DateTime: Datetime,
        VueGoogleAutocomplete 
         },
};
</script>
