import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import otherCreate from "./otherCreate";
import otherdetail from "./otherdetail";
import otherList from "./otherList";


const routes = [
    {
        name:'otherCreate',
        path:'/form/other/list',
        component:otherCreate,
        meta: { title: 'HOG | Other Create' }
    },
    {
        name:'otherdetail',
        path:'/form/other/detail/:id?',
        component:otherdetail,
        meta: { title: 'HOG | Others Detail' }
    },
    {
        name:'otherList',
        path:'/form/driver/create',
        component:otherList,
        meta: { title: 'HOG | Others List' }
    },
    {
        name:'otherUpdate',
        path:'/form/driver/edit/:id?',
        component:otherCreate,
        meta: { title: 'HOG | Others Update' }
    },
];

const router = new VueRouter({
    mode: "history",
    routes
});

export default router;
