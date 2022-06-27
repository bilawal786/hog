import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import driverlistView from "./driverlistView";
import driverCreate from "./driverCreate";
import driverEidt from "./driverEdit";
import driverDetail from "./driverDetail";


const routes = [
    {
        name:'driverlistViewall',
        path:'/admin/user/driver/list',
        component:driverlistView,
        meta: { title: 'HOG | List Drivers' }
    },
    {
        name:'driverDetail',
        path:'/admin/user/driver/detail/:id?',
        component:driverDetail,
        meta: { title: 'HOG | Driver Detail' }
    },
    {
        name:'driverCreate',
        path:'/admin/user/driver/create',
        component:driverCreate,
        meta: { title: 'HOG | Create Driver' }
    },
    {
        name:'driverEidt',
        path:'/admin/user/driver/edit/:id?',
        component:driverCreate,
        meta: { title: 'HOG | Eit Driver' }
    },
];

const router = new VueRouter({
    mode: "history",
    routes
});

export default router;
