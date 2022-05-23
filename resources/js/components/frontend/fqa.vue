<template>
    <div>
        <top-header></top-header>
        <navigation-bar></navigation-bar>
        <div class="page-header nevy-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-title">FQA</h2>
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row-->
            </div><!-- /.container-fluid -->
        </div><!-- /.page-header -->
        <!-- ====== Page Header ====== -->
        <div class="contact-us-area mr-top-60">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="fqa-cs">
                            <div>
                                <h5>Q: What types of transportation do you provide?</h5>
                                <p>A: We provide transportation for both ambulatory and wheelchair bound individuals.</p>
                            </div>
                            <div>
                                <h5>Q: Can I ride along with my mother?</h5>
                                <p>A: Absolutely. A loved one is always welcome to come along for the ride. Please inform the dispatcher at time of scheduling.</p>
                            </div>
                            <div>
                                <h5>Q: Are your vehicles ADA compliant?</h5>
                                <p>A: Yes. All of our vehicles are ADA compliant.</p>
                            </div>
                            <div>
                                <h5>Q: Can you transport on a holiday?</h5>
                                <p>A: Yes. We are available 24/7.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <web-footer></web-footer>
    </div>
</template>
<script>
import TopHeader from './includes/TopHeader.vue';
import NavigationBar from './includes/navigationbar.vue';
import WebFooter from './includes/footer.vue'
export default {
 components: { TopHeader, NavigationBar, WebFooter },
   mounted () {
        window.scrollTo(0, 0)
    }
 };
</script>