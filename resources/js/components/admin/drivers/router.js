import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import driverlistView from "./driverlistView";
import driverCreate from "./driverCreate";
import driverDetail from "./driverDetail";

const routes = [
    {
        name:'driverlistViewall',
        path:'/driver/list',
        component:driverlistView,
        meta: { title: 'HOG | List Drivers' }
    },
    {
        name:'driverDetail',
        path:'/driver/detail/:id?',
        component:driverDetail,
        meta: { title: 'HOG | Driver Detail' }
    },
    {
        name:'driverCreate',
        path:'/driver/create',
        component:driverCreate,
        meta: { title: 'HOG | Create Driver' }
    },
    {
        name:'driverEidt',
        path:'/driver/edit/:id?',
        component:driverCreate,
        meta: { title: 'HOG | Eit Driver' }
    },
];

const router = new VueRouter({
    mode: "history",
    routes
});

export default router;
