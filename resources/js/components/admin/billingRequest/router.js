import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import billingRequestCreate from "./billingRequestCreate";
import billingRequestDetail from "./billingRequestDetail";
import billingRequestList from "./billingRequestList";


const routes = [
    {
        name:'billingRequestDetail',
        path:'/question/detail/:id?',
        component:billingRequestDetail,
        meta: { title: 'HOG | Billing Request Detail' }
    },
    {
        name:'billingRequestList',
        path:'/question/list',
        component:billingRequestList,
        meta: { title: 'HOG | Billing Request List' }
    },
    {
        name:'billingRequestUpdate',
        path:'/question/edit/:id?',
        component:billingRequestCreate,
        meta: { title: 'HOG | Update' }
    },
];

const router = new VueRouter({
    mode: "history",
    routes
});

export default router;
