import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import RequestRideList from "./RequestRideList";
import RequestRideAssign from "./RequestRideAssign";
import RequestRideProcess from "./RequestRideProcess";
import RequestRideReject from "./RequestRideReject";
import RequestRideComplete from "./RequestRideComplete";
import RideDetail from "./childs/rideDetail/RideDetail";
import RideRequestNew from "./RequestRideNew"

const routes = [
    {
        name:'RequestRideNew',
        path:'/request/ride/new',
        component:RideRequestNew,
        meta: { title: 'HOG | Request A Ride New' },
    },
    {
        name:'RequestRideList',
        path:'/request/ride/list',
        component:RequestRideList,
        meta: { title: 'HOG | Request A Ride List' },
    },
    {
        name:'RequestRideAssign',
        path:'/request/ride/assign',
        component:RequestRideAssign,
        meta: { title: 'HOG | Request A Ride Assign' }

    },
    {
        name:'RequestRideProcess',
        path:'/request/ride/process',
        component:RequestRideProcess,
        meta: { title: 'HOG | Request A Ride Process' }
    },
    {
        name:'RequestRideReject',
        path:'/request/ride/reject',
        component:RequestRideReject,
        meta: { title: 'HOG | Request A Ride Reject' }
    },
    {
        name:'RequestRideComplete',
        path:'/request/ride/complete',
        component:RequestRideComplete,
        meta: { title: 'HOG | Request A Ride Complete' }
    },
    {
        name:'RideDetail',
        path:'/request/ride/detail/:id',
        component:RideDetail,
        meta: { title: 'HOG | Request A Ride detal' }
    },
];

const router = new VueRouter({
    mode: "history",
    routes
});

export default router;
