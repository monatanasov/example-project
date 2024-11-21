import { createRouter, createWebHistory } from 'vue-router';
import HomeComponent from './components/Home.vue';
import AboutComponent from './components/About.vue';

const routes = [
    { path: '/', component: HomeComponent },
    { path: '/about', component: AboutComponent },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
