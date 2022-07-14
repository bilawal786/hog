import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import otherCreate from "./otherCreate";
import otherdetail from "./otherdetail";
import otherList from "./otherList";


const routes = [
    {
        name:'otherdetail',
        path:'/form/other/detail/:id?',
        component:otherdetail,
        meta: { title: 'HOG | Others Detail' }
    },
    {
        name:'otherList',
        path:'/form/other/list',
        component:otherList,
        meta: { title: 'HOG | Others List' }
    },
    {
        name:'otherUpdate',
        path:'/form/other/edit/:id?',
        component:otherCreate,
        meta: { title: 'HOG | Others Update' }
    },
];

const router = new VueRouter({
    mode: "history",
    routes
});

export default router;
