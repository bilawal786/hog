import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import driverPaymentRequest from "./driver_payment_request";
import driverPaymentList from "./driver_payment_list";



const routes = [
    {
        name:'driverPaymentRequest',
        path:'/payment/request',
        component:driverPaymentRequest,
        meta: { title: 'HOG | Driver Payment Request' }
    },
    {
        name:'driverPaymentList',
        path:'/payment/list',
        component:driverPaymentList,
        meta: { title: 'HOG | Driver Payment List' }
    },
];

const router = new VueRouter({
    mode: "history",
    routes
});

export default router;
