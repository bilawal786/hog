require('./vue-assets');
import router from "./components/driver/payment/router";
Vue.component('driver-payment-get', require('./components/driver/payment/driver_payment.vue').default);
Vue.component('set-time', require('./SetTime.vue').default);
Vue.component('set-date', require('./setDate.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));

var app = new Vue({
    el: '#admin',
    router,
});
