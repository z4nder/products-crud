import Vue from 'vue';
import VueRouter from 'vue-router';

import LayoutDefault from '../layouts/Default.vue';

import Home from '../views/Home.vue';
import ProductForm from '../views/ProductForm.vue';
import UpdateProductForm from '../views/UpdateProductForm.vue';

Vue.use(VueRouter);

const routes = [
    {
        path: '/', component: LayoutDefault,
        children: [
            { path: '', name: 'index', component: Home },
            { path: 'create', name: 'create', component: ProductForm },
            { path: ':id', name: 'update', component: UpdateProductForm }
        ]
    }
];

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes,
});

export default router;
