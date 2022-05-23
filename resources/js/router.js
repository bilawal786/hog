import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import home from './components/frontend/home.vue';
import about from './components/frontend/about.vue';
import services from './components/frontend/services.vue';
import contact from './components/frontend/contact.vue';
import resources from './components/frontend/resources.vue';
import dashboard from './components/frontend/dashboard.vue';
import fqa from './components/frontend/fqa.vue';
import policy from './components/frontend/policy.vue';
import login from './components/frontend/login.vue';
import registration from './components/frontend/registration.vue';
import NotFound from './components/frontend/404.vue';

const guest = (to, from, next) => {
  if (!localStorage.getItem("authToken")) {
    return next();
  } else {
    return next("/");
  }
};
const auth = (to, from, next) => {
  if (localStorage.getItem("authToken")) {
    return next();
  } else {
  //  return next("/login");
  }
};

const routes = [
//   {
//     path: "/",
//     name: "Home",
//     component: () => import(/* webpackChunkName: "home" */ "../views/Home.vue")
//   },
//   {
//     path: "/login",
//     name: "Login",
//     beforeEnter: guest,
//     component: () =>
//       import(/* webpackChunkName: "login" */ "../views/Auth/Login.vue")
//   },
//   {
//     path: "/register",
//     name: "Register",
//     beforeEnter: guest,
//     component: () =>
//       import(/* webpackChunkName: "register" */ "../views/Auth/Register.vue")
//   },
//   {
//     path: "/verify/:hash",
//     name: "Verify",
//     beforeEnter: auth,
//     props: true,
//     component: () =>
//       import(/* webpackChunkName: "verify" */ "../views/Auth/Verify.vue")
//   },
  {
    name: 'index',
    path: '/',
    component: home,

},
{
    name: 'about',
    path: '/about',
    component: about,

},
{
    name: 'services',
    path: '/services',
    component: services,

},
{
    name: 'contact',
    path: '/contact',
    component: contact,

},
{
    name: 'resources',
    path: '/resources',
    component: resources,

},
{
    name: 'dashboard',
    path: '/dashboard',
    component: dashboard,
    beforeEnter: auth,
},
{
    name: 'fqa',
    path: '/fqa',
    component: fqa,

},
{
    name: 'policy',
    path: '/policy',
    component: policy,

},
{
    name:'Login',
    path:'/login',
    component:login,
    beforeEnter: guest,
},
{
    name:'registration',
    path:'/register',
    component:registration,
    beforeEnter: guest,
},
{
    path: '/404',
    component: NotFound
},  
{
    path: '*',
     component: NotFound
},
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes
});

export default router;
