window.Vue = require('vue');
window.axios = require('axios');
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Main from './pages/Discover.vue'
import Home from './pages/Home.vue'
import Apartment from './pages/Apartment.vue'
import AboutUs from './pages/AboutUs.vue'


const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'Homepage',
            component: Home,
        },
        {
            path: '/discover',
            name: 'Scopri | BoolBnB',
            component: Main,
        },
        {
            path: '/apartment/:slug',
            name: 'Dettaglio | BoolBnB',
            component: Apartment,
        },
        {
            path: '/about',
            name: 'About',
            component: AboutUs
        }
    ],
});

router.beforeEach((to, from, next)=>{
    document.title = to.name
    next()
})

const app = new Vue({
    router
    }).$mount('#vue');
    