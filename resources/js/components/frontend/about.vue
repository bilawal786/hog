<template>
    <div>
        <top-header></top-header>
        <navigation-bar></navigation-bar>
        <!-- ====== Page Header ====== -->
        <div class="page-header nevy-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-title">About us</h2>
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row-->
            </div><!-- /.container-fluid -->
        </div>

        <!-- ====== About Main Content ====== -->
        <div class="about-main-content mr-top-90">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="about-top-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="about-content-left">
                                        <h3>Non-Emergency Medical Transportation (NEMT)</h3>
                                        <p>Heart of Gold Medical Transport is a family-owned non-emergency medical
                                            transportation company serving the greater Sacramento area since 2016. Its
                                            owners are Megan and Caleb.</p>
                                        <p>Megan has worked as a nurse since 2009, becoming a Registered Nurse in 2010.
                                            She has worked as a nurse in various settings including skilled nursing,
                                            drug rehabilitation, and cosmetic surgery. Most recently she was Director of
                                            Nursing at a Sacramento-based skilled nursing facility.</p>
                                        <p>Caleb began working in a hospital at just 16 years old, transporting patients to medical appointments within the hospital grounds. After 40 years of managing some of the biggest companies in various fields, Caleb returns to work with patients once again.</p>

                                        <p>He brings with him his love and compassion for people, as well as his desire to provide the best experience possible.</p>

                                            <br>

                                            <p>Megan Pagan, RN, Owner 
                                            <br>
                                            Heart of Gold Medical Transport, Inc.</p>
                                        <h3>COMPASSION</h3>
                                        <p>Heart of Gold Medical Transport serves everyone with great compassion and
                                            care. We know that every client is different and may have unique situations.
                                            With this in mind, we strive to make each and every client feel comfortable,
                                            like they are part of the Heart of Gold family.</p>
                                        <h3>SAFETY</h3>
                                        <p>All of our vehicles are ADA (Americans with Disabilities Act) compliant and
                                            are specially equipped with custom wheelchair ramps and safety fasteners.
                                        </p>
                                        <h3>TIMELINESS</h3>
                                        <p>In the transportation industry, being on time is everything. Heart of Gold
                                            Medical Transport understands that the time of each and every client, as
                                            well as the time of physicians and nursing staff who may be caring for the
                                            patient, is invaluable. Because of this, timeliness is of the utmost
                                            importance to us.</p>

                                    </div><!-- /.about-content-left-->
                                </div><!-- /.col-md-5 -->
                                <div class="col-md-6">
                                   
                                            <div class="contact">
                                                <div class="contact-btn">REQUEST A RIDE TODAY</div>
                                            </div>
                                            <ContactForm></ContactForm>
                                    <br>
                                </div><!-- /.col-md-7 -->
                            </div><!-- /.row -->
                        </div><!-- /.top-content -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.about-main-content -->
        <web-footer></web-footer>
    </div>
</template>
<script>
import TopHeader from './includes/TopHeader.vue';
import NavigationBar from './includes/navigationbar.vue';
import WebFooter from './includes/footer.vue'
import ContactForm from './includes/contact-form';
export default {
    date(){
        return{
            option:2,
            about:true
        }
    },
    components: { TopHeader, NavigationBar, WebFooter, ContactForm },
    mounted () {
        window.scrollTo(0, 0)
    }
};
</script>
