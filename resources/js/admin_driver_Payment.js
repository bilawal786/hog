require('./vue-assets');
import router from "./components/admin/payment/router";
Vue.component('driver-payment', require('./components/admin/payment/driver_payment.vue').default);
Vue.component('set-time', require('./SetTime.vue').default);
Vue.component('set-date', require('./setDate.vue').default);

import VueToastify from "vue-toastify";
Vue.use(VueToastify, {
        customNotifications: {
            clientError: {
                body: "You did it!",
                defaultTitle: false,
                icon: '<svg width="50" height="50">\n' +
                    '<rect width="50" height="50" style="fill:rgb(0,0,255);" />\n' +
                    '</svg> ',
                canTimeout: false
            },
            moreOfTheAbove: {
            },
        }
    }
);
var app = new Vue({
    el: '#admin',
    router,
});
