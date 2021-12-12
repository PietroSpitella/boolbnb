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
            name: 'BoolBnB | Scopri nuovi posti e partecipa a esperienze fantastiche ',
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
            name: 'Chi siamo | BoolBnB',
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
    