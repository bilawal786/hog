<template>
    <div>
        <top-header></top-header>
        <navigation-bar></navigation-bar>
        <div class="page-header nevy-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">                
                    <h2 class="page-title">Resources</h2>      
                </div><!-- /.col-md-12 -->
            </div><!-- /.row-->
        </div><!-- /.container-fluid -->           
        </div>
        <div class="about-main-content mr-top-90">
            <div class="container">
                <div class="resources-cs">
                    <ul class="resources-ul-cs">
                        <li class="resources-li-cs">
                            <div class="">
                                <span class="resources-h">HOSPICE</span>
                                    <div class="resources-list">
                                        <p>Snowline Hospice</p>
                                        <p>www.snowlinehospice.org</p>
                                        <p>(916) 817-2338</p>
                                    </div>
                            </div>
                        </li>
                        <li class="resources-li-cs">
                            <div class="">
                                <span class="resources-h">IN-HOME CAREGIVERS</span>
                                
                                    <div class="resources-list">
                                        <p>A Better Living Home Care Agency</p>
                                        <p>www.blhc.org </p>
                                        <p>(916) 361-3000</p>
                                    </div>
                              
                            </div>
                        </li>
                        <li class="resources-li-cs">
                            <div class="">
                                <span class="resources-h">All For You Home Care</span>
                              
                                    <div class="resources-list">
                                        <p>www.allforyouhomecare.com</p>
                                        <p>(916) 479-8554</p>
                                    </div>
                             
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <web-footer></web-footer>
    </div>
</template>
<script>
import TopHeader from './includes/TopHeader.vue';
import NavigationBar from './includes/navigationbar.vue';
import WebFooter from './includes/footer.vue';
export default {
    components: { TopHeader, NavigationBar, WebFooter },
    mounted () {
        window.scrollTo(0, 0)
    }
};
</script>