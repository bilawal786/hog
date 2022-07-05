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
                <option class="form-option" value="Others">Others</option>
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
              <input
                type="text"
                placeholder="First Name*"
                class="form-control"
                v-model="sendMessage.Fname"
                :class="{
                  'invalid-input': change ? errors.Fname : errors.Fname,
                }"
                required
              />
              <div class="contact-valid" v-if="errors.Fname">
                {{ errors.Fname[0] }}
              </div>
            </div>
          </div>
          <!-- /.col-sm-6 -->
          <div class="col-sm-6">
            <div class="mgb-30">
              <input
                type="text"
                placeholder="Last Name*"
                class="form-control"
                v-model="sendMessage.Lname"
                :class="{
                  'invalid-input': change ? errors.Lname : errors.Lname,
                }"
                required
              />
              <div class="contact-valid" v-if="errors.Lname">
                {{ errors.Lname[0] }}
              </div>
            </div>
          </div>
          <!-- /.col-sm-6 -->
          <div class="col-sm-6">
            <div class="mgb-30">
              <input
                type="email"
                placeholder="Email*"
                class="form-control email"
                v-model="sendMessage.email"
                required
                :class="{
                  'invalid-input': change ? errors.email : errors.email,
                }"
              />
              <div class="contact-valid" v-if="errors.email">
                {{ errors.email[0] }}
              </div>
            </div>
          </div>
          <!-- /.col-sm-6 -->
          <div class="col-sm-6">
            <div class="mgb-30">
              <input
                type="text"
                placeholder="Phone* (111-111-1111)"
                class="form-control"
                v-model="sendMessage.phone"
                :class="{
                  'invalid-input': change ? errors.phone : errors.phone,
                }"
                required
              />
              <div class="contact-valid" v-if="errors.phone">
                {{ errors.phone[0] }}
              </div>
            </div>
          </div>
            <!-- /.col-sm-6 -->
            <div class="col-sm-6" v-if="sendMessage.type == 'Request Ride'">
                <div class="mgb-30">
                    <input
                        type="text"
                        placeholder="Card on File Y/N (Yes-2/26)"
                        class="form-control"
                        v-model="sendMessage.card_on_file"
                        :class="{
                  'invalid-input': change ? errors.card_on_file : errors.card_on_file,
                }"
                        required
                    />
                    <div class="contact-valid" v-if="errors.card_on_file">
                        {{ errors.card_on_file[0] }}
                    </div>
                </div>
            </div>
            <!-- /.col-sm-6 -->
            <div class="col-sm-6" v-if="sendMessage.type == 'Request Ride'">
                <div class="mgb-30">
                    <input
                        type="text"
                        placeholder="Relative (Mike-Husband)"
                        class="form-control"
                        v-model="sendMessage.relative"
                        :class="{ 'invalid-input': change ? errors.relative : errors.relative, }"
                        required
                    />
                    <div class="contact-valid" v-if="errors.relative">
                        {{ errors.relative[0] }}
                    </div>
                </div>
            </div>
            <!-- /.col-sm-6 -->
            <div class="col-sm-6" v-if="sendMessage.type == 'Request Ride'">
                <div class="mgb-30">
                    <input
                        type="text"
                        placeholder="Relative # (111-111-1111)"
                        class="form-control"
                        v-model="sendMessage.relative_no"
                        :class="{
                  'invalid-input': change ? errors.relative_no : errors.relative_no,
                }"
                        required
                    />
                    <div class="contact-valid" v-if="errors.relative_no">
                        {{ errors.relative_no[0] }}
                    </div>
                </div>
            </div>
            <!-- /.col-sm-6 -->
            <div class="col-sm-6" v-if="sendMessage.type == 'Request Ride'">
                <div class="mgb-30">
                    <input
                        type="text"
                        placeholder="Facility"
                        class="form-control"
                        v-model="sendMessage.facility"
                        :class="{
                  'invalid-input': change ? errors.facility : errors.facility,
                }"
                        required
                    />
                    <div class="contact-valid" v-if="errors.facility">
                        {{ errors.facility[0] }}
                    </div>
                </div>
            </div>
          <div
            class="col-sm-6"
            v-if="
              sendMessage.type == 'Billing Question' ||
              sendMessage.type == 'Submit Feedback'
            "
          >
            <div class="mgb-30">
              <input
                type="text"
                placeholder="Account(Option)*"
                class="form-control"
                v-model="sendMessage.account"
              />
            </div>
          </div>
          <div class="col-sm-6" v-if="sendMessage.type == 'Billing Question'">
            <div class="mgb-30">
              <input
                type="text"
                placeholder="Invoice(Option)*"
                class="form-control"
                v-model="sendMessage.invoice"
              />
            </div>
          </div>

          <!-- /.col-sm-6 -->
          <div class="col-sm-6" v-if="sendMessage.type == 'Request Ride'">
            <p class="form-text">Do you need wheelchair accessibility?</p>
            <div class="mgb-30">
              <div class="m-v-radio">
                <label class="form-radio-custom">
                    W/C (Yes)
                  <input
                    type="radio"
                    name="wheelchair"
                    value="yes"
                    class="form-radio"
                    v-model="sendMessage.wheelchair"
                  />
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="m-v-radio">
                <label class="form-radio-custom">
                  Amb (No)
                  <input
                    type="radio"
                    name="wheelchair"
                    value="no"
                    class="form-radio"
                    checked="checked"
                    v-model="sendMessage.wheelchair"
                  />
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
                  <input
                    type="radio"
                    name="round_trip"
                    value="yes"
                    class="form-radio"
                    v-model="sendMessage.round_trip"
                  />
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="m-v-radio">
                <label class="form-radio-custom">
                  No
                  <input
                    type="radio"
                    name="round_trip"
                    value="no"
                    class="form-radio"
                    checked="checked"
                    v-model="sendMessage.round_trip"
                  />
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
              <p class="form-text">Trip Date & Time</p>
            <div class="mgb-30">
              <date-time
                type="datetime"
                v-model="sendMessage.trip_date"
                input-class="form-control"
                value-zone="America/New_York"
                zone="Asia/Shanghai"
                :format="{
                  year: 'numeric',
                  month: 'long',
                  day: 'numeric',
                  hour: 'numeric',
                  minute: '2-digit',
                  timeZoneName: 'short',
                }"
                :phrases="{ ok: 'Continue', cancel: 'Exit' }"
                :min-datetime = 'new Date().toJSON()'
                :hour-step="1"
                :minute-step="15"
                :week-start="7"
                use12-hour
                auto
                class="theme-orange"
                :class="{
                  'invalid-input': change ? errors.trip_date : errors.trip_date,
                }"
              ></date-time>
              <div class="contact-valid" v-if="errors.trip_date">
                {{ errors.trip_date[0] }}
              </div>
            </div>
          </div>
            <div class="col-sm-6" v-if="sendMessage.type == 'Request Ride' && sendMessage.round_trip == 'yes'">
                <p class="form-text">Waiting in Hours</p>
                <div class="mgb-30">
                    <input
                        type="number"
                        min="1" max="10"
                        placeholder="1 to 10"
                        class="form-control"
                        v-model="sendMessage.waiting"
                        :class="{
                  'invalid-input': change ? errors.waiting : errors.waiting,
                }"
                        required
                    />
                    <div class="contact-valid" v-if="errors.waiting">
                        {{ errors.waiting[0] }}
                    </div>
                </div>
            </div>
          <!-- /.col-md-12 -->
          <div class="col-md-12">
            <div class="mgb-30">
              <textarea
                rows="5"
                cols="80"
                v-model="sendMessage.message"
                required
              >
Your Message</textarea
              >
            </div>
          </div>
          <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
        <div class="row" v-if="sendMessage.type == 'Request Ride'">
          <div class="col-md-6">
            <div class="mgb-30">
              <vue-google-autocomplete
                ref="addressStart"
                id="mapStart"
                classname="form-control"
                placeholder="Start"
                v-on:placechanged="getAddressStart"
                types="establishment"
                :class="{
                  'invalid-input': change
                    ? errors.start_address
                    : errors.start_address,
                }"
                country="us"
              >
              </vue-google-autocomplete>
              <div class="contact-valid" v-if="errors.start_address">
                {{ errors.start_address[0] }}
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mgb-30">
              <vue-google-autocomplete
                ref="addressEnd"
                id="mapEnd"
                classname="form-control"
                placeholder="End"
                v-on:placechanged="getAddressEnd"
                types="establishment"
                :class="{
                  'invalid-input': change
                    ? errors.end_address
                    : errors.end_address,
                }"
                country="us"
              >
              </vue-google-autocomplete>
              <div class="contact-valid" v-if="errors.end_address">
                {{ errors.end_address[0] }}
              </div>
            </div>
          </div>
        </div>
        <div class="row" v-if="sendMessage.type == 'Request Ride'">
          <div class="col-md-12">
              <div class="clearfix">
                <button
                type="button"
                class="btn-contact"
                @click="
                    calculateCost(
                    sendMessage.start_lat,
                    sendMessage.start_lng,
                    sendMessage.end_lat,
                    sendMessage.end_lng
                    )
                "
                >
                Calculate Cost
                </button>
            <span
              style="float: left; font-size: 2rem; padding: 10px"
              v-show="calculate.totalCost"
              >{{ calculate.totalCost }} $</span
            >

            </div>
              <div class=""></div>
            <div class="contact-valid" v-if="errors.cost">
                {{ errors.cost[0] }}
              </div>
          </div>
            <div class="col-md-12">
                <div v-if="sendMessage.cost">
                    <div class="clearfix">
                        <div class="float-left"><span>$ {{calculate.distCost}}: = </span><span class="text-yellow">Distance {{calculate.distance}} - round trip ({{calculate.round}})</span></div>
                    </div>
                    <div class="clearfix">
                        <div class="float-left"><span>$ {{calculate.chair}}: = </span><span class="text-yellow">Wheel Chair Cost</span></div>
                    </div>
                    <div class="clearfix">
                        <div class="float-left"><span>$ {{calculate.time}}: = </span><span class="text-yellow">Before or after the hours of 8am-5pm</span></div>
                    </div>
                    <div class="clearfix">
                        <div class="float-left"><span>$ {{calculate.waiting}}: = </span><span class="text-yellow">Waiting Charges</span></div>
                    </div>
                    <div class="clearfix">
                        <div class="float-left"><span>$ {{calculate.day}}: = </span><span class="text-yellow">Weekend charges</span></div>
                    </div>
                </div>
            </div>
        </div>
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
                card_on_file: null,
                relative: null,
                relative_no: null,
                facility: null,
                waiting:0,
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
                start_city:null,
                start_country:null,
                end_address: null,
                end_city: null,
                end_country: null,
                cost: null,
                status_assign:'no',
                user_id: null,
            },
            calculate:{
                day:0,
                distance:0,
                round:null,
                chair:0,
                distCost:0,
                time:0,
                waiting:0,
                holiday:null,
                totalCost:null,
            },
            change: true,
            tempData:{}

        };
    },
    props: {

    },
     computed: {
        ...mapGetters("auth", ["user", "errors"]),
    },
    mounted() {
        this.$store.commit("auth/setErrors", {});
        // if(this.$store.state.auth.data.userData.id){
        //   this.sendMessage.user_id = this.$store.state.auth.data.userData.id
        // }
        window.scrollTo(0, 0);
        this.$refs.addressStart.focus();
        this.$refs.addressEnd.focus();
        if (this.$route.params.title){
            this.sendMessage = this.$route.params.title
        }
        if(this.user){
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
        }
    },
    methods: {

        getAddressStart: function (addressData, placeResultData, id) {
            this.sendMessage.start_lat = addressData.latitude;
            this.sendMessage.start_lng = addressData.longitude;
            this.sendMessage.start_address = addressData.street_number+', '+addressData.route;
            this.sendMessage.start_city = addressData.locality;
            this.sendMessage.start_country = addressData.country;
        },
        getAddressEnd: function (addressData, placeResultData, id) {
            this.sendMessage.end_lat = addressData.latitude;
            this.sendMessage.end_lng = addressData.longitude;
            this.sendMessage.end_address = placeResultData.formatted_address;
            this.sendMessage.end_address = addressData.street_number+', '+addressData.route;
            this.sendMessage.end_city = addressData.locality;
            this.sendMessage.end_country = addressData.country;
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
                this.getCost(roundmiles, this.sendMessage.trip_date, this.sendMessage.round_trip, this.sendMessage.wheelchair, this.sendMessage.waiting)
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
                    if(round == 'yes'){
                            this.calculate.waiting = wait*60
                            this.calculate.round = 'Yes'
                            this.calculate.distance = 'Less then 5 miles'
                            this.calculate.distCost = 120
                            this.calculate.totalCost = 120+(wait*60)
                        }else{
                            this.calculate.round = 'No'
                            this.calculate.distance = 'Less then 5 miles'
                            this.calculate.distCost = 70
                            this.calculate.totalCost = 70
                        }

                }else if(distance > 5 && distance <= 10){
                    console.log('5 to 10')
                    if(round == 'yes'){
                        this.calculate.waiting = wait*60
                        this.calculate.round = 'Yes'
                        this.calculate.distance = 'Between 5 to 10 miles'
                        this.calculate.distCost = 130
                        this.calculate.totalCost = 130+(wait*60)
                    }else{
                        this.calculate.round = 'No'
                        this.calculate.distance = 'Between 5 to 10 miles'
                        this.calculate.distCost = 75
                        this.calculate.totalCost = 75
                    }
                }else{
                    // console.log('more then 10')
                    if(round == 'yes'){
                        this.calculate.waiting = wait*60
                        this.calculate.round = 'Yes'
                        this.calculate.distance = 'More then 10 miles'
                        this.calculate.distCost = Math.round(6*(distance-10)+130)
                        this.calculate.totalCost = Math.round(6*(distance-10)+130)+(wait*60)
                    }else{
                        this.calculate.round = 'No'
                        this.calculate.distance = 'More then 10 miles'
                        this.calculate.distCost = Math.round(3*(distance-10)+75)
                        this.calculate.totalCost = Math.round(3*(distance-10)+75)
                    }
                }
                if(chair == 'yes'){
                    this.calculate.chair = 25
                    this.calculate.totalCost = this.calculate.totalCost+25
                }else{
                    this.calculate.chair = 0
                }
                console.log(day)
            if(day == 'Saturday' || day == 'Sunday'){
                console.log(day)
                if(round == 'yes'){
                    this.calculate.day = 20
                    this.calculate.totalCost = this.calculate.totalCost+20
                }else{
                    this.calculate.day = 10
                    this.calculate.totalCost = this.calculate.totalCost+10
                }
            }else{
                this.calculate.day = 0
            }

            var currentTime = new Date(date).getHours();
            console.log(currentTime)
            if (currentTime >= 8 && currentTime <= 17) {

            } else {
                this.calculate.time = 10
                this.calculate.totalCost = this.calculate.totalCost+10
            }
            this.sendMessage.cost=this.calculate.totalCost

        },
        rad2deg: function (deg){
        var pi = Math.PI;
        return deg * (180/pi);
        },
        deg2rad: function(deg) {
            return deg * (Math.PI/180)
        },
        sendDatatoDB: function () {
          if(this.user){
          this.sendMessage.user_id = this.user.id
          }else{
            this.sendMessage.user_id = null
          }
            if(this.sendMessage.type == "Request Ride"){
            let tempData = {}
              let sendmsg = JSON.parse(JSON.stringify(this.sendMessage))
                 for (const key in sendmsg) {
                     if(sendmsg[key] == null){
                         if(key != 'account' && key != 'invoice' && key != 'user_id' && key != 'card_on_file' && key != 'relative' && key != 'relative_no' && key != 'facility'){
                             if(sendmsg['round_trip'] != 'yes'){
                                 if(key != 'waiting'){
                                     tempData[key] = ['The '+key+' field is required.'];
                                 }
                             }else{
                                 tempData[key] = ['The '+key+' field is required.'];
                             }

                         }
                     }
                }
                 this.$store.commit("auth/setErrors", tempData)
                 if(Object.keys(tempData).length === 0){
                      this.$router.push({ name: 'request1_ride', params: {title: this.sendMessage }})
                 }
            }else{
            axios.post("send/message", this.sendMessage)
                .then(response => {
                     window.scrollTo(0, 0)
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
                            this.$store.commit("auth/setErrors", {}),
                            window.scrollTo(0, 0)
                        console.log(response)
                        switch(response.data.type){
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
#toast-container>div {
    opacity: 1;
}
</style>
