import Vue from 'vue';
import VueRouter from 'vue-router';

import LayoutDefault from '../layouts/Default.vue';

import Home from '../views/Home.vue';

Vue.use(VueRouter);

const routes = [
    {
        path: '/', component: LayoutDefault,
        children: [
            { path: '', name: 'index', component: Home }
        ],
    },
];

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes,
});

export default router;
