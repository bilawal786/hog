<template>
    <div>
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
                                            owners are Megan and Cecilia.</p>
                                        <p>Megan has worked as a nurse since 2009, becoming a Registered Nurse in 2010.
                                            She has worked as a nurse in various settings including skilled nursing,
                                            drug rehabilitation, and cosmetic surgery. Most recently she was Director of
                                            Nursing at a Sacramento-based skilled nursing facility.</p>
                                        <p>Cecilia was a Medical Assistant for 13 years, and she has almost 10 years of
                                            experience as a business owner. She has a passion for taking care of others
                                            and for always providing the best possible customer service.</p>
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
                                    <form action="#">
                                         
                                        <div class="input-content">
                                            <div class="contact">
                                                <div class="contact-btn">REQUEST A RIDE TODAY</div>
                                            </div>
                                            <ContactForm></ContactForm>
                                        </div>
                                    </form>
                                    <br>
                                </div><!-- /.col-md-7 -->
                            </div><!-- /.row -->
                        </div><!-- /.top-content -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.about-main-content -->
    </div>
</template>
<script>
import ContactForm from './includes/contact-form';

export default {
    components: {
        ContactForm
    }
};
</script>
