import home from './components/frontend/home.vue';
import about from './components/frontend/about.vue';
import services from './components/frontend/services.vue';
import contact from './components/frontend/contact.vue';
import resources from './components/frontend/resources.vue';
import fqa from './components/frontend/fqa.vue';
import policy from './components/frontend/policy.vue';
import login from './components/frontend/login.vue';
import registration from './components/frontend/registration.vue';
import NotFound from './components/frontend/404.vue';


import adminLogin from './components/admin/login.vue';

export const routes = [
    {
        name: 'index',
        path: '/',
        component: home,
    },
    {
        name: 'about',
        path: '/about',
        component: about
    },
    {
        name: 'services',
        path: '/services',
        component: services
    },
    {
        name: 'contact',
        path: '/contact',
        component: contact
    },
    {
        name: 'resources',
        path: '/resources',
        component: resources
    },
    {
        name: 'fqa',
        path: '/fqa',
        component: fqa
    },
    {
        name: 'policy',
        path: '/policy',
        component: policy
    },
    {
        name:'login',
        path:'/login',
        component:login
    },
    {
        name:'registration',
        path:'/registration',
        component:registration
    },
    {
        path: '/404',
        component: NotFound
    },  
    {
        path: '*',
         component: NotFound
    },
    //admin
    // {
    //     name: 'adminLogin',
    //     path: '/admin/login',
    //      component: adminLogin
    // }
];