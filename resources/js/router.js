import Vue from 'vue';
import VueRouter from 'vue-router';
import Discover from './pages/Discover'

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/discover',
            name: 'discoverPage',
            component: Discover,
        },
    ],
});

export default router;