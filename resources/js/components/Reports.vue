<template>
    <div class="w-1/2 border-2 border-black m-auto p-4">
        <div>
            <h3 class="flex justify-center">Project List</h3>
            <table v-if="projects.length">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Project name</th>
                        <th>Tasks</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="project in projects" :key="project.id">
                        <td>{{ project.id }}</td>
                        <td>{{ project.name }}</td>
                        <td>
                            {{ project.tasks.map(task => task.name).join(', ') }}
                        </td>
                        <td>
                            <div class="flex">
                                <button
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-3 mr-2"
                                    @click="editProject(project)"
                                >
                                    Edit
                                </button>
                                <button
                                    class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3"
                                    @click="deleteProject(project.id)"
                                >
                                    Delete
                                </button>
                            </div>
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
        },
        editProject() {},
        deleteProject(projectId) {
            axios
                .delete(`/projects/${projectId}`)
                .then(response => {
                    this.projects = this.projects.filter(project => project.id !== projectId);
                    alert(response.data.message);
                })
                .catch(error => {
                    console.error('Error:', error.response.data.message);
                    alert('Failed to delete the project.');
                });
        },
    }
}
</script>
