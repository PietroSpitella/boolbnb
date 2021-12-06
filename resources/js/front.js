window.Vue = require('vue');
window.axios = require('axios');
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Main from './pages/Discover.vue'
import Home from './pages/Home.vue'
import Apartment from './pages/Apartment.vue'


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
            name: 'Discover',
            component: Main,
        },
        {
            path: '/apartment/:slug',
            name: 'Apartment',
            component: Apartment,
        },
    ],
});

router.beforeEach((to, from, next)=>{
    document.title = to.name
    next()
})

const app = new Vue({
    router
    }).$mount('#vue');
    