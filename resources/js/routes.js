import home from './components/frontend/home.vue';
import about from './components/frontend/about.vue';
import services from './components/frontend/services.vue';
import contact from './components/frontend/contact.vue';
import resources from './components/frontend/resources.vue';
 
export const routes = [
    {
        name: 'index',
        path: '/',
        component: home
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
    }
];