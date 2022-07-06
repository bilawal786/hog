import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import RequestRideList from "./RequestRideList";
import RequestRideAssign from "./RequestRideAssign";
import RequestRideProcess from "./RequestRideProcess";
import RequestRideReject from "./RequestRideReject";
import RequestRideComplete from "./RequestRideComplete";
import newRideList from "./childs/newRideList";
import newRideDetail from "./childs/newRideDetail";
import newRideEdit from "./childs/newRideEdit";

const routes = [
    {
        // name:'RequestRideList',
        path:'/request/ride/list',
        component:RequestRideList,
        // meta: { title: 'HOG | Request Ride List' },
        children: [
            {
                path: '/',
                component: newRideList,
            },
            {
                path: '/view',
                component: newRideDetail,
            },
            {
                path: '/edit/:id',
                component: newRideEdit,
            },
        ],
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
