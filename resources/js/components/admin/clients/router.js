import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import clientsList from "./clientsList";
import clientDetails from "./clientDetails";

const routes = [
    {
        name:'clientsList',
        path:'/client/list',
        component:clientsList,
        meta: { title: 'HOG | List Clients' }
    },
    {
        name:'clientDetails',
        path:'/client/detail/:id?',
        component:clientDetails,
        meta: { title: 'HOG | Client Detail' }
    },
];

const router = new VueRouter({
    mode: "history",
    routes
});

export default router;
