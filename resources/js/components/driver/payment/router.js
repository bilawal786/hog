import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import driverPaymentWithdraw from "./driver_payment_withdraw";
import driverPaymentList from "./driver_payment_list";



const routes = [
    {
        name:'driverPaymentRequest',
        path:'/admin/withdraw/view',
        component:driverPaymentWithdraw,
        meta: { title: 'HOG | Driver Payment Withdraw' }
    },
    {
        name:'driverPaymentList',
        path:'/admin/withdraw/list',
        component:driverPaymentList,
        meta: { title: 'HOG | Driver Payment List' }
    },
];

const router = new VueRouter({
    mode: "history",
    routes
});

export default router;
