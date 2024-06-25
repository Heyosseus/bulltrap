import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../views/HomeView.vue';
import DashboardView from '../views/DashboardView.vue';

const routes = [
    { path: '/', component: HomeView },
    { path: '/dashboard', component: DashboardView },
    { path: '/login', component: () => import('../components/Login.vue') },
    { path: '/:pathMatch(.*)*', redirect: '/' },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
