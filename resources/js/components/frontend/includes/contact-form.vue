<template>
    <div>
        <form action="#" method="post">
            <div class="input-content clearfix">
                <h3 class="from-title">Send a message</h3>
                <p>What is the reason you need to contact us today?</p>
                <div class="row">
                    <div class="col-sm-6">
                        <select
                            class="form-section"
                            v-model="option"
                        >
                            <option
                                class="form-option"
                                value="0"
                                selected="selected"
                            >
                                Submit Feedback
                            </option>
                            <option class="form-option" value="1">
                                Billing Question
                            </option>
                            <option class="form-option" value="2">
                                Request Ride
                            </option>
                            <option class="form-option" value="3">
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
                        />
                    </div>
                    <!-- /.col-sm-6 -->
                    <div class="col-sm-6">
                        <input
                            type="text"
                            placeholder="Last Name*"
                            class="form-control"
                        />
                    </div>
                    <!-- /.col-sm-6 -->
                    <div class="col-sm-6">
                        <input
                            type="email"
                            placeholder="Email*"
                            class="form-control email"
                        />
                    </div>
                    <!-- /.col-sm-6 -->
                    <div class="col-sm-6">
                        <input
                            type="number"
                            placeholder="Phone*"
                            class="form-control"
                        />
                    </div>
               
                        <div class="col-sm-6" v-if="option==1 || option==0">
                            <input
                                type="text"
                                placeholder="Account(Option)*"
                                class="form-control"
                            />
                        </div>
                        <div class="col-sm-6" v-if="option==1">
                            <input
                                type="text"
                                placeholder="Invoice(Option)*"
                                class="form-control"
                            />
                        </div>
                 
                    <!-- /.col-sm-6 -->
                    <div class="col-sm-6" v-if="option==2">
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
                                    value="1"
                                    class="form-radio"
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
                                    value="2"
                                    class="form-radio"
                                    checked="checked"
                                />
                                <span class="checkmark"></span>
                            </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6" v-if="option==2">
                        <p class="form-text">Is this a round trip request?</p>
                        <div>
                            <div class="m-v-radio">
                            <label class="form-radio-custom">
                                Yes
                                <input
                                    type="radio"
                                    name="roundtrip"
                                    value="1"
                                    class="form-radio"
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
                                    value="2"
                                    class="form-radio"
                                    checked="checked"
                                />
                                <span class="checkmark"></span>
                            </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6" v-if="option==2">
                        <datetime
                           type="datetime"
                            v-model="date"
                            input-class="my-class"
                            value-zone="America/New_York"
                            zone="Asia/Shanghai"
                            :format="{ year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: '2-digit', timeZoneName: 'short' }"
                            :phrases="{ok: 'Continue', cancel: 'Exit'}"
                            :hour-step="2"
                            :minute-step="15"
                            :min-datetime="minDatetime"
                            :max-datetime="maxDatetime"
                            :week-start="7"
                            use12-hour
                            auto
                            :value="getTodayDateNow()"
                            class="theme-orange"
                        ></datetime>
                    </div>
                    <!-- /.col-md-12 -->
                    <div class="col-md-12">
                        <textarea rows="5" cols="80">your massage</textarea>
                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
                <div class="row" v-if="option==2">
                    <div class="col-md-6">
                        <input
                            type="text"
                            placeholder="Start"
                            class="form-control"
                        />
                    </div>
                    <div class="col-md-6">
                        <input
                            type="text"
                            placeholder="End"
                            class="form-control"
                        />
                    </div>
                </div>
                <div class="row" v-if="option==2">
                    <div class="col-md-12">
                        <button class="btn-contact">Calculate Cost</button>
                    </div>
                </div>
                <div class="row" v-if="option==2">
                    <div class="col-md-12">
                        <div class="header-map-content">
                            <iframe
                                height="300"
                                width="100%"
                                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC871wKM6aoCLSV_pT3xBVsYzNGXaDh7Pw&q=121+King+St,Melbourne+VIC+3000,Australia"
                                allowfullscreen="allowfullscreen"
                            ></iframe>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="subimt-button-contact clearfix">
                            <input
                                type="submit"
                                value="Submit"
                                class="submit yellow-button"
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
import { Datetime } from 'vue-datetime'
import 'vue-datetime/dist/vue-datetime.css'
export default {
   
    data() {
        return {
            dateValue:'',
            date: new Date(),
            option: 2,
        };
    },
    methods: {
        getTodayDateNow: function() {
              //  this.date = this.date.getMonth()+'/'+this.date.getDate()+'/'+this.date.getFullYear()
                return this.date
            }
    },
    components: { 
        datetime: Datetime
         },
};
</script>
