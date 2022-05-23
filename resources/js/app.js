import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import VueAxios from 'vue-axios';
import axios from "axios";
Vue.use(VueAxios, axios);

Vue.config.productionTip = false;

axios.interceptors.response.use(
  response => response,
  error => {
    if (error.response.status === 422) {
      store.commit("setErrors", error.response.data.errors);
    } else if (error.response.status === 401) {
      store.commit("auth/setUserData", null);
      localStorage.removeItem("authToken");
      router.push({ name: "Login" });
    } else {
      return Promise.reject(error);
    }
  }
);

axios.interceptors.request.use(function(config) {
  config.headers.common = {
    Authorization: `Bearer ${localStorage.getItem("authToken")}`,
    "Content-Type": "application/json",
    Accept: "application/json"
  };

  return config;
});

require('./bootstrap');

 window.Vue = require('vue');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app', 
    router,
    store,
    render: h => h(App),
});


// const admin = new Vue({
//     el: '#admin', 
//     router: router,
//     render: h => h(Admin),
// });
