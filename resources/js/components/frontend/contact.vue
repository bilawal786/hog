<template>
    <div>
    <!-- ====== Page Header ====== -->
    <div class="page-header nevy-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Contact</h2>
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
                        <contact-form></contact-form>
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
    </div>
</template>
<script>
import ContactForm from './includes/contact-form';
export default {
    data(){
        return{
            toggle:true
        }
    },
    watch: {
        changevalue(){
            setInterval(this.toggle=false, 5000)
        }
    },
    methods:{
        updateCart(e) {
            console.log(e)
      },
    },
    components: { ContactForm },
    mounted () {
        window.scrollTo(0, 0)
    }
 };
</script>



