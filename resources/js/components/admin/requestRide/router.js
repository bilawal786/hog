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
        path:'/admin/user/driver/list',
        component:RequestRideCreate,
        meta: { title: 'HOG | Request Ride Create' }
    },
    {
        name:'RequestRideDetail',
        path:'/admin/user/driver/detail/:id?',
        component:RequestRideDetail,
        meta: { title: 'HOG | Request Ride Detail' }
    },
    {
        name:'RequestRideList',
        path:'/admin/user/driver/create',
        component:RequestRideList,
        meta: { title: 'HOG | Request Ride List' }
    },
    {
        name:'RequestRideUpdate',
        path:'/admin/user/driver/edit/:id?',
        component:RequestRideCreate,
        meta: { title: 'HOG | Request Ride Update' }
    },
    {
        name:'RequestRideAssign',
        path:'/admin/user/driver/assign',
        component:RequestRideAssign,
        meta: { title: 'HOG | Request Ride Assign' }
    },
    {
        name:'RequestRideProcess',
        path:'/admin/user/driver/process',
        component:RequestRideProcess,
        meta: { title: 'HOG | Request Ride Process' }
    },
    {
        name:'RequestRideReject',
        path:'/admin/user/driver/reject',
        component:RequestRideReject,
        meta: { title: 'HOG | Request Ride Reject' }
    },
    {
        name:'RequestRideComplete',
        path:'/admin/user/driver/complete',
        component:RequestRideComplete,
        meta: { title: 'HOG | Request Ride Complete' }
    },
];

const router = new VueRouter({
    mode: "history",
    routes
});

export default router;
