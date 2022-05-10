<template>
    <div>
            <!-- ====== Page Header ====== -->
    <div class="page-header nevy-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">                
                    <h2 class="page-title">Contact</h2>
                    <p class="page-description yellow-color">Contact With Us</p>        
                </div><!-- /.col-md-12 -->
            </div><!-- /.row-->
        </div><!-- /.container-fluid -->           
    </div><!-- /.page-header --> 

    <!-- ====== Page Header ====== -->
    <div class="contact-us-area mr-top-60">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="contact-us-content-right">
                        <form action="#">    
                            <i class="fa fa-paper-plane" aria-hidden="true"></i>
                            <div class="input-content clearfix">
                                <h3 class="from-title">Send a message</h3>
                                <p>What is the reason you need to contact us today?</p>
                                <div class="row">
                                    <div class="col-sm-6">
                                                                          
                                        <select class="form-section">
                                            <option value="1" selected="selected">Intermediate</option>
                                            <option value="2">Compact</option>
                                            <option value="3">Station Wagon</option>
                                            <option value="4">SUV</option>
                                            <option value="5">Minibus</option>
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
                                            <span>
                                                <input type="radio"  name="wheelchair" value="1" class="form-radio">
                                            </span>
                                            <span>
                                                <label for="yes" class="form-radio-lable">Yes</label>
                                            </span>
                                        </div>
                                        <div>
                                            <span>
                                                <input type="radio" name="wheelchair" value="0" class="form-radio">
                                            </span>
                                            <span>
                                                <label for="no" class="form-radio-lable">No</label>
                                            </span>
                                        </div>
                                        
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="form-text">Is this a round trip request?</p>
                                        <div>
                                            <span>
                                                <input type="radio"  name="roundtrip" value="1" class="form-radio">
                                            </span>
                                            <span>
                                                <label for="yes" class="form-radio-lable">Yes</label>
                                            </span>
                                        </div>
                                        <div>
                                            <span>
                                                <input type="radio" name="roundtrip" value="0" class="form-radio">
                                            </span>
                                            <span>
                                                <label for="no" class="form-radio-lable">No</label>
                                            </span>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <datetime format="MM/DD/YYYY H:i:s" width="300px" v-model="val"></datetime>
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
                                        <iframe height="300" width="100%" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC871wKM6aoCLSV_pT3xBVsYzNGXaDh7Pw&q=121+King+St,Melbourne+VIC+3000,Australia" allowfullscreen="allowfullscreen"></iframe>
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
                            </div><!-- /.input-content -->
                        </form>
                    </div><!-- /.contactus-content-right -->
                </div><!-- /.col-md-8 -->
                <div class="col-md-4">
                    <div class="contact-us-content-left">
                        <div class="contact">
                            <div class="contact-btn">Contact Info</div>
                        </div>
                        <div class="contact">
                            <p>Ready to set up transportation for yourself or loved one, or to talk about transportation needs for your organization? Just fill out the form and let us know how we can help.</p>
                        </div>
                        <div class="contact">
                            <p class="c-h">We are available 24-7 to schedule and provide rides.</p>
                        </div>
                         <div class="contact">
                            <h4><i class="fa fa-envelope"></i>Mail</h4>
                            <p><a href="mailto:contact@heartofgoldmedtransport.com">contact@heartofgoldmedtransport.com</a></p>
                        </div><!-- /.contact -->
                        <div class="contact">
                            <h4><i class="fa fa-phone"></i>Call</h4>
                            <p><a href="tel:+19167406447"> (916) 740-6447</a></p>
                        </div><!-- /.contact -->

                    </div><!-- /.contactus-content-left -->
                </div><!-- /.col-md-4 -->
                
                
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.contact-us -->

    <!-- ====== Map Block ====== -->
    <!-- ======footer area======= -->
    <div class="container footer-top-border">
        <div class="vehicle-multi-border yellow-black"></div><!-- /.vehicle-multi-border -->
    </div><!-- /.container -->
    </div>
</template>
<script>

import datetime from 'vuejs-datetimepicker';

export default {
  
    components: { datetime },
    methods: {
       
  }
};
</script>



