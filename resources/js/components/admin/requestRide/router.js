import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import RequestRideCreate from "./RequestRideCreate";
import RequestRideDetail from "./RequestRideDetail";
import RequestRideList from "./RequestRideList";
import RequestRideAssign from "./RequestRideAssign";
import RequestRideProcess from "./RequestRideProcess";
import RequestRideReject from "./RequestRideReject";
import RequestRideComplete from "./RequestRideComplete";

const routes = [
    {
        name:'RequestRideCreate',
        path:'/request/ride/create',
        component:RequestRideCreate,
        meta: { title: 'HOG | Request Ride Create' }
    },
    {
        name:'RequestRideDetail',
        path:'/request/detail/:id?',
        component:RequestRideDetail,
        meta: { title: 'HOG | Request Ride Detail' }
    },
    {
        name:'RequestRideList',
        path:'/request/ride/list',
        component:RequestRideList,
        meta: { title: 'HOG | Request Ride List' }
    },
    {
        name:'RequestRideUpdate',
        path:'/request/ride/edit/:id?',
        component:RequestRideCreate,
        meta: { title: 'HOG | Request Ride Update' }
    },
    {
        name:'RequestRideAssign',
        path:'/request/ride/assign',
        component:RequestRideAssign,
        meta: { title: 'HOG | Request Ride Assign' }
    },
    {
        name:'RequestRideProcess',
        path:'/request/ride/process',
        component:RequestRideProcess,
        meta: { title: 'HOG | Request Ride Process' }
    },
    {
        name:'RequestRideReject',
        path:'/request/ride/reject',
        component:RequestRideReject,
        meta: { title: 'HOG | Request Ride Reject' }
    },
    {
        name:'RequestRideComplete',
        path:'/request/ride/complete',
        component:RequestRideComplete,
        meta: { title: 'HOG | Request Ride Complete' }
    },
];

const router = new VueRouter({
    mode: "history",
    routes
});

export default router;
