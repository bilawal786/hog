import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import submitFeedBackCreate from "./submitFeedBackCreate";
import submitFeedBackDetail from "./submitFeedBackDetail";
import submitFeedBackList from "./submitFeedBackList";


const routes = [
    {
        name:'submitFeedBackCreate',
        path:'/admin/form/submit/feedback/create',
        component:submitFeedBackCreate,
        meta: { title: 'HOG | FeedBack Create' }
    },
    {
        name:'submitFeedBackDetail',
        path:'/admin/form/submit/feedback/detail/:id?',
        component:submitFeedBackDetail,
        meta: { title: 'HOG | FeedBack Detail' }
    },
    {
        name:'submitFeedBackList',
        path:'/admin/form/submit/feedback/list',
        component:submitFeedBackList,
        meta: { title: 'HOG | FeedBack List' }
    },
    {
        name:'submitFeedBackUpdate',
        path:'/admin/form/submit/feedback/edit/:id?',
        component:submitFeedBackCreate,
        meta: { title: 'HOG | FeedBack Update' }
    },
];

const router = new VueRouter({
    mode: "history",
    routes
});

export default router;
