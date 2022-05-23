/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');

 window.Vue = require('vue');
 import Admin from './Admin.vue';
 import VueAxios from 'vue-axios';
 import VueRouter from 'vue-router';
 import axios from 'axios';
 import { routes } from './routes-not';
 
 
 Vue.use(VueRouter);
 Vue.use(VueAxios, axios);
  
 const router = new VueRouter({
     mode: 'history',
     routes: routes,
 });
 
 const admin = new Vue({
     el: '#admin', 
     router: router,
     render: h => h(Admin),
 });