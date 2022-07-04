import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import home from './components/frontend/home.vue';
import about from './components/frontend/about.vue';
import services from './components/frontend/services.vue';
import contact from './components/frontend/contact.vue';
import requestRide from './components/frontend/request_ride.vue';
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
    return next("/dashboard");
  }
};
const auth = (to, from, next) => {
  if (localStorage.getItem("authToken")) {
    return next();
  } else {
   return next("/signin");
  }
};
const routes = [
  {
    name: 'index',
    path: '/',
    component: home,
    meta: { title: 'Heart of Gold | home' }

},
{
    name: 'about',
    path: '/about',
    component: about,
    meta: { title: 'Heart of Gold | About' }

},
{
    name: 'services',
    path: '/services',
    component: services,
    meta: { title: 'Heart of Gold | Services' }

},
{
    name: 'contact',
    path: '/contact',
    component: contact,
    props: true,
    meta: { title: 'Heart of Gold | Contact' }

},
{
  name: 'request1_ride',
  path: '/request-ride',
  component: requestRide,
  props: true,
  meta: { title: 'Heart of Gold | Conform Ride Request' }

},
{
    name: 'resources',
    path: '/resources',
    component: resources,
    meta: { title: 'Heart of Gold | Resources' }

},
{
    name: 'home',
    path: '/home',
    component: dashboard,
    beforeEnter: auth,
    meta: { title: 'Heart of Gold | Home' }
},
{
    name: 'fqa',
    path: '/fqa',
    component: fqa,
    meta: { title: 'Heart of Gold | FQA' }

},
{
    name: 'policy',
    path: '/policy',
    component: policy,
    meta: { title: 'Heart of Gold | Policy' }

},
{
    name:'Login',
    path:'/signin',
    component:login,
    beforeEnter: guest,
    meta: { title: 'Heart of Gold | Login' }
},
{
    name:'registration',
    path:'/register',
    component:registration,
    beforeEnter: guest,
    meta: { title: 'Heart of Gold | Registration' }
},
{
    path: '/404',
    component: NotFound,
    meta: { title: 'Heart of Gold | 404' }
},
{
    path: '*',
     component: NotFound,
     meta: { title: 'Heart of Gold | 404' }
},
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes
});
router.beforeEach((to, form, next)=>{
  document.title = `${to.meta.title}`;

  next();
})

export default router;
