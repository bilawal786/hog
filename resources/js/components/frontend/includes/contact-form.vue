<template>
    <div>
        <div class="row">
            <div class="col-sm-6">
                <select class="form-section">
                    <option class="form-option" value="1" selected="selected">Intermediate</option>
                    <option class="form-option" value="2">Compact</option>
                    <option class="form-option" value="3">Station Wagon</option>
                    <option class="form-option" value="4">SUV</option>
                    <option class="form-option" value="5">Minibus</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <input type="text" placeholder="First Name*" class="form-control">
            </div><!-- /.col-sm-6 -->
            <div class="col-sm-6">
                <input type="text" placeholder="Last Name*" class="form-control">
            </div><!-- /.col-sm-6 -->
            <div class="col-sm-6">
                <input type="email" placeholder="Email*" class="form-control email">
            </div><!-- /.col-sm-6 -->
            <div class="col-sm-6">
                <input type="number" placeholder="Phone*" class="form-control">
            </div><!-- /.col-sm-6 -->
            <div class="col-sm-6">
                <p class="form-text">Do you need wheelchair accessibility?</p>
                <div>
                    <label class="form-radio-custom"> Yes
                         <input type="radio" name="wheelchair" value="1" class="form-radio">
                         <span class="checkmark"></span>
                    </label>
                    <label class="form-radio-custom"> No
                         <input type="radio" name="wheelchair" value="2" class="form-radio" checked="checked" >
                         <span class="checkmark"></span>
                    </label>
                </div>

            </div>
            <div class="col-sm-6">
                <p class="form-text">Is this a round trip request?</p>
                <div>
                    <label class="form-radio-custom"> Yes
                         <input type="radio" name="roundtrip" value="1" class="form-radio">
                         <span class="checkmark"></span>
                    </label>
                    <label class="form-radio-custom"> No
                         <input type="radio" name="roundtrip" value="2" class="form-radio"  checked="checked">
                         <span class="checkmark"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <datetime format="MM/DD/YYYY h:i" width="300px" v-model="date" :class="form-control"></datetime>
            </div><!-- /.col-md-12 -->
            <div class="col-md-12">
                <textarea rows="5" cols="80">your massage</textarea>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
        <div class="row">
            <div class="col-md-6">
                <input type="text" placeholder="Start" class="form-control">
            </div>
            <div class="col-md-6">
                <input type="text" placeholder="End" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button class="btn-contact">Calculate Cost</button>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="header-map-content">
                    <iframe height="300" width="100%"
                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC871wKM6aoCLSV_pT3xBVsYzNGXaDh7Pw&q=121+King+St,Melbourne+VIC+3000,Australia"
                        allowfullscreen="allowfullscreen"></iframe>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="subimt-button-contact clearfix">
                    <input type="submit" value="Submit" class="submit yellow-button">
                </div><!-- /.subimt -->
            </div>
        </div>
    </div>
</template>
<script>
import datetime from 'vuejs-datetimepicker';
 
export default {
        data() {
            return {
            date: new Date(),
            
            };
        },
    components: { datetime }
};
</script> 
