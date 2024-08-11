import { createRouter, createWebHistory } from 'vue-router';
import DashboardView from '../views/DashboardView.vue';
import {checkSession} from '../config/checkSession.js';

const routes = [
    { path: '/', component: () => import('../views/HomeView.vue')},
    { path: '/dashboard', name: 'Dashboard',  component: DashboardView , meta: { requiresAuth: true } } ,
    { path: '/forbidden', component: () => import('../views/error/Forbidden.vue')},
    // { path: '/:pathMatch(.*)*', component: () => import('../views/error/NotFound.vue')},
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});
router.beforeEach(async (to, from, next) => {
    if (to.meta.requiresAuth) {
        const isSessionActive = await checkSession();
        if (!isSessionActive) {
            next('/forbidden');
        } else {
            next();
        }
    } else {
        next();
    }
});

export default router;
