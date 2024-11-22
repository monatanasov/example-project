import { createRouter, createWebHistory } from 'vue-router';
import ProjectsComponent from './components/Projects.vue';
import TasksComponent from './components/Tasks.vue';
import ReportsComponent from './components/Reports.vue';

const routes = [
    { path: '/', component: ReportsComponent, alias: '/reports' },
    { path: '/projects', component: ProjectsComponent },
    { path: '/tasks', component: TasksComponent },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
