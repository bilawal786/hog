import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import VueAxios from 'vue-axios';
import axios from "axios";
import store from "./store";
Vue.use(VueAxios, axios);

require('./bootstrap');

 window.Vue = require('vue');

Vue.config.productionTip = false;


  // axios.defaults.baseURL = 'http://localhost:8000/api/';
  axios.defaults.baseURL = 'https://hog.codingcrust.com/api/';

axios.interceptors.response.use(
  response => response,
  error => {
    if (error.response.status === 422) {
      store.commit("auth/setErrors", error.response.data.errors);
    } else if (error.response.status === 401) {

      store.commit("auth/setUserData", null);
      localStorage.removeItem("authToken");
      // router.push({ name: "Login" });
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
Vue.component('set-time', require('./SetTime.vue').default);
Vue.component('set-date', require('./setDate.vue').default);
const app = new Vue({
    el: '#app',
    router,
    store,
    render: h => h(App),
});
