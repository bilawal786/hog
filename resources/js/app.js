require('./bootstrap');

 window.Vue = require('vue');
 import App from './App.vue';
 import Admin from './Admin.vue';
 import VueAxios from 'vue-axios';
 import VueRouter from 'vue-router';
 import axios from 'axios';
 import { routes } from './routes';
 

Vue.use(VueRouter);
Vue.use(VueAxios, axios);
 
const router = new VueRouter({
    mode: 'history',
    routes: routes,
});
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app', 
    router: router,
    render: h => h(App),
});


const admin = new Vue({
    el: '#admin', 
    router: router,
    render: h => h(Admin),
});
