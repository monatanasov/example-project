import { createRouter, createWebHistory } from 'vue-router';
import HomeComponent from './components/Projects.vue';
import AboutComponent from './components/Tasks.vue';

const routes = [
    { path: '/', component: HomeComponent },
    { path: '/about', component: AboutComponent },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
