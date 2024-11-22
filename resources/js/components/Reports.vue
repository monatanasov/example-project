<template>
    <div class="w-1/2 border-2 border-black m-auto p-4">
        <div>
            <h3 class="flex justify-center">Projects List</h3>
            <table v-if="projects.length">
                <thead>
                    <tr>
                        <th>Project ID</th>
                        <th>Project name</th>
                        <th>Tasks</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="project in projects" :key="project.id">
                        <td>{{ project.id }}</td>
                        <td>{{ project.name }}</td>
                        <td>
                            {{ project.tasks.map(task => task.name).join(', ') }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <p v-else>No projects available</p>
        </div>

        <div class="flex justify-between">
            <router-link class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" to="/projects">
                Go to Projects Page
            </router-link>
            <router-link class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" to="/tasks">
                Go to Tasks Page
            </router-link>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'reports',
    data() {
        return {
            projects: [],
        };
    },
    mounted() {
        this.fetchProjects();
    },
    methods: {
        fetchProjects() {
            axios.get('/projects')
                .then(response => {
                    this.projects = response.data.data;
                })
                .catch(error => {
                    console.error("There was an error fetching the projects data:", error);
                });
        }
    }
}
</script>
